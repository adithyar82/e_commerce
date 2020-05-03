<?php
    include('connect_db.php');
    session_start();
	$username = $_SESSION['username'];
    echo $_SESSION['username'];
    $sql = "SELECT * FROM order_status WHERE fname = '$username';";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            $final_cost = $row['final_cost'];
            $product_name = $row['product_name'];
			$order_id = $row['order_id'];
			$product_image = $row['$product_image'];

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

			<!-- Start category Area -->
			<!-- End category Area -->
			
						 
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
							$sql = "SELECT * FROM order_status WHERE status != 'delivered';";
							$result = $conn->query($sql);
							if($result->num_rows>0){
								while($row = $result->fetch_assoc()){
									$order_id = $row['order_id'];
									$product_name = $row['product_name'];
									$final_cost = $row['final_cost'];
									$status = $row['status'];
									$product_image = $row['product_image'];
									echo '<section class="brand-area pb-100">
									<div class="container">
										<div class="row logo-wrap"><div class="row logo-wrap">
										<div class="container">
											<img class="content-image" src="'.$product_image.'" alt="">
										</div>
									</div>
									<h3><br> Order ID &emsp; &emsp; &nbsp; &nbsp; &nbsp; &nbsp; : '.$order_id.' <br><br> Product Name &nbsp; &nbsp; &nbsp;: '.$product_name.'<br><br> Product Cost &emsp; &nbsp; &nbsp;: '.$final_cost.'<br><br> Pick Up Location &nbsp;: <br><br> Status &emsp; &emsp; &emsp;&emsp;&nbsp;&nbsp;&nbsp; : '.$status.' <br><br> Delivery Location: <br><br> Delivery &emsp; &emsp; &nbsp; &emsp; &nbsp : Delivered by today <br><br> </h3>';
									if(($status == "ordered") || ($status == "order accepted")){
										echo '<div class="container">
										<h5><a href = "tracking.php?id='.$order_id.'"><br></a><br></h5><br>
										</div>
									<div class="container">
										<h5><a href = "delivery_history.php?id1='.$order_id.'&id2=order cancelled"> Cancel Order <br></a><br></h5><br>
										</div>
									</div> ';
									}
									echo'
									<div class="container">
										<h5><a href = "tracking.php?id='.$order_id.'"><br></a><br></h5><br>
										</div>
									<div class="container">
										<h5><a href = "tracking.php?id='.$order_id.'">Track Your Order<br></a><br></h5><br>
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