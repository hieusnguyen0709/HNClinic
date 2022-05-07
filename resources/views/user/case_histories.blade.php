@extends('user.index')
@section('user_content')
	<section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        <h1>Lịch sử khám</h1>
        <table class="table">
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
                              <a href="{{URL::to('/chi-tiet-don-thuoc/'.$m_p->pre_code_medicine_prescription)}}">Chi tiết</a>
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
        </table>
</div>
</section>


@endsection