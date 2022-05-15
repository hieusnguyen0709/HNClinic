@extends('doctor.index')
@section('doctor_content')
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Yêu cầu xét nghiệm</h4>
                  @foreach($info_appointment as $key => $info)
                  <form method="post" role="form"  action="{{URL::to('/bac-si/kt-yeu-cau-xet-nghiem-don-thuoc/'.$info->schedule_id)}}" enctype="multipart/form-data" class="form-sample">
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
                            <input type="text" class="form-control timepicker" value="{{$info->appointment_code}}" readonly/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Bác sĩ</label>
                          <div class="col-sm-9">
                            <input type="hidden" name="id_doctor" class="form-control timepicker" value="{{$info->doctor_id}}" readonly/>
                            <input type="text" class="form-control timepicker" value="{{App\Models\User::where('id',$info->doctor_id)->value('last_name')}}" readonly/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Bệnh nhân</label>
                          <div class="col-sm-9">
                            <input type="hidden" name="id_patient"class="form-control timepicker" value="{{$info->patient_id}}"/>
                            <input type="text" class="form-control timepicker" value="{{App\Models\User::where('id',$info->patient_id)->value('last_name')}}" readonly/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="more_medicine">
                    <div class="row" id="add_medicine">
                      <div class="col-md-6">
                      <div class="form-group row" >
                          <label class="col-sm-3 col-form-label">Loại xét nghiệm</label>
                          <div class="col-sm-9">
                          <select class="form-control" name="id_test_type[]">
                            @foreach($test_type as $key => $type)
                              <option value="{{$type->id_test_type}}" >{{$type->name_type}}</option>
                            @endforeach
                          </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Ghi chú</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control timepicker" name="note[]" style="margin-left:20px;"/>
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
                    <input type="button" onclick="add_more_field()"  id="add_more_medi" class="btn btn-success" value="Thêm loại xét nghiệm" name="add_more_medi" style="margin-top:20px;"/>
                    <center><button type="submit" name="submit" class="btn btn-primary me-2">Xác nhận yêu cầu</button></center>
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