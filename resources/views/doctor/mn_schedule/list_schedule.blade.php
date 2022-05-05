@extends('doctor.index')
@section('doctor_content')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Lịch làm đã đăng ký</h4>
                  <?php
                         $message = Session::get('message');
                         if($message)
                         {
                             echo '<center><span class="text-success">'.$message.'</span></center>';
                             Session::put('message',null);
                         }
                      ?>
                    </p>
                  <div class="table-responsive">
                    <div>
                        <ul class="list-group list-group-horizontal">
                          <li style="border:1px solid white; border-radius:5px; font-size:20px; font-weight:bold" class="list-group-item list-group-item-action w-auto p-3 day">
                              Tên
                          </li>
                            <li style="border:1px solid white; border-radius:5px;font-size:20px; font-weight:bold" class="list-group-item list-group-item-action w-auto p-3 day">
                              Ngày làm
                          </li>
                        </ul>
                    </div><br>

                    <div style="border:1px solid black; margin:10">
                        <ul class="list-group list-group-horizontal">
                          
                          @foreach($show_doctor as $key => $schedule)
                          <li style="margin:10px; border:1px solid black; border-radius:5px" class="list-group-item list-group-item-action w-auto p-3 day" date=" {{$schedule->date}}">
                              {{$schedule->last_name}}
                          </li>
                          @endforeach
                          @foreach($show_schedule as $key => $schedule)
                            <li style="margin:10px; border:1px solid black; border-radius:5px" class="list-group-item list-group-item-action w-auto p-3 day" date=" {{$schedule->date}}">
                              {{$schedule->date}}
                          </li>
                          @endforeach
                        </ul>
                    </div><br>
                  </div>
                </div>
              </div>
            </div>
@endsection