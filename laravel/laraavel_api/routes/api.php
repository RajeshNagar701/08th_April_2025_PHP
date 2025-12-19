<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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


Route::get('/allshow',[UserController::class,'allshow']);
Route::get('/single_show/{id}',[UserController::class,'single_show']);
Route::get('/search/{key}',[UserController::class,'search']);

Route::post('/insert',[UserController::class,'store']);
Route::put('/update/{id}',[UserController::class,'update']); // update
Route::delete('/delete/{id}',[UserController::class,'destroy']); // delete

Route::put('/updatestatus/{id}',[UserController::class,'updatestatus']); // block unblock
Route::post('/login',[UserController::class,'login']); // login

