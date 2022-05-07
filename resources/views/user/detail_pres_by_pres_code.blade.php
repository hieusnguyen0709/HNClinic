@extends('user.index')
@section('user_content')
<br>
<br>
<br>
<br>
<br>
<center>
<div class="col-10 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h1 class="card-title" style="float:left">Chi tiết đơn thuốc</h1>
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
                          <label class="col-sm-3 col-form-label">Ngày</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control timepicker" value="{{$pres->date}}" readonly/>
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
                    <div id="more_medicine">
                    @foreach($medicine_instruction as $key =>$m_i)
                    <div class="row" id="add_medicine">
                      <div class="col-md-6">
                      <div class="form-group row" >
                          <label class="col-sm-3 col-form-label">Thuốc</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control timepicker" value="{{$m_i->name}}" readonly/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group row" >
                          <label class="col-sm-3 col-form-label">Cách dùng</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control timepicker" value="{{$pres->pre_instruction}}" readonly/>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                    @endforeach
                    <center><a href="{{URL::to('/lich-su-kham')}}" class="btn btn-primary">Quay lại</a></center>
                    <br>
                </div>
              </div>
            </div>
</center>
<br>
<br>
@endsection