@extends('admin.index')
@section('admin_content')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Danh sách yêu cầu xét nghiệm</h4>
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
                            Xét nghiệm
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
                              <td><textarea readonly rows="5">{{$require_testing->result}}</textarea></td>
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