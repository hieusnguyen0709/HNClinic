@extends('admin.index')
@section('admin_content')
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Kết quả xét nghiệm - @foreach($query_patient as $key => $patient) {{$patient->last_name}} @endforeach</h4>
                  <?php
                         $message = Session::get('message');
                         if($message)
                         {
                             echo '<center><span class="text-success">'.$message.'</span></center>';
                             Session::put('message',null);
                         }
                      ?>
                    </p>
                    <div id="show_filter">
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
                              <input type="button" value="Chưa có kết quả" class="btn btn-danger" style="width:150px;"/>
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
                </div>
                </div>
              </div>
            </div>
@endsection