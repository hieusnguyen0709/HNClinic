@extends('doctor.index')
@section('doctor_content')
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Thêm đơn thuốc</h4>
                  @foreach($show_detail_appointment as $key => $detail_appointment)
                  <form method="post" role="form"  action="{{URL::to('/bac-si/kt-nhap-ket-qua-kham/'.$detail_appointment->schedule_id)}}" enctype="multipart/form-data" class="form-sample">
                  {{ csrf_field() }}
                    <p class="card-description">
                    <?php
                         $message = Session::get('message');
                         if($message)
                         {
                             echo '<center><span class="text-success">'.$message.'</span></center>';
                             Session::put('message',null);
                         }
                      ?>
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Mã cuộc hẹn</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control timepicker" name="symptoms" value="{{$detail_appointment->appointment_code}}" readonly/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Bệnh nhân</label>
                          <div class="col-sm-9">
                          <input type="hidden" class="form-control" name="patient_id" value="{{$detail_appointment->patient_id}}" readonly>
                          <input type="text" class="form-control" value="{{App\Models\User::where('id',$detail_appointment->patient_id)->value('last_name')}}" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Bác sĩ</label>
                          <div class="col-sm-9">
                          <input type="hidden" class="form-control" name="doctor_id" value="{{$detail_appointment->doctor_id}}" readonly>
                          <input type="text" class="form-control" value="{{App\Models\User::where('id',$detail_appointment->doctor_id)->value('last_name')}}" readonly>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Ngày</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control timepicker" name="date"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Triệu chứng</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control timepicker" name="symptoms"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Lời khuyên</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control timepicker" name="advice"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Chẩn đoán</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control timepicker" name="diagnosis"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="more_medicine">
                    <div class="row" id="add_medicine">
                      <div class="col-md-6">
                      <div class="form-group row" >
                          <label class="col-sm-3 col-form-label">Thuốc</label>
                          <div class="col-sm-9">
                          <select class="form-control" name="medicine_id[]">
                            @foreach($medicine as $key => $md)
                              <option value="{{$md->id}}" >{{$md->name}}</option>
                            @endforeach
                          </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Cách dùng</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control timepicker" name="instruction[]" style="margin-left:20px;"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-1">
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="button" onclick="remove_field()"  id="remove_medi" class="btn btn-danger me-2" value="X" name="remove_medi" style="padding:7px;"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                    <input type="button" onclick="add_more_field()"  id="add_more_medi" class="btn btn-primary me-2" value="Thêm thuốc" name="add_more_medi" style="margin-top:20px;"/>
                    <center><button type="submit" name="submit" class="btn btn-primary me-2">Thêm đơn thuốc</button></center>
                  </form>
                  @endforeach
                </div>
              </div>
            </div>
            <script type="text/javascript">
              function add_more_field()
              {
                $('#add_medicine').clone().appendTo('#more_medicine')
              }
              function remove_field()
              {
                $('#more_medicine #add_medicine').last().remove();
              }
            </script>
@endsection