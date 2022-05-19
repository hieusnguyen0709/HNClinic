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
                            Số lượng
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
                            <a href="{{URL::to('/admin/sua-thuoc/'.$medicine->id)}}">Sửa</a> |
                            <a href="{{URL::to('/admin/xoa-thuoc/'.$medicine->id)}}">Xóa</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>