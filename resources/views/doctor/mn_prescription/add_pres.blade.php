@extends('doctor.index')
@section('doctor_content')
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Thêm đơn thuốc</h4>
                  <form method="post" role="form"  action="{{URL::to('/bac-si/kt-them-don-thuoc')}}" enctype="multipart/form-data" class="form-sample">
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
                          <label class="col-sm-3 col-form-label">Bệnh nhân</label>
                          <div class="col-sm-9">
                          <select class="form-control" name="patient_id">
                            @foreach($patient as $key => $pt)
                              <option value="{{$pt->id}}" >{{$pt->last_name}}</option>
                            @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Bác sĩ</label>
                          <div class="col-sm-9">
                          <select class="form-control" name="doctor_id">
                            @foreach($doctor as $key => $dt)
                              <option value="{{$dt->id}}" >{{$dt->last_name}}</option>
                            @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Ngày</label>
                          <div class="col-sm-9">
                            @php
                              $date = date('y/m/d');
                            @endphp
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
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tái khám</label>
                          <div class="col-sm-1">
                              <input type="checkbox" class="form-check-input" style="margin-top:1px; margin-left:1px; padding:17px" onclick="recheckFunction()"/>
                            </div>
                            <div class="col-sm-8" id="show_recheck">

                            </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <center><h4 class="card-title">Thuốc</h4></center>
                  <div id="more_medicine">
                    <div style="border:1px solid black; padding:10px; border-radius:10px; margin:10px;" id="add_medicine">
                      <div class="row">
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
                        <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Cách dùng</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control timepicker" name="instruction[]"/>
                              </div>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row" >
                              <label class="col-sm-3 col-form-label">Số lượng</label>
                              <div class="col-sm-9">
                                <input type="number" class="form-control timepicker" name="quantity[]" id="quantity"/>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Số ngày uống</label>
                              <div class="col-sm-9">
                              <input type="number" class="form-control timepicker" name="total_days[]" id="total_days"/>
                              </div>
                            </div>
                        </div>
                      </div>
                      <div class="row"  id="avg">
                        <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Ca uống thuốc</label>
                              <div class="col-sm-9">
                              <label class="col-sm-3 col-form-label">Sáng</label>
                              <input type="text" style="padding:15px;width: 40px;display:inline" name="morning[]" class="form-control" value="0"/>
                              <label class="col-sm-3 col-form-label" style="margin-left:3px">Trưa</label>
                              <input type="text" style="padding:15px;width: 40px;display:inline" name="noon[]" class="form-control" value="0"/>
                              <label class="col-sm-3 col-form-label" style="margin-left:1px">Chiều</label>
                              <input type="text" style="padding:15px;width: 40px;display:inline" name="afternoon[]" class="form-control" value="0"/>
                              <label class="col-sm-3 col-form-label" style="margin-left:2px">Tối</label>
                              <input type="text" style="padding:15px;width: 40px;display:inline" name="night[]" class="form-control" value="0"/>
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <center>
                    <input type="button" onclick="add_more_field()"  id="add_more_medi" class="btn btn-success" value="+" name="add_more_medi" style="margin-top:20px; margin-right:20px;width:40px"/>
                    <input type="button" onclick="remove_field()"  id="remove_medi" class="btn btn-danger" value="-" name="remove_medi" style="margin-top:20px;width:40px"/>
                  </center>
                  <hr>
                    <center><button type="submit" name="submit" class="btn btn-primary me-2">Thêm đơn thuốc</button></center>
                  </form>
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
              function recheckFunction()
              {
                // console.log('hello');
                text='<input type="date" class="form-control timepicker" name="recheck"/>';
                $('#show_recheck').html(text);
              }
            </script>
@endsection