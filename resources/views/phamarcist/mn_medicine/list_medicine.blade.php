@extends('phamarcist.index')
@section('phamarcist_content')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Danh sách thuốc</h4>
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
                            Tên thuốc
                        </th>
                        <th>
                            Đơn vị
                        </th>
                          <th>
                            số lượng
                          </th>
                          <th>
                            Loại
                          </th>
                          <th>
                            Cách dùng
                          </th>
                          <th>
                            Thao tác
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($show_list_medicine as $key => $medicine)
                        <tr>
                          <td class="py-1">
                            {{$medicine->name}}
                          </td>
                          <td>
                            {{$medicine->unit}}
                          </td>
                            <td>
                            {{$medicine->quantity}}
                            </td>
                          <td>
                            {{$medicine->category}}
                          </td>
                          <td>
                            {{$medicine->instruction}}
                          </td>
                          <td>
                            <a href="{{URL::to('/duoc-si/sua-thuoc/'.$medicine->id)}}">Sửa</a> |
                            <a href="{{URL::to('/duoc-si/xoa-thuoc/'.$medicine->id)}}">Xóa</a>
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