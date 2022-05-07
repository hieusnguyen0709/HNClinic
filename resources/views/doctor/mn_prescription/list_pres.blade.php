@extends('doctor.index')
@section('doctor_content')
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
                            Ngày
                        </th>
                          <th>
                            Bác sĩ
                          </th>
                          <th>
                            Bệnh nhân
                          </th>
                          <th>
                            Thao tác
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($medicine_prescription as $key => $m_p)
                        <tr>
                          <td>{{$m_p->pre_code_medicine_prescription}}</td>
                          <td>{{$m_p->date_medicine_prescription}}</td>
                          <td>{{App\Models\User::where('id',$m_p->doctor_id_medicine_prescription)->value('last_name')}}</td>
                          <td>{{App\Models\User::where('id',$m_p->patient_id_medicine_prescription)->value('last_name')}}</td>
                          <td>
                              <a href="{{URL::to('/bac-si/chi-tiet-don-thuoc/'.$m_p->pre_code_medicine_prescription)}}">Xem</a> |
                              <a href="{{URL::to('/bac-si/sua-don-thuoc/'.$m_p->pre_code_medicine_prescription)}}">Sửa</a> |
                              <a href="{{URL::to('/bac-si/xoa-don-thuoc/'.$m_p->pre_code_medicine_prescription)}}">Xóa</a>
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