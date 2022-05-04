      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{URL::to('/admin/tong-quan')}}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <!-- Trang chủ -->
              <span class="menu-title">Tổng quan</span>
              <!-- Trang chủ -->
            </a>
          </li>

          <!-- Tiêu đề danh sách -->
          <li class="nav-item nav-category">Quản lý</li>
          <!-- Tiêu đề danh sách -->

          <!-- Quản lý người dùng -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements-1" aria-expanded="false" aria-controls="form-elements-1">
              <i class="mdi mdi-account-card-details" style="font-size: 22px;line-height: 1;margin-right: 1rem;"></i>
              <span class="menu-title">Quản lý tài khoản</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements-1">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{URL::to('/admin/them-nguoi-dung')}}">Thêm tài khoản</a></li>
                <li class="nav-item"><a class="nav-link" href="{{URL::to('/admin/danh-sach-nguoi-dung')}}">Danh sách tài khoản</a></li>
              </ul>
            </div>
          </li>
          <!-- Quản lý người dùng -->

           <!-- Quản lý khoa -->
           <!-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">Quản lý khoa</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="../pages/forms/basic_elements.html">Thêm khoa</a></li>
                <li class="nav-item"><a class="nav-link" href="../pages/forms/basic_elements.html">Danh sách khoa</a></li>
              </ul>
            </div>
          </li> -->
          <!-- Quản lý khoa -->

           <!-- Quản lý bác sĩ -->
           <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements-2" aria-expanded="false" aria-controls="form-elements-2">
              <i class="mdi mdi-plus-circle" style="font-size: 22px;line-height: 1;margin-right: 1rem;"></i>
              <span class="menu-title">Quản lý bác sĩ</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements-2">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{URL::to('/admin/them-bac-si')}}">Thêm bác sĩ</a></li>
                <li class="nav-item"><a class="nav-link" href="{{URL::to('/admin/danh-sach-bac-si')}}">Danh sách bác sĩ</a></li>
                <li class="nav-item"><a class="nav-link" href="../pages/forms/basic_elements.html">Lịch làm</a></li>
                <li class="nav-item"><a class="nav-link" href="../pages/forms/basic_elements.html">Lịch hẹn</a></li>
              </ul>
            </div>
          </li>
          <!-- Quản lý bác sĩ -->

           <!-- Quản lý bệnh nhân -->
           <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements-3" aria-expanded="false" aria-controls="form-elements-3">
              <i class="mdi mdi-hotel" style="font-size: 22px;line-height: 1;margin-right: 1rem;"></i>
              <span class="menu-title">Quản lý bệnh nhân</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements-3">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{URL::to('/admin/them-benh-nhan')}}">Thêm bệnh nhân</a></li>
                <li class="nav-item"><a class="nav-link" href="{{URL::to('/admin/danh-sach-benh-nhan')}}">Danh sách bệnh nhân</a></li>
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

           <!-- Quản lý nhân sự -->
           <!-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">Quản lý nhân sự</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="../pages/forms/basic_elements.html">Lễ tân</a>
                  <div class="collapse" id="form-elements">
                    <ul class="nav flex-column sub-menu">
                      <li><a class="nav-link" href="../pages/forms/basic_elements.html"> - Thêm lễ tân</a></li>
                      <li><a class="nav-link" href="../pages/forms/basic_elements.html"> - Danh sách lễ tân</a></li>
                    </ul>
                  </div>
                </li>
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="../pages/forms/basic_elements.html">Nhân viên xét nghiệm</a>
                  <div class="collapse" id="form-elements">
                    <ul class="nav flex-column sub-menu">
                      <li><a class="nav-link" href="../pages/forms/basic_elements.html"> - Thêm nhân viên xét nghiệm</a></li>
                      <li><a class="nav-link" href="../pages/forms/basic_elements.html"> - Danh sách nhân viên xét nghiệm</a></li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
          </li> -->
          <!-- Quản lý nhân sự -->


           <!-- Quản lý xét nghiệm -->
           <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements-4" aria-expanded="false" aria-controls="form-elements-4">
              <i class="mdi mdi-eyedropper" style="font-size: 22px;line-height: 1;margin-right: 1rem;"></i>
              <span class="menu-title">Quản lý xét nghiệm</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements-4">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="../pages/forms/basic_elements.html">Yêu cầu xét nghiệm</a></li>
                <li class="nav-item"><a class="nav-link" href="../pages/forms/basic_elements.html">Thêm xét nghiệm</a></li>
                <li class="nav-item"><a class="nav-link" href="../pages/forms/basic_elements.html">Danh sách xét nghiệm</a></li>
                <li class="nav-item">
                  <a class="nav-link" href="">Loại xét nghiệm</a>
                  <div class="" id="form-elements">
                    <ul class="nav flex-column sub-menu">
                      <li><a class="nav-link" href="{{URL::to('/admin/them-loai-xet-nghiem')}}"> - Thêm loại</a></li>
                      <li><a class="nav-link" href="{{URL::to('/admin/danh-sach-loai-xet-nghiem')}}"> - Danh sách loại</a></li>
                    </ul>
                  </div>
              </ul>
            </div>
          </li>
          <!-- Quản lý xét nghiệm -->

           <!-- Quản lý lịch hẹn -->
           <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements-5" aria-expanded="false" aria-controls="form-elements-5">
              <i class="mdi mdi-calendar" style="font-size: 22px;line-height: 1;margin-right: 1rem;"></i>
              <span class="menu-title">Quản lý lịch hẹn</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements-5">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{URL::to('/admin/them-lich-hen')}}">Thêm lịch hẹn</a></li>
                <li class="nav-item"><a class="nav-link" href="{{URL::to('/admin/danh-sach-lich-hen')}}">Danh sách lịch hẹn</a></li>
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
                <li class="nav-item"><a class="nav-link" href="{{URL::to('/admin/them-lich-lam')}}">Thêm lịch làm</a></li>
                <li class="nav-item"><a class="nav-link" href="{{URL::to('/admin/danh-sach-lich-lam')}}">Danh sách lịch làm</a></li>
              </ul>
            </div>
          </li>
          <!-- Quản lý lịch làm -->

          <!-- Quản lý khung giờ -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements-7" aria-expanded="false" aria-controls="form-elements-7">
              <i class="mdi mdi-timer" style="font-size: 22px;line-height: 1;margin-right: 1rem;"></i>
              <span class="menu-title">Quản lý khung giờ</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements-7">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{URL::to('admin/them-khung-gio')}}">Thêm khung giờ</a></li>
                <li class="nav-item"><a class="nav-link" href="{{URL::to('admin/danh-sach-khung-gio')}}">Danh sách khung giờ</a></li>                
              </ul>
            </div>
          </li>
          <!-- Quản lý khung giờ -->

          <!-- Quản lý thuốc -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements-8" aria-expanded="false" aria-controls="form-elements-8">
              <i class="mdi mdi-football-australian" style="font-size: 22px;line-height: 1;margin-right: 1rem;"></i>
              <span class="menu-title">Quản lý thuốc</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements-8">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{URL::to('admin/them-thuoc')}}">Thêm thuốc</a></li>
                <li class="nav-item"><a class="nav-link" href="{{URL::to('admin/danh-sach-thuoc')}}">Danh sách thuốc</a></li>
                <!-- <li class="nav-item">
                  <a class="nav-link" href="../pages/forms/basic_elements.html">Loại thuốc</a>
                  <div class="collapse" id="form-elements">
                    <ul class="nav flex-column sub-menu">
                      <li><a class="nav-link" href="../pages/forms/basic_elements.html"> - Thêm loại thuốc</a></li>
                      <li><a class="nav-link" href="../pages/forms/basic_elements.html"> - Danh sách loại thuốc</a></li>
                    </ul>
                  </div>
                </li> -->
              </ul>
            </div>
          </li>
          <!-- Quản lý thuốc -->

          <!-- Quản lý đơn thuốc -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements-10" aria-expanded="false" aria-controls="form-elements-10">
              <i class="mdi mdi-format-list-bulleted" style="font-size: 22px;line-height: 1;margin-right: 1rem;"></i>
              <span class="menu-title">Quản lý đơn thuốc</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements-10">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{URL::to('admin/them-don-thuoc')}}">Thêm đơn thuốc</a></li>
                <li class="nav-item"><a class="nav-link" href="{{URL::to('admin/danh-sach-don-thuoc')}}">Danh sách đơn thuốc</a></li>                
              </ul>
            </div>
          </li>
          <!-- Quản lý đơn thuốc -->
        </ul>
      </nav>