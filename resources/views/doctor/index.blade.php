@include('doctor.include.header')
@include('doctor.include.navbar')
@include('doctor.include.sidebar')

<!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
          @yield('doctor_content')
      </div>
    </div>
  </div>
<!-- content-wrapper ends -->

@include('doctor.include.footer')

