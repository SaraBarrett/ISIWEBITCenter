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
Route::post('/store-user', [UserController::class, 'storeUser'])->name('users.store');

Route::get('/view-user/{id}', [UserController::class, 'viewUser'])->name('users.view');
Route::get('/delete-user/{id}', [UserController::class, 'deleteUser'])->name('users.delete');




//Tarefas
Route::get('/all-tasks', [TasksController::class, 'getAllTasks'] )->name('tasks.all');

Route::get('/view-task/{id}', [TasksController::class, 'viewTask'])->name('tasks.view');
Route::get('/delete-task/{id}', [TasksController::class, 'deleteTask'])->name('tasks.delete');



Route::get('/hello', function () {
    return '<h2>Hello Turma SD</h2>';
})->name('cucu');


//rota fallback (em vez do erro 404)
Route::fallback(function(){
    return view ('errors.fallback');
});
