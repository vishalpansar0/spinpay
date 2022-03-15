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

//for to store basic user details
Route::post("store_users",[UserController::class,"store_users"]);
Route::post('/userdata/{id}', [UserController::class, 'userdata']);
//for to store pancard details
Route::post('pancard',[UserController::class, 'pancard']);