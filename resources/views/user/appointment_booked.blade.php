@extends('user.index')
@section('user_content')
	<section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        <h1>Lịch hẹn</h1>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">Mã cuộc hẹn</th>
            <th scope="col">Họ tên</th>
            <th scope="col">Ngày sinh</th>
            <th scope="col">Giới tính</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Bác sĩ</th>
            <th scope="col">Ngày khám</th>
            <th scope="col">Thời gian</th>
            <th scope="col">Triệu chứng</th>
            <th scope="col">Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointment_booked as $key => $appointment)
            <tr>
                <td>{{$appointment->appointment_code}}</th>
                @if($appointment->full_name)
                <td>{{$appointment->full_name}}</td>
                @else
                <td>{{App\Models\User::where('id',$appointment->patient_id)->value('last_name')}}</td>
                @endif
                <td>{{$appointment->birth_date}}</td>
                @if($appointment->gender == 0)
                <td>
                    Nam
                </td>
                @endif
                @if($appointment->gender == 1)
                <td>
                   Nữ
                </td>
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
                    <input type="button" value="Đã khám" class="btn btn-secondary" style="width:100px;"/>
                </td>
                @endif
                @if($appointment->status == 3)
                <td>
                    <input type="button" value="Đã hủy" class="btn btn-danger" style="width:100px;"/>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
        </table>
</div>
</section>


@endsection