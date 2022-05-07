@extends('admin.index')
@section('admin_content')
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Sửa đơn thuốc</h4>
                  @foreach($detail_pres_by_pres_code as $key =>$pres)
                  <form method="post" role="form"  action="{{URL::to('/admin/kt-sua-don-thuoc/'.$pres->pre_code_medicine_prescription)}}" enctype="multipart/form-data" class="form-sample">
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
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Bệnh nhân</label>
                          <div class="col-sm-9">
                          <select class="form-control" name="patient_id">
                              <option value="{{$pres->doctor_id}}" selected>{{App\Models\User::where('id',$pres->patient_id)->value('last_name')}}</option>
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
                    <div id="more_medicine">
                    @foreach($medicine_instruction as $key =>$m_i)
                    <div class="row" id="add_medicine">
                      <div class="col-md-6">
                      <div class="form-group row" >
                          <label class="col-sm-3 col-form-label">Thuốc</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="medicine_id[]">
                            <option value="{{$m_i->medicine_id}}" selected>{{$m_i->name}}</option>
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
                            <input type="text" class="form-control timepicker" name="instruction[]" value="{{$m_i->pre_instruction}}" style="margin-left:20px;"/>
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
                    @endforeach
                    <input type="button" onclick="add_more_field()"  id="add_more_medi" class="btn btn-success" value="Thêm thuốc" name="add_more_medi" style=" margin-left:20px; width:110px;"/>
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