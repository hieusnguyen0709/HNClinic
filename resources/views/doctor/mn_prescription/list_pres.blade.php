@extends('doctor.index')
@section('doctor_content')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Danh sách đơn thuốc</h4>
                  <?php
                         $message = Session::get('message');
                         if($message)
                         {
                             echo '<center><span class="text-success">'.$message.'</span></center>';
                             Session::put('message',null);
                         }
                      ?>
                    </p>
                  <!-- <input type="date" style="width:150px;display:inline; margin-left:10px" name="date" id="date" class="form-control" onchange="dateFunction()"> -->
                  <form action="{{URL::to('bac-si/danh-sach-don-thuoc')}}" style="display:inline; float:right">
                      <input type="search" class="form-control" name="timkiem" placeholder="Nhập từ khóa" style="width:150px;display:inline">
                      <input type="submit" value="Tìm kiếm" class="btn btn-primary" style="margin-bottom:7px">
                  </form>
                  <div id="show_filter">
                      @include('doctor.mn_prescription.filter_list_pres')
                  </div>
                </div>
              </div>
            </div>
@endsection