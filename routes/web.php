<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
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

// User Module Routes Group
Route::controller(UserController::class)->group(function(){
    Route::get('/', 'loginForm')->name('login');
    Route::get('register','registrationForm')->name('register');
    Route::post('register','register')->name('register.store');
    Route::post('login','login')->name('login');
    Route::get('logout','logout')->name('logout');
});

// Todos Module Routes Group
Route::controller(TodoController::class)->middleware(['auth'])->prefix('todos')->group(function(){
    Route::get('list', 'index')->name('todos.list');
    Route::post('add', 'store')->name('todos.add');
    Route::delete('delete/{id}', 'destroy')->name('todos.delete');
    Route::post('edit', 'edit')->name('todos.edit');
    Route::put('update/{id}', 'update')->name('todos.update');
});
