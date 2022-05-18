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
Route::get('/demo_mail',[HomeController::class, 'demo_mail'])->name('demo_mail');
Route::get('/download/{result}',[HomeController::class, 'download'])->name('download');
Route::get('/export_pdf/{pre_code}',[HomeController::class, 'export_pdf'])->name('export_pdf');

Route::group(['middleware' => ['auth']], function() {
Route::get('/email/verify', 'VerificationController@show')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify')->middleware(['signed']);
Route::post('/email/resend', 'VerificationController@resend')->name('verification.resend');
});

//User
Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/trang-chu',[HomeController::class, 'index'])->name('home');
Route::get('/lich-hen',[HomeController::class, 'appointment_booked'])->name('appointment_booked');
Route::get('/thong-tin',[HomeController::class, 'info'])->name('info');
Route::get('/tai-khoan',[HomeController::class, 'profile'])->name('profile');
Route::post('/kt-dat-lich',[HomeController::class, 'book_appointment'])->name('book_appointment');
Route::get('/dat-lich',[HomeController::class, 'appointment'])->name('appointment');
Route::get('/sua-tai-khoan/{id}',[HomeController::class, 'edit_profile'])->name('edit_profile');
Route::post('/kt-sua-tai-khoan/{id}',[HomeController::class, 'check_edit_profile'])->name('check_edit_profile');
Route::get('/lich-bac-si',[HomeController::class, 'show_schedule_by_doctor_id'])->name('show_schedule_by_doctor_id');
Route::get('/dat-lich-datepicker',[HomeController::class, 'appointment_datepicker'])->name('appointment_datepicker');
Route::get('/lich-su-kham',[HomeController::class, 'case_histories'])->name('case_histories');
Route::get('/chi-tiet-don-thuoc/{pre_code_medicine_prescription}',[HomeController::class, 'detail_pres_by_pres_code'])->name('detail_pres_by_pres_code');
//Admin
Route::get('/admin/tong-quan',[AdminController::class, 'index'])->name('admin');
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
Route::get('/admin/xoa-don-thuoc/{pre_code_medicine_prescription}',[AdminController::class, 'delete_pres'])->name('delete_pres');
Route::get('/admin/sua-don-thuoc/{pre_code_medicine_prescription}',[AdminController::class, 'edit_pres'])->name('edit_pres');
Route::post('/admin/kt-sua-don-thuoc/{pre_code_medicine_prescription}',[AdminController::class, 'check_edit_pres'])->name('check_edit_pres');
Route::get('/admin/nhap-ket-qua-kham/{schedule_id}',[AdminController::class, 'add_check_result'])->name('add_check_result_admin');
Route::post('/admin/kt-nhap-ket-qua-kham/{schedule_id}',[AdminController::class, 'check_add_check_result'])->name('check_add_check_result_admin');
Route::get('/admin/xem-don-thuoc/{schedule_id}',[AdminController::class, 'detail_pres'])->name('detail_pres_admin');
Route::get('/admin/chi-tiet-don-thuoc/{pre_code_medicine_prescription}',[AdminController::class, 'detail_pres_by_pres_code'])->name('detail_pres_by_pres_code_admin');
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
//Admin - Manage Appointment
Route::get('/admin/them-lich-hen',[AdminController::class, 'add_appointment'])->name('add_appointment');
Route::post('/admin/kt-them-lich-hen',[AdminController::class, 'check_add_appointment'])->name('check_add_appointment');
Route::get('/admin/danh-sach-lich-hen',[AdminController::class, 'show_list_appointment'])->name('show_list_appointment');
Route::get('/admin/chi-tiet-lich-hen/{schedule_id}',[AdminController::class, 'detail_appointment'])->name('detail_appointment');
Route::get('/admin/sua-lich-hen/{schedule_id}',[AdminController::class, 'edit_appointment'])->name('edit_appointment');
Route::post('/admin/kt-sua-lich-hen/{schedule_id}',[AdminController::class, 'check_edit_appointment'])->name('check_edit_appointment');
Route::get('/admin/xoa-lich-hen/{schedule_id}',[AdminController::class, 'delete_appointment'])->name('delete_appointment');
Route::post('/admin/trang-thai-lich-hen/{schedule_id}',[AdminController::class, 'status_appointment'])->name('status_appointment');
Route::get('/admin/lich-chua-kham',[AdminController::class, 'waiting_appointment'])->name('waiting_appointment');
Route::get('/admin/lich-da-kham',[AdminController::class, 'checked_appointment'])->name('checked_appointment');
//Admin - Require Testing
Route::get('/admin/yeu-cau-xet-nghiem/{schedule_id}',[AdminController::class, 'require_testing'])->name('require_testing_admin');
Route::post('/admin/kt-yeu-cau-xet-nghiem/{schedule_id}',[AdminController::class, 'check_require_testing'])->name('check_require_testing_admin');
Route::get('/admin/yeu-cau-xet-nghiem-don-thuoc/{schedule_id}',[AdminController::class, 'require_testing_pres'])->name('require_testing_pres_admin');
Route::post('/admin/kt-yeu-cau-xet-nghiem-don-thuoc/{schedule_id}',[AdminController::class, 'check_require_testing_pres'])->name('check_require_testing_pres_admin');
Route::get('/admin/yeu-cau-xet-nghiem',[AdminController::class, 'test_result'])->name('test_result_admin');
Route::get('/admin/nhap-ket-qua-xet-nghiem/{id_test}',[AdminController::class, 'add_test_result'])->name('add_test_result_test_admin');
Route::post('/admin/kt-nhap-ket-qua-xet-nghiem/{id_test}',[AdminController::class, 'check_add_test_result'])->name('check_add_test_result_test_admin');
//Doctor
Route::get('/bac-si',[Doctorcontroller::class, 'index'])->name('doctor');
//Doctor - Manage Appointment
Route::get('/bac-si/danh-sach-lich-hen',[Doctorcontroller::class, 'show_list_appointment'])->name('show_list_appointment_doctor');
Route::get('/bac-si/danh-sach-lich-da-kham',[Doctorcontroller::class, 'show_list_checked_appointment'])->name('show_list_checked_appointment_doctor');
//Doctor - Manage Schedule
Route::get('/bac-si/dang-ky-lich-lam',[Doctorcontroller::class, 'add_schedule'])->name('add_schedule_doctor');
Route::post('/bac-si/kt-dang-ky-lich-lam',[Doctorcontroller::class, 'check_add_schedule'])->name('check_add_schedule_doctor');
Route::get('/bac-si/xem-lich-lam',[Doctorcontroller::class, 'show_list_schedule'])->name('show_list_schedule_doctor');
//Doctor - Manage Prescription
Route::get('/bac-si/them-don-thuoc',[Doctorcontroller::class, 'add_pres'])->name('add_pres_doctor');
Route::post('/bac-si/kt-them-don-thuoc',[Doctorcontroller::class, 'check_add_pres'])->name('check_add_pres_doctor');
Route::get('/bac-si/danh-sach-don-thuoc',[Doctorcontroller::class, 'show_list_pres'])->name('show_list_pres_doctor');
Route::get('/bac-si/xoa-don-thuoc/{pre_code_medicine_prescription}',[Doctorcontroller::class, 'delete_pres'])->name('delete_pres_doctor');
Route::get('/bac-si/sua-don-thuoc/{pre_code_medicine_prescription}',[Doctorcontroller::class, 'edit_pres'])->name('edit_pres_doctor');
Route::post('/bac-si/kt-sua-don-thuoc/{pre_code_medicine_prescription}',[Doctorcontroller::class, 'check_edit_pres'])->name('check_edit_pres_doctor');
Route::get('/bac-si/nhap-ket-qua-kham/{schedule_id}',[Doctorcontroller::class, 'add_check_result'])->name('add_check_result_doctor');
Route::post('/bac-si/kt-nhap-ket-qua-kham/{schedule_id}',[Doctorcontroller::class, 'check_add_check_result'])->name('check_add_check_result_doctor');
Route::get('/bac-si/xem-don-thuoc/{schedule_id}',[Doctorcontroller::class, 'detail_pres'])->name('detail_pres_doctor');
Route::get('/bac-si/chi-tiet-don-thuoc/{pre_code_medicine_prescription}',[Doctorcontroller::class, 'detail_pres_by_pres_code'])->name('detail_pres_by_pres_code_doctor');
//Doctor - Require Testing
Route::get('/bac-si/yeu-cau-xet-nghiem/{schedule_id}',[Doctorcontroller::class, 'require_testing'])->name('require_testing_doctor');
Route::post('/bac-si/kt-yeu-cau-xet-nghiem/{schedule_id}',[Doctorcontroller::class, 'check_require_testing'])->name('check_require_testing_doctor');
Route::get('/bac-si/ket-qua-xet-nghiem',[Doctorcontroller::class, 'test_result'])->name('test_result_doctor');
Route::get('/bac-si/yeu-cau-xet-nghiem-don-thuoc/{schedule_id}',[Doctorcontroller::class, 'require_testing_pres'])->name('require_testing_pres_doctor');
Route::post('/bac-si/kt-yeu-cau-xet-nghiem-don-thuoc/{schedule_id}',[Doctorcontroller::class, 'check_require_testing_pres'])->name('check_require_testing_pres_doctor');

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
//Receptionist - Manage Appointment
Route::get('/nhan-vien-y-te/them-lich-hen',[Receptionistcontroller::class, 'add_appointment'])->name('add_appointment_receptionist');
Route::post('/nhan-vien-y-te/kt-them-lich-hen',[Receptionistcontroller::class, 'check_add_appointment'])->name('check_add_appointment_receptionist');
Route::get('/nhan-vien-y-te/danh-sach-lich-hen',[Receptionistcontroller::class, 'show_list_appointment'])->name('show_list_appointment_receptionist');
Route::get('/nhan-vien-y-te/chi-tiet-lich-hen/{schedule_id}',[Receptionistcontroller::class, 'detail_appointment'])->name('detail_appointment_receptionist');
Route::get('/nhan-vien-y-te/sua-lich-hen/{schedule_id}',[Receptionistcontroller::class, 'edit_appointment'])->name('edit_appointment_receptionist');
Route::post('/nhan-vien-y-te/kt-sua-lich-hen/{schedule_id}',[Receptionistcontroller::class, 'check_edit_appointment'])->name('check_edit_appointment_receptionist');
Route::get('/nhan-vien-y-te/xoa-lich-hen/{schedule_id}',[Receptionistcontroller::class, 'delete_appointment'])->name('delete_appointment_receptionist');
Route::post('/nhan-vien-y-te/trang-thai-lich-hen/{schedule_id}',[Receptionistcontroller::class, 'status_appointment'])->name('status_appointment_receptionist');
//Receptionist - Manage Patient
Route::get('/nhan-vien-y-te/them-benh-nhan',[Receptionistcontroller::class, 'add_patient'])->name('add_patient');
Route::post('/nhan-vien-y-te/kt-them-benh-nhan',[Receptionistcontroller::class, 'check_add_patient'])->name('check_add_patient');
Route::get('/nhan-vien-y-te/danh-sach-benh-nhan',[Receptionistcontroller::class, 'show_list_patient'])->name('show_list_patient');
Route::get('/nhan-vien-y-te/chi-tiet-benh-nhan/{id}',[Receptionistcontroller::class, 'detail_patient'])->name('detail_patient');
Route::get('/nhan-vien-y-te/sua-benh-nhan/{id}',[Receptionistcontroller::class, 'edit_patient'])->name('edit_patient');
Route::post('/nhan-vien-y-te/kt-sua-benh-nhan/{id}',[Receptionistcontroller::class, 'check_edit_patient'])->name('check_edit_patient');
Route::get('/nhan-vien-y-te/xoa-benh-nhan/{id}',[Receptionistcontroller::class, 'delete_patient'])->name('delete_patient');

