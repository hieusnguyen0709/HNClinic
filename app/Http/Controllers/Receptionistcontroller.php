<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Time_frame;
use App\Models\Prescriptions;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class Receptionistcontroller extends Controller
{
    public function index()
    {
       return view('receptionist.index');
    }
    //Manage Appointment
    public function add_appointment(Request $request)
    {
      if($request->ajax())
      {
         $option = $request->get('option');
         if(isset($option) && !empty($option))
         {
              $doctor_schedule = DB::table('time_schedules')->where('user_id', $request->get('option'))->get();
              return view('receptionist.mn_appointment.schedule')->with('doctor_schedule',$doctor_schedule);
         }
      }

      $info_patient = DB::table('users')->where('type','0')->get();
      $info_doctor = DB::table('users')->where('type','4')->get();
      $doctor_schedule = DB::table('time_schedules')->where('user_id','')->get();
      return view('receptionist.mn_appointment.add_appointment')->with('info_patient',$info_patient)->with('info_doctor',$info_doctor)->with('doctor_schedule',$doctor_schedule);
    }

    public function check_add_appointment(Request $request)
    {
      $appointment_code = 'AP-'.rand(0,10000);
      $data = array();
      $data['email'] = $request->email;
      $data['patient_id'] = $request->patient_id;
      $data['full_name'] = '0';
      $data['birth_date'] = $request->birth_date;
      $data['gender'] = $request->gender;
      $data['phone'] = $request->phone;
      $data['doctor_id'] = $request->doctor_id;
      $data['appointment_code'] = $appointment_code;
      $data['department_id'] = '0';
      $data['date'] = $request->date;
      $data['time'] = $request->time;
      $data['symptoms'] = $request->symptoms;
      $data['status'] = '0';
      DB::table('appointments')->insert($data);
      Session::put('message','Thêm lịch hẹn thành công');
      return Redirect::to('/nhan-vien-y-te/them-lich-hen');
    }

    public function show_list_appointment()
    {
      $show_list_appointment= DB::table('appointments')->orderby('schedule_id','desc')->get();
      $manager_show_list_appointment = view('receptionist.mn_appointment.list_appointment')->with('show_list_appointment',$show_list_appointment);
      return view('receptionist.index')->with('receptionist.mn_appointment.list_appointment',$manager_show_list_appointment);
    }

    public function edit_appointment($schedule_id, Request $request)
    {
      if($request->ajax())
      {
         $option = $request->get('option');
         if(isset($option) && !empty($option))
         {
              $doctor_schedule = DB::table('time_schedules')->where('user_id', $request->get('option'))->get();
              return view('receptionist.mn_appointment.schedule')->with('doctor_schedule',$doctor_schedule);
         }
      }

      $info_patient = DB::table('users')->where('type','0')->get();
      $info_doctor = DB::table('users')->where('type','4')->get();
      $edit_appointment= DB::table('appointments')->where('schedule_id',$schedule_id)->get();
      $doctor_schedule = DB::table('time_schedules')->where('user_id','')->get();
      $manager_edit_appointment = view('receptionist.mn_appointment.edit_appointment')
      ->with('edit_appointment',$edit_appointment)
      ->with('info_patient',$info_patient)
      ->with('info_doctor',$info_doctor)
      ->with('doctor_schedule',$doctor_schedule);
      return view('receptionist.index')->with('receptionist.mn_appointment.edit_appointment',$manager_edit_appointment);
    return view('receptionist.mn_appointment.edit_appointment');
    }

    public function check_edit_appointment(Request $request, $schedule_id)
    {
      $data = array();
      $data['email'] = $request->email;
      $data['patient_id'] = $request->patient_id;
      $data['full_name'] = '0';
      $data['birth_date'] = $request->birth_date;
      $data['gender'] = $request->gender;
      $data['phone'] = $request->phone;
      $data['doctor_id'] = $request->doctor_id;
      $data['appointment_code'] = $request->appointment_code;
      $data['department_id'] = '0';
      $data['date'] = $request->date;
      $data['time'] = $request->time;
      $data['symptoms'] = $request->symptoms;
      $data['status'] = $request->status;
      DB::table('appointments')->where('schedule_id',$schedule_id)->update($data);
      Session::put('message','Cập nhật lịch hẹn thành công');
      return Redirect::to('/nhan-vien-y-te/danh-sach-lich-hen');
    }

    public function delete_appointment($schedule_id)
    {
      DB::table('appointments')->where('schedule_id',$schedule_id)->delete();
      Session::put('message','Xóa lịch hẹn thành công');
      return Redirect::back();
    }

    public function status_appointment($schedule_id, Request $request)
    {
      if($request->ajax())
      {
         $status = $request->get('status');
         if(isset($status) && !empty($status))
         {
              $data = array();
              $data['status'] = $status;
              Session::put('message','Cập nhật trạng thái thành công');
              return Redirect::to('/admin/danh-sach-lich-hen');
         }
      }
      return Redirect::to('/admin/danh-sach-lich-hen');
      // $data = array();
      // $data['status'] = $status;
      // DB::table('appointments')->where('schedule_id',$schedule_id)->update($data);
      // Session::put('message','Cập nhật trạng thái thành công');
      // return Redirect::to('/admin/danh-sach-lich-hen');
    }
    //Manage Appointment
}
