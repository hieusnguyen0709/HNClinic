@extends('admin.index')
@section('admin_content')
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Sửa khung giờ</h4>
                  @foreach($edit_time_frame as $key => $time_frame)
                  <form method="post" role="form" action="{{URL::to('/admin/kt-sua-khung-gio/'.$time_frame->id)}}" enctype="multipart/form-data" class="form-sample">
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
                          <label class="col-sm-3 col-form-label">Ca làm</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control timepicker" name="frame_name" value="{{$time_frame->frame_name}}"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Thời gian bắt đầu</label>
                          <div class="col-sm-9">
                            <input type="time" class="form-control timepicker" name="start_time" value="{{$time_frame->start_time}}"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Thời gian kết thúc</label>
                          <div class="col-sm-9">
                            <input type="time" class="form-control" name="end_time" value="{{$time_frame->end_time}}"/>
                          </div>
                        </div>
                      </div>
                    </div>

                    <center><button type="submit" name="submit" class="btn btn-primary me-2">Sửa khung giờ</button></center>
                  </form>
                  @endforeach
                </div>
              </div>
            </div>
@endsection