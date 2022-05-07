@extends('receptionist.index')
@section('receptionist_content')
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Sửa lịch hẹn</h4>
                  @foreach($edit_appointment as $key => $appointment)
                  <form method="post" role="form" action="{{URL::to('/nhan-vien-y-te/kt-sua-lich-hen/'.$appointment->schedule_id)}}" enctype="multipart/form-data" class="form-sample">
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
                        <div class="form-group row" >
                          <div class="form-group">
                            <label class="text-black">Mã lịch hẹn<span id="show_date"><input type="text" value="{{$appointment->appointment_code}}" name="appointment_code" readonly required style="border:1px solid white;font-size:17px;font-weight:bold; margin-left:75px"></span></label><br>
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
                                <option value="{{$appointment->patient_id}}" selected>{{App\Models\User::where('id',$appointment->patient_id)->value('last_name')}}</option>
                                @foreach($info_patient as $key => $patient)
                                  <option value="{{$patient->id}}">{{$patient->last_name}}</option>
                                @endforeach
                          </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="email" value="{{$appointment->email}}"/>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Ngày sinh</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" name="birth_date" value="{{$appointment->birth_date}}"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Số điện thoại</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="phone" value="{{$appointment->phone}}"/>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Giới tính</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="gender">
                                @if($appointment->gender == 0)
                                    <option value="1">Nữ</option>
                                    <option value="0" selected>Nam</option>
                                @else
                                    <option value="1" selected>Nữ</option>
                                    <option value="0">Nam</option>
                                @endif
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Triệu chứng</label>
                          <div class="col-sm-9">
                            <textarea name="symptoms" class="form-control">{{$appointment->symptoms}} </textarea>
                          </div>
                       </div>
                      </div>
                    </div>

                   <hr style="border:1px dashed black;">

                    <div class="row">
                      <div class="col-md-6">
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Bác sĩ</label>
                          <div class="col-sm-9">
                          <select class="form-control" name="doctor_id" id="get_schedule" onchange="scheduleFunction()" required>
                                <option value="{{$appointment->doctor_id}}" selected>{{App\Models\User::where('id',$appointment->doctor_id)->value('last_name')}}</option>
                                @foreach($info_doctor as $key => $doctor)
                                  <option value="{{$doctor->id}}">{{$doctor->last_name}}</option>
                                @endforeach
                          </select>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row" >
                          <div class="form-group">
                            <label class="text-black">Ngày<span id="show_day"><input type="text" date="{{$appointment->date}}" value="{{$appointment->date}}" name="date" readonly required style="border:1px solid white;font-size:17px;font-weight:bold; margin-left:108px"></span></label><br>
                              @include('admin.mn_appointment.schedule')
                              
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                      <div class="form-group row">
                      <div class="form-group">
                        <label class="text-black">Giờ<span id="get_time"><input type="text" value="{{$appointment->time}}" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold; margin-left:118px"></span></label><br>
                        <table style="margin-left:135px;">
                          <tbody>
                            <tr>
                              <td><input type="button" value="08:00 - 08:30" class="btn btn-success" style="padding:5px; margin:5px;" id="time" onclick="timeFunction()"></td>
                              <td><input type="button" value="08:30 - 09:00" class="btn btn-success" style="padding:5px; margin:5px;" id="time2" onclick="timeFunction2()"></td>
                              <td><input type="button" value="09:00 - 09:30" class="btn btn-success" style="padding:5px; margin:5px;" id="time3" onclick="timeFunction3()"></td>
                              <td><input type="button" value="09:30 - 10:00" class="btn btn-success" style="padding:5px; margin:5px;" id="time4" onclick="timeFunction4()"></td>
                            </tr>
                            <tr>
                              <td><input type="button" value="10:00 - 10:30" class="btn btn-success" style="padding:5px; margin:5px;" id="time5" onclick="timeFunction5()"></td>
                              <td><input type="button" value="10:30 - 11:00" class="btn btn-success" style="padding:5px; margin:5px;" id="time6" onclick="timeFunction6()"></td>
                              <td><input type="button" value="11:00 - 11:30" class="btn btn-success" style="padding:5px; margin:5px;" id="time7" onclick="timeFunction7()"></td>
                              <td><input type="button" value="11:30 - 12:00" class="btn btn-success" style="padding:5px; margin:5px;" id="time8" onclick="timeFunction8()"></td>
                            </tr>
                            <tr>
                              <td><input type="button" value="13:00 - 13:30" class="btn btn-success" style="padding:5px; margin:5px;" id="time9" onclick="timeFunction9()"></td>
                              <td><input type="button" value="13:30 - 14:00" class="btn btn-success" style="padding:5px; margin:5px;" id="time10" onclick="timeFunction10()"></td>
                              <td><input type="button" value="14:00 - 14:30" class="btn btn-success" style="padding:5px; margin:5px;" id="time11" onclick="timeFunction11()"></td>
                              <td><input type="button" value="14:30 - 15:00" class="btn btn-success" style="padding:5px; margin:5px;" id="time12" onclick="timeFunction12()"></td>
                            </tr>
                            <tr>
                              <td><input type="button" value="15:00 - 15:30" class="btn btn-success" style="padding:5px; margin:5px;" id="time13" onclick="timeFunction13()"></td>
                              <td><input type="button" value="15:30 - 16:00" class="btn btn-success" style="padding:5px; margin:5px;" id="time14" onclick="timeFunction14()"></td>
                              <td><input type="button" value="16:00 - 16:30" class="btn btn-success" style="padding:5px; margin:5px;" id="time15" onclick="timeFunction15()"></td>
                              <td><input type="button" value="16:30 - 17:00" class="btn btn-success" style="padding:5px; margin:5px;" id="time16" onclick="timeFunction16()"></td>
                            </tr>
                          </tbody>
                        </table>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Trạng thái</label>
                          <div class="col-sm-9">
                          @if($appointment->status == 0)
                              <select class="form-control" name="status">
                                    <option value="0" selected>Chờ duyệt</option>
                                    <option value="1">Duyệt</option>
                                    <option value="2">Đã khám</option>
                                    <option value="3">Hủy</option>
                              </select>
                              @endif
                              @if($appointment->status == 1)
                              <select class="form-control" name="status">
                                    <option value="0">Chờ duyệt</option>
                                    <option value="1" selected>Duyệt</option>
                                    <option value="2">Đã khám</option>
                                    <option value="3">Hủy</option>
                              </select>
                              @endif
                              @if($appointment->status == 2)
                              <select class="form-control" name="status">
                                    <option value="0">Chờ duyệt</option>
                                    <option value="1">Duyệt</option>
                                    <option value="2" selected>Đã khám</option>
                                    <option value="3">Hủy</option>
                              </select>
                              @endif
                              @if($appointment->status == 3)
                              <select class="form-control" name="status">
                                    <option value="0">Chờ duyệt</option>
                                    <option value="1">Duyệt</option>
                                    <option value="2">Đã khám</option>
                                    <option value="3" selected>Hủy</option>
                              </select>
                              @endif
                          </div>
                        </div>
                      </div>
                    </div>
                    <center><button type="submit" name="submit" class="btn btn-primary me-2">Cập nhật lịch hẹn</button></center>

                  </form>
                  <script>
                    	function scheduleFunction()
                      {
                        var select = document.getElementById('get_schedule');
                        var value = select.options[select.selectedIndex].value;
                        // console.log(value);
                        $.ajaxSetup({
                          headers: {
                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                          });
                        $.ajax({
                          url:"{{URL::to('/nhan-vien-y-te/sua-lich-hen/'.$appointment->schedule_id)}}",
                          type:"GET",
                          data:{option:value},
                          success:function(data)
                          {
                            $("#show_schedule").html(data);
                          }
                          });
                      }
                  </script>
                  @endforeach
                </div>
              </div>
            </div>

<script type="text/javascript">


  function timeFunction()
	{
		var time = document.getElementById('time').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold; margin-left:118px">'
		$('#get_time').html(text);
	}
	function timeFunction2()
	{
		var time = document.getElementById('time2').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold; margin-left:118px">'
		$('#get_time').html(text);
	}
	function timeFunction3()
	{
		var time = document.getElementById('time3').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold; margin-left:118px">'
		$('#get_time').html(text);
	}
	function timeFunction4()
	{
		var time = document.getElementById('time4').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold; margin-left:118px">'
		$('#get_time').html(text);
	}
	function timeFunction5()
	{
		var time = document.getElementById('time5').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold; margin-left:118px">'
		$('#get_time').html(text);
	}
	function timeFunction6()
	{
		var time = document.getElementById('time6').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold; margin-left:118px">'
		$('#get_time').html(text);
	}
	function timeFunction7()
	{
		var time = document.getElementById('time7').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold; margin-left:118px">'
		$('#get_time').html(text);
	}
	function timeFunction8()
	{
		var time = document.getElementById('time8').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold; margin-left:118px">'
		$('#get_time').html(text);
	}
	function timeFunction9()
	{
		var time = document.getElementById('time9').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold; margin-left:118px">'
		$('#get_time').html(text);
	}
	function timeFunction10()
	{
		var time = document.getElementById('time10').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold; margin-left:118px">'
		$('#get_time').html(text);
	}
	function timeFunction11()
	{
		var time = document.getElementById('time11').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold; margin-left:118px">'
		$('#get_time').html(text);
	}
	function timeFunction12()
	{
		var time = document.getElementById('time12').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold; margin-left:118px">'
		$('#get_time').html(text);
	}
	function timeFunction13()
	{
		var time = document.getElementById('time13').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold; margin-left:118px">'
		$('#get_time').html(text);
	}
	function timeFunction14()
	{
		var time = document.getElementById('time14').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold; margin-left:118px">'
		$('#get_time').html(text);
	}
	function timeFunction15()
	{
		var time = document.getElementById('time15').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold; margin-left:118px">'
		$('#get_time').html(text);
	}
	function timeFunction16()
	{
		var time = document.getElementById('time16').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold; margin-left:118px">'
		$('#get_time').html(text);
	}

  $('body').on('click', '#get_date', function()
  {
    let date = $(this).attr("date");
    console.log(date);
		let text = '<input type="text" value="'+date+'" name="date" date="'+date+'" readonly required style="border:1px solid white;font-size:17px;font-weight:bold; margin-left:105px">'
		$('#show_day').html(text);
   });

</script>
@endsection