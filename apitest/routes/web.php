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
    return view('welcome');
});
Route::get('/get', function () {
    return view('welcome');
});
Route::post('/post', function () {
    return 'I am ';
});
Route::put('/put', function () {
    return 'I am Put';
});
Route::delete('/delete', function () {
    return 'I Am Delete';
});
