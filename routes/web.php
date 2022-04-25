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
Route::get('/tai-khoan',[HomeController::class, 'profile'])->name('profile');
Route::post('/kt-dat-lich',[HomeController::class, 'book_appointment'])->name('book_appointment');

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
Route::post('/admin/kt-them-don-thuoc',[AdminController::class, 'check_add_pres'])->name('check_add_pres');
Route::get('/admin/danh-sach-don-thuoc',[AdminController::class, 'show_list_pres'])->name('show_list_pres');
Route::get('/admin/xoa-don-thuoc/{id_pres}',[AdminController::class, 'delete_pres'])->name('delete_pres');
Route::get('/admin/sua-don-thuoc/{id_pres}',[AdminController::class, 'edit_pres'])->name('edit_pres');
Route::post('/admin/kt-sua-don-thuoc/{id_pres}',[AdminController::class, 'check_edit_pres'])->name('check_edit_pres');
//Admin - Manage Time_Frame
Route::get('/admin/them-khung-gio',[AdminController::class, 'add_time_frame'])->name('add_time_frame');
Route::post('/admin/kt-them-khung-gio',[AdminController::class, 'check_add_time_frame'])->name('check_add_time_frame');
Route::get('/admin/danh-sach-khung-gio',[AdminController::class, 'show_list_time_frame'])->name('show_list_time_frame');
Route::get('/admin/sua-khung-gio/{id}',[AdminController::class, 'edit_time_frame'])->name('edit_time_frame');
Route::post('/admin/kt-sua-khung-gio/{id}',[AdminController::class, 'check_edit_time_frame'])->name('check_edit_time_frame');
Route::get('/admin/xoa-khung-gio/{id}',[AdminController::class, 'delete_time_frame'])->name('delete_time_frame');
//Admin - Manage Patient
Route::get('/admin/them-benh-nhan',[AdminController::class, 'add_patient'])->name('add_patient');
Route::post('/admin/kt-them-benh-nhan',[AdminController::class, 'check_add_patient'])->name('check_add_patient');
Route::get('/admin/danh-sach-benh-nhan',[AdminController::class, 'show_list_patient'])->name('show_list_patient');
Route::get('/admin/chi-tiet-benh-nhan/{id}',[AdminController::class, 'detail_patient'])->name('detail_patient');
Route::get('/admin/sua-benh-nhan/{id}',[AdminController::class, 'edit_patient'])->name('edit_patient');
Route::post('/admin/kt-sua-benh-nhan/{id}',[AdminController::class, 'check_edit_patient'])->name('check_edit_patient');
Route::get('/admin/xoa-benh-nhan/{id}',[AdminController::class, 'delete_patient'])->name('delete_patient');
//Admin - Manage Test Type
Route::get('/admin/them-loai-xet-nghiem',[AdminController::class, 'add_test_type'])->name('add_test_type');
Route::post('/admin/kt-them-loai-xet-nghiem',[AdminController::class, 'check_add_test_type'])->name('check_add_test_type');
Route::get('/admin/danh-sach-loai-xet-nghiem',[AdminController::class, 'show_list_test_type'])->name('show_list_test_type');
Route::get('/admin/sua-loai-xet-nghiem/{id_test_type}',[AdminController::class, 'edit_test_type'])->name('edit_test_type');
Route::post('/admin/kt-sua-loai-xet-nghiem/{id_test_type}',[AdminController::class, 'check_edit_test_type'])->name('check_edit_test_type');
Route::get('/admin/xoa-loai-xet-nghiem/{id_test_type}',[AdminController::class, 'delete_test_type'])->name('delete_test_type');

//Doctor
Route::get('/bac-si',[Doctorcontroller::class, 'index'])->name('doctor');

//Phamarcist
Route::get('/duoc-si',[Phamarcistcontroller::class, 'index'])->name('phamarcist');
//Phamarcist - Manage Medicine
Route::get('/duoc-si/them-thuoc',[Phamarcistcontroller::class, 'add_medicine'])->name('add_medicine_phamarcist');
Route::post('/duoc-si/kt-them-thuoc',[Phamarcistcontroller::class, 'check_add_medicine'])->name('check_add_medicine_phamarcist');
Route::get('/duoc-si/danh-sach-thuoc',[Phamarcistcontroller::class, 'show_list_medicine'])->name('show_list_medicine_phamarcist');
Route::get('/duoc-si/sua-thuoc/{id}',[Phamarcistcontroller::class, 'edit_medicine'])->name('edit_medicine_phamarcist');
Route::post('/duoc-si/kt-sua-thuoc/{id}',[Phamarcistcontroller::class, 'check_edit_medicine'])->name('check_edit_medicine_phamarcist');
Route::get('/duoc-si/xoa-thuoc/{id}',[Phamarcistcontroller::class, 'delete_medicine'])->name('delete_medicine_phamarcist');

//Receptionist
Route::get('/nhan-vien-y-te',[Receptionistcontroller::class, 'index'])->name('receptionist');

//Test_Doctor
Route::get('/nhan-vien-xet-nghiem',[Test_Doctorcontroller::class, 'index'])->name('test_doctor');