      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{URL::to('/bac-si')}}">
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
                <li class="nav-item"><a class="nav-link" href="{{URL::to('/bac-si/danh-sach-lich-hen')}}">Lịch chưa khám</a></li>
                <li class="nav-item"><a class="nav-link" href="{{URL::to('/bac-si/danh-sach-lich-da-kham')}}">Lịch đã khám</a></li>
              </ul>
            </div>
          </li>
          <!-- Quản lý lịch hẹn -->

           <!-- Quản lý lịch làm -->
           <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements-6" aria-expanded="false" aria-controls="form-elements-6">
              <i class="mdi mdi-calendar-multiple-check" style="font-size: 22px;line-height: 1;margin-right: 1rem;"></i>
              <span class="menu-title">Quản lý lịch làm</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements-6">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{URL::to('/bac-si/dang-ky-lich-lam')}}">Đăng ký lịch làm</a></li>
                <li class="nav-item"><a class="nav-link" href="{{URL::to('/bac-si/xem-lich-lam')}}">Xem lịch làm</a></li>
              </ul>
            </div>
          </li>
          <!-- Quản lý lịch làm -->

            <!-- Quản lý xét nghiệm -->
            <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements-4" aria-expanded="false" aria-controls="form-elements-4">
              <i class="mdi mdi-eyedropper" style="font-size: 22px;line-height: 1;margin-right: 1rem;"></i>
              <span class="menu-title">Quản lý xét nghiệm</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements-4">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{URL::to('/bac-si/ket-qua-xet-nghiem')}}">Yêu cầu xét nghiệm</a></li>
              </ul>
            </div>
          </li>
          <!-- Quản lý xét nghiệm -->

          <!-- Quản lý đơn thuốc -->
            <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements-10" aria-expanded="false" aria-controls="form-elements-10">
              <i class="mdi mdi-format-list-bulleted" style="font-size: 22px;line-height: 1;margin-right: 1rem;"></i>
              <span class="menu-title">Quản lý đơn thuốc</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements-10">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{URL::to('/bac-si/them-don-thuoc')}}">Thêm đơn thuốc</a></li>
                <li class="nav-item"><a class="nav-link" href="{{URL::to('/bac-si/danh-sach-don-thuoc')}}">Danh sách đơn thuốc</a></li>                
              </ul>
            </div>
          </li>
          <!-- Quản lý đơn thuốc -->
        </ul>
      </nav>