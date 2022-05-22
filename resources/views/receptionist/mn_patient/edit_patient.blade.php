@extends('receptionist.index')
@section('receptionist_content')
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Sửa thông tin bệnh nhân</h4>
                  @foreach($edit_patient as $key => $patient)
                  <form method="post" role="form" action="{{URL::to('/nhan-vien-y-te/kt-sua-benh-nhan/'.$patient->id)}}" enctype="multipart/form-data" class="form-sample">
                  {{ csrf_field() }}
                    <p class="card-description">
                      <?php
                         $message = Session::get('message');
                         if($message)
                         {
                             echo '<center><span class="text-success">'.$message.'</span></center>';
                             Session::put('message',null);
                         }
                      ?>
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Họ đệm</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="first_name" value="{{ $patient->first_name }}" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tên</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="last_name" value="{{ $patient->last_name }}" required/>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tên đăng nhập</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="email" value="{{ $patient->email }}" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Mật khẩu</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="password" value="{{ $patient->password }}" required/>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Địa chỉ</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="address" value="{{ $patient->address }}" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Ngày sinh</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" name="birth_date" value="{{ $patient->birth_date }}" required/>
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
                                if($patient->gender == 0)
                                {
                            ?>
                            <option value="1">Nữ</option>
                            <option selected value="0">Nam</option>
                            <?php
                                }
                                elseif($patient->gender == 1)
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
                          <label class="col-sm-3 col-form-label">Ảnh đại diện</label>
                          <div class="col-sm-9">
                          <img src="<?php echo url('/'); ?>/upload_images/{{ $patient->picture }}" width="50px" height="50"></br>
                          <input type="file" class="form-control" name="image" value=""/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Số điện thoại</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="phone" value="{{ $patient->phone }}" required/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <center><button type="submit" name="submit" class="btn btn-primary me-2">Sửa bệnh nhân</button></center>
                  </form>
                  @endforeach
                </div>
              </div>
            </div>
@endsection