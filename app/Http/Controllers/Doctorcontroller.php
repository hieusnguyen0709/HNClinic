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
      $doctor_id = Session::get('doctor_id');
      $show_list_appointment= DB::table('appointments')
      ->join('users','users.id','=','appointments.doctor_id')->where('users.id',$doctor_id)
      ->where('status','1')->orderby('schedule_id','desc')->get();
      $manager_show_list_appointment = view('doctor.mn_appointment.list_appointment')->with('show_list_appointment',$show_list_appointment);
      return view('doctor.index')->with('doctor',$manager_show_list_appointment);
    }

    public function show_list_checked_appointment()
    {
      $doctor_id = Session::get('doctor_id');
      $show_list_appointment= DB::table('appointments')
      ->join('users','users.id','=','appointments.doctor_id')->where('users.id',$doctor_id)
      ->where('status','2')->orderby('schedule_id','desc')->get();
      $manager_show_list_appointment = view('doctor.mn_appointment.list_checked_appointment')->with('show_list_appointment',$show_list_appointment);
      return view('doctor.index')->with('doctor',$manager_show_list_appointment);
    }

    public function add_check_result($schedule_id, Request $request)
    {
      $show_detail_appointment = DB::table('appointments')->where('schedule_id',$schedule_id)->get();
      $medicine = DB::table('medicines')->orderby('id','desc')->get();
      return view('doctor.mn_appointment.add_check_result')
      ->with('show_detail_appointment',$show_detail_appointment)
      ->with('medicine',$medicine);
    }

    public function check_add_check_result($schedule_id, Request $request)
    {
      $recheck = $request->recheck;
      $total_days = $request->total_days;
      $morning = $request->morning;
      $noon = $request->noon;
      $afternoon = $request->afternoon;
      $night = $request->night;
      if(isset($recheck))
      {
        $recheck = $request->recheck;
      }
      else
      {
        $recheck = '0';
      }

      $quantity = $request->quantity;
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
              $query_medicines = DB::table('medicines')->where('id',$medicine_id[$i])->get();
              $json_encode = json_decode($query_medicines,true);
              $quantity_in_stock = $json_encode['0']['quantity'];
              if($quantity_in_stock >= $quantity[$i])
              {
                $update_quantity = $quantity_in_stock - $quantity[$i];
                $quan =
                [
                  'quantity' => $update_quantity
                ];
                DB::table('medicines')->where('id',$medicine_id[$i])->update($quan);
              }
              else
              {
                Session::put('message_quantity','Số lượng thuốc trong kho không đủ');
              }

              $message_quantity = Session::get('message_quantity');
              if(isset($message_quantity))
              {
                return Redirect::back();
              }
              else
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
                  'pre_code' => $pre_code,
                  'appointment_id' => $schedule_id,
                  'pre_quantity' => $quantity[$i],
                  'morning' => $morning[$i],
                  'noon' => $noon[$i],
                  'afternoon' => $afternoon[$i],
                  'night' => $night[$i],
                  'total_days' => $total_days[$i],
                  'recheck' => $recheck
                ];
                DB::table('prescriptions')->insert($data);
              }
        }

      $message_quantity = Session::get('message_quantity');
      if(isset($message_quantity))
      {
        return Redirect::back();
      }
      else
      {
        $m_p = array();
        $m_p['doctor_id_medicine_prescription'] = $request->doctor_id;
        $m_p['patient_id_medicine_prescription'] = $request->patient_id;
        $m_p['date_medicine_prescription'] = $request->date;
        $m_p['pre_code_medicine_prescription'] = $pre_code;
        DB::table('medicine_prescription')->insert($m_p);

        $arr = array();
        $arr['status'] = '2';
        DB::table('appointments')->where('schedule_id',$schedule_id)->update($arr);

        Session::put('message','Thêm đơn thuốc thành công');
        return Redirect::to('/bac-si/danh-sach-lich-da-kham');
      }
    }
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
       $show_doctor = DB::table('time_schedules')
      //  ->join('time_frame','time_frame.frame_name','=','time_schedules.frame_name')
       ->join('users','time_schedules.user_id','=','users.id')->where('id',$doctor_id)->orderby('id_time')->limit(1)->get();
       $show_schedule = DB::table('time_schedules')
        ->join('users','time_schedules.user_id','=','users.id')->where('id',$doctor_id)->orderby('id_time')->get();
       $manager_list_schedule = view('doctor.mn_schedule.list_schedule')->with('show_doctor',$show_doctor)->with('show_schedule',$show_schedule);
       return view('doctor.index')->with('doctor.mn_schedule.list_schedule',$manager_list_schedule);
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
      $doctor = DB::table('users')->where('id',$doctor_id)->orderby('id','desc')->get();
      $patient = DB::table('users')->where('type','0')->orderby('id','desc')->get();
      $medicine = DB::table('medicines')->orderby('id','desc')->get();
      return view('doctor.mn_prescription.add_pres')->with('doctor',$doctor)->with('patient',$patient)->with('medicine',$medicine);
    }

    public function check_add_pres(Request $request)
    {
      $recheck = $request->recheck;
      $total_days = $request->total_days;
      $morning = $request->morning;
      $noon = $request->noon;
      $afternoon = $request->afternoon;
      $night = $request->night;
      if(isset($recheck))
      {
        $recheck = $request->recheck;
      }
      else
      {
        $recheck = '0';
      }

      $quantity = $request->quantity;
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
              $query_medicines = DB::table('medicines')->where('id',$medicine_id[$i])->get();
              $json_encode = json_decode($query_medicines,true);
              $quantity_in_stock = $json_encode['0']['quantity'];
              if($quantity_in_stock >= $quantity[$i])
              {
                $update_quantity = $quantity_in_stock - $quantity[$i];
                $quan =
                [
                  'quantity' => $update_quantity
                ];
                DB::table('medicines')->where('id',$medicine_id[$i])->update($quan);
              }
              else
              {
                Session::put('message_quantity','Số lượng thuốc trong kho không đủ');
              }

              $message_quantity = Session::get('message_quantity');
              if(isset($message_quantity))
              {
                return Redirect::back();
              }
              else
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
                  'pre_code' => $pre_code,
                  'appointment_id' => '0',
                  'pre_quantity' => $quantity[$i],
                  'morning' => $morning[$i],
                  'noon' => $noon[$i],
                  'afternoon' => $afternoon[$i],
                  'night' => $night[$i],
                  'total_days' => $total_days[$i],
                  'recheck' => $recheck
                ];
                DB::table('prescriptions')->insert($data);
              }
        }

      $message_quantity = Session::get('message_quantity');
      if(isset($message_quantity))
      {
        return Redirect::back();
      }
      else
      {
        $m_p = array();
        $m_p['doctor_id_medicine_prescription'] = $request->doctor_id;
        $m_p['patient_id_medicine_prescription'] = $request->patient_id;
        $m_p['date_medicine_prescription'] = $request->date;
        $m_p['pre_code_medicine_prescription'] = $pre_code;
        DB::table('medicine_prescription')->insert($m_p);

        Session::put('message','Thêm đơn thuốc thành công');
        return Redirect::to('/bac-si/them-don-thuoc');
      }
    }

    public function show_list_pres()
    {
      $doctor_id = Session::get('doctor_id');
      $medicine_prescription = DB::table('medicine_prescription')->where('doctor_id_medicine_prescription',$doctor_id)->get();
      return view('doctor.mn_prescription.list_pres')->with('medicine_prescription',$medicine_prescription);
    }

    public function delete_pres($pre_code_medicine_prescription)
    {
      DB::table('medicine_prescription')->where('pre_code_medicine_prescription',$pre_code_medicine_prescription)->delete();
      DB::table('prescriptions')->where('pre_code',$pre_code_medicine_prescription)->delete();
      Session::put('message','Xóa đơn thuốc thành công');
      return Redirect::back();
    }

    public function edit_pres($pre_code_medicine_prescription)
    {
      $doctor = DB::table('users')->where('type','4')->orderby('id','desc')->get();
      $patient = DB::table('users')->where('type','0')->orderby('id','desc')->get();
      $medicine = DB::table('medicines')->orderby('id','desc')->get();
      // $edit_pres = DB::table('prescriptions')
      // ->join('medicines','medicines.id','=','prescriptions.medicine_id')
      // ->join('users','users.id','=','prescriptions.patient_id')
      // ->where('id_pres',$id_pres)->get();
      // $manager_edit_pres = view('admin.mn_prescription.edit_pres')->with('edit_pres',$edit_pres)->with('doctor',$doctor)->with('patient',$patient)->with('medicine',$medicine);
      // return view('admin.index')->with('admin.mn_prescription.edit_pres',$manager_edit_pres);
      $detail_pres_by_pres_code = DB::table('prescriptions')
      ->join('medicine_prescription','medicine_prescription.pre_code_medicine_prescription','=','prescriptions.pre_code')
      ->where('pre_code_medicine_prescription',$pre_code_medicine_prescription)
      ->limit(1)->get();
      $medicine_instruction =DB::table('prescriptions')
      ->join('medicine_prescription','medicine_prescription.pre_code_medicine_prescription','=','prescriptions.pre_code')
      ->join('medicines','medicines.id','=','prescriptions.medicine_id')
      ->where('pre_code_medicine_prescription',$pre_code_medicine_prescription)
      ->get();
      return view('doctor.mn_prescription.edit_pres')
      ->with('detail_pres_by_pres_code',$detail_pres_by_pres_code)
      ->with('medicine_instruction',$medicine_instruction)
      ->with('doctor',$doctor)
      ->with('patient',$patient)
      ->with('medicine',$medicine);
    }

    public function check_edit_pres(Request $request, $pre_code_medicine_prescription)
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
      // dd($medicine_id);
      $pre_code = $request->pre_code;
      $appointment_id = '0';
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
          'pre_code' => $pre_code,
          'appointment_id' => $appointment_id
        ];
        // dd($data);
        DB::table('prescriptions')->where('pre_code',$pre_code_medicine_prescription)->update($data);
      }

      $arr = array();
      $arr['doctor_id_medicine_prescription'] = $request->doctor_id;
      $arr['patient_id_medicine_prescription'] = $request->patient_id;
      $arr['date_medicine_prescription'] = $request->date;
      $arr['pre_code_medicine_prescription'] = $pre_code;
      DB::table('medicine_prescription')->where('pre_code_medicine_prescription',$pre_code_medicine_prescription)->update($arr);

      Session::put('message','Sửa đơn thuốc thành công');
      return Redirect::back();
    }

    public function detail_pres($schedule_id)
    {
      $info_patient = DB::table('users')
      ->join('appointments','appointments.patient_id','=','users.id')
      ->where('schedule_id',$schedule_id)
      ->limit(1)->get();
      $detail_pres = DB::table('prescriptions')->where('appointment_id',$schedule_id)
      ->join('appointments','appointments.schedule_id','=','prescriptions.appointment_id')
      ->limit(1)->get();
      $medicine_instruction = DB::table('prescriptions')
      ->join('medicines','medicines.id','=','prescriptions.medicine_id')
      ->where('appointment_id',$schedule_id)
      ->get();
      $detail_test = DB::table('test')->where('id_appointment',$schedule_id)
      ->join('appointments','appointments.schedule_id','=','test.id_appointment')
      ->join('test_type','test.id_test_type','=','test_type.id_test_type')
      ->get();
      return view('doctor.mn_prescription.detail_pres')
      ->with('info_patient',$info_patient)
      ->with('detail_pres',$detail_pres)
      ->with('medicine_instruction',$medicine_instruction)
      ->with('detail_test',$detail_test);
    }

    public function detail_pres_by_pres_code($pre_code_medicine_prescription)
    {
      $detail_pres_by_pres_code = DB::table('prescriptions')
      ->join('medicine_prescription','medicine_prescription.pre_code_medicine_prescription','=','prescriptions.pre_code')
      ->where('pre_code_medicine_prescription',$pre_code_medicine_prescription)
      ->limit(1)->get();
      $medicine_instruction =DB::table('prescriptions')
      ->join('medicine_prescription','medicine_prescription.pre_code_medicine_prescription','=','prescriptions.pre_code')
      ->join('medicines','medicines.id','=','prescriptions.medicine_id')
      ->where('pre_code_medicine_prescription',$pre_code_medicine_prescription)
      ->get();
      return view('doctor.mn_prescription.detail_pres_by_pres_code')
      ->with('detail_pres_by_pres_code',$detail_pres_by_pres_code)
      ->with('medicine_instruction',$medicine_instruction);
    }

    //Manage Prescription

    //Manage Require testing
    public function require_testing($schedule_id)
    {
        $info_appointment= DB::table('appointments')->where('schedule_id',$schedule_id)->get();
        $test_type= DB::table('test_type')->orderby('id_test_type','desc')->get();
        return view('doctor.mn_test.require_testing')
        ->with('info_appointment',$info_appointment)
        ->with('test_type',$test_type);
    }

    public function check_require_testing($schedule_id,Request $request)
    {
      $id_doctor = Session::get('doctor_id');
      $schedule_id = $request->schedule_id;
      $id_patient = $request->id_patient;
      $id_test_type = $request->id_test_type;
      $note = $request->note;
      $result = '0';
      $test_status = '0';
      $count_test_type = count($id_test_type);

      for($i = 0; $i < $count_test_type; $i++)
      {
        $data =
        [
          'id_test_type' => $id_test_type[$i],
          'id_patient' => $id_patient,
          'id_appointment' => $schedule_id,
          'note' => $note[$i],
          'result' => $result,
          'test_status' => $test_status,
          'id_doctor' => $id_doctor
        ];
        DB::table('test')->insert($data);
      }

      $arr = array();
      $arr['require_testing'] = '1';
      DB::table('appointments')->where('schedule_id',$schedule_id)->update($arr);

      Session::put('message','Yêu cầu xét nghiệm thành công');
      return Redirect::to('/bac-si/nhap-ket-qua-kham/'.$schedule_id);
    }

    public function test_result()
    {
      $id_doctor = Session::get('doctor_id');
      $show_require_testing = DB::table('test')
      ->join('users','test.id_patient','=','users.id')
      ->join('appointments','appointments.schedule_id','=','test.id_appointment')
      ->join('test_type','test_type.id_test_type','=','test.id_test_type')->where('doctor_id',$id_doctor)->get();
      $manager_show_require_testing = view('doctor.mn_test.list_test_result')->with('show_require_testing',$show_require_testing);
      return view('doctor.index')->with('doctor.mn_test.list_test_result',$manager_show_require_testing);
    }

    public function require_testing_pres($schedule_id)
    {
        $info_appointment= DB::table('appointments')->where('schedule_id',$schedule_id)->get();
        $test_type= DB::table('test_type')->orderby('id_test_type','desc')->get();
        return view('doctor.mn_test.require_testing_pres')
        ->with('info_appointment',$info_appointment)
        ->with('test_type',$test_type);
    }
    
        public function check_require_testing_pres($schedule_id,Request $request)
        {
          $id_doctor = $request->id_doctor;
          $schedule_id = $request->schedule_id;
          $id_patient = $request->id_patient;
          $id_test_type = $request->id_test_type;
          $note = $request->note;
          $result = '0';
          $test_status = '0';
          $count_test_type = count($id_test_type);
    
          for($i = 0; $i < $count_test_type; $i++)
          {
            $data =
            [
              'id_test_type' => $id_test_type[$i],
              'id_patient' => $id_patient,
              'id_appointment' => $schedule_id,
              'note' => $note[$i],
              'result' => $result,
              'test_status' => $test_status,
              'id_doctor' => $id_doctor
            ];
            DB::table('test')->insert($data);
          }
    
          $arr = array();
          $arr['require_testing'] = '1';
          DB::table('appointments')->where('schedule_id',$schedule_id)->update($arr);
    
          Session::put('message','Yêu cầu xét nghiệm thành công');
          return Redirect::to('/bac-si/xem-don-thuoc/'.$schedule_id);
        }
    //Manage Require testing
}
