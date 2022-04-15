<!DOCTYPE html>
<html lang="en">
  <head>
    <title>HNClinic</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link type="image/png" rel="shortcut icon" href="<?php echo url('/'); ?>/images_user/logo.jpg"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo url('/'); ?>/css_user/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo url('/'); ?>/css_user/animate.css">
    
    <link rel="stylesheet" href="<?php echo url('/'); ?>/css_user/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo url('/'); ?>/css_user/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo url('/'); ?>/css_user/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo url('/'); ?>/css_user/aos.css">

    <link rel="stylesheet" href="<?php echo url('/'); ?>/css_user/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo url('/'); ?>/css_user/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo url('/'); ?>/css_user/jquery.timepicker.css">

    
    <link rel="stylesheet" href="<?php echo url('/'); ?>/css_user/flaticon.css">
    <link rel="stylesheet" href="<?php echo url('/'); ?>/css_user/icomoon.css">
    <link rel="stylesheet" href="<?php echo url('/'); ?>/css_user/style.css">
  </head>
  <body>
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="">HN<span>Clinic</span></a>
        <!-- <a href="{{URL::to('/trang-chu')}}"><img src="<?php echo url('/'); ?>/images_user/logo.jpg" width="50px" height="50"></a> -->
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="{{URL::to('/trang-chu')}}" class="nav-link">Trang chủ</a></li>
	          <li class="nav-item"><a href="about.html" class="nav-link">Về chúng tôi</a></li>
	          <li class="nav-item"><a href="services.html" class="nav-link">Dịch vụ</a></li>
	          <li class="nav-item"><a href="doctors.html" class="nav-link">Bác sĩ</a></li>
	          <li class="nav-item"><a href="blog.html" class="nav-link">Bài viết</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Liên lạc</a></li>
            @php
                 $name = Session::get('last_name')
			@endphp
            @if($name)
                <li class="nav-item"><a href="{{URL::to('/tai-khoan')}}" class="nav-link">Tài khoản</a></li>
			@endif
            
	          <li class="nav-item cta"><a href="contact.html" class="nav-link" data-toggle="modal" data-target="#modalRequest"><span>Đặt lịch khám</span></a></li>  
            <?php
              $name = Session::get('last_name');
              if($name)
                {
            ?>
            <li class="nav-item cta"><a href="{{URL::to('/dang-xuat')}}" class="nav-link" style="margin-left:18px;"><span>Đăng xuất</span></a></li> 
            <?php
                }
                else
                {
            ?>
            <li class="nav-item cta"><a href="{{URL::to('/dang-nhap')}}" class="nav-link" style="margin-left:18px;"><span>Đăng nhập</span></a></li> 
            <?php
                }
            ?>
          </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

   