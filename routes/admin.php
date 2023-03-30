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

Route::group(['prefix'=>'admin','namespace'=>'Admin'],function () {
    
Route::get('/', function () {
    return 'hellow admin';
});

Route::get('second','FirstController@showString');
Route::get('second1','FirstController@showString1');
Route::get('second2','FirstController@showString2');
Route::get('second3','FirstController@showString3');
});