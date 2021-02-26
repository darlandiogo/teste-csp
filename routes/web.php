<?php

use Illuminate\Support\Facades\Route;

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
    //return view('welcome');
    return redirect('/contacts');
});

Route::prefix('/contacts')->group(function () {
    Route::get('', 'ContactController@index')->name('contact');
    Route::get('/create', 'ContactController@create')->name('contact.create');
    Route::post('', 'ContactController@store')->name('contact.store');
    Route::get('/edit/{id}', 'ContactController@edit')->name('contact.edit');
    Route::put('/{id}', 'ContactController@update')->name('contact.update');
    Route::delete('/{id}', 'ContactController@destroy')->name('contact.destroy');
});


