<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mailes;
use App\Http\Controllers\AgentDashboardController;
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

// Route::get('/',[Mailes::class,'test1']);

Route::get('/', function () {
    return view('home');
})->name('home');

// registration routes start

Route::get('/register/userinfo', function () {
    return view('register.userinfo');
})->name('registerBtn');

// Route::get('/register/userinfo',[Mailes::class,'test1'])->name('registerBtn');

Route::get('/register/userdata/{id}',function($id){
    $i = compact('id');
    return view('register.userdata')->with($i);
})->name('userdata'); 

Route::get('/register/userdocuments/{id}',function($id){
    $i = compact('id');
    return view('register.userdoc')->with($i);
})->name('userdoc');

// registration routes end

//  Login Routes
Route::get('/signin', function () {
    return view('signin');
})->name('signin');


//Agent Routes
Route::get('agent/',[AgentDashboardController::class,'getAllUsers']);







// Queries Testing
Route::get('query',function(){
    return view('queries.userquery');
});
