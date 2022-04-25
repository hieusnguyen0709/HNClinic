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

class Admincontroller extends Controller
{
    public function index()
    {
      // $role = User::ROLE_ADMIN;
       return view('admin.index');
    }

   //Manage_User
    public function add_user()
    {
       return view('admin.mn_user.add_user');
    }

    public function check_add_user(Request $request)
    {
      $data = array();
      $data['email'] = $request->email;
      $data['password'] = $request->password;
      $data['first_name'] = $request->first_name;
      $data['last_name'] = $request->last_name;
      $data['address'] = $request->address;
      $data['birth_date'] = $request->birth_date;
      $data['gender'] = $request->gender;
      $data['phone'] = $request->phone;
      $data['emergency'] = $request->emergency;
      $data['type'] = $request->type;
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
    		DB::table('users')->insert($data);
	    	Session::put('message','Thêm người dùng thành công');
	    	return Redirect::to('/admin/them-nguoi-dung');
    	}
       $data['picture'] = '0';
       DB::table('users')->insert($data);
       Session::put('message','Thêm người dùng thành công');
       return Redirect::to('/admin/them-nguoi-dung');

    }

    public function show_list_user()
    {
       $show_list_user = DB::table('users')->get();
       $manager_list_user = view('admin.mn_user.list_user')->with('show_list_user',$show_list_user);
       return view('admin.index')->with('admin.mn_user.list_user',$manager_list_user);
    }

    public function detail_user($id)
    {
      $detail_user = DB::table('users')->where('id',$id)->get();
      $manager_detail_user = view('admin.mn_user.detail_user')->with('detail_user',$detail_user);
      return view('admin.index')->with('admin.mn_user.detail_user',$manager_detail_user);
    }

    public function edit_user($id)
    {
      $edit_user = DB::table('users')->where('id',$id)->get();
      $manager_edit_user = view('admin.mn_user.edit_user')->with('edit_user',$edit_user);
      return view('admin.index')->with('admin.mn_user.edit_user',$manager_edit_user);
    }

    public function check_edit_user(Request $request, $id)
    {
      $data = array();
      $data['email'] = $request->email;
      $data['password'] = $request->password;
      $data['first_name'] = $request->first_name;
      $data['last_name'] = $request->last_name;
      $data['address'] = $request->address;
      $data['birth_date'] = $request->birth_date;
      $data['gender'] = $request->gender;
      $data['phone'] = $request->phone;
      $data['emergency'] = $request->emergency;
      $data['type'] = $request->type;
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
         Session::put('message','Sửa người dùng thành công');
         return Redirect::back();
      }
      DB::table('users')->where('id',$id)->update($data);
      Session::put('message','Sửa người dùng thành công');
      return Redirect::back();
    }

    public function delete_user($id)
    {
      DB::table('users')->where('id',$id)->delete();
      Session::put('message','Xóa Người dùng thành công');
      return Redirect::back();
    }
    //Manage_User

    //Manage_Schedule
    public function add_schedule()
    {
      $time_frame = DB::table('time_frame')->orderby('id','desc')->get();
      $show_list_user = DB::table('users')->where('type','4')->orderby('id','desc')->get();
      return view('admin.mn_schedule.add_schedule')->with('show_list_user',$show_list_user)->with('time_frame',$time_frame);
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
      Session::put('message','Thêm lịch làm thành công');
      return Redirect::to('/admin/them-lich-lam');
    }

    public function show_list_schedule()
    {
       $show_list_schedule = DB::table('time_schedules')
      //  ->join('time_frame','time_frame.frame_name','=','time_schedules.frame_name')
       ->join('users','time_schedules.user_id','=','users.id')->get();
       $manager_list_schedule = view('admin.mn_schedule.list_schedule')->with('show_list_schedule',$show_list_schedule);
       return view('admin.index')->with('admin.mn_schedule.list_schedule',$manager_list_schedule);
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

    //Manage_medicine
    public function add_medicine()
    {
      return view('admin.mn_medicine.add_medicine');
    }

    public function check_add_medicine(Request $request)
    {
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

    public function show_list_medicine()
    {
      $show_list_medicine = DB::table('medicines')->orderby('id','asc')->get();
      $manager_list_medicine = view('admin.mn_medicine.list_medicine')->with('show_list_medicine',$show_list_medicine);
      return view('admin.index')->with('admin.mn_medicine.list_medicine',$manager_list_medicine);
    }

    public function edit_medicine($id)
    {
      $edit_medicine = DB::table('medicines')->where('id',$id)->get();
      $manager_edit_medicine = view('admin.mn_medicine.edit_medicine')->with('edit_medicine',$edit_medicine);
      return view('admin.index')->with('admin.mn_medicine.edit_medicine',$manager_edit_medicine);
    }

    public function check_edit_medicine(Request $request,$id)
    {
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
      DB::table('medicines')->where('id',$id)->delete();
      Session::put('message','Xóa thuốc thành công');
      return Redirect::back();
    }
    //Manage Medicine

    //Manage Prescription
    public function add_pres()
    {
      $doctor = DB::table('users')->where('type','4')->orderby('id','desc')->get();
      $patient = DB::table('users')->where('type','0')->orderby('id','desc')->get();
      $medicine = DB::table('medicines')->orderby('id','desc')->get();
      return view('admin.mn_prescription.add_pres')->with('doctor',$doctor)->with('patient',$patient)->with('medicine',$medicine);
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
      return Redirect::to('/admin/them-don-thuoc');
    }

    public function show_list_pres()
    {
      $show_list_pres = DB::table('prescriptions')
      ->join('medicines','medicines.id','=','prescriptions.medicine_id')
      ->join('users','users.id','=','prescriptions.patient_id')->orderBy('id_pres')->get();
      $manager_list_pres = view('admin.mn_prescription.list_pres')->with('show_list_pres',$show_list_pres);
      return view('admin.index')->with('admin.mn_prescription.list_pres',$manager_list_pres);
    }

    public function delete_pres($id_pres)
    {
      DB::table('prescriptions')->where('id_pres',$id_pres)->delete();
      Session::put('message','Xóa đơn thuốc thành công');
      return Redirect::back();
    }

    public function edit_pres($id_pres)
    {
      $doctor = DB::table('users')->where('type','4')->orderby('id','desc')->get();
      $patient = DB::table('users')->where('type','0')->orderby('id','desc')->get();
      $medicine = DB::table('medicines')->orderby('id','desc')->get();
      $edit_pres = DB::table('prescriptions')
      ->join('medicines','medicines.id','=','prescriptions.medicine_id')
      ->join('users','users.id','=','prescriptions.patient_id')
      ->where('id_pres',$id_pres)->get();
      $manager_edit_pres = view('admin.mn_prescription.edit_pres')->with('edit_pres',$edit_pres)->with('doctor',$doctor)->with('patient',$patient)->with('medicine',$medicine);
      return view('admin.index')->with('admin.mn_prescription.edit_pres',$manager_edit_pres);
      // return view('admin.mn_prescription.edit_pres');
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

    //Manage Time_frame
    public function add_time_frame()
    {
      return view('admin.mn_time_frame.add_time_frame');
    }

    public function check_add_time_frame(request $request)
    {
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
      $show_list_time_frame = DB::table('time_frame')->orderby('id','asc')->get();
      $manager_list_time_frame = view('admin.mn_time_frame.list_time_frame')->with('show_list_time_frame',$show_list_time_frame);
      return view('admin.index')->with('admin.mn_time_frame.list_time_frame',$manager_list_time_frame);
    }

    public function edit_time_frame($id)
    {
      $edit_time_frame = DB::table('time_frame')->where('id',$id)->get();
      $manager_edit_time_frame = view('admin.mn_time_frame.edit_time_frame')->with('edit_time_frame',$edit_time_frame);
      return view('admin.index')->with('admin.mn_time_frame.edit_time_frame',$manager_edit_time_frame);
    }

    public function check_edit_time_frame($id, request $request)
    {
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
      DB::table('time_frame')->where('id',$id)->delete();
      Session::put('message','Xóa khung giờ thành công');
      return Redirect::back();
    }
    //Manage Time_frame

    //Manage Patient
    public function add_patient()
    {
      return view('admin.mn_patient.add_patient');
    }

    public function check_add_patient(request $request)
    {
      $data = array();
      $data['email'] = $request->email;
      $data['password'] = $request->password;
      $data['first_name'] = $request->first_name;
      $data['last_name'] = $request->last_name;
      $data['address'] = $request->address;
      $data['birth_date'] = $request->birth_date;
      $data['gender'] = $request->gender;
      $data['phone'] = $request->phone;
      $data['emergency'] = $request->emergency;
      $data['type'] = '0';
      $data['specialist'] = '0';
      $data['blood_group'] = $request->blood_group;

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
      $show_list_patient= DB::table('users')->where('type','0')->get();
      $manager_list_patient = view('admin.mn_patient.list_patient')->with('show_list_patient',$show_list_patient);
      return view('admin.index')->with('admin.mn_patient.list_patient',$manager_list_patient);
    }

    public function detail_patient($id)
    {
      $detail_patient = DB::table('users')->where('id',$id)->get();
      $manager_detail_patient = view('admin.mn_patient.detail_patient')->with('detail_patient',$detail_patient);
      return view('admin.index')->with('admin.mn_patient.detail_patient',$manager_detail_patient);
    }

    public function edit_patient($id)
    {
      $edit_patient= DB::table('users')->where('id',$id)->get();
      $manager_edit_patient = view('admin.mn_patient.edit_patient')->with('edit_patient',$edit_patient);
      return view('admin.index')->with('admin.mn_patient.edit_patient',$manager_edit_patient);
    }

    public function check_edit_patient($id, request $request)
    {
      $data = array();
      $data['email'] = $request->email;
      $data['password'] = $request->password;
      $data['first_name'] = $request->first_name;
      $data['last_name'] = $request->last_name;
      $data['address'] = $request->address;
      $data['birth_date'] = $request->birth_date;
      $data['gender'] = $request->gender;
      $data['phone'] = $request->phone;
      $data['emergency'] = $request->emergency;
      $data['type'] = '0';
      $data['specialist'] = '0';
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
         Session::put('message','Sửa bệnh nhân thành công');
         return Redirect::back();
      }
      DB::table('users')->where('id',$id)->update($data);
      Session::put('message','Sửa bệnh nhân thành công');
      return Redirect::back();
    }

    public function delete_patient($id)
    {
      DB::table('users')->where('id',$id)->delete();
      Session::put('message','Xóa bệnh nhân thành công');
      return Redirect::back();
    }
    //Manage Patient

    //Manage Test type
    public function add_test_type()
    {
      return view('admin.mn_test_type.add_test_type');
    }

    public function check_add_test_type(request $request)
    {
      $data = array();
      $data['name_type'] = $request->name_type;
      DB::table('test_type')->insert($data);
      Session::put('message','Thêm loại xét nghiệm thành công');
      return Redirect::to('/admin/them-loai-xet-nghiem');;
    }

    public function show_list_test_type()
    {
      $show_list_test_type= DB::table('test_type')->get();
      $manager_list_test_type = view('admin.mn_test_type.list_test_type')->with('show_list_test_type',$show_list_test_type);
      return view('admin.index')->with('admin.mn_test_type.list_test_type',$manager_list_test_type);
    }

    public function edit_test_type($id_test_type)
    {
      $edit_test_type= DB::table('test_type')->where('id_test_type',$id_test_type)->get();
      $manager_edit_test_type = view('admin.mn_test_type.edit_test_type')->with('edit_test_type',$edit_test_type);
      return view('admin.index')->with('admin.mn_test_type.edit_test_type',$manager_edit_test_type);
    }

    public function check_edit_test_type($id_test_type, request $request)
    {
      $data = array();
      $data['name_type'] = $request->name_type;
      DB::table('test_type')->where('id_test_type',$id_test_type)->update($data);
      Session::put('message','Sửa loại xét nghiệm thành công');
      return Redirect::back();
    }

    public function delete_test_type($id_test_type)
    {
      DB::table('test_type')->where('id_test_type',$id_test_type)->delete();
      Session::put('message','Xóa loại xét nghiệm thành công');
      return Redirect::back();
    }
    //Manage Test type
}
