<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function getMain(){
        $hello = 'Hello World';
        return view('general.home', compact('hello'));
    }
}
