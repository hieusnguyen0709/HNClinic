@extends('doctor.index')
@section('doctor_content')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Danh sách lịch hẹn</h4>
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
                            Mã cuộc hẹn
                        </th>
                        <th>
                            Họ tên bệnh nhân
                        </th>
                          <th>
                            Ngày sinh
                          </th>
                          <th>
                            Giới tính
                          </th>
                          <th>
                            Số điện thoại
                          </th>
                          <th>
                            Bác sĩ
                          </th>
                          <th>
                            Ngày khám
                          </th>
                          <th>
                            Thời gian
                          </th>
                          <th>
                            Triệu chứng
                          </th>
                          <th>
                            Thao tác
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($show_list_appointment as $key => $appointment)
                          <tr>
                              <td>{{$appointment->appointment_code}}</td>
                              @if($appointment->full_name)
                                <td>{{$appointment->full_name}}</td>
                              @else
                                <td>{{App\Models\User::where('id',$appointment->patient_id)->value('last_name')}}</td>
                              @endif
                              <td>{{$appointment->birth_date}}</td>
                              @if($appointment->gender == 0)
                                <td>Nam</td>
                              @else
                                <td>Nữ</td>
                              @endif
                              <td>{{$appointment->phone}}</td>
                              <td>{{App\Models\User::where('id',$appointment->doctor_id)->value('last_name')}}</td>
                              <td>{{$appointment->date}}</td>
                              <td>{{$appointment->time}}</td>
                              <td>{{$appointment->symptoms}}</td>
                              @if($appointment->status == 1)
                              <td>
                                  <!-- <input type="button" value="Nhập kết quả" class="btn btn-primary" style="width:150px;"/> -->
                                  <a href="{{URL::to('/bac-si/nhap-ket-qua-kham/'.$appointment->schedule_id)}}" class="btn btn-primary" style="width:100px;">Khám</a>
                              </td>
                              @endif
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

@endsection