      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{URL::to('/duoc-si')}}">
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
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="mdi mdi-football-australian" style="font-size: 22px;line-height: 1;margin-right: 1rem;"></i>
              <span class="menu-title">Quản lý thuốc</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{URL::to('duoc-si/them-thuoc')}}">Thêm thuốc</a></li>
                <li class="nav-item"><a class="nav-link" href="{{URL::to('duoc-si/danh-sach-thuoc')}}">Danh sách thuốc</a></li>
              </ul>
            </div>
          </li>
          <!-- Quản lý xét nghiệm -->
        
        </ul>
      </nav>