<div class="col-sm-9" id="show_schedule">
    <table style="margin-left:105px;">
      <tbody>
        <tr>
        @foreach($doctor_schedule as $key => $schedule)
          <td><input type="button" class="btn btn-danger" style="margin:5px;" value="{{$schedule->date}}" id="get_date" date="{{$schedule->date}}"></td>
        @endforeach
        </tr>
      </tbody>
    </table>
</div>