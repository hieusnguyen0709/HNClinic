@extends('admin.index')
@section('admin_content')
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Sửa lịch làm</h4>
                  @foreach($edit_schedule as $key => $schedule)
                  <form method="post" role="form" action="{{URL::to('/admin/kt-sua-lich-lam/'.$schedule->id_time)}}" enctype="multipart/form-data" class="form-sample">
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
                          <label class="col-sm-3 col-form-label">Tên Bác Sĩ</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{$schedule->last_name}}" name="type" readonly>
                          </div>
                        </div>

                      </div>
                      <div class="col-md-6">
                      <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Ngày</label>
                          <div class="col-sm-9">
                          <input type="date" class="form-control" name="date" value="{{ $schedule->date }}">
                          </div>
                        </div>

                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Thời gian bắt đầu</label>
                          <div class="col-sm-9">
                            <input type="time" class="form-control timepicker" name="start_time" value="{{ $schedule->start_time }}"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Thời gian kết thúc</label>
                          <div class="col-sm-9">
                            <input type="time" class="form-control" name="end_time" value="{{ $schedule->end_time }}"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <center><button type="submit" name="submit" class="btn btn-primary me-2">Sửa lịch làm</button></center>
                  </form>
                  @endforeach
                </div>
              </div>
            </div>
@endsection