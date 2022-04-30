<label class="text-black">Ngày làm</label>
<div style="border:1px solid black;padding-top:16px;border-radius:5px;">
	<ul>
		@foreach($doctor_schedule as $key => $info_schedule)
			<li style="display:inline;margin:5px; border:1px solid black; border-radius:5px;padding:1px;">
				{{$info_schedule->date}}<input type="radio" name="date" value="{{$info_schedule->date}}" style="margin-left:5px;margin-top:3px;">
			</li>
		@endforeach
	</ul>
</div>