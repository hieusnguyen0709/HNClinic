@extends('admin.index')
@section('admin_content')
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Thêm loại xét nghiệm</h4>
                  <form method="post" role="form" action="{{URL::to('/admin/kt-them-loai-xet-nghiem')}}" enctype="multipart/form-data" class="form-sample">
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
                            <input type="text" class="form-control timepicker" name="name_type"/>
                          </div>
                        </div>
                      </div>
                    </div>

                    <center><button type="submit" name="submit" class="btn btn-primary me-2">Thêm loại xét nghiệm</button></center>
                  </form>
                </div>
              </div>
            </div>
@endsection