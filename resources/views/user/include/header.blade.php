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
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="{{URL::to('/trang-chu')}}" style="color:black;font-size:25px">HN<span>Clinic</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="{{URL::to('/trang-chu')}}" class="nav-link" style="color:black; font-size:20px; font-weight:bold">Trang chủ</a></li>
	          <li class="nav-item"><a href="about.html" class="nav-link" style="color:black; font-size:20px; font-weight:bold">Về chúng tôi</a></li>
	          <li class="nav-item"><a href="doctors.html" class="nav-link" style="color:black; font-size:20px; font-weight:bold">Bác sĩ</a></li>
	          <li class="nav-item"><a href="blog.html" class="nav-link" style="color:black; font-size:20px; font-weight:bold">Bài viết</a></li>
	          <!-- <li class="nav-item"><a href="{{route('appointment_datepicker')}}" class="nav-link">Đặt lịch DatePicker</a></li> -->
            @php
                 $name = Session::get('last_name')
            @endphp
            @if($name)
              <li class="nav-item"><a href="{{URL::to('/tai-khoan')}}" class="nav-link" style="color:black; font-size:20px; font-weight:bold">Tài khoản</a></li>
              <li class="nav-item"><a style="color:black; font-size:20px; font-weight:bold" href="" class="nav-link" data-toggle="modal" data-target="#modalRequest"><span>Đặt lịch khám</span></a></li>  
              @endif
	         
            <?php
              $name = Session::get('last_name');
              if($name)
                {
            ?>
            <li class="nav-item"><a style="color:black; font-size:20px; font-weight:bold" href="{{URL::to('/dang-xuat')}}" class="nav-link" style="margin-left:18px;"><span>Đăng xuất</span></a></li> 
            <?php
                }
                else
                {
            ?>
            <li class="nav-item"><a style="color:black; font-size:20px; font-weight:bold" href="{{URL::to('/dang-nhap')}}" class="nav-link" style="margin-left:18px;"><span>Đăng nhập</span></a></li> 
            <?php
                }
            ?>
          </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

   