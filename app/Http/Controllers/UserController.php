<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAllUsers(){

        $cesaeInfo = $this->getCesaeInfo();

        ///dd($cesaeInfo);

        return view('users.all_users',
        compact('cesaeInfo'
    ));
    }

    public function addUser(){
        return view('users.add_user');
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
}
