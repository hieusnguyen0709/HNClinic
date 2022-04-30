@extends('user.index')
@section('user_content')
<div class="form-group">
          <label class="text-black">Option</label>
          <select class="form-control" name="doctor_id" id="get_schedule" onchange="myFunction()">
            	<option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
          </select>
		  
        </div>

<script>
	function myFunction()
	{
		var select = document.getElementById('get_schedule');
		var value = select.options[select.selectedIndex].value;
        console.log(value);
			$.ajax({
			url:"{{URL::to('/lich-bac-si')}}",
			method:"GET",
			data:{option:value},
			success:function(data)
			{
				if(data!=''){
					$("#day_picker").html("");
					$("#day_picker").html(data);
					console.log(value);
				}
			}
			});
	}
</script>
@endsection