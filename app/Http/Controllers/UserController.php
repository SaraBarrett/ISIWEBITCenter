<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function getAllUsers(){
        $search = request()->query('search') ? request()->query('search'): null;

        $cesaeInfo = $this->getCesaeInfo();

        $allUsers = $this->allUsers();

        if(request()->query('user_id')){
            $users = User::where('id', request()->query('user_id'))->get();
        }elseif($search){
            $users = User::where('name', "LIKE", "%{$search}%")
            ->orWhere('email', "LIKE",  "%{$search}%")
            ->orWhere('address', "LIKE",  "%{$search}%")
            ->get();
        }else{
            $users =  $allUsers;
        }



        return view('users.all_users',
        compact('cesaeInfo',
        'users',
        'allUsers'
    ));
    }

    public function addUser(){
        return view('users.add_user');
    }

    public function viewUser($id){

        $user = Db::table('users')
                ->where('id',$id)
                ->first();

        return view('users.add_user', compact('user'));
    }

    public function deleteUser($id){

       Db::table('tasks')
        ->where('user_id',$id)
        ->delete();

        Db::table('users')
                ->where('id',$id)
                ->delete();

        return back();
    }

    public function storeUser(Request $request){
        //dd($request->photo);
        //validar se é update ou insert

        //é update porque tem um id, o que quer dizer que já existe
        if($request->user_id){
            $request->validate([
                'name' => 'string|max:50',
                'password' => 'min:6'
               ]);
               $photo = null;
               if($request->hasFile('photo')){
                $photo = Storage::putFile('userPhotos', $request->photo);
               }

               User::where('id', $request->user_id)
               ->update([
                'name' => $request->name,
                'address' => $request->address,
                'password' => Hash::make($request->password),
                'photo' => $photo,
               ]);
        }else{
                //é insert porque NÂO tem um id, o que quer dizer que ainda Não existe
            $request->validate([
                'email' => 'required|unique:users|email',
                'name' => 'string|max:50',
                'password' => 'min:6'
               ]);

               User::insert([
                'email' => $request->email,
                'name' => $request->name,
                'password' => Hash::make($request->password),
               ]);
        }
       return redirect()->route('users.all');
    }

    protected function getCesaeInfo(){
        $cesaeInfo = [
            'name' => 'Cesae',
            'address' => 'Europarque',
            'email' => 'Cesae@gmail.com',
        ];

       // $cesaeInfo['email'];


        return $cesaeInfo;
    }

    protected function allUsers(){
        $users = DB::table('users')
                ->get();

        return $users;

    }


}
