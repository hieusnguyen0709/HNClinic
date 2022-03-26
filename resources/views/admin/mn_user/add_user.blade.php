@extends('admin.index')
@section('admin_content')
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Thêm người dùng</h4>
                  <form method="post" role="form" action="{{URL::to('/admin/kt-them-nguoi-dung')}}" enctype="multipart/form-data" class="form-sample">
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
                            <input type="text" class="form-control" name="first_name"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tên</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="last_name"/>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tên đăng nhập</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="email"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Mật khẩu</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="password" />
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Địa chỉ</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="address"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Ngày sinh</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="birth_date"/>
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
                              <option value="0">Nam</option>
                              <option value="1">Nữ</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Chức vụ</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="type">
                              <option value="0">Khách hàng</option>
                              <option value="1">Quản trị viên</option>
                              <option value="2">Nhân viên y tế</option>
                              <option value="3">Nhân viên xét nghiệm</option>
                              <option value="4">Bác sĩ</option>
                              <option value="5">Dược sĩ</option>
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
                            <input type="text" class="form-control" name="phone"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tình trạng</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="emergency"/>
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
                              <option value="0">A</option>
                              <option value="1">B</option>
                              <option value="2">AB</option>
                              <option value="3">O</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Ảnh đại diện</label>
                          <div class="col-sm-9">
                          <input type="file" class="form-control" name="image">
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
                              <option value="0">Da liễu</option>
                              <option value="1">Thần kinh</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <center><button type="submit" name="submit" class="btn btn-primary me-2">Thêm người dùng</button></center>
                  </form>
                </div>
              </div>
            </div>
@endsection