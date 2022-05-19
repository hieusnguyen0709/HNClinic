<div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                        <th>
                            Tên
                        </th>
                          <th>
                            Ngày làm
                          </th>
                          <!-- <th>
                            Ca làm
                          </th> -->
                          <th>
                            Thao tác
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($show_list_schedule as $key => $schedule)
                        <tr>
                          <td>
                              {{$schedule->last_name}}
                          </td>
                            <td>
                                {{$schedule->date}}
                            </td>
                          <!-- <td>
                            
                          </td> -->
                          <td>
                            <a href="{{URL::to('/admin/sua-lich-lam/'.$schedule->id_time)}}">Sửa</a> |
                            <a href="{{URL::to('/admin/xoa-lich-lam/'.$schedule->id_time)}}">Xóa</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>