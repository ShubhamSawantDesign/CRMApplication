<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;


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
Route::get('/', function () {
    return view('welcome');
})->name('homepage');

Route::post('/doAdminLogin', [AuthenticationController::class, 'doLogin']);
Route::get('/logout', [AuthenticationController::class, 'logout']);


Auth::routes();


Route::group(['middleware'=>'auth'],function(){
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
});
