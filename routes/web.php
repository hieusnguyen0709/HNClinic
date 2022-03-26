<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Doctorcontroller;
use App\Http\Controllers\Phamarcistcontroller;
use App\Http\Controllers\Receptionistcontroller;
use App\Http\Controllers\Test_Doctorcontroller;
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
//Admin - Manage Users
Route::get('/admin/them-nguoi-dung',[AdminController::class, 'add_user'])->name('add_user');
Route::post('/admin/kt-them-nguoi-dung',[AdminController::class, 'check_add_user'])->name('check_add_user');
Route::get('/admin/danh-sach-nguoi-dung',[AdminController::class, 'show_list_user'])->name('show_list_user');
Route::get('/admin/chi-tiet-nguoi-dung/{id}',[AdminController::class, 'detail_user'])->name('detail_user');
Route::get('/admin/sua-nguoi-dung/{id}',[AdminController::class, 'edit_user'])->name('edit_user');
Route::post('/admin/kt-sua-nguoi-dung/{id}',[AdminController::class, 'check_edit_user'])->name('check_edit_user');
Route::get('/admin/xoa-nguoi-dung/{id}',[AdminController::class, 'delete_user'])->name('delete_user');
//Admin - Manage Schedule
Route::get('/admin/them-lich-lam',[AdminController::class, 'add_schedule'])->name('add_schedule');
Route::post('/admin/kt-them-lich-lam',[AdminController::class, 'check_add_schedule'])->name('check_add_schedule');
Route::get('/admin/danh-sach-lich-lam',[AdminController::class, 'show_list_schedule'])->name('show_list_schedule');
Route::get('/admin/sua-lich-lam/{id_time}',[AdminController::class, 'edit_schedule'])->name('edit_schedule');
Route::post('/admin/kt-sua-lich-lam/{id_time}',[AdminController::class, 'check_edit_schedule'])->name('check_edit_schedule');
Route::get('/admin/xoa-lich-lam/{id_time}',[AdminController::class, 'delete_schedule'])->name('delete_schedule');
//Admin - Manage Medicine
Route::get('/admin/them-thuoc',[AdminController::class, 'add_medicine'])->name('add_medicine');
Route::post('/admin/kt-them-thuoc',[AdminController::class, 'check_add_medicine'])->name('check_add_medicine');
Route::get('/admin/danh-sach-thuoc',[AdminController::class, 'show_list_medicine'])->name('show_list_medicine');
Route::get('/admin/sua-thuoc/{id}',[AdminController::class, 'edit_medicine'])->name('edit_medicine');
Route::post('/admin/kt-sua-thuoc/{id}',[AdminController::class, 'check_edit_medicine'])->name('check_edit_medicine');
Route::get('/admin/xoa-thuoc/{id}',[AdminController::class, 'delete_medicine'])->name('delete_medicine');
//Admin - Manage Prescription
Route::get('/admin/them-don-thuoc',[AdminController::class, 'add_pres'])->name('add_pres');

//Doctor
Route::get('/bac-si',[Doctorcontroller::class, 'index'])->name('doctor');

//Phamarcist
Route::get('/duoc-si',[Phamarcistcontroller::class, 'index'])->name('phamarcist');

//Receptionist
Route::get('/nhan-vien-y-te',[Receptionistcontroller::class, 'index'])->name('receptionist');

//Test_Doctor
Route::get('/nhan-vien-xet-nghiem',[Test_Doctorcontroller::class, 'index'])->name('test_doctor');