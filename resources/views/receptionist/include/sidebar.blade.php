      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{URL::to('/nhan-vien-y-te')}}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <!-- Trang chủ -->
              <span class="menu-title">Tổng quan</span>
              <!-- Trang chủ -->
            </a>
          </li>

          <!-- Tiêu đề danh sách -->
          <li class="nav-item nav-category">Quản lý</li>
          <!-- Tiêu đề danh sách -->

           <!-- Quản lý lịch hẹn -->
           <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements-5" aria-expanded="false" aria-controls="form-elements-5">
              <i class="mdi mdi-calendar" style="font-size: 22px;line-height: 1;margin-right: 1rem;"></i>
              <span class="menu-title">Quản lý lịch hẹn</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements-5">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{URL::to('/nhan-vien-y-te/them-lich-hen')}}">Thêm lịch hẹn</a></li>
                <li class="nav-item"><a class="nav-link" href="{{URL::to('/nhan-vien-y-te/danh-sach-lich-hen')}}">Danh sách lịch hẹn</a></li>
              </ul>
            </div>
          </li>
          <!-- Quản lý lịch hẹn -->


         <!-- Quản lý bệnh nhân -->
         <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements-3" aria-expanded="false" aria-controls="form-elements-3">
              <i class="mdi mdi-hotel" style="font-size: 22px;line-height: 1;margin-right: 1rem;"></i>
              <span class="menu-title">Quản lý bệnh nhân</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements-3">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{URL::to('/nhan-vien-y-te/them-benh-nhan')}}">Thêm bệnh nhân</a></li>
                <li class="nav-item"><a class="nav-link" href="{{URL::to('/nhan-vien-y-te/danh-sach-benh-nhan')}}">Danh sách bệnh nhân</a></li>
                <li class="nav-item">
                  <a class="nav-link" href="{{URL::to('/admin/ket-qua-xet-nghiem')}}">Kết quả xét nghiệm</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="">Hồ sơ bệnh án</a>
                  <div class="collapse" id="form-elements">
                    <ul class="nav flex-column sub-menu">
                      <li><a class="nav-link" href="{{URL::to('/admin/them-ho-so-benh-an')}}"> - Thêm hồ sơ</a></li>
                      <li><a class="nav-link" href="{{URL::to('/admin/danh-sach-ho-so-benh-an')}}"> - Danh sách hồ sơ</a></li>
                    </ul>
                  </div>
                </li>
               
              </ul>
            </div>
          </li>
          <!-- Quản lý bệnh nhân -->
        </ul>
      </nav>