@extends('admin.index')
@section('admin_content')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Danh sách lịch làm</h4>
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
                      <option disabled selected hidden>Toàn bộ</option>
                      @foreach($show_list_doctor as $key => $doctor)
                        <option value="{{$doctor->id}}">{{$doctor->last_name}}</option>
                      @endforeach
                    </select>
                  <div id="show_filter">
                         @include('admin.mn_schedule.filter_list_schedule')
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
        url:"{{URL::to('/admin/danh-sach-lich-lam')}}",
        type:"GET",
        data:{option:value},
        success:function(data)
        {
          // console.log(value);
          $("#show_filter").html(data);
        }
        });

    }
    </script>
@endsection