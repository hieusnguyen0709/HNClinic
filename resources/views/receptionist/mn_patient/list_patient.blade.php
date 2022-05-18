@extends('receptionist.index')
@section('receptionist_content')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Danh sách người dùng</h4>
                  <p class="card-description">
                    Thông tin người dùng
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Ảnh đại diện
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
                            Địa chỉ
                          </th>
                          <th>
                            Thao tác
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                     @foreach($show_list_patient as $key => $patient)
                        <tr>
                          <td class="py-1">
                          <img src="<?php echo url('/'); ?>/upload_images/{{$patient->picture }}" width="50px" height="50">
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
                          {{$patient->address }}
                          </td>
                          <td>
                            <a href="{{URL::to('/nhan-vien-y-te/chi-tiet-benh-nhan/'.$patient->id)}}">Xem</a> |
                            <a href="{{URL::to('/nhan-vien-y-te/sua-benh-nhan/'.$patient->id)}}">Sửa</a> |
                            <a href="{{URL::to('/nhan-vien-y-te/xoa-benh-nhan/'.$patient->id)}}">Xóa</a>
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