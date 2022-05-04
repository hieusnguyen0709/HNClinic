@extends('test_doctor.index')
@section('test_doctor_content')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Yêu cầu xét nghiệm</h4>
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
                            Trạng thái
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
                              @if($appointment->status == 0)
                              <td>
                                  <input type="button" value="Chờ duyệt" class="btn btn-primary" style="width:100px;"/>
                              </td>
                              @endif
                              @if($appointment->status == 1)
                              <td>
                                  <input type="button" value="Đã duyệt" class="btn btn-success" style="width:100px;"/>
                              </td>
                              @endif
                              @if($appointment->status == 2)
                              <td>
                                  <input type="button" value="Đã khám" class="btn btn-secondary" style="width:100px;color:white"/>
                              </td>
                              @endif
                              @if($appointment->status == 3)
                              <td>
                                  <input type="button" value="Đã hủy" class="btn btn-danger" style="width:100px;"/>
                              </td>
                              @endif
                              <!-- @if($appointment->status == 0)
                              <td>
                                  <select id="form_status" onchange="change_status()">
                                    <option value="0" selected>Chờ duyệt</option>
                                    <option value="1">Đã duyệt</option>
                                    <option value="2">Đã khám</option>
                                    <option value="3">Đã hủy</option>
                                  </select>
                              </td>
                              @endif
                              @if($appointment->status == 1)
                              <td>
                              <select>
                                    <option value="0">Chờ duyệt</option>
                                    <option value="1" selected>Đã duyệt</option>
                                    <option value="2">Đã khám</option>
                                    <option value="3">Đã hủy</option>
                                  </select>
                              </td>
                              @endif
                              @if($appointment->status == 2)
                              <td>
                              <select>
                                    <option value="0">Chờ duyệt</option>
                                    <option value="1">Đã duyệt</option>
                                    <option value="2" selected>Đã khám</option>
                                    <option value="3">Đã hủy</option>
                                  </select>
                              </td>
                              @endif
                              @if($appointment->status == 3)
                              <td>
                              <select>
                                    <option value="0">Chờ duyệt</option>
                                    <option value="1">Đã duyệt</option>
                                    <option value="2">Đã khám</option>
                                    <option value="3" selected>Đã hủy</option>
                                  </select>
                              </td>
                              @endif -->
                              <td>
                                <a href="{{URL::to('/admin/sua-lich-hen/'.$appointment->schedule_id)}}">Sửa</a> | 
                                <a href="{{URL::to('/admin/xoa-lich-hen/'.$appointment->schedule_id)}}">Xóa</a>
                              </td>
                          </tr>
                          <script>
                                // function change_status()
                                // {
                                //   var select = document.getElementById('form_status');
                                //   var value = select.options[select.selectedIndex].value;
                                //   $.ajaxSetup({
                                //     headers: {
                                //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                //       }
                                //     });
                                //   $.ajax({
                                //     url:"{{URL::to('/admin/trang-thai-lich-hen/'.$appointment->schedule_id)}}",
                                //     type:"POST",
                                //     data:{status:value},
                                //     success:function(data)
                                //     {
                                //       // const value = JSON.parse(data);
			                          //       // $("#namec").val(value.name);
                                //       console.log(value);
                                //       // console.log(data);
                                //       // $("#show_schedule").html(data);
                                //     }
                                //     });
                                  // document.getElementById('form_status').submit(value);
                                }
                              </script>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

@endsection