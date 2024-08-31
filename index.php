<?php
include("header.php");
?>

<!-- banner -->
		<div class="benner">
				<!-- slider -->
				<!--- img-slider --->
				<div class="img-slider">
						<!----start-slider-script---->
					<script src="js/responsiveslides.min.js"></script>
					 <script>
					    // You can also use "$(window).load(function() {"
					    $(function () {
					      // Slideshow 4
					      $("#slider4").responsiveSlides({
					        auto: true,
					        pager: true,
					        nav: true,
					        speed: 500,
					        namespace: "callbacks",
					        before: function () {
					          $('.events').append("<li>before event fired.</li>");
					        },
					        after: function () {
					          $('.events').append("<li>after event fired.</li>");
					        }
					      });
					
					    });
					  </script>
					<!----//End-slider-script---->
					<!-- Slideshow 4 -->
					    <div  id="top" class="callbacks_container">
					      <ul class="rslides" id="slider4">
					        <li>
					          <img class="img-responsive" src="images/banner3.jpg" style="width:100%; height:400px;"alt="">
					         
					        </li>
					        <li>
					          <img src="images/banner4.jpg" alt="">
					          
					        </li>
					        <li>
					          <img src="images/banner5.jpg" alt="">
					          
					        </li>
					      </ul>
					    </div>
					    <div class="clearfix"> </div>
					</div>
						<!-- slider -->
					</div>
		<!-- /banner -->
		<!-- top-grids -->
		<div class="top-grids text-center">
			
			
		</div>
		<!-- top-grids -->
		<!-- mid-grids -->
		<div class="mid-grids">
			<div class="col-md-7 ">
				<img src="images/side1.png" style="width:100%; height:550px;">
			</div>
			<div class="col-md-5 mid-grid-right">
				<h2>Welcome to E-Medicine</h2>
				<p align="justify">E-Med.com, India Ki Pharmacy, is brought to you by the Palak & Saba Company – one of India’s most trusted pharmacies, with over 2 years’ experience in dispensing quality medicines. At E-Med.com, we help you look after your own health effortlessly as well as take care of loved ones wherever they may reside in India. You can buy and send medicines from any corner of the country with just a few clicks of the mouse.</p>
				<p align="justify">What we do  Offer fast online access to medicines with convenient home delivery by our distributor in each city.</p>
				<p align="justify">At E-Med.com, we make a wide range of prescription medicines and other health products conveniently available all across India. Even second and third tier cities and rural villages can now have access to the latest medicines. Since we also offer all medicines, online buyers can expect significant savings.</p>
				
			</div>
			<div class="clearfix"> </div>
		</div>
		<!-- mid-grids -->
	
		
		<!-- team -->
		
		<!-- team-grids-caption -->
		<div class="team-grids-caption">
								<div class="container">
									<div class="team-grids-caption-left">
										<center><h4>Simplifying Healthcare, Impacting Lives.</h4></center>
										
									</div>
									
									<div class="clearfix"> </div>
								</div>
							</div>
		<!-- team-grids-caption -->


<?php
include("footer.php");
?>