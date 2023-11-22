<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


//users
Route::get('/all-users', [UserController::class, 'getAllUsers'] )->name('users.all');
Route::post('/store-user', [UserController::class, 'storeUser'])->name('users.store');
Route::get('/delete-user/{id}', [UserController::class, 'deleteUser'])->name('users.delete');
Route::get('/add-user', [UserController::class, 'addUser'])->name('users.add');
Route::get('/view-user/{id}', [UserController::class, 'viewUser'])->name('users.view');

//Tarefas
Route::get('/all-tasks', [TasksController::class, 'getAllTasks'] )->name('tasks.all')->middleware('auth');
Route::get('/view-task/{id}', [TasksController::class, 'viewTask'])->name('tasks.view');
Route::get('/delete-task/{id}', [TasksController::class, 'deleteTask'])->name('tasks.delete');
Route::get('/add-task', [TasksController::class, 'addTask'])->name('tasks.add');
Route::post('/store-task', [TasksController::class, 'storeTask'])->name('tasks.store');
Route::post('/update-task', [TasksController::class, 'updateTask'])->name('tasks.update');


//gifts
Route::get('/all-gifts', [GiftController::class, 'allGifts'])->name('gifts.all');

Route::get('/add-gift', [GiftController::class, 'addGift'])->name('gifts.add');
Route::post('/store-gift', [GiftController::class, 'storeGift'])->name('gifts.store');

Route::get('/view-gift/{id}', [GiftController::class, 'viewGift'])->name('gifts.view');
Route::post('/update_p-gift', [GiftController::class, 'updatePGift'])->name('gifts.update_p');

//backoffice
Route::get('/backoffice', [DashboardController::class, 'index'])->name('backoffice.index')->middleware('auth');

Route::get('/hello', function () {
    return '<h2>Hello Turma SD</h2>';
})->name('cucu');



//rota fallback (em vez do erro 404)
Route::fallback(function(){
    return view ('errors.fallback');
});
