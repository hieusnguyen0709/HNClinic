@extends('admin.index')
@section('admin_content')
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Thêm lịch làm</h4>
                  <form method="post" role="form" action="{{URL::to('/admin/kt-them-lich-lam')}}" enctype="multipart/form-data" class="form-sample">
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
                          <select class="form-control" name="type">
                            @foreach($show_list_user as $key => $user)                          
                              <option value="{{$user->id}}" >{{$user->last_name}}</option>                            
                            @endforeach
                            </select>
                          </div>
                        </div>
                        
                      </div>
                      <div class="col-md-6">
                      <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Ngày</label>
                          <div class="col-sm-9">
                          <input type="date" class="form-control" name="date">
                          </div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Ca làm</label>
                          <div class="col-sm-9">
                          <select class="form-control" name="frame_name">
                            @foreach($time_frame as $key => $frame)
                              <option value="{{$frame->frame_name}}" >{{$frame->frame_name}}  ({{$frame->start_time}} - {{$frame->end_time}})</option>
                            @endforeach
                          </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <center><button type="submit" name="submit" class="btn btn-primary me-2">Thêm lịch làm</button></center>
                  </form>
                </div>
              </div>
            </div>
@endsection