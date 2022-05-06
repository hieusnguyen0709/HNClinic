@extends('user.index')
@section('user_content')
	<section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        <h1>Hồ sơ bệnh án</h1>
        <table class="table">
        <thead>
            <tr>
                <th scope="col">Mã đơn thuốc</th>
                <th scope="col">Tên thuốc</th>
                <th scope="col">Ngày</th>
                <th scope="col">Bác sĩ</th>
                <th scope="col">Triệu chứng</th>
                <th scope="col">Chẩn đoán</th>
                <th scope="col">Lời khuyên</th>
                <th scope="col">Cách dùng</th>
            </tr>
            @foreach($prescription as $key => $pres)
            <tr>
                <td>{{$pres->pre_code}}</td>
                <td>{{$pres->name}}</td>
                <td>{{$pres->date}}</td>
                <td>{{App\Models\User::where('id',$pres->doctor_id)->value('last_name')}}</td>
                <td>{{$pres->symptoms}}</td>
                <td>{{$pres->diagnosis}}</td>
                <td>{{$pres->advice}}</td>
                <td><textarea readonly>{{$pres->pre_instruction}}</textarea></td>
            </tr>
            @endforeach
        </thead>
        <tbody>

        </tbody>
        </table>
</div>
</section>


@endsection