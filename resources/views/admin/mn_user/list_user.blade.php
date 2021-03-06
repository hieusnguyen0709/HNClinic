@extends('admin.index')
@section('admin_content')
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
                  <h4 class="card-title">Danh sách tài khoản</h4>
                    <select class="form-control" style="width:150px;display:inline" name="filter" id="filter" onchange="filterFunction()">
                      <option disabled selected hidden>Chức vụ</option>
                      <option value="Khách hàng">Khách hàng</option>
                      <option value="1">Quản trị viên</option>
                      <option value="2">Nhân viên y tế</option>
                      <option value="3">Bác sĩ xét nghiệm</option>
                      <option value="4">Bác sĩ</option>
                      <option value="5">Dược sĩ</option>
                    </select>
                    <form action="{{URL::to('admin/danh-sach-nguoi-dung')}}" style="display:inline; float:right">
                      <input type="search" class="form-control" name="timkiem" placeholder="Nhập từ khóa" style="width:150px;display:inline">
                      <input type="submit" value="Tìm kiếm" class="btn btn-primary" style="margin-bottom:7px">
                    </form>
                    <div id="show_filter">
                      @include('admin.mn_user.filter_list_user')
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
			url:"{{URL::to('/admin/danh-sach-nguoi-dung')}}",
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