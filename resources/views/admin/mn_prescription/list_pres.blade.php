@extends('admin.index')
@section('admin_content')
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
                  <form action="{{URL::to('admin/danh-sach-don-thuoc')}}" style="display:inline; float:right">
                      <input type="search" class="form-control" name="timkiem" placeholder="Nhập từ khóa" style="width:150px;display:inline">
                      <input type="submit" value="Tìm kiếm" class="btn btn-primary" style="margin-bottom:7px">
                  </form>
                  <div id="show_filter">
                      @include('admin.mn_prescription.filter_list_pres')
                  </div>
                </div>
              </div>
            </div>
<script>
      // function dateFunction()
      // {
      //   var value = document.getElementById('date').value;
      //   $.ajaxSetup({
      //     headers: {
      //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      //       }
      //     });
      //   $.ajax({
      //     url:"{{URL::to('/admin/danh-sach-don-thuoc')}}",
      //     type:"GET",
      //     data:{date:value},
      //     success:function(data)
      //     {
      //       console.log(value);
      //       // $("#show_filter").html(data);
      //     }
      //     });

      // }
</script>
@endsection