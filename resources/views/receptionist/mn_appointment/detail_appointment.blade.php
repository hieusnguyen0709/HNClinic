@extends('receptionist.index')
@section('receptionist_content')
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Chi tiết cuộc hẹn</h4>
                @foreach($detail_appointment as $key => $detail)
                  <form class="forms-sample">
                  <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Mã QR</label>
                      <div class="col-sm-9">
                      <img src="<?php echo url('/'); ?>/store_QR/{{$detail->qr_image}}" width="150px" height="150px"></br>
                      </div>
                    </div>
                  <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Mã cuộc hẹn</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{$detail->appointment_code}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Bệnh nhân</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{App\Models\User::where('id',$detail->patient_id)->value('last_name')}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Ngày sinh</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" value="{{$detail->birth_date}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Giới tính</label>
                      <div class="col-sm-9">
                        @if($detail->gender == 0)
                            <input type="text" class="form-control" value="Nam" readonly>
                        @else
                        <input type="text" class="form-control" value="Nữ" readonly>
                        @endif
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Số điện thoại</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{$detail->phone}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Bác sĩ</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{App\Models\User::where('id',$detail->doctor_id)->value('last_name')}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Ngày khám</label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control" value="{{$detail->date}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Thời gian</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{$detail->time}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Triệu chứng</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{$detail->symptoms}}" readonly>
                      </div>
                    </div>
                    <center><a href="{{URL::to('/nhan-vien-y-te/danh-sach-lich-hen/')}}" class="btn btn-primary">Quay lại</a></center>
                  </form>
                  @endforeach
                </div>
              </div>
            </div>
@endsection