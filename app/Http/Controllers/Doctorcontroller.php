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

class Doctorcontroller extends Controller
{
    public function index()
    {
       return view('doctor.index');
    }
      //Manage Appointment
      public function show_list_appointment()
      {
        $show_list_appointment= DB::table('appointments')->where('status','1')->orderby('schedule_id','desc')->get();
        $manager_show_list_appointment = view('doctor.mn_appointment.list_appointment')->with('show_list_appointment',$show_list_appointment);
        return view('doctor.index')->with('doctor',$manager_show_list_appointment);
        // return view('doctor.mn_appointment.list_appointment');
      }

    //   public function edit_appointment($schedule_id, Request $request)
    //   {
    //     if($request->ajax())
    //     {
    //        $option = $request->get('option');
    //        if(isset($option) && !empty($option))
    //        {
    //             $doctor_schedule = DB::table('time_schedules')->where('user_id', $request->get('option'))->get();
    //             return view('receptionist.mn_appointment.schedule')->with('doctor_schedule',$doctor_schedule);
    //        }
    //     }
  
    //     $info_patient = DB::table('users')->where('type','0')->get();
    //     $info_doctor = DB::table('users')->where('type','4')->get();
    //     $edit_appointment= DB::table('appointments')->where('schedule_id',$schedule_id)->get();
    //     $doctor_schedule = DB::table('time_schedules')->where('user_id','')->get();
    //     $manager_edit_appointment = view('receptionist.mn_appointment.edit_appointment')
    //     ->with('edit_appointment',$edit_appointment)
    //     ->with('info_patient',$info_patient)
    //     ->with('info_doctor',$info_doctor)
    //     ->with('doctor_schedule',$doctor_schedule);
    //     return view('receptionist.index')->with('receptionist.mn_appointment.edit_appointment',$manager_edit_appointment);
    //   return view('receptionist.mn_appointment.edit_appointment');
    //   }
  
    //   public function check_edit_appointment(Request $request, $schedule_id)
    //   {
    //     $data = array();
    //     $data['email'] = $request->email;
    //     $data['patient_id'] = $request->patient_id;
    //     $data['full_name'] = '0';
    //     $data['birth_date'] = $request->birth_date;
    //     $data['gender'] = $request->gender;
    //     $data['phone'] = $request->phone;
    //     $data['doctor_id'] = $request->doctor_id;
    //     $data['appointment_code'] = $request->appointment_code;
    //     $data['department_id'] = '0';
    //     $data['date'] = $request->date;
    //     $data['time'] = $request->time;
    //     $data['symptoms'] = $request->symptoms;
    //     $data['status'] = $request->status;
    //     DB::table('appointments')->where('schedule_id',$schedule_id)->update($data);
    //     Session::put('message','Cập nhật lịch hẹn thành công');
    //     return Redirect::to('/nhan-vien-y-te/danh-sach-lich-hen');
    //   }

      //Manage Appointment

    //Manage_Schedule
    public function add_schedule()
    {
      $doctor_id = Session::get('doctor_id');
      $time_frame = DB::table('time_frame')->orderby('id','desc')->get();
      return view('doctor.mn_schedule.add_schedule')->with('time_frame',$time_frame)->with('doctor_id',$doctor_id);
    }

    public function check_add_schedule(Request $request)
    {
      // $doctor_id = Session::get('doctor_id');
      // $show_list_schedule = DB::table('time_schedules')
      // //  ->join('time_frame','time_frame.frame_name','=','time_schedules.frame_name')
      //  ->join('users','time_schedules.user_id','=','users.id')->where('id',$doctor_id)->orderby('id_time','desc')->get();

      $date = $request->date;
      $frame_name = 'none';
      $duration = '30m';
      $user_id = $request->type;
      $count_date = count($date);
      // $count_frame = count($frame_name);
      for($i = 0; $i < $count_date; $i++)
      {
          // for($u = 0; $u < $count_frame; $u++)
          // {
            $data =
            [
              'date' => $date[$i],
              'user_id' => $user_id,
              'frame_name' => $frame_name,
              'duration' => $duration,
            ];
            DB::table('time_schedules')->insert($data);
          // }
      }
      Session::put('message','Đăng ký lịch làm thành công');
      return Redirect::to('/bac-si/dang-ky-lich-lam');
    }

    public function show_list_schedule()
    {
       $doctor_id = Session::get('doctor_id');
       $show_list_schedule = DB::table('time_schedules')
      //  ->join('time_frame','time_frame.frame_name','=','time_schedules.frame_name')
       ->join('users','time_schedules.user_id','=','users.id')->where('id',$doctor_id)->orderby('id_time')->get();
       $manager_list_schedule = view('doctor.mn_schedule.list_schedule')->with('show_list_schedule',$show_list_schedule);
       return view('doctor.index')->with('doctor.mn_schedule.list_schedule',$manager_list_schedule);
      // return view('doctor.mn_schedule.list_schedule');
    }

