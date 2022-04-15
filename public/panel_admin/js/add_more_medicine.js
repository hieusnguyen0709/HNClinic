// function add_more_field ()
// {
//     html='<div class="row"><div class="col-md-6"><div class="form-group row" ><label class="col-sm-3 col-form-label">Thuốc</label><div class="col-sm-9"><select class="form-control" name="medicine_id">@foreach($medicine as $key => $md)<option value="{{$md->id}}" >{{$md->name}}</option>@endforeach</select></div></div></div><div class="col-md-6"><div class="form-group row"><label class="col-sm-3 col-form-label">Cách dùng</label><div class="col-sm-9"><input type="text" class="form-control timepicker" name="instruction"/></div></div></div></div>';
//     var form = document.getElementById('add_medi')
//     form.innerHTML+=html
// }