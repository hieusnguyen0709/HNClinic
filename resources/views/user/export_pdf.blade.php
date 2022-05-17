<!DOCTYPE html>
<html lang="en">
<head>
    <title>HNClinic</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link type="image/png" rel="shortcut icon" href="/images_user/logo.jpg"/>

    <link rel="stylesheet" href="/css_user/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/css_user/animate.css">
    
    <link rel="stylesheet" href="/css_user/owl.carousel.min.css">
    <link rel="stylesheet" href="/css_user/owl.theme.default.min.css">
    <link rel="stylesheet" href="/css_user/magnific-popup.css">

    <link rel="stylesheet" href="/css_user/aos.css">

    <link rel="stylesheet" href="/css_user/ionicons.min.css">

    <link rel="stylesheet" href="/css_user/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/css_user/jquery.timepicker.css">

    
    <link rel="stylesheet" href="/css_user/flaticon.css">
    <link rel="stylesheet" href="/css_user/icomoon.css">
    <link rel="stylesheet" href="/css_user/style.css">

</head>
<body style="font-family: DejaVu Sans;">
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
                            <input type="text" class="form-control timepicker" value="PT-1999" readonly/>
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
                </div><br>
                    <br>
                </div>
              </div>
            </div>
</center>
<br>
<br>
<script src="/js_user/jquery.min.js"></script>
<script src="/js_user/jquery-migrate-3.0.1.min.js"></script>
<script src="/js_user/popper.min.js"></script>
<script src="/js_user/bootstrap.min.js"></script>
<script src="/js_user/jquery.easing.1.3.js"></script>
<script src="/js_user/jquery.waypoints.min.js"></script>
<script src="/js_user/jquery.stellar.min.js"></script>
<script src="/js_user/owl.carousel.min.js"></script>
<script src="/js_user/jquery.magnific-popup.min.js"></script>
<script src="/js_user/aos.js"></script>
<script src="/js_user/jquery.animateNumber.min.js"></script>
<script src="/js_user/bootstrap-datepicker.js"></script>
<script src="/js_user/jquery.timepicker.min.js"></script>
<script src="/js_user/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="/js_user/google-map.js"></script>
<script src="/js_user/main.js"></script>

</body>
</html>