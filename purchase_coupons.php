<?php
    include('connect_db.php');
    session_start();
	$username = $_SESSION['username'];
    echo $_SESSION['username'];
    $sql = "SELECT * FROM coupons";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            $coupon_code = $row['coupon_code'];
            $value = $row['value'];
			$minimum_cost = $row['cost'];

        }
    }
	?>
	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="CodePixar">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Shop</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/nice-select.css">
		    <link rel="stylesheet" href="css/ion.rangeSlider.css" />
		    <link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/main.css">
			<link href="style.css" rel="stylesheet">
        </head>
        <body>

            <!-- Start Header Area -->
            <header class="default-header">
				<div class="menutop-wrap">
					<div class="menu-top container" style="margin-left:3%;">
						<div class="form-group has-feedback has-feedback-left">
							<!-- <label>Pickup Location</label> -->
							<!-- \\] -->
							<!-- <input type="text" style="text-align:center; margin-left:20%" size="100"  placeholder="Pickup Location" /> -->
							
						</div>
						
						<div class="d-flex justify-content-between align-items-center">
								<li><a href="contact_us.php">+91 8095566699   |   contact.azeempatel@gmail.com</a></li>
								<li><i class="glyphicon glyphicon-map-marker"></i></li>								
						</div>
					</div>	
					<br>				
				</div>
				<nav class="navbar navbar-expand-lg  navbar-light" style="margin-right:20%">
					<div class="container" style="width:1500px;">

						  <a class="navbar-brand" style="margin-left:20px;" href="category.php">
							  <img style="margin-left:25px;" src="img/logo.png" alt="">
							  <p> Company Logo </p>
						  </a>
	
						  <div class="collapse navbar-collapse" style = "margin-left:83%;" id="navbarSupportedContent">
						    <ul class="navbar-nav" style="width:1500px;">
								<li><a href="D_homepage.php">Home</a></li>					
						    </ul>
						  </div>						
					</div>
				</nav>
			</header>
			<!-- End Header Area -->

			<!-- start banner Area -->
			<!-- <section class="banner-area relative" id="home">
				<div class="container-fluid">
					<div class="row fullscreen align-items-center justify-content-center">
						<div class="col-lg-6 col-md-12 padding: 40px;">
							<img class="img-fluid" src="img/c39.png" alt="" width="100%" height="100%">
						</div>
						<div class="banner-content col-lg-6 col-md-12">
							<h1 class="title-top"><span></span></h1>
							<h1 class="text-uppercase">
								FAST & CHEAP
							</h1>
						</div>							
					</div>
				</div>
			</section> -->
			<!-- End banner Area -->	

			<!-- Start category Area -->
			<!-- End category Area -->
			
			<!-- Start men-product Area -->
			<!-- <section class="men-product-area section-gap relative" id="men">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-40">
							<div class="title text-center">
								<h1 class="text-white mb-10">New Products</h1>
								<p class="text-white">Cheap and Fast</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-3 col-md-6 single-product">
						  <div class="content">
						      <div class="content-overlay"></div>
						  		 <img class="content-image img-fluid d-block mx-auto" src="img/c18.jpg" alt="">
						      <div class="content-details fadeIn-bottom">
							        <div class="bottom d-flex align-items-center justify-content-center">
										<a href="#"><span class="lnr lnr-heart"></span></a>
										<<a href="#"><span class="lnr lnr-layers"></span></a> -->
										<!-- <a href="#"><span class="lnr lnr-cart"></span></a> -->
			<!-- End men-product Area -->

			<!-- Start women-product Area -->
			<!-- <section class="women-product-area section-gap" id="women">
				<div class="container">
					<div class="countdown-content pb-40">
						<div class="title text-center">
							<h1 class="mb-10">Category</h1>
							<p>Cheap and Fast</p>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-3 col-md-6 single-product">
						  <div class="content">
						      <div class="content-overlay"></div>
						  		 <img class="content-image img-fluid d-block mx-auto" src="img/c13.jpg" alt="">
						      <div class="content-details fadeIn-bottom">
							        <div class="bottom d-flex align-items-center justify-content-center">
										<a href="#"><span class="lnr lnr-heart"></span></a>
										<!-- <a href="#"><span class="lnr lnr-layers"></span></a>
										<a href="#"><span class="lnr lnr-cart"></span></a> -->
						
			<!-- End women-product Area -->
			
			<!-- Start Count Down Area -->
			<!-- <div class="countdown-area">
				<div class="container">
					<div class="countdown-content">
						<div class="title text-center">
							<h1 class="mb-10">Exclusive Hot Deal Ends in:</h1>
							<p>Who are in extremely love with eco friendly system.</p>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-4 col-lg-4"></div>
						<div class="col-xl-6 col-lg-7">
							<div class="countdown d-flex justify-content-center justify-content-md-end" id="js-countdown">
								<div class="countdown-item">
									<!-- <div class="countdown-timer js-countdown-days time" aria-labelledby="day-countdown">

									</div> -->

									<!-- <div class="countdown-label" id="day-countdown">Days</div> -->
			<!-- End Count Down Area -->

			<!-- Start related-product Area --> 
			<!-- <section class="related-product-area section-gap" id="latest">
				<div class="container">
					<div class="related-content">
						<div class="title text-center">
							<h1 class="mb-10">Related Searched Products</h1>
							<p>Who are in extremely love with eco friendly system.</p>
						</div>
					</div>					
					<div class="row">
						<div class="col-lg-3 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="img/r1.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price"><span class="lnr lnr-tag"></span> Rs189.00</div>
								</div>
							</div>							
						</div>		
						<div class="col-lg-3 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="img/r2.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price"><span class="lnr lnr-tag"></span> Rs189.00</div>
								</div>
							</div>							
						</div>		
						<div class="col-lg-3 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="img/r3.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price"><span class="lnr lnr-tag"></span> Rs189.00</div>
								</div>
							</div>							
						</div>		
						<div class="col-lg-3 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="img/r4.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price"><span class="lnr lnr-tag"></span> Rs189.00</div>
								</div>
							</div>							
						</div>	
						<!-- <div class="col-lg-3 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="img/r5.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price"><span class="lnr lnr-tag"></span> Rs189.00</div>
								</div>
							</div>							
						</div>		
						<div class="col-lg-3 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="img/r6.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price"><span class="lnr lnr-tag"></span> Rs189.00</div>
								</div>
							</div>							
						</div>		
						<div class="col-lg-3 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="img/r7.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price"><span class="lnr lnr-tag"></span> Rs189.00</div>
								</div>
							</div>							
						</div>		
						<div class="col-lg-3 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="img/r8.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price"><span class="lnr lnr-tag"></span> Rs189.00</div>
								</div>
							</div>							
						</div>	
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="single-related-product d-flex">
								<a href="#"><img src="img/r9.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price"><span class="lnr lnr-tag"></span> Rs189.00</div>
								</div>
							</div>							
						</div>		
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="single-related-product d-flex">
								<a href="#"><img src="img/r10.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price"><span class="lnr lnr-tag"></span> Rs189.00</div>
								</div>
							</div>							
						</div>		
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="single-related-product d-flex">
								<a href="#"><img src="img/r11.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price"><span class="lnr lnr-tag"></span> Rs189.00</div>
								</div>
							</div>							
						</div>		
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="single-related-product d-flex">
								<a href="#"><img src="img/r12.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price"><span class="lnr lnr-tag"></span> Rs189.00</div>
								</div>
							</div>							
						</div>																		 -->
					</div>
			</section>
			<!-- End related-product Area -->
	
			<!-- Start brand Area -->
			
							<!-- <a class="col single-img" href="#">
								<img class="d-block mx-auto" src="img/br1.png" alt="">
							</a>
							<a class="col single-img" href="#">
								<img class="d-block mx-auto" src="img/br2.png" alt="">
							</a>
							<a class="col single-img" href="#">
								<img class="d-block mx-auto" src="img/br3.png" alt="">
							</a>
							<a class="col single-img" href="#">
								<img class="d-block mx-auto" src="img/br4.png" alt="">
							</a>
							<a class="col single-img" href="#">
								<img class="d-block mx-auto" src="img/br5.png" alt="">
							</a> -->
							<br>
							<h3 style="margin-left:45%"> Current Orders </h3>
							<?php
							include('connect_db.php');
							$sql = "SELECT * FROM coupons";
							$result = $conn->query($sql);
							if($result->num_rows>0){
								while($row = $result->fetch_assoc()){
									$coupon_code = $row['coupon_code'];
									$value = $row['value'];
									$minimum_cost = $row['cost'];
									// $status = $row['status'];
									// $product_image = $row['product_image'];
                                    echo '<section class="brand-area pb-100">
                                    <div class="container">
                                    <div class="container">
                                    <div class="row logo-wrap"><div class="row logo-wrap">
                                    <div class="container">
                                    <h3><br> Coupon Code &emsp; &emsp; &nbsp; &nbsp; &nbsp; &nbsp; : '.$coupon_code.' <br><br> Value &nbsp; &nbsp; &nbsp;: '.$value.'<br><br>Cost &emsp; &nbsp; &nbsp;: '.$minimum_cost.'<br><br>
                                    </div>
                                </div>
									</div>';
	
									
									echo'
									<div class="container">
										<h5><a href = "tracking.php?id='.$order_id.'"><br></a><br></h5><br>
										</div>
									<div class="container">
										<h5><a href = "updated_cart.php?id='.$value.'">Apply Coupon<br></a><br></h5><br>
										</div>
									</div>
								
								
										
									
							</section>';
							
									
								}
							}
							?>
                            
                            <!-- <h3> Product Name: </h3>
                            <br> -->
						
				
			<!-- End brand Area -->

			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-3  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>About Us</h6>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.
								</p>
							</div>
						</div>
						<div class="col-lg-3  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>Newsletter</h6>
								<p>Stay update with our latest</p>
								<div class="" id="mc_embed_signup">

										<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">

										<div class="d-flex flex-row">

											<input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">


				                            	<button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
				                            	<div style="position: absolute; left: -5000px;">
													<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
												</div>
				                          	
											<!-- <div class="col-lg-4 col-md-4">
												<button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
											</div>  -->
										</div>		
										<div class="info"></div>
										</form>
								</div>
								</div>
						</div>						
						<div class="col-lg-3  col-md-6 col-sm-6">
							<div class="single-footer-widget mail-chimp">
								<h6 class="mb-20">Instragram Feed</h6>
								<ul class="instafeed d-flex flex-wrap">
									<li><img src="img/i1.jpg" alt=""></li>
									<li><img src="img/i2.jpg" alt=""></li>
									<li><img src="img/i3.jpg" alt=""></li>
									<li><img src="img/i4.jpg" alt=""></li>
									<li><img src="img/i5.jpg" alt=""></li>
									<li><img src="img/i6.jpg" alt=""></li>
									<li><img src="img/i7.jpg" alt=""></li>
									<li><img src="img/i8.jpg" alt=""></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>Follow Us</h6>
								<p>Let us be social</p>
								<div class="footer-social d-flex align-items-center">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-dribbble"></i></a>
									<a href="#"><i class="fa fa-behance"></i></a>
								</div>
							</div>
						</div>							
					</div>
					<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">

						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						<p class="footer-text m-0">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserveds</p>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
				</div>
			</footer>	
			<!-- End footer Area -->		

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>
			<script src="js/jquery.sticky.js"></script>
			<script src="js/ion.rangeSlider.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>
            <script src="js/owl.carousel.min.js"></script>			
			<script src="js/main.js"></script>	
			
		</body>
	</html>