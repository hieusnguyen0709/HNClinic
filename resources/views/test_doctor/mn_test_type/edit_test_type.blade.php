@extends('test_doctor.index')
@section('test_doctor_content')
<div class="col-12 grid-margin">
              <div class="card">
                  @foreach($edit_test_type as $key => $test_type)
                <div class="card-body">
                  <h4 class="card-title">Sửa loại xét nghiệm</h4>
                  <form method="post" role="form" action="{{URL::to('/admin/kt-sua-loai-xet-nghiem/'.$test_type->id_test_type)}}" enctype="multipart/form-data" class="form-sample">
                  {{ csrf_field() }}
                    <p class="card-description">
                    <?php
                         $message = Session::get('message');
                         if($message)
                         {
                             echo '<center><span class="text-success">'.$message.'</span></center>';
                             Session::put('message',null);
                         }
                      ?>
                    </p>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tên loại</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control timepicker" name="name_type" value="{{$test_type->name_type}}"/>
                          </div>
                        </div>
                      </div>
                    </div>

                    <center><button type="submit" name="submit" class="btn btn-primary me-2">Sửa loại xét nghiệm</button></center>
                  </form>
                  @endforeach
                </div>
              </div>
            </div>
@endsection