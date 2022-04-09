<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class Phamarcistcontroller extends Controller
{
    public function index()
    {
       return view('phamarcist.index');
    }

    //Manage_medicine
    public function add_medicine()
    {
      return view('phamarcist.mn_medicine.add_medicine');
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
      return Redirect::to('/duoc-si/them-thuoc');
    }

    public function show_list_medicine()
    {
      $show_list_medicine = DB::table('medicines')->orderby('id','asc')->get();
      $manager_list_medicine = view('phamarcist.mn_medicine.list_medicine')->with('show_list_medicine',$show_list_medicine);
      return view('phamarcist.index')->with('phamarcist.mn_medicine.list_medicine',$manager_list_medicine);
    }

    public function edit_medicine($id)
    {
      $edit_medicine = DB::table('medicines')->where('id',$id)->get();
      $manager_edit_medicine = view('phamarcist.mn_medicine.edit_medicine')->with('edit_medicine',$edit_medicine);
      return view('phamarcist.index')->with('phamarcist.mn_medicine.edit_medicine',$manager_edit_medicine);
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
}
