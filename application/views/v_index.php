
	

	<div class="slideshow">
		<ul class="bxslider">
		<?
		foreach ($etc->img as $key => $value) {
			?>
			<li><a href="<?=$value->link?>"><img src="<?=site_url('media/etc/'.$value->picture)?>"></a></li>
			<?
		}
		?>
		</ul>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
		  $('.bxslider').bxSlider({
		  	mode: 'horizontal',
		  	responsive: true,
		  	auto: true,
		  	pause: 4000,
		  	controls: false,
		  });
		});
	</script>


	<!-- h_service -->
	<div class="h_service" id="h_service">
		<div class="container">
			<div class="row">
				<div class="col s12 m4 l4">
					<a href="#h_contact">
						<div class="icon"><img src="<?echo site_url();?>images/phone_icon.png"></div>
						<p>Join Today</p>
					</a>
				</div>
				<div class="col s12 m4 l4">
					<a href="#h_contact">
						<div class="icon"><img src="<?echo site_url();?>images/headphone_icon.png"></div>
						<p>Ask Question</p>
					</a>
				</div>
				<div class="col s12 m4 l4">
					<a href="#h_contact">
						<div class="icon"><img src="<?echo site_url();?>images/mail_icon.png"></div>
						<p>Contact Us</p>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- end h_service -->


	<!-- h_about -->
	<div class="h_about" id="h_about">
		<div class="container">
			<h1 class="section_header blue_frame bg_center">what we do</h1>
			<div class="description">
				<p><?=$etc->what?></p>
			</div>
			<div class="h_about_link">
				<a href="<?echo site_url('about');?>">
					<div class="icon">
						<i class="material-icons">person</i>
						<span>Our team</span>
					</div>
				</a>
				<a href="<?echo site_url('about');?>#faq">
					<div class="icon">
						<i class="material-icons">question_answer</i>
						<span>FAQ</span>
					</div>
				</a>
			</div>
		</div>
	</div>
	<!-- end h_about -->


	<!-- h_news -->
	<div class="h_news" id="h_news">
		<div class="container">
			<h1 class="section_header white_frame bg_left header_padding_left">what's news</h1>

			<div class="row">
				<?
				foreach ($news_list as $key => $value) {
					?>
					<div class="col s12 m6 l6">
						<a href="<?echo site_url('news/detail/'.$value->id);?>"><img class="responsive-img img_overlay" src="<?echo site_url('media/news/'.$value->picture_tmb);?>"></a>
						<div class="description" id="readmore">
							<h3><a href="<?echo site_url('news/detail/'.$value->id);?>"><?=$value->title?></a></h3>
							<p><?=$value->description?></p>
						</div>
					</div>
					<?
				}
				?>
			</div>

			<div class="viewall">
				<a href="<?echo site_url('news');?>">
					<span>view all</span>
					<div class="viewall_icon">
						
					</div>
				</a>
			</div>

		</div>
	</div>
	<!-- end h_news -->


	<!-- h_gallery -->
	<div class="h_gallery" id="h_gallery">
		<div class="thumb_wrapper">
			<?
			foreach ($gallery as $key => $value) {
				?>
				<div class="thumb1">
					<a href="#">
						<div class="gallery_albumn">
							<img src="<?=@site_url('media/gallery/'.$value->img[0]->picture)?>">
						</div>
						<span class="gallery_text">
							<span><?=$value->name?></span>
						</span>
					</a>
				</div>
				<?
			}
			?>
			
				<div class="thumb1">
					<div class="viewall viewall_icon">
						<a href="<?echo site_url('gallery');?>">
							<span>see all<br>our great moment</span>
							<div class="viewall_icon">
								
							</div>
						</a>
					</div>
				</div>
			<!-- </div> -->
		</div>
	</div>
	<!-- end h_gallery -->



	<!-- h_feedback -->
	<div class="h_feedback" id="h_feedback">
		<div class="container">
			<h1 class="section_header blue_frame bg_left header_padding_left">feed back</h1>
		</div>

		<!-- feedback_list -->
		<div class="feedback_list">
			<div class="slider1">
			<?
			foreach ($feedback as $key => $value) {
				?>
				<div class="slide">
				<a href="testimonial.php"><img class="img_overlay" src="<?=site_url('media/feedback/'.$value->picture)?>"></a>
					<div class="feed_desc" id="feed_desc">
					  	<a href="<?echo site_url('testimonial');?>"><strong><?=$value->name?></strong></a>
					  	<p><?=$value->position?></p>
					</div>
				</div>
				<?
			}
			?>
			</div>
		</div>
		<!-- end feedback_list -->

	</div>
	<!-- end h_feedback -->


	<script type="text/javascript">
		$(document).ready(function(){
		  $('.slider1').bxSlider({
		    slideWidth: 330,
		    minSlides: 1,
		    maxSlides: 3,
		    moveSlides: 1,
		    slideMargin: 15,
		    auto: true,
		    pager: false,
		    infiniteLoop: true,
		  });
		});
	</script>



	<!-- h_contact -->
	<div class="h_contact" id="h_contact">
		<div class="container">
			<h1 class="section_header blue_frame bg_left header_padding_left">contact us</h1>

			<div class="contact_form">
				<form>
					<div class="row">
						<div class="col s12 m6 l6">

							<div class="input-field col s12 m5 l5">
								<select class="browser-default" id="prefix">
									<option value="0" disabled selected>คำนำหน้า</option>
									<option value="นาย">นาย</option>
									<option value="นางสาว">นางสาว</option>
									<option value="อื่นๆ">อื่นๆ</option>
								</select>
							</div>

							<div class="input-field col s12 m7 l7">
					        	<input type="text" name="fullname" class="validate" id="fullname">
					        	<label for="fullname">ชื่อ - สกุล</label>
					        </div>

					        <div class="input-field col s12">
					        	<input id="email" type="email" class="validate">
					        	<label for="email">Email</label>
					        </div>

					        <div class="input-field col s12">
					        	<input id="phone" type="tel" class="validate">
					        	<label for="phone">Phone</label>
					        </div>

						</div>

						<div class="col s12 m6 l6">
							<div class="input-field col s12 m12 12">
								<select class="browser-default" id="topic">
									<option value="0" disabled selected>หัวข้อ</option>
									<option value="เรียนต่อต่างประเทศ">เรียนต่อต่างประเทศ</option>
									<option value="เรียนภาษาที่ต่างประเทศ">เรียนภาษาที่ต่างประเทศ</option>
									<option value="Summer camp">Summer camp</option>
									<option value="Study tour and Seminar">Study tour &amp; Seminar</option>
									<option value="อื่นๆ">อื่นๆ</option>
								</select>
							</div>
							<div class="input-field col s12">
					          <textarea id="textarea1" class="materialize-textarea"></textarea>
					          <label for="textarea1">ฝากข้อความไว้เลย</label>
					        </div>
						</div>

					</div>

					<!-- <div class="row"> -->
						<div class="submit_button">
							<a class="btn_blue" href="javascript:save_contact();">
								<span>Submit</span>
							</a>
						</div>
					<!-- </div> -->

				</form>
			</div>


			<div class="row">
				<div class="col s12 m12 l12">
					<div id="map"></div>
					
					<script>
				      function initMap() {
				        var firsthonor = {lat: 13.740988, lng: 100.557935};
				        var map = new google.maps.Map(document.getElementById('map'), {
				          zoom: 20,
				          center: firsthonor
				        });
				        var marker = new google.maps.Marker({
				          position: firsthonor,
				          map: map
				        });
				      }
				    </script>
				    <script async defer
				    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBM6tIT9W7qZ5huNRChyFR9jU36I5wnN4o&callback=initMap">
				    </script>

				</div>

				<!-- go to top -->
				<div class="col s12 m12 l12">
					<a href="#top_page"><div class="top"><img src="<?echo site_url();?>images/top.png"></div></a>
				</div>
				<!-- end go to top -->
			</div>


			<div class="blue_bg">
				<div class="container">
					<?php 
					$this->load->view('v_footer_white');
					?>
				</div>
			</div>

		</div>
	</div>
	<!-- end h_contact -->








