@extends('receptionist.index')
@section('receptionist_content')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Danh sách lịch hẹn</h4>
                  <?php
                         $message = Session::get('message');
                         if($message)
                         {
                             echo '<center><span class="text-success">'.$message.'</span></center>';
                             Session::put('message',null);
                         }
                      ?>
                    </p>
                    <select class="form-control" style="width:150px;display:inline;" name="filter" id="filter" onchange="filterFunction()">
                      <option disabled selected hidden>Trạng thái</option>
                      <option value="Chờ duyệt">Chờ duyệt</option>
                      <option value="1">Đã duyệt</option>
                      <option value="2">Đã khám</option>
                      <option value="3">Đã hủy</option>
                    </select>
                    <!-- <input type="date" style="width:150px;display:inline; margin-left:10px" name="date" id="date" class="form-control" onchange="dateFunction()"> -->
                    <form action="{{URL::to('nhan-vien-y-te/danh-sach-lich-hen')}}" style="display:inline; float:right">
                      <input type="search" class="form-control" name="timkiem" placeholder="Nhập từ khóa" style="width:150px;display:inline">
                      <input type="submit" value="Tìm kiếm" class="btn btn-primary" style="margin-bottom:7px">
                    </form>
                    <div id="show_filter">
                         @include('receptionist.mn_appointment.filter_list_appointment')
                    </div>
                </div>
              </div>
            </div>
<script>
      function filterFunction()
      {
        var select = document.getElementById('filter');
        var value = select.options[select.selectedIndex].value;
        $.ajaxSetup({
          headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
        $.ajax({
          url:"{{URL::to('/nhan-vien-y-te/danh-sach-lich-hen')}}",
          type:"GET",
          data:{option:value},
          success:function(data)
          {
            console.log(value);
            $("#show_filter").html(data);
          }
          });

      }
</script>
@endsection