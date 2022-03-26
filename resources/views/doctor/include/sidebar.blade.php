      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{URL::to('/admin')}}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <!-- Trang chủ -->
              <span class="menu-title">Trang chủ</span>
              <!-- Trang chủ -->
            </a>
          </li>

          <!-- Tiêu đề danh sách -->
          <li class="nav-item nav-category">Quản lý</li>
          <!-- Tiêu đề danh sách -->

           <!-- Quản lý xét nghiệm -->
           <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">Quản lý xét nghiệm</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="../pages/forms/basic_elements.html">Yêu cầu xét nghiệm</a></li>
                <li class="nav-item"><a class="nav-link" href="../pages/forms/basic_elements.html">Kết quả xét nghiệm</a></li>
              </ul>
            </div>
          </li>
          <!-- Quản lý xét nghiệm -->

           <!-- Quản lý lịch hẹn -->
           <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">Quản lý lịch hẹn</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="../pages/forms/basic_elements.html">Danh sách lịch hẹn</a></li>
              </ul>
            </div>
          </li>
          <!-- Quản lý lịch hẹn -->

           <!-- Quản lý lịch làm -->
           <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">Quản lý lịch làm</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item">
                  <a class="nav-link" href="../pages/forms/basic_elements.html">Lịch làm</a>
                  <div class="collapse" id="form-elements">
                    <ul class="nav flex-column sub-menu">
                      <li><a class="nav-link" href="../pages/forms/basic_elements.html"> - Thêm lịch làm</a></li>
                      <li><a class="nav-link" href="../pages/forms/basic_elements.html"> - Danh sách lịch làm</a></li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../pages/forms/basic_elements.html">Lịch nghỉ</a>
                  <div class="collapse" id="form-elements">
                    <ul class="nav flex-column sub-menu">
                      <li><a class="nav-link" href="../pages/forms/basic_elements.html"> - Thêm lịch nghỉ</a></li>
                      <li><a class="nav-link" href="../pages/forms/basic_elements.html"> - Danh sách lịch nghỉ</a></li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
          </li>
          <!-- Quản lý lịch làm -->

         
          <!-- Quản lý đơn thuốc -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">Quản lý đơn thuốc</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="../pages/forms/basic_elements.html">Thêm đơn thuốc</a></li>
                <li class="nav-item"><a class="nav-link" href="../pages/forms/basic_elements.html">Danh sách đơn thuốc</a></li>                
              </ul>
            </div>
          </li>
          <!-- Quản lý đơn thuốc -->

          <!-- Quản lý hồ sơ bệnh án -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">Quản lý hồ sơ bệnh án</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="../pages/forms/basic_elements.html">Thêm hồ sơ bệnh án</a></li>
                <li class="nav-item"><a class="nav-link" href="../pages/forms/basic_elements.html">Danh sách hồ sơ bệnh án</a></li>                
              </ul>
            </div>
          </li>
          <!-- Quản lý hồ sơ bệnh án -->
        </ul>
      </nav>