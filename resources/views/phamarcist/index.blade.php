@include('phamarcist.include.header')
@include('phamarcist.include.navbar')
@include('phamarcist.include.sidebar')

<!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
          @yield('phamarcist_content')
      </div>
    </div>
  </div>
<!-- content-wrapper ends -->

@include('phamarcist.include.footer')

