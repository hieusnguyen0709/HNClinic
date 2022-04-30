@extends('admin.index')
@section('admin_content')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Danh sách đơn thuốc</h4>
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
                            Mã đơn thuốc
                        </th>
                        <th>
                            Tên thuốc
                        </th>
                        <th>
                            Ngày
                        </th>
                          <th>
                            Bác sĩ
                          </th>
                          <th>
                            Bệnh nhân
                          </th>
                          <th>
                            Triệu chứng
                          </th>
                          <th>
                            Chẩn đoán
                          </th>
                          <th>
                            Lời khuyên
                          </th>
                          <th>
                            Cách dùng
                          </th>
                          <th>
                            Thao tác
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($show_list_pres as $key => $pres)
                        <tr>
                          <td>
                          {{$pres->pre_code}}
                          </td>
                          <td>
                          {{$pres->name}}
                          </td>
                          <td>
                          {{$pres->date}}
                          </td>
                            <td>
                              {{App\Models\User::where('id',$pres->doctor_id)->value('last_name')}}
                            </td>
                          <td>
                          {{$pres->last_name}}
                          </td>
                          <td>
                          {{$pres->symptoms}}
                          </td>
                          <td>
                          {{$pres->diagnosis}}
                          </td>
                          <td>
                          {{$pres->advice}}
                          </td>
                          <td>
                            <textarea readonly rows="5" cols="20">{{$pres->pre_instruction}}</textarea>
                          </td>
                          <td>
                            <a href="{{URL::to('admin/sua-don-thuoc/'.$pres->id_pres)}}">Sửa</a> |
                            <a href="{{URL::to('admin/xoa-don-thuoc/'.$pres->id_pres)}}">Xóa</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
@endsection