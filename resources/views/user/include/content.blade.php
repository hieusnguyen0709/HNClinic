@extends('user.index')
@section('user_content')
<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url('/images_user/bg_1.jpg');">
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
	            	<!-- <div class="col-sm-4">
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
	              </div> -->
	              <div class="col-sm-4">
	                <div class="form-group">
	                	<div class="icon"><span class="icon-user"></span></div>
			              <input type="text" class="form-control" id="appointment_name" placeholder="Tên đầy đủ">
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
<section class="ftco-section">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <h2 class="mb-3">Meet Our Experience Dentist</h2>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences</p>
          </div>
        </div>
        <div class="row">
        	<div class="col-lg-3 col-md-6 d-flex mb-sm-4 ftco-animate">
        		<div class="staff">
      				<div class="img mb-4" style="background-image: url(images_user/person_5.jpg);"></div>
      				<div class="info text-center">
      					<h3><a href="teacher-single.html">Tom Smith</a></h3>
      					<span class="position">Dentist</span>
      					<div class="text">
	        				<p>Far far away, behind the word mountains, far from the countries Vokalia</p>
	        				<ul class="ftco-social">
			              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
			              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
			              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
			              <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
			            </ul>
	        			</div>
      				</div>
        		</div>
        	</div>
        	<div class="col-lg-3 col-md-6 d-flex mb-sm-4 ftco-animate">
        		<div class="staff">
      				<div class="img mb-4" style="background-image: url(images_user/person_6.jpg);"></div>
      				<div class="info text-center">
      					<h3><a href="teacher-single.html">Mark Wilson</a></h3>
      					<span class="position">Dentist</span>
      					<div class="text">
	        				<p>Far far away, behind the word mountains, far from the countries Vokalia</p>
	        				<ul class="ftco-social">
			              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
			              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
			              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
			              <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
			            </ul>
	        			</div>
      				</div>
        		</div>
        	</div>
        	<div class="col-lg-3 col-md-6 d-flex mb-sm-4 ftco-animate">
        		<div class="staff">
      				<div class="img mb-4" style="background-image: url(images_user/person_7.jpg);"></div>
      				<div class="info text-center">
      					<h3><a href="teacher-single.html">Patrick Jacobson</a></h3>
      					<span class="position">Dentist</span>
      					<div class="text">
	        				<p>Far far away, behind the word mountains, far from the countries Vokalia</p>
	        				<ul class="ftco-social">
			              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
			              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
			              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
			              <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
			            </ul>
	        			</div>
      				</div>
        		</div>
        	</div>
        	<div class="col-lg-3 col-md-6 d-flex mb-sm-4 ftco-animate">
        		<div class="staff">
      				<div class="img mb-4" style="background-image: url(images_user/person_8.jpg);"></div>
      				<div class="info text-center">
      					<h3><a href="teacher-single.html">Ivan Dorchsner</a></h3>
      					<span class="position">System Analyst</span>
      					<div class="text">
	        				<p>Far far away, behind the word mountains, far from the countries Vokalia</p>
	        				<ul class="ftco-social">
			              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
			              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
			              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
			              <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
			            </ul>
	        			</div>
      				</div>
        		</div>
        	</div>
        </div>
        <div class="row  mt-5 justify-conten-center">
        	<div class="col-md-8 ftco-animate">
        		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi vero accusantium sunt sit aliquam ipsum molestias autem perferendis, incidunt cumque necessitatibus cum amet cupiditate, ut accusamus. Animi, quo. Laboriosam, laborum.</p>
        	</div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images_user/bg_1.jpg);" data-stellar-background-ratio="0.5">
    	<div class="container">
    		<div class="row d-flex align-items-center">
    			<div class="col-md-3 aside-stretch py-5">
    				<div class=" heading-section heading-section-white ftco-animate pr-md-4">
	            <h2 class="mb-3">Achievements</h2>
	            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
	          </div>
    			</div>
    			<div class="col-md-9 py-5 pl-md-5">
		    		<div class="row">
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		              <div class="text">
		                <strong class="number" data-number="14">0</strong>
		                <span>Years of Experience</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		              <div class="text">
		                <strong class="number" data-number="4500">0</strong>
		                <span>Qualified Dentist</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		              <div class="text">
		                <strong class="number" data-number="4200">0</strong>
		                <span>Happy Smiling Customer</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		              <div class="text">
		                <strong class="number" data-number="320">0</strong>
		                <span>Patients Per Year</span>
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
	      </div>
    	</div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <h2 class="mb-3">Our Best Pricing</h2>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
          </div>
        </div>
    		<div class="row">
        	<div class="col-md-3 ftco-animate">
        		<div class="pricing-entry pb-5 text-center">
        			<div>
	        			<h3 class="mb-4">Basic</h3>
	        			<p><span class="price">$24.50</span> <span class="per">/ session</span></p>
	        		</div>
        			<ul>
        				<li>Diagnostic Services</li>
								<li>Professional Consultation</li>
								<li>Tooth Implants</li>
								<li>Surgical Extractions</li>
								<li>Teeth Whitening</li>
        			</ul>
        			<p class="button text-center"><a href="#" class="btn btn-primary btn-outline-primary px-4 py-3">Order now</a></p>
        		</div>
        	</div>
        	<div class="col-md-3 ftco-animate">
        		<div class="pricing-entry pb-5 text-center">
        			<div>
	        			<h3 class="mb-4">Standard</h3>
	        			<p><span class="price">$34.50</span> <span class="per">/ session</span></p>
	        		</div>
        			<ul>
        				<li>Diagnostic Services</li>
								<li>Professional Consultation</li>
								<li>Tooth Implants</li>
								<li>Surgical Extractions</li>
								<li>Teeth Whitening</li>
        			</ul>
        			<p class="button text-center"><a href="#" class="btn btn-primary btn-outline-primary px-4 py-3">Order now</a></p>
        		</div>
        	</div>
        	<div class="col-md-3 ftco-animate">
        		<div class="pricing-entry active pb-5 text-center">
        			<div>
	        			<h3 class="mb-4">Premium</h3>
	        			<p><span class="price">$54.50</span> <span class="per">/ session</span></p>
	        		</div>
        			<ul>
        				<li>Diagnostic Services</li>
								<li>Professional Consultation</li>
								<li>Tooth Implants</li>
								<li>Surgical Extractions</li>
								<li>Teeth Whitening</li>
        			</ul>
        			<p class="button text-center"><a href="#" class="btn btn-primary btn-outline-primary px-4 py-3">Order now</a></p>
        		</div>
        	</div>
        	<div class="col-md-3 ftco-animate">
        		<div class="pricing-entry pb-5 text-center">
        			<div>
	        			<h3 class="mb-4">Platinum</h3>
	        			<p><span class="price">$89.50</span> <span class="per">/ session</span></p>
	        		</div>
        			<ul>
        				<li>Diagnostic Services</li>
								<li>Professional Consultation</li>
								<li>Tooth Implants</li>
								<li>Surgical Extractions</li>
								<li>Teeth Whitening</li>
        			</ul>
        			<p class="button text-center"><a href="#" class="btn btn-primary btn-outline-primary px-4 py-3">Order now</a></p>
        		</div>
        	</div>
        </div>
    	</div>
    </section>

    <section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
              <h2>Subcribe to our Newsletter</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
              <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-8">
                  <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <h2 class="mb-2">Testimony</h2>
            <span class="subheading">Our Happy Customer Says</span>
          </div>
        </div>
        <div class="row justify-content-center ftco-animate">
          <div class="col-md-8">
            <div class="carousel-testimony owl-carousel ftco-owl">
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(images_user/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                    <p class="name">Dennis Green</p>
                    <span class="position">Marketing Manager</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(images_user/person_2.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Dennis Green</p>
                    <span class="position">Interface Designer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(images_user/person_3.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Dennis Green</p>
                    <span class="position">UI Designer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(images_user/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Dennis Green</p>
                    <span class="position">Web Developer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(images_user/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Dennis Green</p>
                    <span class="position">System Analytics</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-gallery">
    	<div class="container-wrap">
    		<div class="row no-gutters">
					<div class="col-md-3 ftco-animate">
						<a href="#" class="gallery img d-flex align-items-center" style="background-image: url(images_user/gallery-1.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="#" class="gallery img d-flex align-items-center" style="background-image: url(images_user/gallery-2.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="#" class="gallery img d-flex align-items-center" style="background-image: url(images_user/gallery-3.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="#" class="gallery img d-flex align-items-center" style="background-image: url(images_user/gallery-4.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>
						</a>
					</div>
        </div>
    	</div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <h2 class="mb-2">Latest Blog</h2>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20" style="background-image: url('images_user/image_1.jpg');">
              </a>
              <div class="text d-flex py-4">
                <div class="meta mb-3">
                  <div><a href="#">Sep. 20, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <div class="desc pl-3">
	                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
	              </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry" data-aos-delay="100">
              <a href="blog-single.html" class="block-20" style="background-image: url('images_user/image_2.jpg');">
              </a>
              <div class="text d-flex py-4">
                <div class="meta mb-3">
                  <div><a href="#">Sep. 20, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <div class="desc pl-3">
	                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
	              </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry" data-aos-delay="200">
              <a href="blog-single.html" class="block-20" style="background-image: url('images_user/image_3.jpg');">
              </a>
              <div class="text d-flex py-4">
                <div class="meta mb-3">
                  <div><a href="#">Sep. 20, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <div class="desc pl-3">
	                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
	              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-quote">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-6 pr-md-5 aside-stretch py-5 choose">
    				<div class="heading-section heading-section-white mb-5 ftco-animate">
	            <h2 class="mb-2">DentaCare Procedure &amp; High Quality Services</h2>
	          </div>
	          <div class="ftco-animate">
	          	<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. Because there were thousands of bad Commas, wild Question Marks and devious Semikoli</p>
	          	<ul class="un-styled my-5">
	          		<li><span class="icon-check"></span>Consectetur adipisicing elit</li>
	          		<li><span class="icon-check"></span>Adipisci repellat accusamus</li>
	          		<li><span class="icon-check"></span>Tempore reprehenderit vitae</li>
	          	</ul>
	          </div>
    			</div>
    			<div class="col-md-6 py-5 pl-md-5">
    				<div class="heading-section mb-5 ftco-animate">
	            <h2 class="mb-2">Get a Free Quote</h2>
	          </div>
	          <form action="#" class="ftco-animate">
	          	<div class="row">
	          		<div class="col-md-6">
		              <div class="form-group">
		                <input type="text" class="form-control" placeholder="Full Name">
		              </div>
	              </div>
	              <div class="col-md-6">
		              <div class="form-group">
		                <input type="text" class="form-control" placeholder="Email">
		              </div>
	              </div>
	              <div class="col-md-6">
	              	<div class="form-group">
		                <input type="text" class="form-control" placeholder="Phone">
		              </div>
		            </div>
	              <div class="col-md-6">
	              	<div class="form-group">
		                <input type="text" class="form-control" placeholder="Website">
		              </div>
		            </div>
		            <div class="col-md-12">
		              <div class="form-group">
		                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
		              </div>
		            </div>
		            <div class="col-md-12">
		              <div class="form-group">
		                <input type="submit" value="Get a Quote" class="btn btn-primary py-3 px-5">
		              </div>
	              </div>
              </div>
            </form>
    			</div>
    		</div>
    	</div>
    </section>
	<!-- Modal -->
<div class="modal fade" id="modalRequest" tabindex="-1" role="dialog" aria-labelledby="modalRequestLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="modalRequestLabel" style="font-size:30px; font-weight:bold; color:red">ĐẶT LỊCH KHÁM</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
		@php
			$patient_id = Session::get('id');
			$message = Session::get('message');
		@endphp
		<?php
			if(isset($message))
			{
				echo'<script type="text/javascript">alert("'.$message.'")</script>';
				Session::put('message',null);
			}
		?>
      <form action="{{route('book_appointment')}}" method="POST">
		{{csrf_field()}}
        @foreach($info_user_appointment as $key => $info_user)
		<input type="hidden" name="patient_id" value="{{$patient_id}}">
        <div class="form-group">
          <label class="text-black">Họ và tên (*)</label>
          <input type="text" class="form-control" name="full_name" value="{{$info_user->last_name}}" required>
        </div>
        <div class="form-group">
          <label for="appointment_email" class="text-black">Email (*)</label>
          <input type="text" class="form-control" name="email" value="{{$info_user->email}}" required readonly placeholder="{{$info_user->email}}">
        </div>
        <div class="form-group">
          <label for="appointment_email" class="text-black">Giới tính (*)</label>
          <select class="form-control" name="gender" required>
          @if($info_user->gender == 0)
            <option value="0" selected>Nam</option>
            <option value="1">Nữ</option>
          @else
            <option value="0">Nam</option>
            <option value="1" selected>Nữ</option>
          @endif
          </select>
        </div>
        <div class="form-group">
          <label for="appointment_email" class="text-black">Ngày sinh</label>
          <input type="date" class="form-control" name="birth_date" value="{{$info_user->birth_date}}" required>
        </div>
        <div class="form-group">
          <label for="appointment_email" class="text-black">Số điện thoại</label>
          <input type="text" class="form-control" name="phone" value="{{$info_user->phone}}" required>
        </div>
		@endforeach
        <div class="form-group">
          <label class="text-black">Triệu chứng</label>
          <textarea name="symptoms" class="form-control" cols="10" rows="5"></textarea>
        </div>
		<div class="form-group">
          <label class="text-black">Bác sĩ</label>
          <select class="form-control" name="doctor_id" id="get_schedule" onchange="scheduleFunction()" required>
		  	@foreach($info_doctor_appointment as $key => $info_doctor)
            	<option value="{{$info_doctor->id}}">{{$info_doctor->last_name}}</option>
			@endforeach
          </select>
        </div>
		<p id="demo"></p>
        <div class="form-group" id="show_schedule">
		
			@include('user.schedule')
			<!-- <ul>
				<li style="display:inline;margin:5px; border:1px solid black; border-radius:5px;padding:1px;" date="01/05" id="date" onclick="get_date()">
					2022/01/05
				</li>
				<li style="display:inline;margin:5px; border:1px solid black; border-radius:5px;padding:1px;" onclick="get_date()">
					02/05
				</li>
				<li style="display:inline;margin:5px; border:1px solid black; border-radius:5px;padding:1px;" onclick="get_date()">
					03/05
				</li>
			</ul> -->


        </div>

        <!-- <div class="form-group">
          <label for="appointment_email" class="text-black">Ca làm</label>
          <input type="text" class="form-control">
        </div> -->

        <div class="form-group">
          <label for="appointment_email" class="text-black">Giờ <span id="get_time"></span></label><br>
		  <table>
                          <tbody>
                            <tr>
                              <td><input type="button" value="08:00 - 08:30" class="btn btn-success" style="padding:5px; margin:5px;" id="time" onclick="timeFunction()"></td>
                              <td><input type="button" value="08:30 - 09:00" class="btn btn-success" style="padding:5px; margin:5px;" id="time2" onclick="timeFunction2()"></td>
                              <td><input type="button" value="09:00 - 09:30" class="btn btn-success" style="padding:5px; margin:5px;" id="time3" onclick="timeFunction3()"></td>
                              <td><input type="button" value="09:30 - 10:00" class="btn btn-success" style="padding:5px; margin:5px;" id="time4" onclick="timeFunction4()"></td>
                            </tr>
                            <tr>
                              <td><input type="button" value="10:00 - 10:30" class="btn btn-success" style="padding:5px; margin:5px;" id="time5" onclick="timeFunction5()"></td>
                              <td><input type="button" value="10:30 - 11:00" class="btn btn-success" style="padding:5px; margin:5px;" id="time6" onclick="timeFunction6()"></td>
                              <td><input type="button" value="11:00 - 11:30" class="btn btn-success" style="padding:5px; margin:5px;" id="time7" onclick="timeFunction7()"></td>
                              <td><input type="button" value="11:30 - 12:00" class="btn btn-success" style="padding:5px; margin:5px;" id="time8" onclick="timeFunction8()"></td>
                            </tr>
                            <tr>
                              <td><input type="button" value="13:00 - 13:30" class="btn btn-success" style="padding:5px; margin:5px;" id="time9" onclick="timeFunction9()"></td>
                              <td><input type="button" value="13:30 - 14:00" class="btn btn-success" style="padding:5px; margin:5px;" id="time10" onclick="timeFunction10()"></td>
                              <td><input type="button" value="14:00 - 14:30" class="btn btn-success" style="padding:5px; margin:5px;" id="time11" onclick="timeFunction11()"></td>
                              <td><input type="button" value="14:30 - 15:00" class="btn btn-success" style="padding:5px; margin:5px;" id="time12" onclick="timeFunction12()"></td>
                            </tr>
                            <tr>
                              <td><input type="button" value="15:00 - 15:30" class="btn btn-success" style="padding:5px; margin:5px;" id="time13" onclick="timeFunction13()"></td>
                              <td><input type="button" value="15:30 - 16:00" class="btn btn-success" style="padding:5px; margin:5px;" id="time14" onclick="timeFunction14()"></td>
                              <td><input type="button" value="16:00 - 16:30" class="btn btn-success" style="padding:5px; margin:5px;" id="time15" onclick="timeFunction15()"></td>
                              <td><input type="button" value="16:30 - 17:00" class="btn btn-success" style="padding:5px; margin:5px;" id="time16" onclick="timeFunction16()"></td>
                            </tr>
                          </tbody>
                        </table>
        </div>
        <div class="form-group">
          <input type="submit" value="Đặt lịch" name="book" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<script>
	function scheduleFunction()
	{
		var select = document.getElementById('get_schedule');
		var value = select.options[select.selectedIndex].value;
		$.ajaxSetup({
    	headers: {
        			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
		$.ajax({
			url:"{{URL::to('/')}}",
			type:"GET",
			data:{option:value},
			success:function(data)
			{
				console.log(value);
				console.log(data);
				$("#show_schedule").html(data);
			}
			});
	}

	// function get_date()
	// {
		
	// 	// var date = document.getElementById('date').value;
	// 	// console.log(date);
	// 	$('#date').html('2');
	// }
	function timeFunction()
	{
		var time = document.getElementById('time').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold;">'
		$('#get_time').html(text);
	}
	function timeFunction2()
	{
		var time = document.getElementById('time2').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold;">'
		$('#get_time').html(text);
	}
	function timeFunction3()
	{
		var time = document.getElementById('time3').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold;">'
		$('#get_time').html(text);
	}
	function timeFunction4()
	{
		var time = document.getElementById('time4').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold;">'
		$('#get_time').html(text);
	}
	function timeFunction5()
	{
		var time = document.getElementById('time5').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold;">'
		$('#get_time').html(text);
	}
	function timeFunction6()
	{
		var time = document.getElementById('time6').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold;">'
		$('#get_time').html(text);
	}
	function timeFunction7()
	{
		var time = document.getElementById('time7').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold;">'
		$('#get_time').html(text);
	}
	function timeFunction8()
	{
		var time = document.getElementById('time8').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold;">'
		$('#get_time').html(text);
	}
	function timeFunction9()
	{
		var time = document.getElementById('time9').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold;">'
		$('#get_time').html(text);
	}
	function timeFunction10()
	{
		var time = document.getElementById('time10').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold;">'
		$('#get_time').html(text);
	}
	function timeFunction11()
	{
		var time = document.getElementById('time11').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold;">'
		$('#get_time').html(text);
	}
	function timeFunction12()
	{
		var time = document.getElementById('time12').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold;">'
		$('#get_time').html(text);
	}
	function timeFunction13()
	{
		var time = document.getElementById('time13').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold;">'
		$('#get_time').html(text);
	}
	function timeFunction14()
	{
		var time = document.getElementById('time14').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold;">'
		$('#get_time').html(text);
	}
	function timeFunction15()
	{
		var time = document.getElementById('time15').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold;">'
		$('#get_time').html(text);
	}
	function timeFunction16()
	{
		var time = document.getElementById('time16').value;
		console.log(time);
		let text = '<input type="text" value="'+time+'" name="time" readonly required style="border:1px solid white;font-size:17px;font-weight:bold;">'
		$('#get_time').html(text);
	}

$('body').on('click', '#get_date', function()
  {
    let date = $(this).attr("date");
	// console.log(date);
	let text = '<input type="text" value="'+date+'" name="date" readonly required style="border:1px solid white;font-size:17px;font-weight:bold;">'
	$('#show_date').html(text);
   });

</script>
@endsection