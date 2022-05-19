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
                            Chức vụ
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
                      @foreach($show_list_user as $key => $user)
                        <tr>
                          <td class="py-1">
                          <img src="<?php echo url('/'); ?>/upload_images/{{ $user->picture }}" width="50px" height="50">
                          </td>
                          <td>
                            {{ $user->first_name }}
                            {{ $user->last_name }}
                          </td>
                          <td>
                            <div>
                              <?php
                                if($user->gender==0)
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
                          <?php
                                if($user->type==0)
                                {
                                  echo 'Khách hàng';
                                }
                                else if($user->type==1)
                                {
                                  echo 'Quản trị viên';
                                }
                                else if($user->type==2)
                                {
                                  echo 'Nhân viên y tế';
                                }
                                else if($user->type==3)
                                {
                                  echo 'Nhân viên xét nghiệm';
                                }
                                else if($user->type==4)
                                {
                                  echo 'Bác sĩ';
                                }
                                else if($user->type==5)
                                {
                                  echo 'Dược sĩ';
                                }
                              ?>
                          </td>
                          <td>
                          {{ $user->phone }}
                          </td>
                          <td>
                          {{ $user->address }}
                          </td>
                          <td>
                            <a href="{{URL::to('/admin/chi-tiet-nguoi-dung/'.$user->id)}}">Xem</a> |
                            <a href="{{URL::to('/admin/sua-nguoi-dung/'.$user->id)}}">Sửa</a> |
                            <a href="{{URL::to('/admin/xoa-nguoi-dung/'.$user->id)}}">Xóa</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                </table>
            </div>