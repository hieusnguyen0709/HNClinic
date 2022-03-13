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
            <?php
                 $name = Session::get('last_name');
                 if($name)
                   {
                     echo'<li class="nav-item"><a href="contact.html" class="nav-link">Tài khoản</a></li>';
                   }
            ?>
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

    <section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url('images_user/bg_1.jpg');">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text align-items-center" data-scrollax-parent="true">
            <div class="col-md-6 col-sm-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
              <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">"Kết quả chuẩn vàng - An toàn điều trị"</h1>
              <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Đến với phòng khám, bạn sẽ hài lòng với các trang thiết bị và máy móc hiện đại, đảm bảo chất lượng tốt nhất </p>
              <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="#" class="btn btn-primary px-4 py-3">Đặt lịch khám</a></p>
            </div>
          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url('images_user/bg_2.jpg');">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text align-items-center" data-scrollax-parent="true">
            <div class="col-md-6 col-sm-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
              <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">"Cấp cứu chuyên nghiệp - Bắt kịp sự sống"</h1>
              <p class="mb-4">Gặp gỡ đội ngũ y bác sĩ chuyên khoa với trình độ cao và trình độ chuyên môn hơn 20 năm hoạt động trong lĩnh vực</p>
              <p><a href="#" class="btn btn-primary px-4 py-3">Đặt lịch khám</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-intro">
    	<div class="container">
    		<div class="row no-gutters">
    			<div class="col-md-3 color-1 p-4">
    				<h3 class="mb-4">Trường hợp khẩn cấp</h3>
    				<p>Trong trường hợp khẩn cấp xin hãy gọi cho số điện thoại bên dưới</p>
    				<span class="phone-number">0365549764 - BS.Hiếu</span>
            <span class="phone-number">0971376033 - BS.Huy</span>
    			</div>
    			<div class="col-md-3 color-2 p-4">
    				<h3 class="mb-4">Giờ mở cửa</h3>
    				<p class="openinghours d-flex">
    					<span>Thứ 2 - Thứ 6</span>
    					<span>8:00 - 19:00</span>
    				</p>
    				<p class="openinghours d-flex">
    					<span>Thứ 7</span>
    					<span>10:00 - 17:00</span>
    				</p>
    				<p class="openinghours d-flex">
    					<span>Chủ nhật</span>
    					<span>10:00 - 16:00</span>
    				</p>
    			</div>
    			<div class="col-md-6 color-3 p-4">
    				<h3 class="mb-2">Đặt lịch khám</h3>
    				<form action="#" class="appointment-form">
	            <div class="row">
	            	<div class="col-sm-4">
	                <div class="form-group">
			              <div class="select-wrap">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select name="" id="" class="form-control">
                      	<option value="">Khoa</option>
                        <option value="">Răng</option>
                        <option value="">Da liễu</option>
                        <option value="">Thần kinh</option>
                        <option value=""></option>
                      </select>
                    </div>
			            </div>
	              </div>
	              <div class="col-sm-4">
	                <div class="form-group">
	                	<div class="icon"><span class="icon-user"></span></div>
			              <input type="text" class="form-control" id="appointment_name" placeholder="Họ tên">
			            </div>
	              </div>
	              <div class="col-sm-4">
	                <div class="form-group">
	                	<div class="icon"><span class="icon-paper-plane"></span></div>
			              <input type="text" class="form-control" id="appointment_email" placeholder="Email">
			            </div>
	              </div>
	            </div>
	            <div class="row">
	              <div class="col-sm-4">
	                <div class="form-group">
	                	<div class="icon"><span class="ion-ios-calendar"></span></div>
	                  <input type="text" class="form-control appointment_date" placeholder="Ngày">
	                </div>    
	              </div>
	              <div class="col-sm-4">
	                <div class="form-group">
	                	<div class="icon"><span class="ion-ios-clock"></span></div>
	                  <input type="text" class="form-control appointment_time" placeholder="Thời gian">
	                </div>
	              </div>
	              <div class="col-sm-4">
	                <div class="form-group">
	                	<div class="icon"><span class="icon-phone2"></span></div>
	                  <input type="text" class="form-control" id="phone" placeholder="Điện thoại">
	                </div>
	              </div>
	            </div>
	            
	            <div class="form-group">
	              <input type="submit" value="Đặt" class="btn btn-primary">
	            </div>
	          </form>
    			</div>
    		</div>
    	</div>
    </section>
  
    <section>
      @yield('user_content')
    </section>

    
		<div id="map"></div>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-3">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">HNClinic</h2>
              <p>"Gieo mầm hi vọng - Gặt trọn yêu thương"</p>
            </div>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft ">
              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
          <div class="col-md-2">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Liên kết</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Về chúng tôi</a></li>
                <li><a href="#" class="py-2 d-block">Dịch vụ</a></li>
                <li><a href="#" class="py-2 d-block">Bác sĩ</a></li>
                <li><a href="#" class="py-2 d-block">Blog</a></li>
                <li><a href="#" class="py-2 d-block">Liên lạc</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4 pr-md-4">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Các blog gần đây</h2>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images_user/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images_user/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Office</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Phòng khám đa khoa HNClinic - Số 12 Nguyễn Văn Bảo, Phường 4, Quận Gò Vấp, Thành phố Hồ Chí Minh</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">0365549764 | 0971376033</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">hieusnguyen0709@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Phòng khám đa khoa <i class="icon-heart" aria-hidden="true"></i><a href="https://colorlib.com" target="_blank"> HNClinic</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <!-- Modal -->
  <div class="modal fade" id="modalRequest" tabindex="-1" role="dialog" aria-labelledby="modalRequestLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalRequestLabel">Đặt lịch khám</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="#">
            <div class="form-group">
              <!-- <label for="appointment_name" class="text-black">Full Name</label> -->
              <input type="text" class="form-control" id="appointment_name" placeholder="Họ tên">
            </div>
            <div class="form-group">
              <!-- <label for="appointment_email" class="text-black">Email</label> -->
              <input type="text" class="form-control" id="appointment_email" placeholder="Email">
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <!-- <label for="appointment_date" class="text-black">Date</label> -->
                  <input type="text" class="form-control appointment_date" placeholder="Ngày">
                </div>    
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <!-- <label for="appointment_time" class="text-black">Time</label> -->
                  <input type="text" class="form-control appointment_time" placeholder="Thời gian">
                </div>
              </div>
            </div>
            

            <div class="form-group">
              <!-- <label for="appointment_message" class="text-black">Message</label> -->
              <textarea name="" id="appointment_message" class="form-control" cols="30" rows="10" placeholder="Lời nhắn"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" value="Đặt" class="btn btn-primary">
            </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>


  <script src="<?php echo url('/'); ?>/js_user/jquery.min.js"></script>
  <script src="<?php echo url('/'); ?>/js_user/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo url('/'); ?>/js_user/popper.min.js"></script>
  <script src="<?php echo url('/'); ?>/js_user/bootstrap.min.js"></script>
  <script src="<?php echo url('/'); ?>/js_user/jquery.easing.1.3.js"></script>
  <script src="<?php echo url('/'); ?>/js_user/jquery.waypoints.min.js"></script>
  <script src="<?php echo url('/'); ?>/js_user/jquery.stellar.min.js"></script>
  <script src="<?php echo url('/'); ?>/js_user/owl.carousel.min.js"></script>
  <script src="<?php echo url('/'); ?>/js_user/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo url('/'); ?>/js_user/aos.js"></script>
  <script src="<?php echo url('/'); ?>/js_user/jquery.animateNumber.min.js"></script>
  <script src="<?php echo url('/'); ?>/js_user/bootstrap-datepicker.js"></script>
  <script src="<?php echo url('/'); ?>/js_user/jquery.timepicker.min.js"></script>
  <script src="<?php echo url('/'); ?>/js_user/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?php echo url('/'); ?>/js_user/google-map.js"></script>
  <script src="<?php echo url('/'); ?>/js_user/main.js"></script>
    
  </body>
</html>