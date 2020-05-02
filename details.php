<?php
	session_start();
	$uname = $_SESSION['uname'];
	$product_name = $_REQUEST['id'];
	echo $_SESSION['username'];
	include('connect_db.php');
	$registration_status = $_REQUEST['id1'];
	$encrypted = $_REQUEST['id2'];
	function my_simple_crypt( $string, $action = 'd') {
    // you may change these values to your own
    $secret_key = 'my_simple_secret_key';
    $secret_iv = 'my_simple_secret_iv';
  
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
  
    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }
  
    return $output;
  }
	$email_address = my_simple_crypt($encrypted, 'd' );
	echo $email_address;
	$sql = "UPDATE Users SET registration_status = '$registration_status' WHERE email_address = '$email_address';";
	$result = $conn->query($sql)
?>
	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<style>
	.main {
		margin-left: 10%;
		margin-top: 15%;
	}
	.rating-star {
		direction: rtl;
		font-size: 40px;
		unicode-bidi: bidi-override;
		display: inline-block;
	}
	.rating-star input {
		opacity: 0;
		position: relative;
		left: -30px;
		z-index: 2;
		cursor: pointer;
	}
	.rating-star span.star:before {
		color: #777777;
	}
	.rating-star span.star {
		display: inline-block;
		font-family: FontAwesome;
		font-style: normal;
		font-weight: normal;
		position: relative;
		z-index: 1;
	}
	.rating-star span {
		margin-left: -30px;
	}
	.rating-star span.star:before {
		color: #777777;
		content:"\f006";
	}
	.rating-star input:hover + span.star:before, .rating-star input:hover + span.star ~ span.star:before, .rating-star input:checked + span.star:before, .rating-star input:checked + span.star ~ span.star:before {
		color: #ffd100;
		content:"\f005";
	}
	
	.selected-rating{
		color: #ffd100;
		font-weight: bold;
		font-size: 42px;
	}
	</style>
	<script>
		$('#rating-form').on('change','[name="rating"]',function(){
		$('#selected-rating').text($('[name="rating"]:checked').val());
	});
	</script>

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
			<style>
				#myDIV {
				width: 100%;
				padding: 50px 0;
				text-align: center;
				margin-top: 20px;
				}
			</style>
			<script>
				$('#row').pagination({
				dataSource: [1, 2, 3, 4, 5, 6, 7, ... , 40],
				pageSize: 5,
				showGoInput: true,
				showGoButton: true,
				callback: function(data, pagination) {
					// template method of yourself
					var html = template(data);
					dataContainer.html(html);
				}
			})
			</script>
			<script type="text/javascript">
				function Copy() 
				{
					alert("Link has been copied to the clipboard")
					var Url = document.getElementById("paste-box");
					Url.value = window.location.href;
					Url.focus();
					Url.select();  
					document.execCommand("Copy");
				}
			</script>
			<script>
				function myFunction() {
					var x = document.getElementById("myDIV");
					if (x.style.display === "none") {
						x.style.display = "block";
					} else {
						x.style.display = "none";
					}
				}
			</script>
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
		    <section>
							<div class="row">
								<div class="col-lg-8" style="margin-left:10%;margin-top:5%;">
									<?php 
										include('connect_db.php');
										//   session_start();
										$sql = "SELECT * FROM products WHERE product_name = '$product_name';";
										$result = $conn->query($sql);
										if($result->num_rows>0){
											while($row = $result->fetch_assoc()){
												
												$product_id = $row['product_id'];
												$product_name = $row['product_name'];
												$initial_cost = $row['initial_cost'];
												$final_cost = $row['final_cost'];
												$product_image = $row['product_image'];
												$product_quantity = $row['product_quantity'];
												$discount=round((($initial_cost-$final_cost)/($initial_cost))*100);
												echo '<div class="col-md-6 single-product">
												<a href="cart_1.php?id1='.$final_cost.'&id2='.$product_id.'&id3= '.$product_name.'" style = "color : black"><span class="glyphicon glyphicon-plus" style="float:right; font-size:25px"> </span></a>
													<div class="content">
													<div class="content-overlay"></div>
														<img class=" img-fluid d-block mx-auto" src="'.$product_image.'" alt="">
													<div class="content-details fadeIn-bottom">
													
															<div class="bottom d-flex align-items-center justify-content-center">
																<a href="favourite_1.php?id1='.$final_cost.'&id2='.$product_id.'&id3= '.$product_name.'"><span class="lnr lnr-heart"></span></a>
																<a href="#" data-toggle="modal" data-target="#exampleModal"><span class="lnr lnr-frame-expand"></span></a>
															</div>
													</div>
												</div>';
											}

										}
									?>
								</div>
								<div class="col-lg-4" style="margin-left:10%;margin-bottom:5%;">
									<?php
										include('connect_db.php');
										//   session_start();
										$sql = "SELECT * FROM products where product_name = '$product_name';";
										$result = $conn->query($sql);
										$sql2 = "SELECT AVG(ratings) as average_ratings FROM product_ratings WHERE product_name = '$product_name';";
										$result2 = $conn->query($sql2);
										if($result2->num_rows>0){
											while($row = $result2->fetch_assoc()){
												$average_ratings = $row['average_ratings'];
											}
										}
										if($result->num_rows>0){
											while($row = $result->fetch_assoc()){
												
												$product_id = $row['product_id'];
												$product_name = $row['product_name'];
												$initial_cost = $row['initial_cost'];
												$final_cost = $row['final_cost'];
												$product_image = $row['product_image'];
												$product_quantity = $row['product_quantity'];
												$discount=round((($initial_cost-$final_cost)/($initial_cost))*100);

													echo '<div class="price">
												
														<h1 style="margin-bottom:3%;">'.$product_name.'</h1>
															<h4 class="text-white"><del style = "color : black">'.$initial_cost.'</del></h4>
														<h3 style="margin-bottom:3%;">'.$final_cost.'</h3>
														<h3 style="margin-bottom:3%;">You save '.$discount.'%</h3>
														<br>
														
									
														<a href=" favourite.php?id1='.$final_cost.'&id2='.$product_id.'&id3= '.$product_name.'" style = "font-size: 20px; color:black"><span class="glyphicon glyphicon-heart" style="font-size:25px; color:black; margin-right:3%;"></span>Add to Favourites</a><br>
														<br>
														<button value="Copy Url" onclick="Copy();" ><span class="glyphicon glyphicon-share-alt" style="font-size:25px; color:black; margin-right:3%;"> Share</span>
														<div>

															
															

														</div>
														</div>
														<br>';
														if($product_quantity<5){
															if($product_quantity==0){
															  echo'<p style = "color:red"> Out of Stock <p>';  
															}
															else{
															echo'<p style = "color:red"> Only '.$product_quantity.' left in stock<p>';
															echo '<button onclick="location.href = "confermation.php" ;" class="view-btn color-2 w-100 mt-10"><span>Buy Now</span></button>';
															}
														}
														else{
														echo'<button onclick="location.href = "confermation.php" ;" class="view-btn color-2 w-100 mt-10"><span>Buy Now</span></button>';
														}
														echo'
														<br>
														<br>
														<h5>Location</h5><br>
														<h5> Average Ratings: '.round($average_ratings,1).'</h5><br>
														
								
														<form method = "POST" action = "product_ratings.php">
														<span class="rating-star" style="margin-left:28%;">
															<input type="radio" name="rating" value="5"><span class="star"></span>
														
																<input type="radio" name="rating" value="4"><span class="star"></span>
														
																<input type="radio" name="rating" value="3"><span class="star"></span>
														
																<input type="radio" name="rating" value="2"><span class="star"></span>
														
															<input type="radio" name="rating" value="1"><span class="star"></span>
														</span>  
														<input type = "text" name = "product_name" value = "'.$product_name.'" hidden>  
														<input type = "submit" name = "submit" class="view-btn color-2 w-100 mt-10"><span></span>
														</form>
														
												</div>
												</div>
												<br>';
											}
										}
									?>
							</div>
						
							<div class="container" style="margin-bottom:5%;">
									<?php
										include('connect_db.php');
										//session_start();
										$sql = "SELECT * FROM products limit 1;";
										$result = $conn->query($sql);
		
										if($result->num_rows>0){
											while($row = $result->fetch_assoc()){
												
												$product_id = $row['product_id'];
												$product_name = $row['product_name'];
												$initial_cost = $row['initial_cost'];
												$final_cost = $row['final_cost'];
												$product_image = $row['product_image'];
												$discount=round((($initial_cost-$final_cost)/($initial_cost))*100);
												echo'<div class="reviews" style="margin-left:10%;margin-right:15%">
														<h5>Description</h5>
														<textarea type="text" name = "description" cols="10" rows="5" placeholder="Description*" onfocus="this.placeholder=" onblur="this.placeholder = Description*" required class="common-input mt-20"></textarea>
														<br>
														<h5>Reviews</h5>
														<form method = "POST" action = "product_reviews.php">
															<textarea type="text" name = "comment" cols="10" rows="5" placeholder="Comment*" onfocus="this.placeholder=" onblur="this.placeholder = Comment*" required class="common-input mt-20"></textarea>
															<input type = "text" name = "product_name" value = "'.$product_name.'" hidden> 
															<input type = "submit" name = "submit" class="view-btn color-2 w-100 mt-20"><span></span></button>
															
														</form>
														<button onclick="myFunction()" class="view-btn color-2 w-20 mt-10">View Reviews</button>
														<div id="myDIV">';
															$sql1 = "SELECT * FROM product_reviews WHERE product_name = '$product_name';";
															$result1 = $conn->query($sql1);
															if($result1->num_rows>0){
																while($row = $result1->fetch_assoc()){
																	$reviews = $row['reviews'];
																	echo '<h5>'.$reviews.'</h5><br>';
																}
															}
														echo'</div>
														';
											}
										}
									?>
							</div>	
																																										

			</section>		
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
						<p class="footer-text m-0">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</p>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </footer>   
            <!-- End footer Area -->       

			<!-- Modal Quick Product View -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="container relative">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<div class="product-quick-view">
							<div class="row align-items-center">
								<div class="col-lg-6">
									<div class="quick-view-carousel">
										<div class="item" style="background: url(img/organic-food/q1.jpg);">

										</div>
										<div class="item" style="background: url(img/organic-food/q1.jpg);">

										</div>
										<div class="item" style="background: url(img/organic-food/q1.jpg);">

										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="quick-view-content">
										<div class="top">
											<h3 class="head">Mill Oil 1000W Heater, White</h3>
											<div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span class="ml-10">Rs149.99</span></div>
											<div class="category">Category: <span>Household</span></div>
											<div class="available">Availibility: <span>In Stock</span></div>
										</div>
										<div class="middle">
											<p class="content">Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.</p>
											<a href="#" class="view-full">View full Details <span class="lnr lnr-arrow-right"></span></a>
										</div>
										<div class="bottom">
											<div class="color-picker d-flex align-items-center">Color: 
												<span class="single-pick"></span>
												<span class="single-pick"></span>
												<span class="single-pick"></span>
												<span class="single-pick"></span>
												<span class="single-pick"></span>
											</div>
											<div class="quantity-container d-flex align-items-center mt-15">
												Quantity:
												<input type="text" class="quantity-amount ml-15" value="1" />
												<div class="arrow-btn d-inline-flex flex-column">
													<button class="increase arrow" type="button" title="Increase Quantity"><span class="lnr lnr-chevron-up"></span></button>
													<button class="decrease arrow" type="button" title="Decrease Quantity"><span class="lnr lnr-chevron-down"></span></button>
												</div>

											</div>
											<div class="d-flex mt-20">
												<a href="#" class="view-btn color-2"><span>Add to Cart</span></a>
												<a href="#" class="like-btn"><span class="lnr lnr-layers"></span></a>
												<a href="#" class="like-btn"><span class="lnr lnr-heart"></span></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div> 
				</div>
			</div>

 

            <script src="js/vendor/jquery-2.2.4.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
            <script src="js/vendor/bootstrap.min.js"></script>
            <script src="js/jquery.ajaxchimp.min.js"></script>
            <script src="js/jquery.nice-select.min.js"></script>
            <script src="js/jquery.sticky.js"></script>
				<script src="js/nouislider.min.js"></script>
            <script src="js/jquery.magnific-popup.min.js"></script>
            <script src="js/owl.carousel.min.js"></script>            
            <script src="js/main.js"></script>  
        </body>
    </html>
