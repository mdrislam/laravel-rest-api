<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Public Routes
// Route::post('post',[HomeController::class,'post']);
// Route::put('put',[HomeController::class,'put']);
// Route::delete('delete',[HomeController::class,'delete']);
// //Route 
// Route::get('students',[StudentController::class,'index']);
// Route::get('students/{id}',[StudentController::class,'show']);
// Route::post('students',[StudentController::class,'store']);
// Route::put('students/{id}',[StudentController::class,'update']);
// Route::delete('students/{id}',[StudentController::class,'destroy']);
// Route::get('students/search/{city}',[StudentController::class,'search']);


Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);
//Protected Routes
// Route::middleware('auth:sanctum')->get('students',[StudentController::class,'index']);

//Group Protected Routes
Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('post',[HomeController::class,'post']);
    Route::put('put',[HomeController::class,'put']);
    Route::delete('delete',[HomeController::class,'delete']);
    Route::get('students',[StudentController::class,'index']);
    Route::get('students/{id}',[StudentController::class,'show']);
    Route::post('students',[StudentController::class,'store']);
    Route::put('students/{id}',[StudentController::class,'update']);
    Route::delete('students/{id}',[StudentController::class,'destroy']);
    Route::get('students/search/{city}',[StudentController::class,'search']);
    Route::post('logout',[UserController::class,'logout']);

});