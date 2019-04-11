<?php

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
Route::middleware('guest')->group(function(){
    Route::get('/', function () {
        return view('welcome');
    });
});

Auth::routes();

Route::post('/users/mail', 'UsersController@mail');
Route::middleware('auth')->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/operation/{typeOperation}', 'OperationController@findOperation');
    Route::resource('cart', 'CartController');
    Route::middleware(['auth', 'role'])->group(function(){
        Route::resource('products', 'ProductsController');
    });
});

