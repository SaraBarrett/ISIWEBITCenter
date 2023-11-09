<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getAllUsers(){

        $cesaeInfo = $this->getCesaeInfo();
        $users = $this->allUsers();

        ///dd($cesaeInfo);

        return view('users.all_users',
        compact('cesaeInfo',
        'users'
    ));
    }

    public function addUser(){
        return view('users.add_user');
    }

    public function viewUser(){
        return view('users.view_user');
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
        $users = db::table('users')
                ->get();

        return $users;

    }


}
