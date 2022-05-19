@extends('doctor.index')
@section('doctor_content')
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Sửa đơn thuốc</h4>
                  @foreach($detail_pres_by_pres_code as $key =>$pres)
                  <form method="post" role="form"  action="{{URL::to('/bac-si/kt-sua-don-thuoc/'.$pres->pre_code_medicine_prescription)}}" enctype="multipart/form-data" class="form-sample">
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
                          <label class="col-sm-3 col-form-label">Mã đơn thuốc</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control timepicker" value="{{$pres->pre_code}}" name="pre_code" readonly/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tái khám</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control timepicker" value="{{$pres->recheck}}" name="recheck"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Bệnh nhân</label>
                          <div class="col-sm-9">
                          <select class="form-control" name="patient_id">
                              <option value="{{$pres->patient_id}}" selected>{{App\Models\User::where('id',$pres->patient_id)->value('last_name')}}</option>
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
                              <option value="{{$pres->doctor_id}}" selected>{{App\Models\User::where('id',$pres->doctor_id)->value('last_name')}}</option>
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
                            <input type="date" class="form-control timepicker" name="date" value="{{$pres->date}}"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Triệu chứng</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control timepicker" name="symptoms" value="{{$pres->symptoms}}"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Lời khuyên</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control timepicker" name="advice" value="{{$pres->advice}}"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Chẩn đoán</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control timepicker"  name="diagnosis" value="{{$pres->diagnosis}}"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    <hr>
                  <center><h4 class="card-title">Thuốc</h4></center>

                  @foreach($medicine_instruction as $key => $m_i)
                  <div id="more_medicine">
                  <input type="hidden" class="form-control timepicker" name="id_pres"  value="{{$m_i->id_pres}}"/>
                    <div style="border:1px solid black; padding:10px; border-radius:10px; margin:10px;" id="add_medicine">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row" >
                              <label class="col-sm-3 col-form-label">Thuốc</label>
                              <div class="col-sm-9">
                                <select class="form-control" name="medicine_id[]">
                                  @foreach($medicine as $key => $md)
                                    <option value="{{$md->id}}" >{{$md->name}} ({{$md->unit}})</option>
                                  @endforeach
                                </select>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Cách dùng</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control timepicker" name="instruction[]" value="{{$m_i->pre_instruction}}"/>
                              </div>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row" >
                              <label class="col-sm-3 col-form-label">Số lượng</label>
                              <div class="col-sm-9">
                                <input type="number" class="form-control timepicker" name="quantity[]" value="{{$m_i->pre_quantity}}"/>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Số ngày uống</label>
                              <div class="col-sm-9">
                              <input type="number" class="form-control timepicker" name="total_days[]" value="{{$m_i->total_days}}"/>
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
                              <input type="text" style="padding:15px;width: 40px;display:inline" name="morning[]" class="form-control" value="{{$m_i->morning}}"/>
                              <label class="col-sm-3 col-form-label" style="margin-left:3px">Trưa</label>
                              <input type="text" style="padding:15px;width: 40px;display:inline" name="noon[]" class="form-control" value="{{$m_i->noon}}"/>
                              <label class="col-sm-3 col-form-label" style="margin-left:1px">Chiều</label>
                              <input type="text" style="padding:15px;width: 40px;display:inline" name="afternoon[]" class="form-control" value="{{$m_i->afternoon}}"/>
                              <label class="col-sm-3 col-form-label" style="margin-left:2px">Tối</label>
                              <input type="text" style="padding:15px;width: 40px;display:inline" name="night[]" class="form-control" value="{{$m_i->night}}"/>
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  <center>
                    <input type="button" onclick="add_more_field()"  id="add_more_medi" class="btn btn-success" value="+" name="add_more_medi" style="margin-top:20px; margin-right:20px;width:40px"/>
                    <input type="button" onclick="remove_field()"  id="remove_medi" class="btn btn-danger" value="-" name="remove_medi" style="margin-top:20px;width:40px"/>
                  </center>
                  <hr>
                    <center><button type="submit" name="submit" class="btn btn-primary me-2">Sửa đơn thuốc</button></center>
                    </form>
                    <br>
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