//Test Doctor
Route::get('/bac-si-xet-nghiem',[Test_Doctorcontroller::class, 'index'])->name('test_doctor');
//Test Doctor - Manage Test Type
Route::get('/bac-si-xet-nghiem/them-loai-xet-nghiem',[Test_Doctorcontroller::class, 'add_test_type'])->name('add_test_type_test_doctor');
Route::post('/bac-si-xet-nghiem/kt-them-loai-xet-nghiem',[Test_Doctorcontroller::class, 'check_add_test_type'])->name('check_add_test_type_test_doctor');
Route::get('/bac-si-xet-nghiem/danh-sach-loai-xet-nghiem',[Test_Doctorcontroller::class, 'show_list_test_type'])->name('show_list_test_type_test_doctor');
Route::get('/bac-si-xet-nghiem/sua-loai-xet-nghiem/{id_test_type}',[Test_Doctorcontroller::class, 'edit_test_type'])->name('edit_test_type_test_doctor');
Route::post('/bac-si-xet-nghiem/kt-sua-loai-xet-nghiem/{id_test_type}',[Test_Doctorcontroller::class, 'check_edit_test_type'])->name('check_edit_test_type_test_doctor');
Route::get('/bac-si-xet-nghiem/xoa-loai-xet-nghiem/{id_test_type}',[Test_Doctorcontroller::class, 'delete_test_type'])->name('delete_test_type_test_doctor');
Route::get('/bac-si-xet-nghiem/nhap-ket-qua-xet-nghiem/{id_test}',[Test_Doctorcontroller::class, 'add_test_result'])->name('add_test_result_test_doctor');
Route::post('/bac-si-xet-nghiem/kt-nhap-ket-qua-xet-nghiem/{id_test}',[Test_Doctorcontroller::class, 'check_add_test_result'])->name('check_add_test_result_test_doctor');

//Test Doctor - Manage Test
Route::get('/bac-si-xet-nghiem/yeu-cau-xet-nghiem',[Test_Doctorcontroller::class, 'require_testing'])->name('require_testing');