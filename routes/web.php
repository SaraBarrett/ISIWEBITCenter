<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    $hello = 'Hello World';
    return view('general.home', compact('hello'));
})->name('home');

Route::get('/all-users', function () {
    return view('users.all_users');
})->name('users.all');

Route::get('/add-user', function () {
    return view('users.add_user');
})->name('users.add');

Route::get('/hello', function () {
    return '<h2>Hello Turma SD</h2>';
})->name('cucu');


//rota fallback (em vez do erro 404)
Route::fallback(function(){
    return view ('errors.fallback');
});
