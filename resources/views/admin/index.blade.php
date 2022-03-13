
   
      @include('admin.include.header')
      @include('admin.include.navbar')
      @include('admin.include.sidebar')

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
              @yield('admin_content')
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
        @include('admin.include.footer')

