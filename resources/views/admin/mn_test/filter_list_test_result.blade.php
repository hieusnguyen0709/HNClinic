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
                            Bác sĩ
                          </th>
                          <th>
                            Loại xét nghiệm
                          </th>
                          <th>
                            Ghi chú
                          </th>
                          <th>
                            Trạng thái
                          </th>
                          <th>
                            Kết quả xét nghiệm
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($show_require_testing as $key => $require_testing)
                         <tr>
                           <td>{{$require_testing->appointment_code}}</td>
                           <td>{{$require_testing->last_name}}</td>
                           <td>{{App\Models\User::where('id',$require_testing->id_doctor)->value('last_name')}}</td>
                           <td>{{$require_testing->name_type}}</td>
                           <td>{{$require_testing->note}}</td>
                           @if($require_testing->test_status == 0)
                              <td>
                                  <input type="button" value="Chờ xét nghiệm" class="btn btn-primary" style="width:150px;"/>
                              </td>
                              <td>
                                <a href="{{URL::to('/admin/nhap-ket-qua-xet-nghiem/'.$require_testing->id_test)}}" class="btn btn-dark" style="width:150px;">Nhập kết quả</a>
                              </td>
                            @endif
                            @if($require_testing->test_status == 1)
                              <td>
                                  <input type="button" value="Đã xét nghiệm" class="btn btn-success" style="width:150px;"/>
                              </td>
                              <td><a href="{{URL::to('/download/'.$require_testing->result)}}" class="btn btn-light" style="width:150px; border:1px solid black">Tải về</a></td>
                            @endif
                         </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>