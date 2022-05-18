<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Mail;
use QrCode;
use PDF;
session_start();

class Homecontroller extends Controller
{
    public function AuthLogin()
    {
        $user_id = Session::get('id');
        if($user_id)
        {
            return Redirect::to('/trang-chu');
        }
        else
        {
            return Redirect::to('/dang-nhap')->send();
        }
    }

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
                Session::put('message','Đăng nhập thành công ! ');
                return Redirect::to('/trang-chu');
            }
            else if($type == '1')
            {
                Session::put('admin_email',$result->email);
                Session::put('admin_last_name',$result->last_name);
                Session::put('admin_id',$result->id);
                return Redirect::to('/admin/tong-quan');
            }
            else if($type == '2')
            {
                Session::put('receptionist_email',$result->email);
                Session::put('receptionist_last_name',$result->last_name);
                Session::put('receptionist_id',$result->id);
                return Redirect::to('/nhan-vien-y-te');
            }
            else if($type == '3')
            {
                Session::put('test_doctor_email',$result->email);
                Session::put('test_doctor_last_name',$result->last_name);
                Session::put('test_doctor_id',$result->id);
                return Redirect::to('/bac-si-xet-nghiem');
            }
            else if($type == '4')
            {
                Session::put('doctor_email',$result->email);
                Session::put('doctor_last_name',$result->last_name);
                Session::put('doctor_id',$result->id);
                return Redirect::to('/bac-si');
            }
            else if($type == '5')
            {
                Session::put('phamarcist_email',$result->email);
                Session::put('phamarcist_last_name',$result->last_name);
                Session::put('phamarcist_id',$result->id);
                return Redirect::to('/duoc-si');
            }
        }
        else
        {
            Session::put('message','Tên đăng nhập hoặc mật khẩu không đúng ! ');
            return Redirect::to('/dang-nhap');
        }
    }

    public function register()
    {
        return view('register');
    }

    public function check_register(Request $request)
    {
        $query_email = DB::table('users')->where('email',$request->email)->first();
        if(isset($query_email))
        {
            Session::put('check_email_message','Tên đăng nhập bị trùng, vui lòng chọn tên khác !');
            return Redirect::to('/dang-ky');
        }
        else
        {
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

    }

    public function logout()
    {
        //User
        Session::put('email',null);
        Session::put('id',null);
        Session::put('last_name',null);
        //Admin
        Session::put('admin_email',null);
        Session::put('admin_id',null);
        Session::put('admin_last_name',null);
        //Doctor
        Session::put('doctor_email',null);
        Session::put('doctor_id',null);
        Session::put('doctor_last_name',null);
        //Receptionist
        Session::put('receptionist_email',null);
        Session::put('receptionist_id',null);
        Session::put('receptionist_last_name',null);
        //Test Doctor
        Session::put('test_doctor_email',null);
        Session::put('test_doctor_last_name',null);
        Session::put('test_doctor_id',null);
        //Phamarcist
        Session::put('phamarcist_email',null);
        Session::put('phamarcist_last_name',null);
        Session::put('phamarcist_id',null);
        return Redirect::to('/dang-nhap');
    }

    public function profile()
    {
        $this->AuthLogin();
        $id = Session::get('id');
        $profile = DB::table('users')->where('id',$id)->get();
        return view('user.profile')->with('profile',$profile);
    }

    public function book_appointment(Request $request)
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
            Session::put('message','Đặt lịch không thành công, bạn đã từng đặt lịch này !');
            return Redirect::to('/trang-chu');
        }
        else if(isset($query_appointment_2))
        {
            Session::put('message','Đặt lịch không thành công, lịch bạn chọn đã có người khác đặt !');
            return Redirect::to('/trang-chu');
        }
        else
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

            //Get patient's name
            $patient_id = $request->patient_id;
            $query_patient = DB::table('users')->where('id',$patient_id)->get('last_name');
            $json_encode = json_decode($query_patient,true);
            $patient_name = $json_encode['0']['last_name'];

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
                "patient_name" => $full_name,
                "qr_image" => $qr_image
            );

            Mail::send('user.send_mail',$data,function($message) use ($to_name,$to_email)
            {
                $message->to($to_email)->subject('Bạn đã đặt lịch khám tại HNClinic');
                $message->from($to_email,$to_name);
            });

            Session::put('message','Đặt lịch khám thành công');
            return Redirect::to('/trang-chu');
        }
    }

    public function appointment_datepicker()
    {
        return view('user.book_appointment_datepicker');
    }

    public function demo_mail()
    {
        return view('user.demo_mail');
    }

    public function edit_profile($id)
    {
        $this->AuthLogin();
        $edit_profile = DB::table('users')->where('id',$id)->get();
        $manager_edit_profile = view('user.edit_profile')->with('edit_profile',$edit_profile);
        return view('user.index')->with('user.index.edit_profile',$manager_edit_profile);
    }

    public function check_edit_profile(Request $request,$id)
    {
      $this->AuthLogin();
      $email = Session::get('email');

      $query_patient = DB::table('users')->where('email',$email)->get('password');
      $json_encode = json_decode($query_patient,true);
      $password = $json_encode['0']['password'];

      $data = array();
      $data['email'] = $email;
      $data['password'] = $password;
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
         return Redirect::to('/tai-khoan');
      }
      DB::table('users')->where('id',$id)->update($data);
      return Redirect::to('/tai-khoan');
    }

    public function appointment_booked()
    {
        $this->AuthLogin();
        $id = Session::get('id');
        $appointment_booked = DB::table('appointments')->where('patient_id',$id)->orderby('schedule_id','desc')->get();
        return view('user.appointment_booked')->with('appointment_booked',$appointment_booked);
    }

    public function case_histories()
    {
      $this->AuthLogin();
      $id = Session::get('id');
      $medicine_prescription = DB::table('medicine_prescription')->where('patient_id_medicine_prescription',$id)->get();
      return view('user.case_histories')->with('medicine_prescription',$medicine_prescription);
    }

    public function detail_pres_by_pres_code($pre_code_medicine_prescription)
    {
      $this->AuthLogin();
      $id_patient = Session::get('id');
      $info_patient = DB::table('users')->where('id',$id_patient)->get();
      $detail_pres_by_pres_code = DB::table('prescriptions')
      ->join('medicine_prescription','medicine_prescription.pre_code_medicine_prescription','=','prescriptions.pre_code')
      ->where('pre_code_medicine_prescription',$pre_code_medicine_prescription)
      ->limit(1)->get();
      $medicine_instruction = DB::table('prescriptions')
      ->join('medicine_prescription','medicine_prescription.pre_code_medicine_prescription','=','prescriptions.pre_code')
      ->join('medicines','medicines.id','=','prescriptions.medicine_id')
      ->where('pre_code_medicine_prescription',$pre_code_medicine_prescription)
      ->get();

      $query_appointment_id = DB::table('prescriptions')->where('pre_code',$pre_code_medicine_prescription)->get();
      $json_encode = json_decode($query_appointment_id,true);
      $appointment_id = $json_encode['0']['appointment_id'];

      $detail_test = DB::table('test')
      ->join('test_type','test.id_test_type','=','test_type.id_test_type')
      ->where('id_appointment',$appointment_id)
      ->get();
      return view('user.detail_pres_by_pres_code')
      ->with('detail_pres_by_pres_code',$detail_pres_by_pres_code)
      ->with('medicine_instruction',$medicine_instruction)
      ->with('detail_test',$detail_test)
      ->with('info_patient',$info_patient);
    }

    public function demo_qr()
    {
        QrCode::format('png')->size(200)->generate('Hello Hieu Rose',public_path('store_QR/code.png'));
        return view('demo_qr');
    }

    public function download(Request $request, $result)
    {
        return response()->download(public_path('upload_file_test_result/'.$result));
    }

    public function export_pdf($pre_code)
    {
        $id_patient = Session::get('id');
        $info_patient = DB::table('users')->where('id',$id_patient)->get();

        $detail_pres_by_pres_code = DB::table('prescriptions')
        ->join('medicine_prescription','medicine_prescription.pre_code_medicine_prescription','=','prescriptions.pre_code')
        ->where('pre_code_medicine_prescription',$pre_code)
        ->limit(1)->get();

        $medicine_instruction = DB::table('prescriptions')
        ->join('medicine_prescription','medicine_prescription.pre_code_medicine_prescription','=','prescriptions.pre_code')
        ->join('medicines','medicines.id','=','prescriptions.medicine_id')
        ->where('pre_code_medicine_prescription',$pre_code)
        ->get();

        $query_appointment_id = DB::table('prescriptions')->where('pre_code',$pre_code)->get();
        $json_encode = json_decode($query_appointment_id,true);
        $appointment_id = $json_encode['0']['appointment_id'];

        $detail_test = DB::table('test')
        ->join('test_type','test.id_test_type','=','test_type.id_test_type')
        ->where('id_appointment',$appointment_id)
        ->get();
        $data =
        [
            'info_patient' => $info_patient,
            'detail_pres_by_pres_code' => $detail_pres_by_pres_code,
            'medicine_instruction' => $medicine_instruction,
            'detail_test' => $detail_test
        ];
        $pdf = PDF::loadView('user.export_pdf', $data)->setOptions(['defaultFont' => 'DejaVu Sans']);
        return $pdf->download('DonThuoc_'.$pre_code.'.pdf');
        // return view('user.export_pdf')
        // ->with('detail_pres_by_pres_code',$detail_pres_by_pres_code)
        // ->with('medicine_instruction',$medicine_instruction)
        // ->with('detail_test',$detail_test)
        // ->with('info_patient',$info_patient);
    }

}
