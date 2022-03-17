@extends('admin.index')
@section('admin_content')
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Sửa thông tin người dùng</h4>
                  @foreach($edit_user as $key => $edit_value)
                  <form method="post" role="form" action="{{URL::to('/admin/sua-thong-tin-nguoi-dung/.$edit_value->id')}}" enctype="multipart/form-data" class="form-sample">
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
                            <input type="text" class="form-control" name="first_name" value="{{ $edit_value->first_name }}"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tên</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="last_name" value="{{ $edit_value->last_name }}"/>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tên đăng nhập</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="email" value="{{ $edit_value->email }}"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Mật khẩu</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="password" value="{{ $edit_value->password }}" />
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Địa chỉ</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="address" value="{{ $edit_value->address }}"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Ngày sinh</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="birth_date" value="{{ $edit_value->birth_date }}"/>
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
                            <option selected value="4">Bác sĩ</option>
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
                            <input type="text" class="form-control" name="phone" value="{{ $edit_value->phone }}"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tình trạng</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="emergency" value="{{ $edit_value->emergency }}"/>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nhóm máu</label>
                          <div class="col-sm-9">
                          <select class="form-control" name="blood_group">
                          <?php
                                if($edit_value->blood_group == 0)
                                {
                            ?>
                            <option value="3">O</option>
                            <option value="2">AB</option>
                            <option value="1">B</option>
                            <option selected value="0">A</option>
                            <?php
                                }
                                elseif($edit_value->blood_group == 1)
                                {
                            ?>
                            <option value="3">O</option>
                            <option value="2">AB</option>
                            <option selected value="1">B</option>
                            <option value="0">A</option>
                            <?php  
                                }
                                elseif($edit_value->blood_group == 2)
                                {
                            ?>
                            <option value="3">O</option>
                            <option selected value="2">AB</option>
                            <option value="1">B</option>
                            <option value="0">A</option>
                             <?php  
                                }
                                elseif($edit_value->blood_group == 3)
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

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Chuyên khoa</label>
                          <div class="col-sm-9">
                          <select class="form-control" name="specialist">
                          <?php
                                if($edit_value->specialist == 0)
                                {
                            ?>
                            <option value="1">Thần kinh</option>
                            <option selected value="0">Da liễu</option>
                            <?php
                                }
                                elseif($edit_value->specialist == 1)
                                {
                            ?>
                            <option selected value="1">Thần kinh</option>
                            <option value="0">Da liễu</option>
                            <?php  
                                }
                            ?>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <center><button type="submit" name="submit" class="btn btn-primary me-2">Thêm người dùng</button></center>
                  </form>
                  @endforeach
                </div>
              </div>
            </div>
@endsection