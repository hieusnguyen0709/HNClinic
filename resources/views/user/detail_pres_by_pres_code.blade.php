@extends('user.index')
@section('user_content')
<br>
<br>
<br>
<br>
<br>
@foreach($detail_pres_by_pres_code as $key =>$pres)
<a href="{{URL::to('/export_pdf/'.$pres->pre_code)}}" class="btn btn-danger" style="margin-left:250px;">Export PDF</a>
@endforeach
<br>
<br>
<center>

<div class="col-8 grid-margin" style="border:3px solid black">
              <div class="card">
                <div class="card-body">
                  <h1 class="card-title" style="float:left;color:blue">CHI TIẾT ĐƠN THUỐC</h1>
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
                    @foreach($info_patient as $key => $patient)
                    <hr style="clear:both">
                    <center><h4 class="card-title" style="color:green">THÔNG TIN BỆNH NHÂN</h4></center>
                    <div class="row" style="clear:both">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tên</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control timepicker" value="{{$patient->last_name}}" readonly/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Mã bệnh nhân</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control timepicker" value="PT-{{$patient->id}}" readonly/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Ngày sinh</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control timepicker" value="{{$patient->birth_date}}" readonly/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Giới tính</label>
                          <div class="col-sm-9">
                            @if($patient->gender == 0)
                              <input type="text" class="form-control timepicker" value="Nam" readonly/>
                            @else
                              <input type="text" class="form-control timepicker" value="Nữ" readonly/>
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Địa chỉ</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control timepicker" value="{{$patient->address}}" readonly/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control timepicker" value="{{$patient->email}}" readonly/>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    <hr>
                    <center><h4 class="card-title" style="color:green">THÔNG TIN ĐƠN THUỐC</h4></center>
                    @foreach($detail_pres_by_pres_code as $key =>$pres)
                    <div class="row" style="clear:both">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Mã đơn thuốc</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control timepicker" value="{{$pres->pre_code}}" readonly/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tái khám</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control timepicker" value="{{$pres->recheck}}" readonly/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Bệnh nhân</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control timepicker" value="{{App\Models\User::where('id',$pres->patient_id)->value('last_name')}}" readonly/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Bác sĩ</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control timepicker" value="{{App\Models\User::where('id',$pres->doctor_id)->value('last_name')}}" readonly/>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Ngày khám</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control timepicker" value="{{$pres->date}}" readonly/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Triệu chứng</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control timepicker" value="{{$pres->symptoms}}" readonly/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Lời khuyên</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control timepicker" value="{{$pres->advice}}" readonly/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Chẩn đoán</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control timepicker" value="{{$pres->diagnosis}}" readonly/>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    <hr>
                    <center><h4 class="card-title" style="color:green">THUỐC</h4></center>
                    @foreach($medicine_instruction as $key => $m_i)
                  <div id="more_medicine">
                    <div style="border:1px solid black; padding:10px; border-radius:10px; margin:10px;" id="add_medicine">

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row" >
                              <label class="col-sm-3 col-form-label" >Thuốc</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control timepicker" value="{{$m_i->name}} ({{$m_i->unit}})" readonly/>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Cách dùng</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control timepicker" value="{{$m_i->pre_instruction}}" readonly/>
                              </div>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row" >
                              <label class="col-sm-3 col-form-label">Số lượng</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control timepicker" value="{{$m_i->pre_quantity}}" readonly/>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Số ngày uống</label>
                              <div class="col-sm-9">
                              <input type="text" class="form-control timepicker" value="{{$m_i->total_days}}" readonly/>
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
                              <input type="text" style="padding:15px;width: 40px;display:inline" class="form-control" value="{{$m_i->morning}}" readonly/>
                              <label class="col-sm-3 col-form-label" style="margin-left:3px">Trưa</label>
                              <input type="text" style="padding:15px;width: 40px;display:inline" class="form-control" value="{{$m_i->noon}}" readonly/>
                              <label class="col-sm-3 col-form-label" style="margin-left:1px">Chiều</label>
                              <input type="text" style="padding:15px;width: 40px;display:inline" class="form-control" value="{{$m_i->afternoon}}" readonly/>
                              <label class="col-sm-3 col-form-label" style="margin-left:2px">Tối</label>
                              <input type="text" style="padding:15px;width: 40px;display:inline" class="form-control" value="{{$m_i->night}}" readonly/>
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  <hr>
                  <div class="card">
                  <div class="card-body">
                    <h1 class="card-title" style="float:left; color:blue">XÉT NGHIỆM</h1>
                    @foreach($detail_test as $key => $test)
                    <div id="more_medicine" style="clear:both">
                      <div class="row" id="add_medicine">
                        <div class="col-md-6">
                          <div class="form-group row" >
                              <label class="col-sm-3 col-form-label">Loại</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control timepicker" value="{{$test->name_type}}" readonly/>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Kết quả</label>
                              <div class="col-sm-9">
                                  <a href="{{URL::to('/download/'.$test->result)}}" class="btn btn-light" style="width:150px; border:1px solid black">Tải về</a>
                              </div>
                            </div>
                          </div>
                      </div>
                    @endforeach
                    </div>
                  </div>
                </div><br>
                    <br>
                </div>
              </div>
            </div>
</center>
<br>
<center><a href="{{URL::to('/lich-su-kham')}}" class="btn btn-primary">Quay lại</a></center>
<br>
<br>
@endsection