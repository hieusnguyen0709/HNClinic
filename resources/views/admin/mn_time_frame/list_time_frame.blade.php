@extends('admin.index')
@section('admin_content')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Danh sách khung giờ</h4>
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
                            Ca làm việc
                        </th>
                        <th>
                            Thời gian bắt đầu
                        </th>
                          <th>
                            Thời gian kết thúc
                          </th>
                          <th>
                            Thao tác
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($show_list_time_frame as $key => $time_frame)
                        <tr>
                          <td>
                            {{$time_frame->frame_name}}
                          </td>
                            <td>
                            {{$time_frame->start_time}}
                            </td>
                          <td>
                            {{$time_frame->end_time}}
                          </td>
                          <td>
                            <a href="{{URL::to('/admin/sua-khung-gio/'.$time_frame->id)}}">Sửa</a> |
                            <a href="{{URL::to('/admin/xoa-khung-gio/'.$time_frame->id)}}">Xóa</a>
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