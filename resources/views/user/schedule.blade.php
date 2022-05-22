<label class="text-black">Ngày <span id="show_date"></span></label>
<!-- <span id="date">3</span> -->
<div>
	<ul>
		@foreach($doctor_schedule as $key => $info_schedule)
			<!-- <li style="display:inline;margin:5px; border:1px solid black; border-radius:5px;padding:1px;">
				{{$info_schedule->date}}<input type="radio" name="date" value="{{$info_schedule->date}}" style="margin-left:5px;margin-top:3px;">
			</li> -->
			<input type="button" required class="btn btn-danger" style="padding:5px; margin:5px;left" value="{{$info_schedule->date}}" id="get_date" date="{{$info_schedule->date}}">
		@endforeach
	</ul>
</div>
