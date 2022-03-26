@include('receptionist.include.header')
@include('receptionist.include.navbar')
@include('receptionist.include.sidebar')

<!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
          @yield('receptionist_content')
      </div>
    </div>
  </div>
<!-- content-wrapper ends -->

@include('receptionist.include.footer')

