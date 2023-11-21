<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GiftController extends Controller
{
    public function allGifts() {
        $gifts = $this->getAllGifts();

        return view('gifts.all_gifts', compact('gifts'));
    }

    public function addGift() {
        $users = $this->allUsers();
        return view('gifts.add_gift', compact('users'));
    }

    public function viewGift($id) {

        $gift = Gift::where('id', $id)->first();

        $users = User::all();

        return view('gifts.view_gift' , compact('gift',
                'users'
    ));
    }

    public function updatePGift(Request $request) {

        $request->validate([
            'name' => 'required|string',
            'price' => 'required|int',
            'user_id' => 'required',
        ]);

        Gift::where('id', $request->id)
            ->update([
            'name'=> $request->name,
            'price'=> $request->price,
            'real_cost'=> $request->real_cost,
            'user_id'=>$request->user_id,
        ]);

        return redirect()->route('gifts.all')->with('message', 'Prenda actualizada com sucesso!');
    }
    public function storeGift(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|int',
            'user_id' => 'required',
        ]);

        DB::table('gifts')
            ->insert([
            'name'=> $request->name,
            'price'=> $request->price,
            'user_id'=>$request->user_id,
        ]);

        return redirect()->route('gifts.all')->with('message', 'Prenda adicionada com sucesso!');
    }

    private function allUsers(){
        $users = User::all();

        return $users;
    }

    private function getAllGifts(){

        $gifts = Gift::join('users', 'users.id', '=', 'gifts.user_id')
        ->select('gifts.id', 'gifts.name', 'gifts.real_cost',  'gifts.estimated_price', 'gifts.status as status', 'users.name as giftowner')
        ->get();


        foreach($gifts as $item){

            if($item->real_cost){
                $item->difference = $item->estimated_price - $item->real_cost;
            }else{
                $item->difference = 'compra em falta';
            }

        }

        return $gifts;
    }
}
