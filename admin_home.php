<?php
	session_start();
	if(!isset($_SESSION['uname'])){
		header("location:index.php");
    }
	$uname = $_SESSION['uname'];
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
	$result = $conn->query($sql);
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
			<link rel="stylesheet" href="css/styles.css">
			
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
			
			<script>
				/* When the user clicks on the button, 
				toggle between hiding and showing the dropdown content */
				function myFunction() {
				document.getElementById("myDropdown").classList.toggle("show");
				}

				// Close the dropdown if the user clicks outside of it
				window.onclick = function(event) {
				if (!event.target.matches('.dropbtn')) {
					var dropdowns = document.getElementsByClassName("dropdown-content");
					var i;
					for (i = 0; i < dropdowns.length; i++) {
					var openDropdown = dropdowns[i];
					if (openDropdown.classList.contains('show')) {
						openDropdown.classList.remove('show');
					}
					}
				}
				}
			</script>

			<script>
				/* When the user clicks on the button, 
				toggle between hiding and showing the dropdown content */
				function dropFunction() {
				document.getElementById("Dropdown").classList.toggle("show");
				}

				// Close the dropdown if the user clicks outside of it
				window.onclick = function(event) {
				if (!event.target.matches('.btn')) {
					var dropdowns = document.getElementsByClassName("dropdown_content");
					var i;
					for (i = 0; i < dropdowns.length; i++) {
					var openDropdown = dropdowns[i];
					if (openDropdown.classList.contains('show')) {
						openDropdown.classList.remove('show');
					}
					}
				}
				}
			</script>
		</head>
		<body>

			<!-- Start Header Area -->
			<header class="default-header">
				<div class="menutop-wrap">
					<div class="menu-top container" style="margin-left:7%;">
					<div class="form-group has-feedback has-feedback-left">
						<!-- <label>Pickup Location</label> -->
						<!-- \\] -->
						<!-- <input type="text" style="text-align:center; margin-left:20%" size="100"  placeholder="Pickup Location" /> -->
						
					 </div>
						<div class="d-flex justify-content-between align-items-center">
							<ul>
								<li><a href="contact_us.php">+91 8095566699   |   contact.azeempatel@gmail.com</a></li>
								<li><i class="glyphicon glyphicon-map-marker"></i></li>								
							</ul>
							<?php
							if($username == ""){
								echo '<ul class="list">
								<span class="glyphicon glyphicon-user"> </span>
								<li><a href="#"> Welcome </a></li>
							</ul>';
							}
							else{
                                echo '<ul class="list">
                                <span class="glyphicon glyphicon-user"> </span>
								<li><a href="#" style="margin-right:20px">Welcome '.$uname.' </a></li>
							</ul>';
							}
							
							?>
							<ul class="list">
								<li><a href="faq.php">Help ?</a></li>
							</ul>
							<ul class="list">
								<li><span class="glyphicon glyphicon-log-out" style="float:right; margin-right:25px; margin-left:20px; font-size:20px"> </span><a href="logout.php">Logout</a></li>
							</ul>
						</div>
					</div>	
					<br>				
				</div>
				<nav class="navbar navbar-expand-lg  navbar-light" style="margin-left:5%">
					<div class="container" style="width:1500px;">
					<div class="dropdown">
							<button onclick="myFunction()" class="btn"><span class="glyphicon glyphicon-align-justify"></span></button>
							<div id="myDropdown" class="dropdown-content">
								<a href="profile.php">Profile</a>
								<a href="order_status.php">Order Status</a>
								<a href="order_history.php">Order History</a>
								<a href="favourite.php">Wishlist</a>
								<a href="cart.php">Cart</a>
								<a href="logout.php">Logout</a>
								<a href="contact_us.php">Help...?</a>
							</div>
						</div>
						  <a class="navbar-brand" href="#">
							  <img src="img/logo.png" alt="">
							  <p> Company Logo </p>
						  </a>
						  
						  <div class="search-form" style="margin-left:2%; margin-top:2.5%">
           					 <form action="#" method="get">
              					<input type="search" name="search" id="search" style="width:300px;" placeholder="Type keywords &amp; press enter...">
             					<button type="submit" class="d-none"></button>
           					 </form>
						  </div>
						  <div style="margin-left:1%; margin-top:1%"><a href="#"><span class="glyphicon glyphicon-search"> </span></a></div>
						  <div class="collapse navbar-collapse" style = "margin-left:3%;" id="navbarSupportedContent">
						    <ul class="navbar-nav" style="width:1500px; float:right">
								<li><a href="category.php">Home</a></li>
								<li><a href="transactions.php">Transactions</a></li>
								<li><a href="stock_alert.php">Stock Alert</a></li>
									<!-- Dropdown -->
									<li class="dropdown">
								      <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
								        Category
								      </a>
								      <div class="dropdown-menu">
								        <a class="dropdown-item" href="department.php?id1=Electronics">Electronics</a>
								        <a class="dropdown-item" href="department.php?id1=Groceries">Groceries</a>
								        <a class="dropdown-item" href="department.php?id1=Fashion">Fashion</a>
								        <a class="dropdown-item" href="department.php?id1=Medicines">Medicines</a>
								        <a class="dropdown-item" href="department.php?id1=Sport Equipments">Sport Equipments</a>
								        <a class="dropdown-item" href="tradepartmentcking.php?id1=Hardware">Hardware</a>
									  </div>
									  <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"> </span></a></li>
									  <li><a href="favourite.php"><span class="glyphicon glyphicon-heart"> </span></a></li>
								    </li>									
						    </ul>
						  </div>						
					</div>
				</nav>
			</header>
            <!-- End Header Area -->
			
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-xs-6 col-sm-12" style="margin-top:2%; margin-bottom:2%;">
					<div class="dropdown" style="margin-left:50%;">
							<button onclick="dropFunction()" class="btn"><span class="glyphicon glyphicon-th-large" style="color:black;font-size:25px"></span></span></button>
							<div id="Dropdown" class="dropdown_content">
								<a class="dropdown-item" href="department.php?id1=Electronics">Electronics</a>
								<a class="dropdown-item" href="department.php?id1=Groceries">Groceries</a>
								<a class="dropdown-item" href="department.php?id1=Fashion">Fashion</a>
								<a class="dropdown-item" href="department.php?id1=Medicines">Medicines</a>
								<a class="dropdown-item" href="department.php?id1=Sport Equipments">Sport Equipments</a>
								<a class="dropdown-item" href="department.php?id1=Hardware">Hardware</a>        
							</div>
						</div>

						<!-- Start Filter Bar -->
						<div class="filter-bar d-flex flex-wrap align-items-center">
							<a href="#" class="grid-btn active"><i class="fa fa-th" aria-hidden="true"></i></a>
							<a href="#" class="list-btn"><i class="fa fa-th-list" aria-hidden="true"></i></a>
							<div class="sorting">
								<select>
									<option value="1">Default sorting</option>
									<option value="1">Default sorting</option>
									<option value="1">Default sorting</option>
								</select>
							</div>
							<a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
								        Sort By
								      </a>
							    <div class="dropdown-menu">
								        <a class="dropdown-item" href="category_1.php">Price : Low to High</a>
								        <a class="dropdown-item" href="category_2.php">Price : High to Low</a>
							    </div>
							<div class="sorting mr-auto">
								<select>
									<option value="1">Show 12</option>
									<option value="1">Show 12</option>
									<option value="1">Show 12</option>
								</select>
							</div>
						</div>
						<!-- End Filter Bar -->
						<!-- Start Best Seller -->
						<section class="lattest-product-area pb-40 category-list">
						<br>
						<div class="container" style="margin-bottom:7%; margin-top:7%">
							<div class="row">
								<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
									<div class="login-form">
										<h3 class="billing-title text-center">User</h3>
										<p class="text-center mt-10 mb-10"> </p>
										
											<h5> Total Users: </h5>
											<br>
											<br>
											<input type="text" name = "new_password" placeholder="" onfocus="this.placeholder=''" onblur="this.placeholder = 'New Password*'" value = "Email Address" class="common-input mt-20" disabled>
											<br>        
											<a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
														Email Address:
													</a>
													<div class="dropdown-menu" style="margin-top:10px">
														<a class="dropdown-item" href="checkout.php">Registration</a>
														<a class="dropdown-item" href="confermation.php">Home Page</a>
													</div>
											</h5> 
											<div class="mt-20 d-flex align-items-center justify-content-between">
												<div class="d-flex align-items-center">
													<!-- <input type="checkbox" class="pixel-checkbox" id="login-1"><label for="login-1"></label> -->
												</div>
											</div>
											<button class="view-btn color-2 w-30 mt-20" onclick="location.href = 'user_details.php';"><span>User Details</span></button> &emsp; &emsp; &emsp;
											<button class="view-btn color-2 w-30 mt-20" onclick="location.href = 'order_status.php';"><span>View All Orders</span></button>
											<!-- <button class="view-btn color-2 w-100 mt-20"><span>View All Orders</span></button> -->
										
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
									<div class="login-form">
										<h3 class="billing-title text-center">Delivery Boy</h3>
										<p class="text-center mt-10 mb-10"> </p>

											
											<h5> Total Users: </h5>
											<br>
											<button class="view-btn color-2 w-100 mt-20" onclick="location.href = 'delivery_registration.php';"><span>Registration</span></button>
											<br>
											<input type="text" name = "new_password" placeholder="" onfocus="this.placeholder=''" onblur="this.placeholder = 'New Password*'" value = "Email Address" class="common-input mt-20" disabled>
											<br>        
											<a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
														Email Address:
													</a>
													<div class="dropdown-menu" style="margin-top:10px">
														<a class="dropdown-item" href="checkout.php">Registration</a>
														<a class="dropdown-item" href="confermation.php">Home Page</a>
													</div>
											</h5> 
											<div class="mt-20 d-flex align-items-center justify-content-between">
												<div class="d-flex align-items-center">
													<!-- <input type="checkbox" class="pixel-checkbox" id="login-1"><label for="login-1"></label> -->
												</div>
											</div>
											<button class="view-btn color-2 w-30 mt-20" onclick="location.href = 'delivery_personal.php';"><span>Personal</span></button> &emsp; &emsp; &emsp; &emsp;
											<button class="view-btn color-2 w-30 mt-20" onclick="location.href = 'delivery_work.php';"><span>Delivery Details</span></button>
											<button class="view-btn color-2 w-100 mt-20" onclick="location.href = 'delivery_history.php';"><span>View All Orders</span></button>
										
									</div>
								</div>
							</div>
						</div>
            </section>
            <!-- End Most Search Product Area -->

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
