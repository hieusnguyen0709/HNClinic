                        <div class="col-md-6">
                          <div class="form-group row" >
                              <label class="col-sm-3 col-form-label">Trung bình (SL/Ngày uống)</label>
                              <div class="col-sm-9">
                                        @if(isset($avg))
                                        <input type="number" class="form-control timepicker" placeholder="{{$avg}}"/>
                                        @else
                                        <input type="number" class="form-control timepicker" placeholder="0"/>
                                        @endif
                              </div>
                          </div>
                        </div>
                          <!-- 1 -->