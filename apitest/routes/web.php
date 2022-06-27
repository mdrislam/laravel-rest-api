<?php

use Illuminate\Support\Facades\Route;
use app\Controllers\HomeController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/get', function () {
    return 'I am Get';
});

Route::put('/put', function () {
    return 'I am Put';
});
Route::delete('/delete', function () {
    return 'I Am Delete';
});
$router->post('/name/{value}','HomeController@getApi');