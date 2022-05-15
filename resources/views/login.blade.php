<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link type="image/png" rel="shortcut icon" href="<?php echo url('/'); ?>/images_user/logo.jpg"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('/login/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('/login/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/login/css/bootstrap.min.css')}}">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{asset('/login/css/style.css')}}">

    <title>Đăng nhập</title>
  </head>
  <body>
  

  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{asset('/login/images/undraw_remotely_2j6y.svg')}}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Đăng nhập</h3>
            </div>
            <form action="{{URL::to('/')}}" method="post">
              {{ csrf_field() }}
              <div class="form-group first">
                <label for="username">Tên đăng nhập</label>
                <input type="email" class="form-control" id="email" name="email" Required>

              </div>
              <div class="form-group last mb-4">
                <label for="password">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password" Required>
              </div>


              <input type="submit" name="login "value="Đăng nhập" class="btn btn-block btn-primary">

              <span class="d-block text-left my-4 text-muted">&mdash; Bạn có thể đăng nhập với &mdash;</span>
              <div class="social-login">
                <a href="#" class="facebook">
                  <span class="icon-facebook mr-3"></span> 
                </a>
                <a href="#" class="twitter">
                  <span class="icon-twitter mr-3"></span> 
                </a>
                <a href="#" class="google">
                  <span class="icon-google mr-3"></span> 
                </a>
              </div>
              <center><span class="ml-auto"><a href="{{URL::to('dang-ky')}}" class="forgot-pass">Tạo tài khoản ngay</a></span></center>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
    <script src="{{asset('/login/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('/login/js/popper.min.js')}}"></script>
    <script src="{{asset('/login/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/login/js/main.js')}}"></script>
  </body>
</html>