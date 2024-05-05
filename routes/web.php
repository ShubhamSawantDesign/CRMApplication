<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\AjaxController;



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
    Route::get('/clientMaster', [MasterController::class, 'clientMaster'])->name('clientMaster');
    Route::post('/doAddCustomer', [MasterController::class, 'doAddCustomer']);
    Route::post('/changeCustomerStatus',[AjaxController::class, 'updateCustomerStatus']);
    Route::post('/removeCustomerdata',[AjaxController::class, 'removeCustomer']);
    Route::get('/viewClientDetails/{id}', [MasterController::class, 'editClientDetails']);
    Route::post('/doCustomerUpdate', [MasterController::class, 'doCustomerUpdate']);
});
