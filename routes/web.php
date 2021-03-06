<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\FormController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//группа админа
Route::group(['middleware' => 'auth'], function() {
    Route::resource('forms',FormController::class);
//    Route::get()
});

//пользователь
    Route::resource('viewform', IndexController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
