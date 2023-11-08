<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function getMain(){
        $hello = 'Hello World';

        $weekDays = [
          'Segunda',
          'Terça',
          'Quarta'
         ];

        $user =DB::table('users')
        ->where('id', 2)
        ->first();

        $users = $this->getAllUsers();




        /*$weekDays = [
           ['Python', 'Isi'],
           ['r', 'd'],
           ['46464', '4644'],
        ];*/


        //dd($weekDays[0]);

        return view('general.home', compact(
            'hello',
            'weekDays',
            'user',
            'users'
        ));
    }

    protected function getAllUsers(){
        $users = db::table('users')
                ->get();

        return $users;

    }


}
