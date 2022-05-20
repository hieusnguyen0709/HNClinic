@extends('admin.index')
@section('admin_content')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Danh sách thuốc</h4>
                  <?php
                         $message = Session::get('message');
                         if($message)
                         {
                             echo '<center><span class="text-success">'.$message.'</span></center>';
                             Session::put('message',null);
                         }
                      ?>
                    </p>
                    <select class="form-control" style="width:150px;display:inline" name="filter" id="filter" onchange="filterFunction()">
                      <option disabled selected hidden>Loại thuốc</option>
                      <option value="Bôi">Bôi</option>
                      <option value="Uống">Uống</option>
                    </select>
                    <form action="{{URL::to('admin/danh-sach-thuoc')}}" style="display:inline; float:right">
                      <input type="search" class="form-control" name="timkiem" placeholder="Nhập từ khóa" style="width:150px;display:inline">
                      <input type="submit" value="Tìm kiếm" class="btn btn-primary" style="margin-bottom:7px">
                    </form>
                    <div id="show_filter">
                         @include('admin.mn_medicine.filter_list_medicine')
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
          url:"{{URL::to('/admin/danh-sach-thuoc')}}",
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