</body>

</html>

<!-- Smooth Scroll -->
<script type="text/javascript">
	var nav_height = document.getElementById('nav').offsetHeight;
	// document.write('nav_height');

	$(function() {
	  $('a[href*="#"]:not([href="#"])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html, body').animate({
	          scrollTop: target.offset().top - nav_height
	        }, 1000);
	        return false;
	      }
	    }
	  });
	});
</script>





<!-- JS Dot Dot Dot -->
<!-- Home News Title -->
<script type="text/javascript">
	$(document).ready(function() {
		$("#readmore h3").dotdotdot({
			/*	The text to add as ellipsis. */
			ellipsis	: '... ',
	 
			/*	How to cut off the text/html: 'word'/'letter'/'children' */
			wrap		: 'word',
		
			/*	Optionally set a max-height, can be a number or function.
				If null, the height will be measured. */
			height		: 26,
	 
			/*	Callback function that is fired after the ellipsis is added,
				receives two parameters: isTruncated(boolean), orgContent(string). */
			callback	: function( isTruncated, orgContent ) {},
	 
			lastCharacter	: {
	 
				/*	Remove these characters from the end of the truncated text. */
				remove		: [ ' ', ',', ';', '.', '!', '?' ],
	 
				/*	Don't add an ellipsis if this array contains 
					the last character of the truncated text. */
				noEllipsis	: []
			}
		});
	});
