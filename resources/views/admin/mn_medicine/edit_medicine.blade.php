@extends('admin.index')
@section('admin_content')
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Sửa thuốc</h4>
                  @foreach($edit_medicine as $key => $medicine)
                  <form method="post" role="form" action="{{URL::to('/admin/kt-sua-thuoc/'.$medicine->id)}}" enctype="multipart/form-data" class="form-sample">
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
                          <label class="col-sm-3 col-form-label">Tên thuốc</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name="name" value="{{$medicine->name}}" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Đơn vị</label>
                          <div class="col-sm-9">
                          <select class="form-control" name="unit" >
                              <!-- <option value="{{$medicine->unit}}">{{$medicine->unit}}</option> -->
                              <option value="Tuýp">Tuýp</option>
                              <option value="Lọ">Lọ</option>
                              <option value="Viên">Viên</option>
                          </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Số lượng</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control timepicker" name="quantity" value="{{$medicine->quantity}}" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Loại</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="category" value="{{$medicine->category}}">
                              <option value="Bôi">Bôi</option>
                              <option value="Uống">Uống</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Cách dùng</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control timepicker" name="instruction" value="{{$medicine->instruction}}">
                          </div>
                        </div>
                      </div>
                    </div>
                    <center><button type="submit" name="submit" class="btn btn-primary me-2">Sửa thuốc</button></center>
                  </form>
                  @endforeach
                </div>
              </div>
            </div>
@endsection