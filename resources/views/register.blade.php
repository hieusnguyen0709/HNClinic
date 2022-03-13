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

    <title>Đăng ký</title>
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
              <h3>Đăng ký</h3>
            </div>
            <form action="{{URL::to('/kt-dang-ky')}}" method="post">
              {{ csrf_field() }}
              <?php
                         $message = Session::get('message');
                         if($message)
                         {
                             echo '<center><span class="text-success">'.$message.'</span></center>';
                             Session::put('message',null);
                         }
                      ?>
              <div class="form-group last mb-4">
                <label for="username">Tên đăng nhập</label>
                <input type="email" class="form-control" id="email" name="email" Required>
              </div>
              <div class="form-group last mb-4">
                <label for="password">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password" Required>         
              </div>
              <div class="form-group last mb-4">
                <label for="firstname">Họ đệm</label>
                <input type="text" class="form-control" id="first_name" name="first_name" Required>
              </div>
              <div class="form-group last mb-4">
                <label for="lastname">Tên</label>
                <input type="text" class="form-control" id="last_name" name="last_name" Required>
              </div>
              <div class="form-group last mb-4">
                <label for="address">Địa chỉ</label>
                <input type="text" class="form-control" id="address" name="address" Required>
              </div>
              <div class="form-group last mb-4">
                <label for="birthdate"></label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" Required>
              </div>
              <div class="form-group last mb-4">
                <label for="phone">Số điện thoại</label>
                <input type="text" class="form-control" id="phone" name="phone" Required>
              </div>
              <input type="submit" name="register "value="Đăng ký" class="btn btn-block btn-success">
            </br>
              <center><span class="ml-auto"><a href="{{URL::to('dang-nhap')}}" class="forgot-pass">Đăng nhập ngay</a></span></center>
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