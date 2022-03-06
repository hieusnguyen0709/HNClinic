<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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
//All
Route::get('/dang-nhap',[HomeController::class, 'login'])->name('login');
Route::get('/dang-ky',[HomeController::class, 'register'])->name('register');
Route::post('/',[HomeController::class, 'check_login'])->name('check_login');
 Route::post('/kt-dang-ky',[HomeController::class, 'check_register'])->name('check_register');
Route::get('/dang-xuat',[HomeController::class, 'logout'])->name('logout');

//User
Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/trang-chu',[HomeController::class, 'index'])->name('home');

//Admin
Route::get('/admin',[AdminController::class, 'index'])->name('admin');

