@extends('test_doctor.index')
@section('test_doctor_content')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Danh sách loại xét nghiệm</h4>
                  <?php
                         $message = Session::get('message');
                         if($message)
                         {
                             echo '<center><span class="text-success">'.$message.'</span></center>';
                             Session::put('message',null);
                         }
                      ?>
                    </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                        <th>
                            Tên loại
                        </th>
                        <th>
                            Thao tác
                        </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($show_list_test_type as $key => $test_type)
                        <tr>
                          <td>
                            {{$test_type->name_type}}
                          </td>
                          <td>
                            <a href="{{URL::to('/bac-si-xet-nghiem/sua-loai-xet-nghiem/'.$test_type->id_test_type)}}">Sửa</a> |
                            <a href="{{URL::to('/bac-si-xet-nghiem/xoa-loai-xet-nghiem/'.$test_type->id_test_type)}}">Xóa</a>
                          </td>
                        </tr>
                       @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
@endsection