<?php

namespace App\Http\Controllers;

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
      $show_list_user = DB::table('users')->where('type','4')->orderby('id','desc')->get();
      return view('admin.mn_schedule.add_schedule')->with('show_list_user',$show_list_user);
    }

    public function check_add_schedule(Request $request)
    {
      $data = array();
      $data['date'] = $request->date;
      $data['start_time'] = $request->start_time;
      $data['end_time'] = $request->end_time;
      $data['duration'] = '30m';
      $data['user_id'] = $request->type;
      DB::table('time_schedules')->insert($data);
      Session::put('message','Thêm lịch làm thành công');
      return Redirect::to('/admin/them-lich-lam');
    }

    public function show_list_schedule()
    {
       $show_list_schedule = DB::table('time_schedules')->join('users','time_schedules.user_id','=','users.id')->get();
       $manager_list_schedule = view('admin.mn_schedule.list_schedule')->with('show_list_schedule',$show_list_schedule);
       return view('admin.index')->with('admin.mn_schedule.list_schedule',$manager_list_schedule);
    }

    public function edit_schedule($id_time)
    {
      $edit_schedule = DB::table('time_schedules')->join('users','time_schedules.user_id','=','users.id')->where('id_time',$id_time)->get();
      $manager_edit_schedule = view('admin.mn_schedule.edit_schedule')->with('edit_schedule',$edit_schedule);
      return view('admin.index')->with('admin.mn_schedule.edit_schedule',$manager_edit_schedule);
    }

    public function check_edit_schedule(Request $request, $id_time)
    {
      $data = array();
      $data['date'] = $request->date;
      $data['start_time'] = $request->start_time;
      $data['end_time'] = $request->end_time;
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
      // return view('admin.mn_schedule.add_schedule')->with('show_list_user',$show_list_user);
      return view('admin.mn_prescription.add_pres')->with('doctor',$doctor)->with('patient',$patient)->with('medicine',$medicine);
    }
    //Manage Prescription
}