    public function edit_schedule($id_time)
    {
      $time_frame = DB::table('time_frame')->orderby('id','desc')->get();
      $edit_schedule = DB::table('time_schedules')
      ->join('users','time_schedules.user_id','=','users.id')
      ->join('time_frame','time_frame.frame_name','=','time_schedules.frame_name')
      ->where('id_time',$id_time)->get();
      $manager_edit_schedule = view('admin.mn_schedule.edit_schedule')->with('edit_schedule',$edit_schedule)->with('time_frame',$time_frame);
      return view('admin.index')->with('admin.mn_schedule.edit_schedule',$manager_edit_schedule);
    }

    public function check_edit_schedule(Request $request, $id_time)
    {
      $data = array();
      $data['date'] = $request->date;
      $data['frame_name'] = $request->frame_name;
      DB::table('time_schedules')->where('id_time',$id_time)->update($data);
      Session::put('message','Sửa lịch làm thành công');
      return Redirect::back();
    }

    public function delete_schedule($id_time)
    {
      DB::table('time_schedules')->where('id_time',$id_time)->delete();
      Session::put('message','Xóa lịch làm thành công');
      return Redirect::back();
    }
    //Manage_Schedule

    //Manage Prescription
    public function add_pres()
    {
      $doctor_id = Session::get('doctor_id');
      $doctor = DB::table('users')->where('id',$doctor_id)->get();
      $patient = DB::table('users')->where('type','0')->orderby('id','desc')->get();
      $medicine = DB::table('medicines')->orderby('id','desc')->get();
      return view('doctor.mn_prescription.add_pres')->with('doctor',$doctor)->with('patient',$patient)->with('medicine',$medicine);
    }

    public function check_add_pres(Request $request)
    {
      $medicine_id = $request->medicine_id;
      $doctor_id = $request->doctor_id;
      $patient_id = $request->patient_id;
      $symptoms = $request->symptoms;
      $diagnosis = $request->diagnosis;
      $advice = $request->advice;
      $date = $request->date;
      $instruction = $request->instruction;
      $count_medicine = count($medicine_id);
      $pre_code = 'PR-'.rand(0,10000);
      for($i = 0; $i < $count_medicine; $i++)
      {
        $data = [
          'medicine_id' => $medicine_id[$i],
          'doctor_id' => $doctor_id,
          'patient_id' => $patient_id,
          'symptoms' => $symptoms,
          'diagnosis' => $diagnosis,
          'advice' => $advice,
          'date' => $date,
          'pre_instruction' => $instruction[$i],
          'pre_code' => $pre_code
        ];
        DB::table('prescriptions')->insert($data);
      }
      Session::put('message','Thêm đơn thuốc thành công');
      return Redirect::to('/bac-si/them-don-thuoc');
    }

    public function show_list_pres()
    {
      $doctor_id = Session::get('doctor_id');
      $show_list_pres = DB::table('prescriptions')
      ->join('medicines','medicines.id','=','prescriptions.medicine_id')
      ->join('users','users.id','=','prescriptions.doctor_id')->where('users.id',$doctor_id)->orderBy('id_pres')->get();
      $manager_list_pres = view('doctor.mn_prescription.list_pres')->with('show_list_pres',$show_list_pres);
      return view('doctor.index')->with('doctor.mn_prescription.list_pres',$manager_list_pres);
      // return view('doctor.mn_prescription.list_pres');
    }

    public function delete_pres($id_pres)
    {
      DB::table('prescriptions')->where('id_pres',$id_pres)->delete();
      Session::put('message','Xóa đơn thuốc thành công');
      return Redirect::back();
    }

    public function edit_pres($id_pres)
    {
      $doctor_id = Session::get('doctor_id');
      $doctor = DB::table('users')->where('id',$doctor_id)->orderby('id','desc')->get();
      $patient = DB::table('users')->where('type','0')->orderby('id','desc')->get();
      $medicine = DB::table('medicines')->orderby('id','desc')->get();
      $edit_pres = DB::table('prescriptions')
      ->join('medicines','medicines.id','=','prescriptions.medicine_id')
      ->join('users','users.id','=','prescriptions.patient_id')
      ->where('id_pres',$id_pres)->get();
      $manager_edit_pres = view('doctor.mn_prescription.edit_pres')->with('edit_pres',$edit_pres)->with('doctor',$doctor)->with('patient',$patient)->with('medicine',$medicine);
      return view('doctor.index')->with('doctor.mn_prescription.edit_pres',$manager_edit_pres);
    }

    public function check_edit_pres(Request $request, $id_pres)
    {
      $data = array();
      $data['medicine_id'] = $request->medicine_id;
      $data['doctor_id'] = $request->doctor_id;
      $data['patient_id'] = $request->patient_id;
      $data['symptoms'] = $request->symptoms;
      $data['diagnosis'] = $request->diagnosis;
      $data['advice'] = $request->advice;
      $data['date'] = $request->date;
      $data['pre_instruction'] = $request->instruction;
      DB::table('prescriptions')->where('id_pres',$id_pres)->update($data);
      Session::put('message','Sửa đơn thuốc thành công');
      return Redirect::back();
    }
    //Manage Prescription
}
