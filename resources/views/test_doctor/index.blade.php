@include('test_doctor.include.header')
@include('test_doctor.include.navbar')
@include('test_doctor.include.sidebar')

<!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
          @yield('test_doctor_content')
      </div>
    </div>
  </div>
<!-- content-wrapper ends -->

@include('test_doctor.include.footer')

