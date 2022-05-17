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
use QrCode;
use Mail;
use Illuminate\Support\Facades\Redirect;
session_start();

class Receptionistcontroller extends Controller
{
    public function AuthLogin()
    {
        $receptionist_id = Session::get('receptionist_id');
        if($receptionist_id)
        {
            return Redirect::to('/nhan-vien-y-te');
        }
        else
        {
            return Redirect::to('/dang-nhap')->send();
        }
    }

    public function index()
    {
       $this->AuthLogin();
       return view('receptionist.index');
    }
    //Manage Appointment
    public function add_appointment(Request $request)
    {
      $this->AuthLogin();
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
      $this->AuthLogin();
      $query_appointment = DB::table('appointments')
      ->where('patient_id',$request->patient_id)
      ->where('doctor_id',$request->doctor_id)
      ->where('date',$request->date)
      ->where('time',$request->time)
      ->where('status','0')
      ->first();
      $query_appointment_2 = DB::table('appointments')
      ->where('doctor_id',$request->doctor_id)
      ->where('date',$request->date)
      ->where('time',$request->time)
      ->where('status','1')
      ->first();

      if(isset($query_appointment))
      {
          Session::put('message','Thêm không thành công, bệnh nhân đã đặt lịch này !');
          return Redirect::back();
      }
      else if(isset($query_appointment_2))
      {
          Session::put('message','Thêm không thành công, lịch bạn chọn đã có người đặt !');
          return Redirect::back();
      }
      else
      {
        $appointment_code = 'AP-'.rand(0,10000);
        $data = array();
        $data['email'] = $request->email;
        $data['patient_id'] = $request->patient_id;
        
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
        $data['require_testing'] = '0';
  
        //Get patient's name
        $patient_id = $request->patient_id;
        $query_patient = DB::table('users')->where('id',$patient_id)->get('last_name');
        $json_encode = json_decode($query_patient,true);
        $patient_name = $json_encode['0']['last_name'];
        $data['full_name'] = $patient_name;
        
        //Get doctor's name
        $doctor_id = $request->doctor_id;
        $query_doctor = DB::table('users')->where('id',$doctor_id)->get('last_name');
        $json_encode = json_decode($query_doctor,true);
        $doctor_name = $json_encode['0']['last_name'];
  
        //QR Generate
        $qr_name =  $appointment_code;
        // // $appointment = 'Mã cuộc hẹn: '.$appointment_code."\n";
        // // $patient = ', Bệnh nhân: '.$patient_name."\n";
        // // $qr_content = $appointment.$patient;
        $qr_content = 'Mã cuộc hẹn: '.$appointment_code.', Bệnh nhân: '.$patient_name.', Bác sĩ: '.$doctor_name.', Số điện thoại: '. $data['phone'].', Ngày khám: '. $data['date'].', Thời gian: '.$data['time'];
        $qr_generate = QrCode::format('png')->encoding('UTF-8')->size(300)->generate($qr_content,public_path('store_QR/'.$qr_name.'.png'));
        $qr_image = $qr_name.'.png';
        // dd($qr_content);
  
        $data['qr_image'] = $qr_image;
        DB::table('appointments')->insert($data);
        Session::put('message','Thêm lịch hẹn thành công');
        return Redirect::to('/nhan-vien-y-te/them-lich-hen');
      }
    }

    public function show_list_appointment()
    {
      $this->AuthLogin();
      $show_list_appointment= DB::table('appointments')->orderby('schedule_id','desc')->get();
      $manager_show_list_appointment = view('receptionist.mn_appointment.list_appointment')->with('show_list_appointment',$show_list_appointment);
      return view('receptionist.index')->with('receptionist.mn_appointment.list_appointment',$manager_show_list_appointment);
    }

    public function detail_appointment($schedule_id)
    {
      $this->AuthLogin();
      $detail_appointment= DB::table('appointments')->where('schedule_id',$schedule_id)->get();
      return view('receptionist.mn_appointment.detail_appointment')->with('detail_appointment',$detail_appointment);
    }

    public function edit_appointment($schedule_id, Request $request)
    {
      $this->AuthLogin();
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
      $this->AuthLogin();
      $data = array();
      $data['email'] = $request->email;
      $data['patient_id'] = $request->patient_id;

      //Get patient's name
      $patient_id = $request->patient_id;
      $query_patient = DB::table('users')->where('id',$patient_id)->get('last_name');
      $json_encode = json_decode($query_patient,true);
      $patient_name = $json_encode['0']['last_name'];
      $data['full_name'] = $patient_name;

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

      //Send mail
      $to_name = "Phòng khám HNClinic";
      $to_email = $request->email;
      $full_name = $request->full_name;
      $birth_date = $request->birth_date;
      $gender = $request->gender;
      $phone = $request->phone;
      $date = $request->date;
      $time = $request->time;
      $symptoms = $request->symptoms;

      $data = array
      (
          "patient_name" => $patient_name,
      );

      Mail::send('receptionist.send_mail',$data,function($message) use ($to_name,$to_email)
      {
          $message->to($to_email)->subject('Đã có thay đổi về lịch tại phòng khám HNClinic');
          $message->from($to_email,$to_name);
      });

      Session::put('message','Cập nhật lịch hẹn thành công');
      return Redirect::to('/nhan-vien-y-te/danh-sach-lich-hen');
    }

    public function delete_appointment($schedule_id)
    {
      $this->AuthLogin();
      DB::table('appointments')->where('schedule_id',$schedule_id)->delete();
      Session::put('message','Xóa lịch hẹn thành công');
      return Redirect::back();
    }

    public function status_appointment($schedule_id, Request $request)
    {
      $this->AuthLogin();
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
