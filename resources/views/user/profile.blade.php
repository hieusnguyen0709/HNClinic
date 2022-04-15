@extends('user.index')
@section('user_content')
		<section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        <h1>Thông tin cá nhân</h1>
        <div class="row block-9">
          <div class="col-md-6 pr-md-5">
            <form action="#">
            @foreach($profile as $key => $pro)
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Ảnh đại diện</label>
                <div class="col-sm-9">
                <img src="<?php echo url('/'); ?>/upload_images/{{ $pro->picture }}" width="50px" height="50">
                </div>
            </div>
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Họ</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="first_name" placeholder="{{$pro->first_name}}"/>
                </div>
            </div>
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Tên</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="first_name" placeholder="{{$pro->last_name}}"/>
                </div>
            </div>
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Địa chỉ</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="first_name" placeholder="{{$pro->address}}"/>
                </div>
            </div>
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Ngày sinh</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="first_name" placeholder="{{$pro->birth_date}}"/>
                </div>
            </div>
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Giới tính</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="first_name" placeholder="{{$pro->gender}}"/>
                </div>
            </div>
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Số điện thoại</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="first_name" placeholder="{{$pro->phone}}"/>
                </div>
            </div>
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Tình trạng</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="first_name" placeholder="{{$pro->emergency}}"/>
                </div>
            </div>
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nhóm máu</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="first_name" placeholder="{{$pro->blood_group}}"/>
                </div>
            </div>
            @endforeach
            </form>
          
          </div>
@endsection