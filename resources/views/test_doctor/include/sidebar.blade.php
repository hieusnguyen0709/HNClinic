      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{URL::to('/bac-si-xet-nghiem')}}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <!-- Trang chủ -->
              <span class="menu-title">Tổng quan</span>
              <!-- Trang chủ -->
            </a>
          </li>

          <!-- Tiêu đề danh sách -->
          <li class="nav-item nav-category">Quản lý</li>
          <!-- Tiêu đề danh sách -->

            <!-- Quản lý xét nghiệm -->
            <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements-4" aria-expanded="false" aria-controls="form-elements-4">
              <i class="mdi mdi-eyedropper" style="font-size: 22px;line-height: 1;margin-right: 1rem;"></i>
              <span class="menu-title">Quản lý xét nghiệm</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements-4">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{URL::to('/bac-si-xet-nghiem/yeu-cau-xet-nghiem')}}">Yêu cầu xét nghiệm</a></li>
                <li class="nav-item"><a class="nav-link" href="../pages/forms/basic_elements.html">Thêm kết quả xét nghiệm</a></li>
                <li class="nav-item"><a class="nav-link" href="../pages/forms/basic_elements.html">Danh sách xét nghiệm</a></li>
                <li class="nav-item">
                  <a class="nav-link" href="">Loại xét nghiệm</a>
                  <div class="" id="form-elements">
                    <ul class="nav flex-column sub-menu">
                      <li><a class="nav-link" href="{{URL::to('/bac-si-xet-nghiem/them-loai-xet-nghiem')}}"> - Thêm loại</a></li>
                      <li><a class="nav-link" href="{{URL::to('/bac-si-xet-nghiem/danh-sach-loai-xet-nghiem')}}"> - Danh sách loại</a></li>
                    </ul>
                  </div>
              </ul>
            </div>
          </li>
          <!-- Quản lý xét nghiệm -->
        
        </ul>
      </nav>