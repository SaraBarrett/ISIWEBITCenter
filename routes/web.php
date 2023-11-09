<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TasksController;

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

Route::get('/home', [HomeController::class, 'getMain'])->name('home');


Route::get('/all-users', [UserController::class, 'getAllUsers'] )->name('users.all');
Route::get('/add-user', [UserController::class, 'addUser'])->name('users.add');
Route::get('/view-user', [UserController::class, 'viewUser'])->name('users.view');


//todas as tarefas
Route::get('/all-tasks', [TasksController::class, 'getAllTasks'] )->name('tasks.all');

Route::get('/hello', function () {
    return '<h2>Hello Turma SD</h2>';
})->name('cucu');


//rota fallback (em vez do erro 404)
Route::fallback(function(){
    return view ('errors.fallback');
});
