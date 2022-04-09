@extends('admin.index')
@section('admin_content')
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Sửa thông tin bệnh nhân</h4>
                  @foreach($edit_patient as $key => $patient)
                  <form method="post" role="form" action="{{URL::to('/admin/kt-sua-benh-nhan/'.$patient->id)}}" enctype="multipart/form-data" class="form-sample">
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
                            <input type="text" class="form-control" name="first_name" value="{{ $patient->first_name }}"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tên</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="last_name" value="{{ $patient->last_name }}"/>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tên đăng nhập</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="email" value="{{ $patient->email }}"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Mật khẩu</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="password" value="{{ $patient->password }}" />
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Địa chỉ</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="address" value="{{ $patient->address }}"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Ngày sinh</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" name="birth_date" value="{{ $patient->birth_date }}"/>
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
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nhóm máu</label>
                          <div class="col-sm-9">
                          <select class="form-control" name="blood_group">
                          <?php
                                if($patient->blood_group == 0)
                                {
                            ?>
                            <option value="3">O</option>
                            <option value="2">AB</option>
                            <option value="1">B</option>
                            <option selected value="0">A</option>
                            <?php
                                }
                                elseif($patient->blood_group == 1)
                                {
                            ?>
                            <option value="3">O</option>
                            <option value="2">AB</option>
                            <option selected value="1">B</option>
                            <option value="0">A</option>
                            <?php  
                                }
                                elseif($patient->blood_group == 2)
                                {
                            ?>
                            <option value="3">O</option>
                            <option selected value="2">AB</option>
                            <option value="1">B</option>
                            <option value="0">A</option>
                             <?php  
                                }
                                elseif($patient->blood_group == 3)
                                {
                            ?>
                            <option selected value="3">O</option>
                            <option value="2">AB</option>
                            <option value="1">B</option>
                            <option value="0">A</option>
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
                            <input type="text" class="form-control" name="phone" value="{{ $patient->phone }}"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tình trạng</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="emergency" value="{{ $patient->emergency }}"/>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Ảnh đại diện</label>
                          <div class="col-sm-9">
                          <img src="<?php echo url('/'); ?>/upload_images/{{ $patient->picture }}" width="50px" height="50"></br>
                          <input type="file" class="form-control" name="image" value=""/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">

                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                      </div>
                    </div>
                    <center><button type="submit" name="submit" class="btn btn-primary me-2">Sửa người dùng</button></center>
                  </form>
                  @endforeach
                </div>
              </div>
            </div>
@endsection