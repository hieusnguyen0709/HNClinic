@extends('admin.index')
@section('admin_content')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Danh sách yêu cầu xét nghiệm</h4>
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
                      <option disabled selected hidden>Loại xét nghiệm</option>
                       @foreach($show_all_test_type as $key => $test_type)
                        <option value="{{$test_type->id_test_type}}">{{$test_type->name_type}}</option>
                       @endforeach
                    </select>
                    <form action="{{URL::to('admin/yeu-cau-xet-nghiem')}}" style="display:inline; float:right">
                      <input type="search" class="form-control" name="timkiem" placeholder="Nhập từ khóa" style="width:150px;display:inline">
                      <input type="submit" value="Tìm kiếm" class="btn btn-primary" style="margin-bottom:7px">
                    </form>
                    <div id="show_filter">
                         @include('admin.mn_test.filter_list_test_result')
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
            url:"{{URL::to('/admin/yeu-cau-xet-nghiem')}}",
            type:"GET",
            data:{option:value},
            success:function(data)
            {
              $("#show_filter").html(data);
            }
            });

        }
      </script>
@endsection