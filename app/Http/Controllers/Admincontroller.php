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

}
