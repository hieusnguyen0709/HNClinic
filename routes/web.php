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
// All
Route::get('/dang-nhap',[HomeController::class, 'login'])->name('login');
Route::get('/dang-ky',[HomeController::class, 'register'])->name('register');
Route::post('/',[HomeController::class, 'check_login'])->name('check_login');
 Route::post('/kt-dang-ky',[HomeController::class, 'check_register'])->name('check_register');
Route::get('/dang-xuat',[HomeController::class, 'logout'])->name('logout');

//User
Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/trang-chu',[HomeController::class, 'index'])->name('home');
Route::get('/thong-tin',[HomeController::class, 'info'])->name('info');

//Admin
Route::get('/admin',[AdminController::class, 'index'])->name('admin');
Route::get('/admin/them-nguoi-dung',[AdminController::class, 'add_user'])->name('add_user');
Route::post('/admin/kt-them-nguoi-dung',[AdminController::class, 'check_add_user'])->name('check_add_user');
Route::get('/admin/danh-sach-nguoi-dung',[AdminController::class, 'show_list_user'])->name('show_list_user');
Route::get('/admin/chi-tiet-nguoi-dung/{id}',[AdminController::class, 'detail_user'])->name('detail_user');
Route::get('/admin/sua-nguoi-dung/{id}',[AdminController::class, 'edit_user'])->name('edit_user');
Route::post('/admin/kt-sua-nguoi-dung/{id}',[AdminController::class, 'check_edit_user'])->name('check_edit_user');
Route::get('/admin/xoa-nguoi-dung/{id}',[AdminController::class, 'delete_user'])->name('delete_user');

