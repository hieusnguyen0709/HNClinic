@extends('admin.index')
@section('admin_content')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Danh sách bệnh nhân</h4>
                  <form action="{{URL::to('admin/danh-sach-benh-nhan')}}" style="display:inline; float:right">
                      <input type="search" class="form-control" name="timkiem" placeholder="Nhập từ khóa" style="width:150px;display:inline">
                      <input type="submit" value="Tìm kiếm" class="btn btn-primary" style="margin-bottom:7px">
                  </form>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Mã bệnh nhân
                          </th>
                          <th>
                            Ảnh đại diện
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Họ tên
                          </th>
                          <th>
                            Giới tính
                          </th>
                          <th>
                            Số điện thoại
                          </th>

                          <th>
                            Thao tác
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                     @foreach($show_list_patient as $key => $patient)
                        <tr>
                          <td>PT-{{$patient->id}}</td>
                          <td class="py-1">
                          <img src="<?php echo url('/'); ?>/upload_images/{{$patient->picture }}" width="50px" height="50">
                          </td>
                          <td>
                            {{$patient->email }}
                          </td>
                          <td>
                            {{$patient->first_name }} {{$patient->last_name }}
                          </td>
                          <td>
                            <div>
                              <?php
                                if($patient->gender==0)
                                {
                                  echo 'Nam';
                                }
                                else
                                {
                                  echo 'Nữ';
                                }
                              ?>
                            </div>
                          </td>
                          <td>
                          {{$patient->phone }}
                          </td>

                          <td>
                            <a href="{{URL::to('/admin/chi-tiet-benh-nhan/'.$patient->id)}}">Xem</a> |
                            <a href="{{URL::to('/admin/sua-benh-nhan/'.$patient->id)}}">Sửa</a> |
                            <a href="{{URL::to('/admin/xoa-benh-nhan/'.$patient->id)}}">Xóa</a>
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