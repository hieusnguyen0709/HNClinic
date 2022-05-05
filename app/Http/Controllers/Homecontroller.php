<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Mail;
session_start();

class Homecontroller extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
           $option = $request->get('option');
           if(isset($option) && !empty($option))
           {
                $doctor_schedule = DB::table('time_schedules')->where('user_id', $request->get('option'))->get();
                return view('user.schedule')->with('doctor_schedule',$doctor_schedule);
           }
        }
        else
        {
            $doctor_schedule = DB::table('time_schedules')->where('user_id','')->get();
            $id = Session::get('id');
            $info_user_appointment = DB::table('users')->where('id',$id)->get();
            $info_doctor_appointment = DB::table('users')->where('type','4')->get();
            $info_schedule_doctor = DB::table('users')
            ->join('time_schedules','time_schedules.user_id','=','users.id')
            ->where('type','4')->get();
            $manage_info_appointment = view('user.include.content')
            ->with('info_user_appointment',$info_user_appointment)
            ->with('info_doctor_appointment',$info_doctor_appointment)
            ->with('info_schedule_doctor',$info_schedule_doctor)
            ->with('doctor_schedule',$doctor_schedule);
            return view('user.index')->with('user.include.content',$manage_info_appointment);
        }

    }

    public function info()
    {
        return view('user.info');
    }

    public function login()
    {
        return view('login');
    }

    public function check_login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $result = DB::table('users')->where('email',$email)->where('password',$password)->first();
        if($result)
        {
            $type = $result->type;
            if($type == '0')
            {
                Session::put('email',$result->email);
                Session::put('last_name',$result->last_name);
                Session::put('id',$result->id);
                Session::put('password',$result->password);
                return Redirect::to('/trang-chu');
            }
            else if($type == '1')
            {
                return Redirect::to('/admin/tong-quan');
            }      
            else if($type == '2')
            {
                return Redirect::to('/nhan-vien-y-te');
            }   
            else if($type == '3')
            {
                return Redirect::to('/bac-si-xet-nghiem');
            }   
            else if($type == '4')
            {
                Session::put('doctor_email',$result->email);
                Session::put('doctor_last_name',$result->last_name);
                Session::put('doctor_id',$result->id);
                Session::put('doctor_password',$result->password);
                return Redirect::to('/bac-si');
            }   
            else if($type == '5')
            {
                return Redirect::to('/duoc-si');
            }     
        }
        else
        {
            // Session::put('message','Tên đăng nhập hoặc mật khẩu không đúng');
            return Redirect::to('/dang-nhap');
        }
    }

    public function register()
    {
        return view('register');
    }

    public function check_register(Request $request)
    {
        DB::table('users')->where('email',$request->email)->get();
        $data = array();
        $data['email'] = $request->email;
        $data['password'] = $request->password;
    	$data['first_name'] = $request->first_name;
    	$data['last_name'] = $request->last_name;
        $data['address'] = $request->address;
        $data['picture'] = 'Chưa cập nhật';
        $data['birth_date'] = $request->birth_date;
        $data['gender'] = 'Chưa cập nhật';
        $data['phone'] = $request->phone;
        $data['emergency'] = 'Chưa cập nhật';
        $data['type'] = '0';
        $data['specialist'] = '0';
        $data['blood_group'] = 'Chưa cập nhật';

    	DB::table('users')->insert($data);
    	Session::put('message','Đăng ký tài khoản thành công');
    	return Redirect::to('/dang-ky');
    }

    public function logout()
    {
        Session::put('email',null);
        Session::put('id',null);
        Session::put('last_name',null);
        return Redirect::to('/dang-nhap');
    }

    public function profile()
    {
        $id = Session::get('id');
        $profile = DB::table('users')->where('id',$id)->get();
        return view('user.profile')->with('profile',$profile);
        // return view('user.index')->with('user.profile',$manager_profile);
    }

    public function book_appointment(Request $request)
    {
        $appointment_code = 'AP-'.rand(0,10000);
        $data = array();
        $data['email'] = $request->email;
        $data['patient_id'] = $request->patient_id;
        $data['full_name'] = $request->full_name;
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
        $data['QR_id'] = '0';
        DB::table('appointments')->insert($data);

        //Send mail//
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
            "name" =>"Chúng tôi là HNClinic",
            "body"=>"Thông tin lịch khám của bạn : Tên : ".$full_name." Số điện thoại : ".$phone."Ngày : ".$date."Thời gian : ".$time.""
        );

        Mail::send('user.send_mail',$data,function($message) use ($to_name,$to_email)
        {
            $message->to($to_email)->subject('Bạn đã đặt lịch khám tại HNClinic');
            $message->from($to_email,$to_name);
        });

    	Session::put('message','Đặt lịch khám thành công');
    	return Redirect::to('/trang-chu');
    }

    public function appointment_datepicker()
    {
        return view('user.book_appointment_datepicker');
    }

    public function edit_profile($id)
    {
        $edit_profile = DB::table('users')->where('id',$id)->get();
        $manager_edit_profile = view('user.edit_profile')->with('edit_profile',$edit_profile);
        return view('user.index')->with('user.index.edit_profile',$manager_edit_profile);
        // return view('user.edit_profile');
    }

    public function check_edit_profile(Request $request,$id)
    {
      $email = Session::get('email');
      $password = '';
      $data = array();
      $data['email'] = $email;
      $data['password'] = $password;
      $data['first_name'] = $request->first_name;
      $data['last_name'] = $request->last_name;
      $data['address'] = $request->address;
      $data['birth_date'] = $request->birth_date;
      $data['gender'] = $request->gender;
      $data['phone'] = $request->phone;
      $data['emergency'] = $request->emergency;
      $data['type'] = '0';
      $data['specialist'] = $request->specialist;
      $data['blood_group'] = $request->blood_group;

      $get_image = $request->file('image');
      if($get_image)
      {
         $get_name_image = $get_image->getClientOriginalName();
         $name_image = current(explode('.',$get_name_image));
         $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
         $get_image->move('upload_images',$new_image);
         $data['picture'] = $new_image;
         DB::table('users')->where('id',$id)->update($data);
         return Redirect::to('/tai-khoan');
      }
      DB::table('users')->where('id',$id)->update($data);
      return Redirect::to('/tai-khoan');
    }

    public function show_schedule_by_doctor_id(Request $request)
    {
        //  if($request->ajax())
        // {
        //    $option = $request->get('option');
        //    if(isset($option) && !empty($option))
        //    {
        //         echo $option;
        //         $doctor_schedule = DB::table('time_schedules')->where('user_id',$option)->get();
        //         var_dump($doctor_schedule);
        //         $manage_info_appointment = view('user.include.content')
        //         ->with('doctor_schedule',$doctor_schedule);
        //         return view('user.index')->with('user.include.content',$manage_info_appointment);
        //    }
        // }
        // $doctor_schedule = DB::table('time_schedules')->where('user_id','21')->get();
        // return view('user.schedule')->with('doctor_schedule',$doctor_schedule);
    }

    public function appointment_booked()
    {
        $id = Session::get('id');
        $appointment_booked = DB::table('appointments')->where('patient_id',$id)->get();
        return view('user.appointment_booked')->with('appointment_booked',$appointment_booked);
    }
}
