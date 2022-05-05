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
    public function index()
    {
        return view('test_doctor.index');
    }

    //Manage Test type
    public function add_test_type()
    {
      return view('test_doctor.mn_test_type.add_test_type');
    }

    public function check_add_test_type(request $request)
    {
      $data = array();
      $data['name_type'] = $request->name_type;
      DB::table('test_type')->insert($data);
      Session::put('message','Thêm loại xét nghiệm thành công');
      return Redirect::to('/bac-si-xet-nghiem/them-loai-xet-nghiem');;
    }

    public function show_list_test_type()
    {
      $show_list_test_type= DB::table('test_type')->orderby('id_test_type','desc')->get();
      $manager_list_test_type = view('test_doctor.mn_test_type.list_test_type')->with('show_list_test_type',$show_list_test_type);
      return view('test_doctor.index')->with('test_doctor.mn_test_type.list_test_type',$manager_list_test_type);
    }

    public function edit_test_type($id_test_type)
    {
      $edit_test_type= DB::table('test_type')->where('id_test_type',$id_test_type)->get();
      $manager_edit_test_type = view('test_doctor.mn_test_type.edit_test_type')->with('edit_test_type',$edit_test_type);
      return view('test_doctor.index')->with('test_doctor.mn_test_type.edit_test_type',$manager_edit_test_type);
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

    //Manage Test
    public function require_testing()
    {
        $show_require_testing = DB::table('test')
        ->join('users','test.id_patient','=','users.id')
        ->join('appointments','appointments.schedule_id','=','test.id_appointment')
        ->join('test_type','test_type.id_test_type','=','test.id_test_type')->get();
        $manager_show_require_testing = view('test_doctor.mn_test.require_testing')->with('show_require_testing',$show_require_testing);
        return view('test_doctor.index')->with('test_doctor.mn_test.require_testing',$manager_show_require_testing);
    }

    public function add_test_result($id_test, Request $request)
    {
      $show_require_testing = DB::table('test')
      ->join('users','test.id_patient','=','users.id')
      ->join('appointments','appointments.schedule_id','=','test.id_appointment')
      ->join('test_type','test_type.id_test_type','=','test.id_test_type')->where('id_test',$id_test)->get();
      $manager_show_require_testing = view('test_doctor.mn_test.add_test_result')->with('show_require_testing',$show_require_testing);
      return view('test_doctor.index')->with('test_doctor.mn_test.add_test_result',$manager_show_require_testing);
    }

    public function check_add_test_result($id_test, Request $request)
    {
      $data = array();
      $data['id_appointment'] = $request->id_appointment;
      $data['id_patient'] = $request->id_patient;
      $data['id_test_type'] = $request->id_test_type;
      $data['note'] = $request->note;
      $data['test_status'] = '1';
      $data['result'] = $request->result;
      DB::table('test')->where('id_test',$id_test)->update($data);
      Session::put('message','Nhập kết quả xét nghiệm thành công');
      return Redirect::to('/bac-si-xet-nghiem/yeu-cau-xet-nghiem');
    }
    //Manage Test
}
