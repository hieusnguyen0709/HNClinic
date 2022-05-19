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

class Admincontroller extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id)
        {
            return Redirect::to('home');
        }
        else
        {
            return Redirect::to('/dang-nhap')->send();
        }
    }
    public function index()
    {
      // $role = User::ROLE_ADMIN;
       $this->AuthLogin();
       return view('admin.home');
    }

   //Manage_User
    public function add_user()
    {
      $this->AuthLogin();
      return view('admin.mn_user.add_user');
    }

    public function check_add_user(Request $request)
    {
      $this->AuthLogin();
      $data = array();
      $data['email'] = $request->email;
      $data['password'] = $request->password;
      $data['first_name'] = $request->first_name;
      $data['last_name'] = $request->last_name;
      $data['address'] = $request->address;
      $data['birth_date'] = $request->birth_date;
      $data['gender'] = $request->gender;
      $data['phone'] = $request->phone;
      $data['emergency'] = '0';
      $data['type'] = $request->type;
      $data['specialist'] = '0';
      $data['blood_group'] = '0';

    	$get_image = $request->file('image');
    	if($get_image)
    	{
    		$get_name_image = $get_image->getClientOriginalName();
    		$name_image = current(explode('.',$get_name_image));
    		$new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
    		$get_image->move('upload_images',$new_image);
    		$data['picture'] = $new_image;
    		DB::table('users')->insert($data);
	    	Session::put('message','Thêm người dùng thành công');
	    	return Redirect::to('/admin/them-nguoi-dung');
    	}
       $data['picture'] = '0';
       DB::table('users')->insert($data);
       Session::put('message','Thêm người dùng thành công');
       return Redirect::to('/admin/them-nguoi-dung');

    }

    public function show_list_user(Request $request)
    {
       $this->AuthLogin();
       if($request->ajax())
       {
          $option = $request->get('option');
          if(isset($option) && !empty($option))
          {
              $show_list_user = DB::table('users')->where('type', $request->get('option'))->get();
              return view('admin.mn_user.filter_list_user')->with('show_list_user',$show_list_user);
          }
       }
       else
       {
        $show_list_user = DB::table('users')->get();
       }
       $manager_list_user = view('admin.mn_user.list_user')->with('show_list_user',$show_list_user);
       return view('admin.index')->with('admin.mn_user.list_user',$manager_list_user);
    }

    public function detail_user($id)
    {
      $this->AuthLogin();
      $detail_user = DB::table('users')->where('id',$id)->get();
      $manager_detail_user = view('admin.mn_user.detail_user')->with('detail_user',$detail_user);
      return view('admin.index')->with('admin.mn_user.detail_user',$manager_detail_user);
    }

    public function edit_user($id)
    {
      $this->AuthLogin();
      $edit_user = DB::table('users')->where('id',$id)->get();
      $manager_edit_user = view('admin.mn_user.edit_user')->with('edit_user',$edit_user);
      return view('admin.index')->with('admin.mn_user.edit_user',$manager_edit_user);
    }

    public function check_edit_user(Request $request, $id)
    {
      $this->AuthLogin();
      $data = array();
      $data['email'] = $request->email;
      $data['password'] = $request->password;
      $data['first_name'] = $request->first_name;
      $data['last_name'] = $request->last_name;
      $data['address'] = $request->address;
      $data['birth_date'] = $request->birth_date;
      $data['gender'] = $request->gender;
      $data['phone'] = $request->phone;
      $data['emergency'] = '0';
      $data['type'] = $request->type;
      $data['specialist'] = '0';
      $data['blood_group'] = '0';

      $get_image = $request->file('image');
      if($get_image)
      {
         $get_name_image = $get_image->getClientOriginalName();
         $name_image = current(explode('.',$get_name_image));
         $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
         $get_image->move('upload_images',$new_image);
         $data['picture'] = $new_image;
         DB::table('users')->where('id',$id)->update($data);
         Session::put('message','Sửa người dùng thành công');
         return Redirect::back();
      }
      DB::table('users')->where('id',$id)->update($data);
      Session::put('message','Sửa người dùng thành công');
      return Redirect::back();
    }

    public function delete_user($id)
    {
      $this->AuthLogin();
      DB::table('users')->where('id',$id)->delete();
      Session::put('message','Xóa Người dùng thành công');
      return Redirect::back();
    }
    //Manage_User

    //Manage_Schedule
    public function add_schedule()
    {
      $this->AuthLogin();
      $time_frame = DB::table('time_frame')->orderby('id','desc')->get();
      $show_list_user = DB::table('users')->where('type','4')->orderby('id','desc')->get();
      return view('admin.mn_schedule.add_schedule')->with('show_list_user',$show_list_user)->with('time_frame',$time_frame);
    }

    public function check_add_schedule(Request $request)
    {
      $this->AuthLogin();
      $query_date = DB::table('time_schedules')
      ->where('user_id',$request->type)
      ->where('date',$request->date)
      ->first();

      if(isset($query_date))
      {
        Session::put('message','Thêm lịch không thành công, lịch bị trùng !');
        return Redirect::back();
      }
      else
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
        Session::put('message','Thêm lịch làm thành công');
        return Redirect::to('/admin/them-lich-lam');
      }
    }

    public function show_list_schedule(Request $request)
    {
      $this->AuthLogin();
      if($request->ajax())
      {
         $option = $request->get('option');
         if(isset($option) && !empty($option))
         {
          $show_list_schedule = DB::table('time_schedules')
          //  ->join('time_frame','time_frame.frame_name','=','time_schedules.frame_name')
           ->join('users','time_schedules.user_id','=','users.id')->where('users.id',$option)->get();
              return view('admin.mn_schedule.filter_list_schedule')->with('show_list_schedule',$show_list_schedule);
         }
      }
       $show_list_doctor = DB::table('users')->where('type','4')->get();
       $show_list_schedule = DB::table('time_schedules')
      //  ->join('time_frame','time_frame.frame_name','=','time_schedules.frame_name')
       ->join('users','time_schedules.user_id','=','users.id')->get();
       $manager_list_schedule = view('admin.mn_schedule.list_schedule')
       ->with('show_list_schedule',$show_list_schedule)
       ->with('show_list_doctor',$show_list_doctor);
       return view('admin.index')->with('admin.mn_schedule.list_schedule',$manager_list_schedule);
    }

    public function edit_schedule($id_time)
    {
      $this->AuthLogin();
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
      $this->AuthLogin();
      $data = array();
      $data['date'] = $request->date;
      $data['frame_name'] = $request->frame_name;
      DB::table('time_schedules')->where('id_time',$id_time)->update($data);
      Session::put('message','Sửa lịch làm thành công');
      return Redirect::back();
    }

    public function delete_schedule($id_time)
    {
      $this->AuthLogin();
      DB::table('time_schedules')->where('id_time',$id_time)->delete();
      Session::put('message','Xóa lịch làm thành công');
      return Redirect::back();
    }
    //Manage_Schedule

    //Manage_medicine
    public function add_medicine()
    {
      $this->AuthLogin();
      return view('admin.mn_medicine.add_medicine');
    }

    public function check_add_medicine(Request $request)
    {
      $this->AuthLogin();
      $data = array();
      $data['name'] = $request->name;
      $data['instruction'] = $request->instruction;
      $data['unit'] = $request->unit;
      $data['quantity'] = $request->quantity;
      $data['category'] = $request->category;
      DB::table('medicines')->insert($data);
      Session::put('message','Thêm thuốc thành công');
      return Redirect::to('/admin/them-thuoc');
    }

    public function show_list_medicine(Request $request)
    {
      $this->AuthLogin();
      if($request->ajax())
      {
         $option = $request->get('option');
         if(isset($option) && !empty($option))
         {
              $show_list_medicine = DB::table('medicines')->where('category',$option)->orderby('id','asc')->get();
              return view('admin.mn_medicine.filter_list_medicine')->with('show_list_medicine',$show_list_medicine);
         }
      }
      $show_list_medicine = DB::table('medicines')->orderby('id','asc')->get();
      $manager_list_medicine = view('admin.mn_medicine.list_medicine')->with('show_list_medicine',$show_list_medicine);
      return view('admin.index')->with('admin.mn_medicine.list_medicine',$manager_list_medicine);
    }

    public function edit_medicine($id)
    {
      $this->AuthLogin();
      $edit_medicine = DB::table('medicines')->where('id',$id)->get();
      $manager_edit_medicine = view('admin.mn_medicine.edit_medicine')->with('edit_medicine',$edit_medicine);
      return view('admin.index')->with('admin.mn_medicine.edit_medicine',$manager_edit_medicine);
    }

    public function check_edit_medicine(Request $request,$id)
    {
      $this->AuthLogin();
      $data = array();
      $data['name'] = $request->name;
      $data['instruction'] = $request->instruction;
      $data['unit'] = $request->unit;
      $data['quantity'] = $request->quantity;
      $data['category'] = $request->category;
      DB::table('medicines')->where('id',$id)->update($data);
      Session::put('message','Sửa thuốc thành công');
      return Redirect::back();
    }

    public function delete_medicine($id)
    {
      $this->AuthLogin();
      DB::table('medicines')->where('id',$id)->delete();
      Session::put('message','Xóa thuốc thành công');
      return Redirect::back();
    }
    //Manage Medicine

    //Manage Prescription
    public function add_pres()
    {
      $this->AuthLogin();
      $doctor = DB::table('users')->where('type','4')->orderby('id','desc')->get();
      $patient = DB::table('users')->where('type','0')->orderby('id','desc')->get();
      $medicine = DB::table('medicines')->orderby('id','desc')->get();
      return view('admin.mn_prescription.add_pres')->with('doctor',$doctor)->with('patient',$patient)->with('medicine',$medicine);
    }

    public function check_add_pres(Request $request)
    {
      $this->AuthLogin();
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
        return Redirect::to('/admin/them-don-thuoc');
      }
    }

    public function show_list_pres()
    {
      $this->AuthLogin();
      $medicine_prescription = DB::table('medicine_prescription')->get();
      return view('admin.mn_prescription.list_pres')->with('medicine_prescription',$medicine_prescription);
    }

    public function delete_pres($pre_code_medicine_prescription)
    {
      $this->AuthLogin();
      DB::table('medicine_prescription')->where('pre_code_medicine_prescription',$pre_code_medicine_prescription)->delete();
      DB::table('prescriptions')->where('pre_code',$pre_code_medicine_prescription)->delete();
      Session::put('message','Xóa đơn thuốc thành công');
      return Redirect::back();
    }

    public function edit_pres($pre_code_medicine_prescription)
    {
      $this->AuthLogin();
      $doctor = DB::table('users')->where('type','4')->orderby('id','desc')->get();
      $patient = DB::table('users')->where('type','0')->orderby('id','desc')->get();
      $medicine = DB::table('medicines')->orderby('id','desc')->get();
      $detail_pres_by_pres_code = DB::table('prescriptions')
      ->join('medicine_prescription','medicine_prescription.pre_code_medicine_prescription','=','prescriptions.pre_code')
      ->where('pre_code_medicine_prescription',$pre_code_medicine_prescription)
      ->limit(1)->get();
      $medicine_instruction =DB::table('prescriptions')
      ->join('medicine_prescription','medicine_prescription.pre_code_medicine_prescription','=','prescriptions.pre_code')
      ->join('medicines','medicines.id','=','prescriptions.medicine_id')
      ->where('pre_code_medicine_prescription',$pre_code_medicine_prescription)
      ->get();
      return view('admin.mn_prescription.edit_pres')
      ->with('detail_pres_by_pres_code',$detail_pres_by_pres_code)
      ->with('medicine_instruction',$medicine_instruction)
      ->with('doctor',$doctor)
      ->with('patient',$patient)
      ->with('medicine',$medicine);
    }

    public function check_edit_pres(Request $request, $pre_code_medicine_prescription)
    {
      $this->AuthLogin();
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
      $pre_code = $request->pre_code;

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
                DB::table('prescriptions')->where('pre_code',$pre_code_medicine_prescription)->update($data);
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
        DB::table('medicine_prescription')->where('pre_code_medicine_prescription',$pre_code_medicine_prescription)->update($m_p);

        Session::put('message','Sửa đơn thuốc thành công');
        return Redirect::to('/admin/danh-sach-don-thuoc');
      }
    }

    public function detail_pres($schedule_id)
    {
      $this->AuthLogin();
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
      return view('admin.mn_prescription.detail_pres')
      ->with('info_patient',$info_patient)
      ->with('detail_pres',$detail_pres)
      ->with('medicine_instruction',$medicine_instruction)
      ->with('detail_test',$detail_test);
    }

    public function detail_pres_by_pres_code($pre_code_medicine_prescription)
    {
      $this->AuthLogin();
      $detail_pres_by_pres_code = DB::table('prescriptions')
      ->join('medicine_prescription','medicine_prescription.pre_code_medicine_prescription','=','prescriptions.pre_code')
      ->where('pre_code_medicine_prescription',$pre_code_medicine_prescription)
      ->limit(1)->get();
      $medicine_instruction =DB::table('prescriptions')
      ->join('medicine_prescription','medicine_prescription.pre_code_medicine_prescription','=','prescriptions.pre_code')
      ->join('medicines','medicines.id','=','prescriptions.medicine_id')
      ->where('pre_code_medicine_prescription',$pre_code_medicine_prescription)
      ->get();
      return view('admin.mn_prescription.detail_pres_by_pres_code')
      ->with('detail_pres_by_pres_code',$detail_pres_by_pres_code)
      ->with('medicine_instruction',$medicine_instruction);
    }
    //Manage Prescription

    //Manage Time_frame
    public function add_time_frame()
    {
      $this->AuthLogin();
      return view('admin.mn_time_frame.add_time_frame');
    }

    public function check_add_time_frame(request $request)
    {
      $this->AuthLogin();
      $data = array();
      $data['frame_name'] = $request->frame_name;
      $data['start_time'] = $request->start_time;
      $data['end_time'] = $request->end_time;
      DB::table('time_frame')->insert($data);
      Session::put('message','Thêm khung giờ thành công');
      return Redirect::to('/admin/them-khung-gio');
    }

    public function show_list_time_frame()
    {
      $this->AuthLogin();
      $show_list_time_frame = DB::table('time_frame')->orderby('id','asc')->get();
      $manager_list_time_frame = view('admin.mn_time_frame.list_time_frame')->with('show_list_time_frame',$show_list_time_frame);
      return view('admin.index')->with('admin.mn_time_frame.list_time_frame',$manager_list_time_frame);
    }

    public function edit_time_frame($id)
    {
      $this->AuthLogin();
      $edit_time_frame = DB::table('time_frame')->where('id',$id)->get();
      $manager_edit_time_frame = view('admin.mn_time_frame.edit_time_frame')->with('edit_time_frame',$edit_time_frame);
      return view('admin.index')->with('admin.mn_time_frame.edit_time_frame',$manager_edit_time_frame);
    }

    public function check_edit_time_frame($id, request $request)
    {
      $this->AuthLogin();
      $data = array();
      $data['frame_name'] = $request->frame_name;
      $data['start_time'] = $request->start_time;
      $data['end_time'] = $request->end_time;
      DB::table('time_frame')->where('id',$id)->update($data);
      Session::put('message','Sửa khung giờ thành công');
      return Redirect::back();
    }

    public function delete_time_frame($id)
    {
      $this->AuthLogin();
      DB::table('time_frame')->where('id',$id)->delete();
      Session::put('message','Xóa khung giờ thành công');
      return Redirect::back();
    }
    //Manage Time_frame

    //Manage Patient
    public function add_patient()
    {
      $this->AuthLogin();
      return view('admin.mn_patient.add_patient');
    }

    public function check_add_patient(request $request)
    {
      $this->AuthLogin();
      $data = array();
      $data['email'] = $request->email;
      $data['password'] = $request->password;
      $data['first_name'] = $request->first_name;
      $data['last_name'] = $request->last_name;
      $data['address'] = $request->address;
      $data['birth_date'] = $request->birth_date;
      $data['gender'] = $request->gender;
      $data['phone'] = $request->phone;
      $data['emergency'] = '0';
      $data['type'] = '0';
      $data['specialist'] = '0';
      $data['blood_group'] = '0';

    	$get_image = $request->file('image');
    	if($get_image)
    	{
    		$get_name_image = $get_image->getClientOriginalName();
    		$name_image = current(explode('.',$get_name_image));
    		$new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
    		$get_image->move('upload_images',$new_image);
    		$data['picture'] = $new_image;
    		DB::table('users')->insert($data);
	    	Session::put('message','Thêm bệnh nhân thành công');
	    	return Redirect::to('/admin/them-benh-nhan');
    	}
      $data['picture'] = '0';
      DB::table('users')->insert($data);
      Session::put('message','Thêm bệnh nhân thành công');
      return Redirect::to('/admin/them-benh-nhan');;
    }

    public function show_list_patient()
    {
      $this->AuthLogin();
      $show_list_patient= DB::table('users')->where('type','0')->get();
      $manager_list_patient = view('admin.mn_patient.list_patient')->with('show_list_patient',$show_list_patient);
      return view('admin.index')->with('admin.mn_patient.list_patient',$manager_list_patient);
    }

    public function detail_patient($id)
    {
      $this->AuthLogin();
      $detail_patient = DB::table('users')->where('id',$id)->get();
      $manager_detail_patient = view('admin.mn_patient.detail_patient')->with('detail_patient',$detail_patient);
      return view('admin.index')->with('admin.mn_patient.detail_patient',$manager_detail_patient);
    }

    public function edit_patient($id)
    {
      $this->AuthLogin();
      $edit_patient= DB::table('users')->where('id',$id)->get();
      $manager_edit_patient = view('admin.mn_patient.edit_patient')->with('edit_patient',$edit_patient);
      return view('admin.index')->with('admin.mn_patient.edit_patient',$manager_edit_patient);
    }

    public function check_edit_patient($id, request $request)
    {
      $this->AuthLogin();
      $data = array();
      $data['email'] = $request->email;
      $data['password'] = $request->password;
      $data['first_name'] = $request->first_name;
      $data['last_name'] = $request->last_name;
      $data['address'] = $request->address;
      $data['birth_date'] = $request->birth_date;
      $data['gender'] = $request->gender;
      $data['phone'] = $request->phone;
      $data['emergency'] = '0';
      $data['type'] = '0';
      $data['specialist'] = '0';
      $data['blood_group'] = '0';

      $get_image = $request->file('image');
      if($get_image)
      {
         $get_name_image = $get_image->getClientOriginalName();
         $name_image = current(explode('.',$get_name_image));
         $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
         $get_image->move('upload_images',$new_image);
         $data['picture'] = $new_image;
         DB::table('users')->where('id',$id)->update($data);
         Session::put('message','Sửa bệnh nhân thành công');
         return Redirect::back();
      }
      DB::table('users')->where('id',$id)->update($data);
      Session::put('message','Sửa bệnh nhân thành công');
      return Redirect::back();
    }

    public function delete_patient($id)
    {
      $this->AuthLogin();
      DB::table('users')->where('id',$id)->delete();
      Session::put('message','Xóa bệnh nhân thành công');
      return Redirect::back();
    }
    //Manage Patient

    //Manage Test type
    public function add_test_type()
    {
      $this->AuthLogin();
      return view('admin.mn_test_type.add_test_type');
    }

    public function check_add_test_type(request $request)
    {
      $this->AuthLogin();
      $data = array();
      $data['name_type'] = $request->name_type;
      DB::table('test_type')->insert($data);
      Session::put('message','Thêm loại xét nghiệm thành công');
      return Redirect::to('/admin/them-loai-xet-nghiem');;
    }

    public function show_list_test_type()
    {
      $this->AuthLogin();
      $show_list_test_type= DB::table('test_type')->orderby('id_test_type','desc')->get();
      $manager_list_test_type = view('admin.mn_test_type.list_test_type')->with('show_list_test_type',$show_list_test_type);
      return view('admin.index')->with('admin.mn_test_type.list_test_type',$manager_list_test_type);
    }

    public function edit_test_type($id_test_type)
    {
      $this->AuthLogin();
      $edit_test_type= DB::table('test_type')->where('id_test_type',$id_test_type)->get();
      $manager_edit_test_type = view('admin.mn_test_type.edit_test_type')->with('edit_test_type',$edit_test_type);
      return view('admin.index')->with('admin.mn_test_type.edit_test_type',$manager_edit_test_type);
    }

    public function check_edit_test_type($id_test_type, request $request)
    {
      $this->AuthLogin();
      $data = array();
      $data['name_type'] = $request->name_type;
      DB::table('test_type')->where('id_test_type',$id_test_type)->update($data);
      Session::put('message','Sửa loại xét nghiệm thành công');
      return Redirect::back();
    }

    public function delete_test_type($id_test_type)
    {
      $this->AuthLogin();
      DB::table('test_type')->where('id_test_type',$id_test_type)->delete();
      Session::put('message','Xóa loại xét nghiệm thành công');
      return Redirect::back();
    }
    //Manage Test type

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
              return view('admin.mn_appointment.schedule')->with('doctor_schedule',$doctor_schedule);
         }
      }

      $info_patient = DB::table('users')->where('type','0')->get();
      $info_doctor = DB::table('users')->where('type','4')->get();
      $doctor_schedule = DB::table('time_schedules')->where('user_id','')->get();
      return view('admin.mn_appointment.add_appointment')->with('info_patient',$info_patient)->with('info_doctor',$info_doctor)->with('doctor_schedule',$doctor_schedule);
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

        $data['full_name'] =  $patient_name;

        //Get doctor's name
        $doctor_id = $request->doctor_id;
        $query_doctor = DB::table('users')->where('id',$doctor_id)->get('last_name');
        $json_encode = json_decode($query_doctor,true);
        $doctor_name = $json_encode['0']['last_name'];
  
        //QR Generate
        $qr_name =  $appointment_code;
        $qr_content = 'Mã cuộc hẹn: '.$appointment_code.', Bệnh nhân: '.$patient_name.', Bác sĩ: '.$doctor_name.', Số điện thoại: '. $data['phone'].', Ngày khám: '. $data['date'].', Thời gian: '.$data['time'];
        $qr_generate = QrCode::format('png')->encoding('UTF-8')->size(300)->generate($qr_content,public_path('store_QR/'.$qr_name.'.png'));
        $qr_image = $qr_name.'.png';
  
        $data['qr_image'] = $qr_image;
        DB::table('appointments')->insert($data);
        Session::put('message','Thêm lịch hẹn thành công');
        return Redirect::to('/admin/them-lich-hen');
      }

    }

    public function show_list_appointment()
    {
      $this->AuthLogin();
      $show_list_appointment= DB::table('appointments')->orderby('schedule_id','desc')->get();
      $manager_show_list_appointment = view('admin.mn_appointment.list_appointment')->with('show_list_appointment',$show_list_appointment);
      return view('admin.index')->with('admin.mn_appointment.list_appointment',$manager_show_list_appointment);
    }

    public function detail_appointment($schedule_id)
    {
      $this->AuthLogin();
      $detail_appointment= DB::table('appointments')->where('schedule_id',$schedule_id)->get();
      return view('admin.mn_appointment.detail_appointment')->with('detail_appointment',$detail_appointment);
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
              return view('admin.mn_appointment.schedule')->with('doctor_schedule',$doctor_schedule);
         }
      }

      $info_patient = DB::table('users')->where('type','0')->get();
      $info_doctor = DB::table('users')->where('type','4')->get();
      $edit_appointment= DB::table('appointments')->where('schedule_id',$schedule_id)->get();
      $doctor_schedule = DB::table('time_schedules')->where('user_id','')->get();
      $manager_edit_appointment = view('admin.mn_appointment.edit_appointment')
      ->with('edit_appointment',$edit_appointment)
      ->with('info_patient',$info_patient)
      ->with('info_doctor',$info_doctor)
      ->with('doctor_schedule',$doctor_schedule);
      return view('admin.index')->with('admin.mn_appointment.edit_appointment',$manager_edit_appointment);
    }

    public function check_edit_appointment(Request $request, $schedule_id)
    {
      $this->AuthLogin();
      $data = array();
      $data['email'] = $request->email;
      $data['patient_id'] = $request->patient_id;

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

      Mail::send('admin.send_mail',$data,function($message) use ($to_name,$to_email)
      {
          $message->to($to_email)->subject('Đã có thay đổi về lịch tại phòng khám HNClinic');
          $message->from($to_email,$to_name);
      });
      Session::put('message','Cập nhật lịch hẹn thành công');
    	return Redirect::to('/admin/danh-sach-lich-hen');
    }

    public function delete_appointment($schedule_id)
    {
      $this->AuthLogin();
      DB::table('appointments')->where('schedule_id',$schedule_id)->delete();
      Session::put('message','Xóa lịch hẹn thành công');
      return Redirect::back();
    }

    public function waiting_appointment()
    {
      $this->AuthLogin();
      $show_list_appointment= DB::table('appointments')->join('users','users.id','=','appointments.doctor_id')
      ->where('status','1')->orderby('schedule_id','desc')->get();
      $manager_show_list_appointment = view('admin.mn_appointment.waiting_appointment')->with('show_list_appointment',$show_list_appointment);
      return view('admin.index')->with('admin',$manager_show_list_appointment);
    }

    public function checked_appointment()
    {
      $this->AuthLogin();
      $show_list_appointment= DB::table('appointments')->join('users','users.id','=','appointments.doctor_id')
      ->where('status','2')->orderby('schedule_id','desc')->get();
      $manager_show_list_appointment = view('admin.mn_appointment.checked_appointment')->with('show_list_appointment',$show_list_appointment);
      return view('admin.index')->with('admin',$manager_show_list_appointment);
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
    }

    public function add_check_result($schedule_id, Request $request)
    {
      $this->AuthLogin();
      $show_detail_appointment = DB::table('appointments')->where('schedule_id',$schedule_id)->get();
      $medicine = DB::table('medicines')->orderby('id','desc')->get();
      return view('admin.mn_appointment.add_check_result')
      ->with('show_detail_appointment',$show_detail_appointment)
      ->with('medicine',$medicine);
    }

    public function check_add_check_result($schedule_id, Request $request)
    {
      $this->AuthLogin();
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
        return Redirect::to('/admin/lich-da-kham');
      }
    }
    //Manage Appointment

    //Manage Require testing
    public function require_testing($schedule_id)
    {
        $this->AuthLogin();
        $info_appointment= DB::table('appointments')->where('schedule_id',$schedule_id)->get();
        $test_type= DB::table('test_type')->orderby('id_test_type','desc')->get();
        return view('admin.mn_test.require_testing')
        ->with('info_appointment',$info_appointment)
        ->with('test_type',$test_type);
    }
    
        public function check_require_testing($schedule_id,Request $request)
        {
          $this->AuthLogin();
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
          return Redirect::to('/admin/nhap-ket-qua-kham/'.$schedule_id);
        }

        public function require_testing_pres($schedule_id)
        {
          $this->AuthLogin();
            $info_appointment= DB::table('appointments')->where('schedule_id',$schedule_id)->get();
            $test_type= DB::table('test_type')->orderby('id_test_type','desc')->get();
            return view('admin.mn_test.require_testing_pres')
            ->with('info_appointment',$info_appointment)
            ->with('test_type',$test_type);
        }
        
            public function check_require_testing_pres($schedule_id,Request $request)
            {
              $this->AuthLogin();
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
              return Redirect::to('/admin/xem-don-thuoc/'.$schedule_id);
            }
    
        public function test_result(Request $request)
        {
          $this->AuthLogin();
          $show_all_test_type = DB::table('test_type')->get();
          if($request->ajax())
          {
             $option = $request->get('option');
             if(isset($option) && !empty($option))
             {
                $show_require_testing = DB::table('test')
                ->join('users','test.id_patient','=','users.id')
                ->join('appointments','appointments.schedule_id','=','test.id_appointment')
                ->join('test_type','test_type.id_test_type','=','test.id_test_type')
                ->where('test.id_test_type',$option)
                ->get();
                return view('admin.mn_test.filter_list_test_result')->with('show_require_testing',$show_require_testing);
             }
          }
          $show_require_testing = DB::table('test')
          ->join('users','test.id_patient','=','users.id')
          ->join('appointments','appointments.schedule_id','=','test.id_appointment')
          ->join('test_type','test_type.id_test_type','=','test.id_test_type')->get();
          $manager_show_require_testing = view('admin.mn_test.list_test_result')
          ->with('show_require_testing',$show_require_testing)
          ->with('show_all_test_type',$show_all_test_type);
          return view('admin.index')->with('admin.mn_test.list_test_result',$manager_show_require_testing);
        }

    public function add_test_result($id_test, Request $request)
    {
      $this->AuthLogin();
      $show_require_testing = DB::table('test')
      ->join('users','test.id_patient','=','users.id')
      ->join('appointments','appointments.schedule_id','=','test.id_appointment')
      ->join('test_type','test_type.id_test_type','=','test.id_test_type')->where('id_test',$id_test)->get();
      $manager_show_require_testing = view('admin.mn_test.add_test_result')->with('show_require_testing',$show_require_testing);
      return view('admin.index')->with('admin.mn_test.add_test_result',$manager_show_require_testing);
    }

    public function check_add_test_result($id_test, Request $request)
    {
      $this->AuthLogin();
      $data = array();
      $get_file_result = $request->file('result');
    	if($get_file_result)
    	{
    		$get_name_file_result = $get_file_result->getClientOriginalName();
    		$name_result = current(explode('.',$get_name_file_result));
    		$new_result = $name_result.'.'.$get_file_result->getClientOriginalExtension();
    		$get_file_result->move('upload_file_test_result',$new_result);
        echo $new_result;
    		$data['result'] = $new_result;
    	}
      $data['id_appointment'] = $request->id_appointment;
      $data['id_patient'] = $request->id_patient;
      $data['id_doctor'] = $request->id_doctor;
      $data['id_test_type'] = $request->id_test_type;
      $data['note'] = $request->note;
      $data['test_status'] = '1';
      DB::table('test')->where('id_test',$id_test)->update($data);
      Session::put('message','Nhập kết quả xét nghiệm thành công');
      return Redirect::to('/admin/yeu-cau-xet-nghiem');
    }
}
