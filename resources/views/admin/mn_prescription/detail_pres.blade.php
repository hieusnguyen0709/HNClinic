@extends('admin.index')
@section('admin_content')
              <!-- Thông tin bệnh nhân -->
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Thông tin bệnh nhân</h4>
                    @foreach($info_patient as $key => $info)
                      <div class="row" id="add_medicine">
                        <div class="col-md-6">
                          <div class="form-group row" >
                              <label class="col-sm-3 col-form-label">Tên</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control timepicker" value="{{$info->last_name}}" readonly/>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Mã bệnh nhân</label>
                              <div class="col-sm-9">
                              <input type="text" class="form-control timepicker" value="PT-1999" readonly/>
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="row" id="add_medicine">
                        <div class="col-md-6">
                          <div class="form-group row" >
                              <label class="col-sm-3 col-form-label">Ngày sinh</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control timepicker" value="{{$info->birth_date}}" readonly/>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Giới tính</label>
                              <div class="col-sm-9">
                                @if($info->gender == 0)
                                  <input type="text" class="form-control timepicker" value="Nam" readonly/>
                                @else
                                  <input type="text" class="form-control timepicker" value="Nữ" readonly/>
                                @endif
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="row" id="add_medicine">
                        <div class="col-md-6">
                          <div class="form-group row" >
                              <label class="col-sm-3 col-form-label">Địa chỉ</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control timepicker" value="{{$info->address}}" readonly/>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Email</label>
                              <div class="col-sm-9">
                              <input type="text" class="form-control timepicker" value="{{$info->email}}" readonly/>
                              </div>
                            </div>
                          </div>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
              <!-- Thông tin bệnh nhân -->

            <!-- Đơn thuốc -->
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Đơn thuốc</h4>
                    @foreach($detail_pres as $key =>$pres)
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Mã cuộc hẹn</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control timepicker" value="{{$pres->appointment_code}}" readonly/>
                          </div>
                        </div>
                      </div>
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
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tái khám</label>
                            <div class="col-sm-9">
                            @if($pres->recheck != 0)
                              <input type="text" class="form-control timepicker" value="{{$pres->recheck}}" readonly/>
                            @else
                              <input type="text" class="form-control timepicker" value="Không tái khám" readonly/>
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    <hr>
                    <center><h4 class="card-title">Thuốc</h4></center>
                    @foreach($medicine_instruction as $key => $m_i)
                  <div id="more_medicine">
                    <div style="border:1px solid black; padding:10px; border-radius:10px; margin:10px;" id="add_medicine">

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row" >
                              <label class="col-sm-3 col-form-label">Thuốc</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control timepicker" value="{{$m_i->name}}" readonly/>
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
                    @if($pres->require_testing == 0)
                      <center>
                        <a href="{{URL::to('/admin/lich-da-kham/')}}" class="btn btn-primary">Quay lại</a>
                      </center><br>
                      <center>
                        <a href="{{URL::to('/admin/yeu-cau-xet-nghiem-don-thuoc/'.$pres->schedule_id)}}" class="btn btn-dark">Yêu cầu xét nghiệm</a>
                      </center>
                    @endif

                </div>
              </div>
            </div>
            <!-- Đơn thuốc -->

           @foreach($detail_pres as $key =>$pres)
            @if($pres->require_testing == 1)
            <!-- Kết quả xét nghiệm -->
            <div class="col-12 grid-margin">
              <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Xét nghiệm</h4>
                    @foreach($detail_test as $key => $test)
                    <div id="more_medicine">
                      <div class="row" id="add_medicine">
                        <div class="col-md-6">
                          <div class="form-group row" >
                              <label class="col-sm-3 col-form-label">Loại xét nghiệm</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control timepicker" value="{{$test->name_type}}" readonly/>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Kết quả</label>
                              <div class="col-sm-9">
                                @if($test->result != '0')
                                  <a href="{{URL::to('/download/'.$test->result)}}" class="btn btn-light" style="width:150px; border:1px solid black">Tải về</a>
                                @else
                                  <input type="button" value="Chờ xét nghiệm" class="btn btn-primary" style="width:150px;"/>
                                @endif
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>
                      @endforeach
                      <center><a href="{{URL::to('/admin/lich-da-kham/')}}" class="btn btn-primary">Quay lại</a></center>
                  </div>
                </div>
            </div>
              <!-- Kết quả xét nghiệm -->
            @endif
           @endforeach
@endsection