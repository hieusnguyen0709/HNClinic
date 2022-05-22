@extends('receptionist.index')
@section('receptionist_content')
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Chi tiết bệnh nhân</h4>
                  @foreach($detail_patient as $key => $patient)
                  <form class="forms-sample">
                  <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Ảnh đại diện</label>
                      <div class="col-sm-9">
                      <img src="<?php echo url('/'); ?>/upload_images/{{ $patient->picture }}" width="50px" height="50"></br>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Họ đệm</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="first_name" value="{{ $patient->first_name }}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tên</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" name="last_name" value="{{ $patient->last_name }}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Tên đăng nhập</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="email" value="{{ $patient->email }}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Mật khẩu</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="password" value="{{ $patient->password }}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Địa chỉ</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="address" value="{{ $patient->address }}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Ngày sinh</label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control" name="birth_date" value="{{ $patient->birth_date }}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Giới tính</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="gender" value="<?php 
                          if($patient->gender == 0) 
                          {
                            echo 'Nam';
                          }
                          else
                          {
                            echo'Nữ';
                          }
                        ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Chức vụ</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="type" value="<?php 
                          if($patient->type == 0) 
                          {
                            echo 'Bệnh nhân';
                          }
                        ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Số điện thoại</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="phone" value="{{ $patient->phone }}" readonly>
                      </div>
                    </div>
                    <center>
                          <a class="btn btn-success me-2" href="{{URL::to('/nhan-vien-y-te/bn-ket-qua-xet-nghiem/'.$patient->id)}}">Kết quả xét nghiệm</a>
                          <a class="btn btn-primary me-2" href="{{URL::to('/nhan-vien-y-te/bn-ho-so-benh-an/'.$patient->id)}}">Hồ sơ bệnh án</a>
                    </center>
                  </form>
                  @endforeach
                </div>
              </div>
            </div>
@endsection