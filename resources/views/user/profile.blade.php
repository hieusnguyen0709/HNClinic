@extends('user.index')
@section('user_content')
<section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        <h1>Thông tin cá nhân</h1><br>
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
            <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="{{$pro->email}}" readonly/>
                </div>
            </div>
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Mật khẩu</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="********" readonly/>
                </div>
            </div>
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Họ</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="first_name" placeholder="{{$pro->first_name}}" readonly/>
                </div>
            </div>
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Tên</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="first_name" placeholder="{{$pro->last_name}}" readonly/>
                </div>
            </div>
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Địa chỉ</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="first_name" placeholder="{{$pro->address}}" readonly/>
                </div>
            </div>
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Ngày sinh</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="first_name" placeholder="{{$pro->birth_date}}" readonly/>
                </div>
            </div>
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Giới tính</label>
                <div class="col-sm-9">
                    @if($pro->gender == 0)
                        <input type="text" class="form-control" name="first_name" placeholder="Nam" readonly/>
                    @else
                        <input type="text" class="form-control" name="first_name" placeholder="Nữ" readonly/>
                    @endif
                </div>
            </div>
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Số điện thoại</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="first_name" placeholder="{{$pro->phone}}" readonly/>
                </div>
            </div>
            <div class="form-group row">
                <a href="{{URL::to('sua-tai-khoan/'.$pro->id)}}" class="btn btn-primary" style="margin-right:20px; width:130px;">Sửa thông tin</a>
                <a href="{{URL::to('lich-hen')}}" class="btn btn-danger" style="margin-right:20px;width:130px;">Lịch hẹn</a>
                <a href="{{URL::to('lich-su-kham')}}" class="btn btn-success" style="margin-right:20px;width:130px;">Lịch sử khám</a>
            </div>
            @endforeach
            </form>
          </div>
        </div>
</section>
@endsection