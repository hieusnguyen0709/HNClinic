@extends('admin.index')
@section('admin_content')
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Nhập kết quả xét nghiệm</h4>
                  @foreach($show_require_testing as $key => $require_testing)
                  <form class="forms-sample"  method="POST" action="{{URL::to('/admin/kt-nhap-ket-qua-xet-nghiem/'.$require_testing->id_test)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                  <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Mã cuộc hẹn</label>
                      <div class="col-sm-9">
                        <input type="hidden" class="form-control" name="id_appointment" value="{{$require_testing->id_appointment}}" readonly>
                        <input type="text" class="form-control" value="{{$require_testing->appointment_code}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Bệnh nhân</label>
                      <div class="col-sm-9">
                        <input type="hidden" class="form-control" name="id_patient" value="{{$require_testing->id_patient}}" readonly>
                        <input type="text" class="form-control" value="{{$require_testing->last_name}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Bác sĩ</label>
                      <div class="col-sm-9">
                        <input type="hidden" class="form-control" name="id_doctor" value="{{App\Models\User::where('id',$require_testing->doctor_id)->value('id')}}" readonly>
                        <input type="text" class="form-control" value="{{App\Models\User::where('id',$require_testing->doctor_id)->value('last_name')}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Loại xét nghiệm</label>
                      <div class="col-sm-9">
                        <input type="hidden" class="form-control" name="id_test_type" value="{{$require_testing->id_test_type}}" readonly>
                        <input type="text" class="form-control" value="{{$require_testing->name_type}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Ghi chú</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="note" value="{{$require_testing->note}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Kết quả</label>
                      <div class="col-sm-9">
                        <input type="file" class="form-control" name="result">
                      </div>
                    </div>
                    <center>
                          <input type="submit" value="Xác nhận" class="btn btn-primary me-2">
                    </center>
                  </form>
                  @endforeach
                </div>
              </div>
            </div>
@endsection