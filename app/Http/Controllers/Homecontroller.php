<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class Homecontroller extends Controller
{
    public function index()
    {
        return view('user.include.content');
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
                return Redirect::to('/trang-chu');
            }
            else if($type == '1')
            {
                return Redirect::to('/admin');
            }      
            else if($type == '2')
            {
                return Redirect::to('/nhan-vien-y-te');
            }   
            else if($type == '3')
            {
                return Redirect::to('/nhan-vien-xet-nghiem');
            }   
            else if($type == '4')
            {
                return Redirect::to('/bac-si');
            }   
            else if($type == '5')
            {
                return Redirect::to('/duoc-si');
            }     
        }
        else
        {
            Session::put('message','Tên đăng nhập hoặc mật khẩu không đúng');
            return Redirect::to('/dang-nhap');
        }
    }

    public function register()
    {
        return view('register');
    }

    public function check_register(Request $request)
    {
        $data = array();
        $data['email'] = $request->email;
        $data['password'] = $request->password;
    	$data['first_name'] = $request->first_name;
    	$data['last_name'] = $request->last_name;
        $data['address'] = $request->address;
        $data['picture'] = '0';
        $data['birth_date'] = $request->birth_date;
        $data['gender'] = '0';
        $data['phone'] = '0';
        $data['emergency'] = '0';
        $data['type'] = '0';
        $data['specialist'] = '0';
        $data['blood_group'] = '0';

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
}