</script>

<!-- Home News Description -->
<script type="text/javascript">
	$(document).ready(function() {
		$("#readmore p").dotdotdot({
			/*	The text to add as ellipsis. */
			ellipsis	: '... ',
	 
			/*	How to cut off the text/html: 'word'/'letter'/'children' */
			wrap		: 'word',
		
			/*	Optionally set a max-height, can be a number or function.
				If null, the height will be measured. */
			height		: 130,
	 
			/*	Callback function that is fired after the ellipsis is added,
				receives two parameters: isTruncated(boolean), orgContent(string). */
			callback	: function( isTruncated, orgContent ) {},
	 
			lastCharacter	: {
	 
				/*	Remove these characters from the end of the truncated text. */
				remove		: [ ' ', ',', ';', '.', '!', '?' ],
	 
				/*	Don't add an ellipsis if this array contains 
					the last character of the truncated text. */
				noEllipsis	: []
			}
		});
	});
</script>


<!-- Home Feedback Description -->
<script type="text/javascript">
	$(document).ready(function() {
		$("#feed_desc p").dotdotdot({
			/*	The text to add as ellipsis. */
			ellipsis	: '...',
	 
			/*	How to cut off the text/html: 'word'/'letter'/'children' */
			wrap		: 'word',
		
			/*	Optionally set a max-height, can be a number or function.
				If null, the height will be measured. */
			height		: 80,
	 
			/*	Callback function that is fired after the ellipsis is added,
				receives two parameters: isTruncated(boolean), orgContent(string). */
			callback	: function( isTruncated, orgContent ) {},
	 
			lastCharacter	: {
	 
				/*	Remove these characters from the end of the truncated text. */
				remove		: [ ' ', ',', ';', '.', '!', '?' ],
	 
				/*	Don't add an ellipsis if this array contains 
					the last character of the truncated text. */
				noEllipsis	: []
			}
		});
	});
	function save_contact() {
		var send_flag=true;
		var prefix=$("#prefix").val();
		var name=$("#fullname").val();
		var topic=$("#topic").val();
		var email=$("#email").val();
		var phone=$("#phone").val();
		var des=$("#textarea1").val();
		var err_txt="";
		if (prefix=="0"||prefix==""||prefix==null) {
			err_txt="กรุณาเลือก คำนำหน้าชื่อ";
			send_flag=false;
		}
		if (topic=="0"||topic==""||topic==null) {
			err_txt="กรุณาเลือก หัวข้อ";
			send_flag=false;
		}
		if (name=="") {
			err_txt="กรุณาเขียนชื่อ";
			send_flag=false;
		}
		if (phone=="") {
			err_txt="กรุณากรอกเบอร์โทรศัพท์";
			send_flag=false;
		}
		if (send_flag) {
            $.ajax({
                method: "POST",
                url: "<?php echo site_url('main/save_contact'); ?>",
                data: {
                    "prefix": prefix,
                    "name": name,
                    "topic": topic,
                    "Email": email,
                    "Phone": phone,
                    "des": des,
                }
            })
            .done(function(data) {
            	if (data['flag']=="OK") {
            		alert("ส่งข้อมูลเรียบร้อยแล้ว");
            	}
            });
        }else{
        	alert(err_txt);
        }
    }
</script>
