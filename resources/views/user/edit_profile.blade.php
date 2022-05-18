@extends('user.index')
@section('user_content')
		<section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        <h1>Thông tin cá nhân</h1>
        <div class="row block-9">
          <div class="col-md-6 pr-md-5">
          <?php
                         $message = Session::get('message');
                         if($message)
                         {
                             echo '<center><span class="text-success">'.$message.'</span></center></br>';
                             Session::put('message',null);
                         }
          ?>
            @foreach($edit_profile as $key => $pro)
            <form action="{{URL::to('kt-sua-tai-khoan/'.$pro->id)}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Ảnh đại diện</label>
                <div class="col-sm-9">
                <img src="<?php echo url('/'); ?>/upload_images/{{ $pro->picture }}" name="" width="50px" height="50"></br>
                Cập nhật ảnh đại diện : <input type="file" class="form-control" name="image"/>
                </div>
            </div>
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Họ</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="first_name" value="{{$pro->first_name}}" />
                </div>
            </div>
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Tên</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="last_name" value="{{$pro->last_name}}" />
                </div>
            </div>
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Địa chỉ</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="address" value="{{$pro->address}}" />
                </div>
            </div>
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Ngày sinh</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="birth_date" value="{{$pro->birth_date}}" />
                </div>
            </div>
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Giới tính</label>
                <div class="col-sm-9">
                <select class="form-control" name="gender">
                            <?php
                                if($pro->gender == 0)
                                {
                            ?>
                            <option value="1">Nữ</option>
                            <option selected value="0">Nam</option>
                            <?php
                                }
                                elseif($pro->gender == 1)
                                {
                            ?>
                            <option selected value="1">Nữ</option>
                            <option value="0">Nam</option>
                            <?php  
                                }
                            ?>
                            </select>
                </div>
            </div>
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Số điện thoại</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="phone" value="{{$pro->phone}}" />
                </div>
            </div>
            <div class="form-group row">
                <input type="submit" name="submit" value="Xác nhận" class="btn btn-primary" style="margin-right:20px;">
            </div>
           
            </form>
            @endforeach
          </div>

@endsection