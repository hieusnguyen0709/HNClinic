                <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                        <th>
                            Mã cuộc hẹn
                        </th>
                        <th>
                            Bệnh nhân
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
                              <td>{{$appointment->phone}}</td>
                              <td>{{App\Models\User::where('id',$appointment->doctor_id)->value('last_name')}}</td>
                              <td>{{$appointment->date}}</td>
                              <td>{{$appointment->time}}</td>
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
                              <td>
                                <a href="{{URL::to('/admin/chi-tiet-lich-hen/'.$appointment->schedule_id)}}">Xem</a>
                              @if($appointment->status == 2)

                              @else
                                | <a href="{{URL::to('/admin/sua-lich-hen/'.$appointment->schedule_id)}}">Sửa</a> |
                                <a href="{{URL::to('/admin/xoa-lich-hen/'.$appointment->schedule_id)}}">Xóa</a>
                              @endif
                              </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>