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