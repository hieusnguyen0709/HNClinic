@extends('admin.index')
@section('admin_content')
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Sửa thông tin tài khoản</h4>
                  @foreach($edit_user as $key => $edit_value)
                  <form method="post" role="form" action="{{URL::to('/admin/kt-sua-nguoi-dung/'.$edit_value->id)}}" enctype="multipart/form-data" class="form-sample">
                  {{ csrf_field() }}
                    <p class="card-description">
                      <?php
                         $message = Session::get('message');
                         if($message)
                         {
                             echo '<center><span class="text-success">'.$message.'</span></center>';
                             Session::put('message',null);
                         }
                         $check_email_message = Session::get('check_email_message');
                         if($check_email_message)
                         {
                             echo '<center><span class="text-danger">'.$check_email_message.'</span></center>';
                             Session::put('check_email_message',null);
                         }
                      ?>
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Họ đệm</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="first_name" value="{{ $edit_value->first_name }}" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tên</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="last_name" value="{{ $edit_value->last_name }}" required/>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tên đăng nhập</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="email" value="{{ $edit_value->email }}" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Mật khẩu</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="password" value="{{ $edit_value->password }}" required/>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Địa chỉ</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="address" value="{{ $edit_value->address }}" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Ngày sinh</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" name="birth_date" value="{{ $edit_value->birth_date }}" required/>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Giới tính</label>
                          <div class="col-sm-9">
                          <select class="form-control" name="gender">
                            <?php
                                if($edit_value->gender == 0)
                                {
                            ?>
                            <option value="1">Nữ</option>
                            <option selected value="0">Nam</option>
                            <?php
                                }
                                elseif($edit_value->gender == 1)
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
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Chức vụ</label>
                          <div class="col-sm-9">
                          <select class="form-control" name="type">
                          <?php
                                if($edit_value->type == 0)
                                {
                            ?>
                            <option value="5">Dược sĩ</option>
                            <option value="4">Bác sĩ</option>
                            <option value="3">Nhân viên xét nghiệm</option>
                            <option value="2">Nhân  viên y tế</option>
                            <option value="1">Quản trị viên</option>
                            <option selected value="0">Khách hàng</option>
                            <?php
                                }
                                else if($edit_value->type == 1)
                                {
                            ?>
                            <option value="5">Dược sĩ</option>
                            <option value="4">Bác sĩ</option>
                            <option value="3">Nhân viên xét nghiệm</option>
                            <option value="2">Nhân  viên y tế</option>
                            <option selected value="1" >Quản trị viên</option>
                            <option value="0">Khách hàng</option>
                            <?php
                                }
                                else if($edit_value->type == 2)
                                {
                            ?>
                            <option value="5">Dược sĩ</option>
                            <option value="4">Bác sĩ</option>
                            <option value="3">Nhân viên xét nghiệm</option>
                            <option selected value="2">Nhân  viên y tế</option>
                            <option value="1" >Quản trị viên</option>
                            <option value="0">Khách hàng</option>
                             <?php
                                }
                                else if($edit_value->type == 3)
                                {
                            ?>
                            <option value="5">Dược sĩ</option>
                            <option value="4">Bác sĩ</option>
                            <option selected value="3">Nhân viên xét nghiệm</option>
                            <option value="2">Nhân  viên y tế</option>
                            <option value="1" >Quản trị viên</option>
                            <option value="0">Khách hàng</option>
                             <?php
                                }
                                else if($edit_value->type == 4)
                                {
                            ?>
                            <option value="5">Dược sĩ</option>
                            <option selected value="4">Bác sĩ</option>
                            <option value="3">Nhân viên xét nghiệm</option>
                            <option value="2">Nhân  viên y tế</option>
                            <option value="1" >Quản trị viên</option>
                            <option value="0">Khách hàng</option>
                            <?php
                                }
                                else if($edit_value->type == 5)
                                {
                            ?>
                            <option selected value="5">Dược sĩ</option>
                            <option value="4">Bác sĩ</option>
                            <option value="3">Nhân viên xét nghiệm</option>
                            <option value="2">Nhân  viên y tế</option>
                            <option value="1" >Quản trị viên</option>
                            <option value="0">Khách hàng</option>
                            <?php
                                }
                            ?>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Số điện thoại</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="phone" value="{{ $edit_value->phone }}" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Ảnh đại diện</label>
                          <div class="col-sm-9">
                          <img src="<?php echo url('/'); ?>/upload_images/{{ $edit_value->picture }}" width="50px" height="50"></br>
                          <input type="file" class="form-control" name="image" value=""/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <center><button type="submit" name="submit" class="btn btn-primary me-2">Sửa tài khoản</button></center>
                  </form>
                  @endforeach
                </div>
              </div>
            </div>
@endsection