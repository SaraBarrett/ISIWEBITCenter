<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function getMain(){
        $hello = 'Hello World';
        $weekDays = [
          'Segunda',
          'Terça',
          'Quarta'
         ];
        /*$weekDays = [
           ['Python', 'Isi'],
           ['r', 'd'],
           ['46464', '4644'],
        ];*/


        //dd($weekDays[0]);

        return view('general.home', compact(
            'hello',
            'weekDays'
        ));
    }
}
