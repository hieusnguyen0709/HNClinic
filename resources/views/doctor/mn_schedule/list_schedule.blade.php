@extends('doctor.index')
@section('doctor_content')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Danh sách lịch làm</h4>
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
                    <table class="table table-striped">
                      <thead>
                        <tr>
                        <th>
                            Tên
                        </th>
                          <th>
                            Ngày làm
                          </th>
                          <!-- <th>
                            Ca làm
                          </th> -->
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($show_list_schedule as $key => $schedule)
                        <tr>
                          <td>
                              {{$schedule->last_name}}
                          </td>
                            <td>
                                {{$schedule->date}}
                            </td>
                          <!-- <td>
                            
                          </td> -->

                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
@endsection