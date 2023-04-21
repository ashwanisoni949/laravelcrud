<?php

use App\Http\Controllers\UserController;
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
    return view('index');
})->name('register-show');

Route::post('/register',[UserController::class,'store'])->name('store');
Route::get('show_details',[UserController::class,'index'])->name('show_details');
Route::get('/delete-user/{id}',[UserController::class,'destroy'])->name('delete-user');
Route::get('/edit-user/{id}',[UserController::class,'edit'])->name('edit-user');
Route::post('/user-update/{id}',[UserController::class,'update'])->name('user-update');
