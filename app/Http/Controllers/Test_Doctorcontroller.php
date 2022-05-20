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

class Test_Doctorcontroller extends Controller
{
    public function AuthLogin()
    {
        $test_doctor_id = Session::get('test_doctor_id');
        if($test_doctor_id)
        {
            return Redirect::to('/bac-si-xet-nghiem');
        }
        else
        {
            return Redirect::to('/dang-nhap')->send();
        }
    }

    public function index()
    {
      $this->AuthLogin();
      return view('test_doctor.index');
    }

    //Manage Test type
    public function add_test_type()
    {
      $this->AuthLogin();
      return view('test_doctor.mn_test_type.add_test_type');
    }

    public function check_add_test_type(request $request)
    {
      $this->AuthLogin();
      $data = array();
      $data['name_type'] = $request->name_type;
      DB::table('test_type')->insert($data);
      Session::put('message','Thêm loại xét nghiệm thành công');
      return Redirect::to('/bac-si-xet-nghiem/them-loai-xet-nghiem');;
    }

    public function show_list_test_type()
    {
      $this->AuthLogin();
      $show_list_test_type= DB::table('test_type')->orderby('id_test_type','desc')->get();
      $manager_list_test_type = view('test_doctor.mn_test_type.list_test_type')->with('show_list_test_type',$show_list_test_type);
      return view('test_doctor.index')->with('test_doctor.mn_test_type.list_test_type',$manager_list_test_type);
    }

    public function edit_test_type($id_test_type)
    {
      $this->AuthLogin();
      $edit_test_type= DB::table('test_type')->where('id_test_type',$id_test_type)->get();
      $manager_edit_test_type = view('test_doctor.mn_test_type.edit_test_type')->with('edit_test_type',$edit_test_type);
      return view('test_doctor.index')->with('test_doctor.mn_test_type.edit_test_type',$manager_edit_test_type);
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

    //Manage Test
    public function require_testing(Request $request)
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
              return view('test_doctor.mn_test.filter_require_testing')->with('show_require_testing',$show_require_testing);
           }
        }
        $search = $request->timkiem;
        if(isset($search))
        {
          $show_require_testing = DB::table('test')
          ->join('users','test.id_patient','=','users.id')
          ->join('appointments','appointments.schedule_id','=','test.id_appointment')
          ->join('test_type','test_type.id_test_type','=','test.id_test_type')
          ->where('first_name','like','%'.$search.'%')
          ->orWhere('last_name','like','%'.$search.'%')
          ->orWhere('appointment_code','like','%'.$search.'%')
          ->get();
          $manager_show_require_testing = view('test_doctor.mn_test.require_testing')
          ->with('show_require_testing',$show_require_testing)
          ->with('show_all_test_type',$show_all_test_type);
          return view('test_doctor.index')->with('test_doctor.mn_test.require_testing',$manager_show_require_testing);
        }
        $show_require_testing = DB::table('test')
        ->join('users','test.id_patient','=','users.id')
        ->join('appointments','appointments.schedule_id','=','test.id_appointment')
        ->join('test_type','test_type.id_test_type','=','test.id_test_type')->get();
        $manager_show_require_testing = view('test_doctor.mn_test.require_testing')
        ->with('show_require_testing',$show_require_testing)
        ->with('show_all_test_type',$show_all_test_type);
        return view('test_doctor.index')->with('test_doctor.mn_test.require_testing',$manager_show_require_testing);
    }

    public function add_test_result($id_test, Request $request)
    {
      $this->AuthLogin();
      $show_require_testing = DB::table('test')
      ->join('users','test.id_patient','=','users.id')
      ->join('appointments','appointments.schedule_id','=','test.id_appointment')
      ->join('test_type','test_type.id_test_type','=','test.id_test_type')->where('id_test',$id_test)->get();
      $manager_show_require_testing = view('test_doctor.mn_test.add_test_result')->with('show_require_testing',$show_require_testing);
      return view('test_doctor.index')->with('test_doctor.mn_test.add_test_result',$manager_show_require_testing);
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
      return Redirect::to('/bac-si-xet-nghiem/yeu-cau-xet-nghiem');
    }
    //Manage Test
}
