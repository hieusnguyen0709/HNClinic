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
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <center>
                            <button type="button" class="btn btn-outline-primary" id="calendar">Lịch làm</button>
                          </center>
                        </br>
                      </div>
                    </div>
                    </div>
                    <div style="border:1px solid black; margin:10">
                      <span class="text">Ngày: </span><span id="d"></span>
                        <ul class="list-group list-group-horizontal" id="day_picker">
                        <li style="margin:10px; border:1px solid black; border-radius:5px" class="list-group-item list-group-item-action w-auto p-3 day" date="">
                          14/06<center><input style="display:block;" type="checkbox" name="date[]" value="14/06"></center>
                          @foreach($time_frame as $key => $frame)
                            {{$frame->frame_name}}<center><input style="display:block;" type="checkbox" name="frame_name[]" value="{{$frame->frame_name}}"><center>
                          @endforeach
                        </li>
                        </ul>
                    </div><br>
                    <center><button type="submit" name="submit" class="btn btn-primary me-2" style="margin-top:10px;">Thêm lịch làm</button></center>
                  </form>
                </div>
              </div>
            </div>

            <script type="text/javascript">
            $("#calendar").click(function(){
            let d = new Date();
            let year = d.getFullYear();
            let month = d.getMonth()+1;
            let text = "";
            let day = d.getDate();
            let totalDayOfMonth;
            if(month == 2 )
            {
              totalDayOfMonth=29;
            }
            else if(month == 4 || month == 6 || month == 9 || month == 11){
              totalDayOfMonth=30;
            }
            else
            {
              totalDayOfMonth=31;
            }
            for(i=0;i<7;i++)
            {
              if(day  <= totalDayOfMonth)
              {
                if(month > 12)
                {
                  month = 1;
                  year = year +1;
                }
                date = month+'/'+day;
                dat = year+'/'+month+'/'+day;
                text += '<li style="margin:10px; border:1px solid black;border-radius:5px"" class="list-group-item list-group-item-action w-auto p-3 day" date="">'+date+'<center><input style="display:block;" type="checkbox" name="date[]" value="'+dat+'"></center></li>';
                day = day + 1;
              }
              else
              {
                day = 1;
                month = month + 1;
                if(month > 12)
                {
                  month = 1;
                  year = year +1;
                }
                date = month+'/'+day;
                dat = year+'/'+month+'/'+day;
                text += '<li style="margin:10px; border:1px solid black;border-radius:5px"" class="list-group-item list-group-item-action w-auto p-3 day" date="">'+date+'<center><input style="display:block;" type="checkbox" name="date[]" value="'+dat+'"></center></li>';
                day= day +1;
              }
              $("#day_picker").html(text);
            }
          });
           </script>
@endsection