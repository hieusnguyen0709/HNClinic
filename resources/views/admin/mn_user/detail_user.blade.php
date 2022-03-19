@extends('admin.index')
@section('admin_content')
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Chi tiết người dùng</h4>
                  @foreach($detail_user as $key => $detail_value)
                  <form class="forms-sample">
                  <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Ảnh đại diện</label>
                      <div class="col-sm-9">
                      <img src="<?php echo url('/'); ?>/upload_images/{{ $detail_value->picture }}" width="50px" height="50"></br>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Họ đệm</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="first_name" value="{{ $detail_value->first_name }}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tên</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" name="last_name" value="{{ $detail_value->last_name }}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Tên đăng nhập</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="email" value="{{ $detail_value->email }}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Mật khẩu</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="password" value="{{ $detail_value->password }}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Địa chỉ</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="address" value="{{ $detail_value->address }}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Ngày sinh</label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control" name="birth_date" value="{{ $detail_value->birth_date }}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Giới tính</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="gender" value="<?php 
                          if($detail_value->gender == 0) 
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
                          if($detail_value->type == 0) 
                          {
                            echo 'Khách hàng';
                          }
                          else if($detail_value->type == 1) 
                          {
                            echo'Quản trị viên';
                          }
                          else if($detail_value->type == 2) 
                          {
                            echo'Nhân viên y tế';
                          }
                          else if($detail_value->type == 3) 
                          {
                            echo'Nhân viên xét nghiệm';
                          }
                          else if($detail_value->type == 4) 
                          {
                            echo'Bác sĩ';
                          }
                        ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Số điện thoại</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="phone" value="{{ $detail_value->phone }}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Tình trạng</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="emergency" value="{{ $detail_value->emergency }}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Nhóm máu</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="blood_group" value="<?php 
                          if($detail_value->blood_group == 0) 
                          {
                            echo 'A';
                          }
                          else if($detail_value->blood_group == 1) 
                          {
                            echo'B';
                          }
                          else if($detail_value->blood_group == 2) 
                          {
                            echo'AB';
                          }
                          else if($detail_value->blood_group == 3) 
                          {
                            echo'0';
                          }
                        ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Chuyên khoa</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Password" value="<?php 
                          if($detail_value->specialist == 0) 
                          {
                            echo 'Da liễu';
                          }
                          else if($detail_value->specialist == 1) 
                          {
                            echo'Thần kinh';
                          }
                        ?>" readonly>
                      </div>
                    </div>
                  </form>
                  @endforeach
                </div>
              </div>
            </div>
@endsection