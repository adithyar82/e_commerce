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
			<link href="style.css" rel="stylesheet">

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
			<script type = "text/javascript">
			function displayNextImage() {
				x = (x === images.length - 1) ? 0 : x + 1;
				document.getElementById("img").src = images[x];
			}
  
			function displayPreviousImage() {
				x = (x <= 0) ? images.length - 1 : x - 1;
				document.getElementById("img").src = images[x];
			}
  
			function startTimer() {
				setInterval(displayNextImage, 3000);
			}
  
			var images = [], x = -1;
			images[0] = "img/E1.png";
			images[1] = "img/G.png";
			images[2] = "img/H.png";
			function myFunction() {
				document.getElementById("myDropdown").classList.toggle("show");
				}
			function dropFunction() {
			document.getElementById("Dropdown").classList.toggle("show");
			}
		</script>
			
		


		</head>
		<body onload = "startTimer()">>

			<!-- Start Header Area -->
			<header class="default-header ">
				<div class="menutop-wrap d-flex justify-content-center">
					<div class="menu-top container">
						<div class="form-group has-feedback has-feedback-left">
							<!-- <label>Pickup Location</label> -->
							<!-- \\] -->
							<!-- <input type="text" style="text-align:center; margin-left:20%" size="100"  placeholder="Pickup Location" /> -->
							
						</div>
						
						<div class="d-flex justify-content-between align-items-center">
							<ul class="list">
								<li><a href="contact_us.php">Contact Support</a></li>
							</ul>	
								<?php
							if($uname == ""){
								echo '
								<ul>
								<span class="glyphicon glyphicon-user"> 
								<li><a href="profile.php"> </span> </a></li>
								</ul>
							';
							}
							else{
								echo '
								<ul>
                                <span class="glyphicon glyphicon-user"> 
								<li><a href="profile.php" style="margin-right:20px"> '.$uname.'</span> </a>
								</ul>
								<ul>
								<li><a href="faq.php">Help ?</a></li>
								</ul>
							';
							}
							
							?>								
							</ul>
							
							
							<ul class="list">
								<span class="glyphicon glyphicon-log-out" style="font-size:20px;"></span>
								<li><a href="logout.php">Logout</a></li>
							</ul>
						</div>
					</div>	
					<br>				
				</div>
				<nav class="navbar navbar-expand-lg  navbar-light d-flex justify-content-center">
					<div class="container">
						<div class="dropdown">
							  <button onclick="myFunction()" class="btn"><span class="glyphicon glyphicon-align-justify"></span></button>
							  <div id="myDropdown" class="dropdown-content">
									<a href="profile.php"><span class="glyphicon glyphicon-user"> </span> Profile</a>
									<a href="order_status.php">Order Status</a>
									<a href="order_history.php">Order History</a>
									<a href="updated_favourite.php"><span class="glyphicon glyphicon-heart"></span> Wishlist</a>
									<a href="updated_cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a>
									<a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
									<a href="contact_us.php"><span class="glyphicon glyphicon-question-sign"></span> Help...?</a>
							  </div>
					      </div>
						  <a class="navbar-brand" style="margin-left:20px;" href="category.php">
							  <img style="margin-left:10px;" src="img/logo.png" alt="">
							  <p> Company Logo </p>
						  </a>
						  
						  <div class="search-form" style="margin-left:2%; margin-top:1.5%">
           					 <form action="#" method="get">
              					<input type="search" name="search" id="search" style="width:250px;" placeholder="Type keywords &amp; press enter...">
             					<button type="submit" class="d-none"></button>
           					 </form>
						  </div>
						
						  <div style="margin-left:1%; margin-top:1%"><a href="#"><span class="glyphicon glyphicon-search"> </span></a></div>
	
						  <div class="collapse navbar-collapse" style = "margin-left:3%;" id="navbarSupportedContent">
						    <ul class="navbar-nav" style="width:1500px;">
								<li><a href="category.php">Home</a></li>
								<!-- <li><a href="#latest">Recommendations</a></li> -->
									<!-- Dropdown -->
								    <li class="dropdown">
								      <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
								        Orders
								      </a>
								      <div class="dropdown-menu" style="margin-top:10px">
								        <a class="dropdown-item" href="order.php">Your Orders</a>
								        <a class="dropdown-item" href="order_status.php">Current Orders</a>
								        <!-- <a class="dropdown-item" href="login.php">Cancelled Orders</a> -->
								        <a class="dropdown-item" href="tracking.php">Tracking</a>
								      </div>
								    </li>
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
								        <a class="dropdown-item" href="department.php?id1=Hardware">Hardware</a>
									  </div>
									  <li><a href="updated_cart.php"><span class="glyphicon glyphicon-shopping-cart"> </span></a></li>
									  <li><a href="updated_favourite.php"><span class="glyphicon glyphicon-heart"> </span></a></li>
								    </li>									
						    </ul>
						  </div>						
					</div>
				</nav>
				<div class="menutop-wrap d-flex justify-content-center">
					<div class="menu-top container">
						<div class="form-group has-feedback has-feedback-left">
							<!-- <label>Pickup Location</label> -->
							<!-- \\] -->
							<!-- <input type="text" style="text-align:center; margin-left:20%" size="100"  placeholder="Pickup Location" /> -->
							
						</div>
						
						<div class="d-flex justify-content-center">
							<ul class="list">
							<li><a href="category.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
							<li class="dropdown">
							<span class="glyphicon glyphicon-tag"></span>
								      <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
								        Orders
								      </a>
								      <div class="dropdown-menu" style="margin-top:10px">
								        <a class="dropdown-item" href="order.php">Your Orders</a>
								        <a class="dropdown-item" href="order_status.php">Current Orders</a>
								        <!-- <a class="dropdown-item" href="login.php">Cancelled Orders</a> -->
								        <a class="dropdown-item" href="tracking.php">Tracking</a>
								      </div>
									</li>
									<li class="dropdown">
									<span class="glyphicon glyphicon-th-list"></span>
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
							 		<li><a href="updated_cart.php"><span class="glyphicon glyphicon-shopping-cart"> </span></a></li>
									  <li><a href="updated_favourite.php"><span class="glyphicon glyphicon-heart"> </span></a></li>
									</li>
									
								
								
															
							
							
							
							
							
						</div>
					</div>	
					<br>				
				</div>
			</header>
            <!-- End Header Area -->

            <!-- Start Banner Area -->
			<!-- <section class="banner-area relative" id="home">
				<div class="container-fluid">
					<div class="row fullscreen align-items-center justify-content-center">
						<div class="col-lg-6 col-md-12 d-flex align-self-end img-right no-padding">
							<div class="col-lg-6 col-md-6 slide-holder">
									<span id="slide-1"></span>
									<span id="slide-2"></span>
									<span id="slide-3"></span>
									<span id="slide-4"></span>
								<div class="col-lg-6 col-md-12  slide-group">
									<img src="img/E.png" class="slide-image" id="slide-1" /><img src="img/G.png" class="slide-image" id="slide-2"/><img src="img/H.png" class="slide-image" id="slide-3"/><img src="img/P.png" class="slide-image" id="slide-4" />
								</div>
								<div class="col-lg-6 col-md-12 slide-button-holder">
									<a href="#slide-1" class="slider-button"></a>
									<a href="#slide-2" class="slider-button"></a>
									<a href="#slide-3" class="slider-button"></a>
									<a href="#slide-4" class="slider-button"></a>
								</div>
							</div>
						</div>
						<div class="banner-content col-lg-6 col-md-6">
							<h1 class="title-top"><span>Flat</span> 50%Off</h1>
							<h1 class="text-uppercase">
								On Your <br>
								First Order
							</h1>
							<button class="primary-btn text-uppercase"><a href="#">Order Here</a></button>
						</div>							
					</div>
				</div>
			</section> -->
			<br>
			<br>
			<section class="banner-area relative" id="home">
				<div class="container-fluid">
					<div class="row fullscreen align-items-center justify-content-center">
						<div class="topstrip col-lg-8 col-md-12 d-flex align-self-end img-right no-padding" style = "float:left;">
							
									<img id="img" src="img/E1.png"/>
						</div>
						<div class="banner-content col-lg-4 col-md-12">
							<h1 class="title-top"><span>Flat</span> 50%Off</h1>
							<h1 class="text-uppercase">
								On Your <br>
								First Order
							</h1>
							
						</div>							
					</div>
				</div>
			</section>
            <!-- End Banner Area -->
			<div class="container d-flex justify-content-center" style="margin-top:2%; margin-bottom:2%;">
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-2">
							<a href="department.php?id1=Groceries">
								<img src="img/food.png" alt="">
								<span class="caption" style="display:block">Groceries</span>
							</a>
						</div>
						<div class="col-md-2">
							<a href="department.php?id1=Electronics">
								<img src="img/electronics.png" alt="">
								<span class="caption" style="display:block">Electronics</span>
							</a>
						</div>
						<div class="col-md-2">
							<a href="department.php?id1=Medicines">
								<img src="img/medical.png" alt="">
								<span class="caption" style="display:block">Medicines</span>
							</a>
						</div>
						<div class="col-md-2">
							<a href="department.php?id1=Fashion">
								<img src="img/vegetables.png" alt="">
							<span class="caption" style="display:block">Vegetables</span>
							</a>
						</div>
						<div class="col-md-2">
							<a href="department.php?id1=Hardware">
								<img src="img/hardware.png" alt="">
								<span class="caption" style="display:block">Hardware</span>
							</a>
						</div>
						<div class="col-md-2">
							<a href="department.php?id1=Hardware">
								<img src="img/food and beverage.png" alt="">
								<span class="caption" style="display:block">Beverage</span>
							</a>
						</div>
					</div>
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
							<div class="row" style="margin-bottom:3%; margin-top:3%">
							<?php 
								  include('connect_db.php');
								//   session_start();
								  $sql = "SELECT * FROM products WHERE category = 'Electronics' limit 4;";
								  $result = $conn->query($sql);
								  echo '
								  <h3 style = "margin-left:40px;"> Electronics </h3>
								  <br>
								  <a href="department.php?id1=Electronics" style="margin-left:65%;"> View All +</a>';
								  if($result->num_rows>0){
									  while($row = $result->fetch_assoc()){
										  
										  $product_id = $row['product_id'];
										  $product_name = $row['product_name'];
										  $initial_cost = $row['initial_cost'];
										  $final_cost = $row['final_cost'];
										  $product_image = $row['product_image'];
										  $product_quantity = $row['product_quantity'];
										  $discount=round((($initial_cost-$final_cost)/($initial_cost))*100);
										  echo '<div class="col-md-3 single-product">
										  <a href="cart_1.php?id1='.$final_cost.'&id2='.$product_id.'&id3= '.$product_name.'" style="margin-left:80%;"><img src="img/plus.png" alt=""></a>&nbsp;<a href="favourite_1.php?id1='.$final_cost.'&id2='.$product_id.'&id3= '.$product_name.'" style="margin-left:2%;"><img src="img/heart.png" alt=""></a>
											  <div class="content" style="border:10px solid white;">
											  <div class="content-overlay"></div>
												   <img class="content-image img-fluid d-block mx-auto" src="'.$product_image.'" alt="">
											  <div class="content-details fadeIn-bottom">
											  </div>
										  </div>
										  <br>
										  <div class="price">
										  			<div class="row align-items-center justify-content-center">
														<h3><a href = "details_1.php?id='.$product_name.'" style="color:#8BA6BC;">'.$product_name.'</a></h3>
													</div>
													<br>
													<div class="row align-items-center justify-content-center">
														<p class="text-white"><del style = "color : black">'.$initial_cost.'</del></p>&emsp;<h3>'.$final_cost.'</h3>
													</div>
													<br>
													<div class="row align-items-center justify-content-center">
														<h4 style = "color:white; text-align:center; background-color: #FF1493; border-radius: 25px; width:150px;">You save '.$discount.'%</h4>
													</div>';
												  if($product_quantity<5){
													  if($product_quantity==0){
														echo'<p class="row align-items-center justify-content-center" style = "color:red"> Out of Stock <p>';  
													  }
													  else{
													  echo'<p class="row align-items-center justify-content-center" style = "color:red"> Only '.$product_quantity.' left in stock<p>';
													  }
												  }
												  
												  if($product_quantity>0){
													echo'<a class="row align-items-center justify-content-center" href=" checkout.php?id1='.$product_id.'" style="color:#8BA6BC;font-size:20px;">Buy Now</a> <br>';
												  }
												  
												  
										echo' </div>
										</div>
										<br>';
									  }
								  }
							?>
							</div>
							<hr style="height:25px; background-color:#F0F0F0; z-index:-1">
							<div class="row" style="margin-bottom:3%; margin-top:3%">
							<?php 
								  include('connect_db.php');
								//   session_start();
								  $sql = "SELECT * FROM products WHERE category = 'Food' limit 4;";
								  $result = $conn->query($sql);
								  echo '
								  <h3 style = "margin-left:40px;"> Food </h3>
								  <br>
								  <a href="department.php?id1=Food" style="margin-left:85%;"> View All +</a>';
								  if($result->num_rows>0){
									  while($row = $result->fetch_assoc()){
										  
										  $product_id = $row['product_id'];
										  $product_name = $row['product_name'];
										  $initial_cost = $row['initial_cost'];
										  $final_cost = $row['final_cost'];
										  $product_image = $row['product_image'];
										  $product_quantity = $row['product_quantity'];
										  $discount=round((($initial_cost-$final_cost)/($initial_cost))*100);
										  echo '<div class="col-md-3 single-product">
										  <a href="cart_1.php?id1='.$final_cost.'&id2='.$product_id.'&id3= '.$product_name.'" style="margin-left:80%;"><img src="img/plus.png" alt=""></a>&nbsp;<a href="favourite_1.php?id1='.$final_cost.'&id2='.$product_id.'&id3= '.$product_name.'" style="margin-left:2%;"><img src="img/heart.png" alt=""></a>
											  <div class="content" style="border:10px solid white;">
											  <div class="content-overlay"></div>
												   <img class="content-image img-fluid d-block mx-auto" src="'.$product_image.'" alt="">
											  <div class="content-details fadeIn-bottom">
											  </div>
										  </div>
										  <br>
										  <div class="price">
										  			<div class="row align-items-center justify-content-center">
										  				<h3><a href = "details_1.php?id='.$product_name.'" style="color:#8BA6BC;">'.$product_name.'</a></h3>
													</div>
													<br>
													<div class="row align-items-center justify-content-center">
														<p class="text-white">&emsp;&emsp;<del style = "color : black">'.$initial_cost.'</del></p>&emsp;<h3>'.$final_cost.'</h3>
													</div>
													<br>
													<div class="row align-items-center justify-content-center">
														<h4 style = "color:white; text-align:center; background-color: #FF1493; border-radius: 25px; width:150px;">You save '.$discount.'%</h4>
													</div>';
												  
												  if($product_quantity<5){
													if($product_quantity==0){
													  echo'<p class="row align-items-center justify-content-center" style = "color:red"> Out of Stock <p>';  
													}
													else{
													echo'<p class="row align-items-center justify-content-center" style = "color:red"> Only '.$product_quantity.' left in stock<p>';
													}
												}
												
												if($product_quantity>0){
													echo'<a class="row align-items-center justify-content-center" href=" checkout.php?id1='.$product_id.'" style="color:#8BA6BC;font-size:20px;">Buy Now</a> <br>';
												}
										   echo' </div>
										</div>
										<br>';
									  }
								  }
							?>
							</div>
							<hr style="height:25px; background-color:#F0F0F0; z-index:-1">
							<div class="row" style="margin-bottom:3%; margin-top:3%">
							<?php 
								  include('connect_db.php');
								//   session_start();
								  $sql = "SELECT * FROM products WHERE category = 'Gift' limit 4;";
								  $result = $conn->query($sql);
								  echo '
								  <h3 style = "margin-left:40px;"> Gifts </h3>
								  <br>
								  <a href="department.php?id1=Gift" style="margin-left:85%;"> View All +</a>';
								  if($result->num_rows>0){
									  while($row = $result->fetch_assoc()){
										  
										  $product_id = $row['product_id'];
										  $product_name = $row['product_name'];
										  $initial_cost = $row['initial_cost'];
										  $final_cost = $row['final_cost'];
										  $product_image = $row['product_image'];
										  $product_quantity = $row['product_quantity'];
										  $discount=round((($initial_cost-$final_cost)/($initial_cost))*100);
										  echo '<div class="col-md-3 single-product">
										  <a href="cart_1.php?id1='.$final_cost.'&id2='.$product_id.'&id3= '.$product_name.'" style="margin-left:80%;"><img src="img/plus.png" alt=""></a>&nbsp;<a href="favourite_1.php?id1='.$final_cost.'&id2='.$product_id.'&id3= '.$product_name.'" style="margin-left:2%;"><img src="img/heart.png" alt=""></a>
											  <div class="content" style="border:10px solid white;">
											  <div class="content-overlay"></div>
												   <img class="content-image img-fluid d-block mx-auto" src="'.$product_image.'" alt="">
											  <div class="content-details fadeIn-bottom">
											  </div>
										  </div>
										  <br>
										  <div class="price">
										  			<div class="row align-items-center justify-content-center">
										  				<h3><a href = "details_1.php?id='.$product_name.'" style="color:#8BA6BC;">'.$product_name.'</a></h3>
													</div>
													<br>
													<div class="row align-items-center justify-content-center">
														<p class="text-white">&emsp;&emsp;<del style = "color : black">'.$initial_cost.'</del></p>&emsp;<h3>'.$final_cost.'</h3>
													</div>
													<br>
													<div class="row align-items-center justify-content-center">
														<h4 style = "color:white; text-align:center; background-color: #FF1493; border-radius: 25px; width:150px;">You save '.$discount.'%</h4>
													</div>';
												  if($product_quantity<5){
													  if($product_quantity==0){
														echo'<p class="row align-items-center justify-content-center" style = "color:red"> Out of Stock <p>';  
													  }
													  else{
													  echo'<p class="row align-items-center justify-content-center" style = "color:red"> Only '.$product_quantity.' left in stock<p>';
													  }
												  }
												  
												  if($product_quantity>0){
													echo'<a class="row align-items-center justify-content-center" href=" checkout.php?id1='.$product_id.'" style="color:#8BA6BC;font-size:20px;">Buy Now</a> <br>';
												  }
												  
												  
										echo' </div>
										</div>
										<br>';
									  }
								  }
							?>
							</div>
							<hr style="height:25px; background-color:#F0F0F0; z-index:-1">
							<div class="row" style="margin-bottom:3%; margin-top:3%">
							<?php 
								  include('connect_db.php');
								//   session_start();
								  $sql = "SELECT * FROM products WHERE category = 'Hardware' limit 4;";
								  $result = $conn->query($sql);
								  echo '
								  <h3 style = "margin-left:40px;"> Hardware </h3>
								  <br>
								  <a href="department.php?id1=Hardware" style="margin-left:85%;"> View All +</a>';
								  if($result->num_rows>0){
									  while($row = $result->fetch_assoc()){
										  
										  $product_id = $row['product_id'];
										  $product_name = $row['product_name'];
										  $initial_cost = $row['initial_cost'];
										  $final_cost = $row['final_cost'];
										  $product_image = $row['product_image'];
										  $product_quantity = $row['product_quantity'];
										  $discount=round((($initial_cost-$final_cost)/($initial_cost))*100);
										  echo '<div class="col-md-3 single-product">
										  <a href="cart_1.php?id1='.$final_cost.'&id2='.$product_id.'&id3= '.$product_name.'" style="margin-left:80%;"><img src="img/plus.png" alt=""></a>&nbsp;<a href="favourite_1.php?id1='.$final_cost.'&id2='.$product_id.'&id3= '.$product_name.'" style="margin-left:2%;"><img src="img/heart.png" alt=""></a>
											  <div class="content" style="border:10px solid white;">
											  <div class="content-overlay"></div>
												   <img class="content-image img-fluid d-block mx-auto" src="'.$product_image.'" alt="">
											  <div class="content-details fadeIn-bottom">
											  </div>
										  </div>
										  <br>
										  <div class="price">
										  			<div class="row align-items-center justify-content-center">
										  				<h3><a href = "details_1.php?id='.$product_name.'" style="color:#8BA6BC;">'.$product_name.'</a></h3>
													</div>
													<br>
													<div class="row align-items-center justify-content-center">
														<p class="text-white">&emsp;&emsp;<del style = "color : black">'.$initial_cost.'</del></p>&emsp;<h3>'.$final_cost.'</h3>
													</div>
													<br>
													<div class="row align-items-center justify-content-center">
														<h4 style = "color:white; text-align:center; background-color: #FF1493; border-radius: 25px; width:150px;">You save '.$discount.'%</h4>
													</div>';
												  if($product_quantity<5){
													  if($product_quantity==0){
														echo'<p class="row align-items-center justify-content-center" style = "color:red"> Out of Stock <p>';  
													  }
													  else{
													  echo'<p class="row align-items-center justify-content-center" style = "color:red"> Only '.$product_quantity.' left in stock<p>';
													  }
												  }
												  
												  if($product_quantity>0){
													echo'<a class="row align-items-center justify-content-center" href=" checkout.php?id1='.$product_id.'" style="color:#8BA6BC;font-size:20px;">Buy Now</a> <br>';
												  }
												  
												  
										echo' </div>
										</div>
										<br>';
									  }
								  }
							?>
							</div>
							<hr style="height:25px; background-color:#F0F0F0; z-index:-1">
							<div class="row" style="margin-bottom:3%; margin-top:3%">
							<?php 
								  include('connect_db.php');
								//   session_start();
								  $sql = "SELECT * FROM products WHERE category = 'Fashion' limit 4;";
								  $result = $conn->query($sql);
								  echo '
								  <h3 style = "margin-left:40px;"> Fashion </h3>
								  <br>
								  <a href="department.php?id1=Fashion" style="margin-left:85%;"> View All +</a>';
								  if($result->num_rows>0){
									  while($row = $result->fetch_assoc()){
										  
										  $product_id = $row['product_id'];
										  $product_name = $row['product_name'];
										  $initial_cost = $row['initial_cost'];
										  $final_cost = $row['final_cost'];
										  $product_image = $row['product_image'];
										  $product_quantity = $row['product_quantity'];
										  $discount=round((($initial_cost-$final_cost)/($initial_cost))*100);
										  echo '<div class="col-md-3 single-product">
										  <a href="cart_1.php?id1='.$final_cost.'&id2='.$product_id.'&id3= '.$product_name.'" style="margin-left:80%;"><img src="img/plus.png" alt=""></a>&nbsp;<a href="favourite_1.php?id1='.$final_cost.'&id2='.$product_id.'&id3= '.$product_name.'" style="margin-left:2%;"><img src="img/heart.png" alt=""></a>
											  <div class="content" style="border:10px solid white;">
											  <div class="content-overlay"></div>
												   <img class="content-image img-fluid d-block mx-auto" src="'.$product_image.'" alt="">
											  <div class="content-details fadeIn-bottom">
											  </div>
										  </div>
										  <br>
										  <div class="price">
										  			<div class="row align-items-center justify-content-center">
										  				<h3><a href = "details_1.php?id='.$product_name.'" style="color:#8BA6BC;">'.$product_name.'</a></h3>
													</div>
													<br>
													<div class="row align-items-center justify-content-center">
														<p class="text-white">&emsp;&emsp;<del style = "color : black">'.$initial_cost.'</del></p>&emsp;<h3>'.$final_cost.'</h3>
													</div>
													<br>
													<div class="row align-items-center justify-content-center">
														<h4 style = "color:white; text-align:center; background-color: #FF1493; border-radius: 25px; width:150px;">You save '.$discount.'%</h4>
													</div>';
												  if($product_quantity<5){
													  if($product_quantity==0){
														echo'<p class="row align-items-center justify-content-center" style = "color:red"> Out of Stock <p>';  
													  }
													  else{
													  echo'<p class="row align-items-center justify-content-center" style = "color:red"> Only '.$product_quantity.' left in stock<p>';
													  }
												  }
												  
												  if($product_quantity>0){
													echo'<a class="row align-items-center justify-content-center" href=" checkout.php?id1='.$product_id.'" style="color:#8BA6BC;font-size:20px;">Buy Now</a> <br>';
												  }
												  
												  
										echo' </div>
										</div>
										<br>';
									  }
								  }
							?>
							</div>
							<hr style="height:25px; background-color:#F0F0F0; z-index:-1">
							<div class="row" style="margin-bottom:3%; margin-top:3%">
							<?php 
								  include('connect_db.php');
								//   session_start();
								  $sql = "SELECT * FROM products WHERE category = 'Medicines' limit 4;";
								  $result = $conn->query($sql);
								  echo '
								  <h3 style = "margin-left:40px;"> Medicines </h3>
								  <br>
								  <a href="department.php?id1=Medicines" style="margin-left:85%;"> View All +</a>';
								  if($result->num_rows>0){
									  while($row = $result->fetch_assoc()){
										  
										  $product_id = $row['product_id'];
										  $product_name = $row['product_name'];
										  $initial_cost = $row['initial_cost'];
										  $final_cost = $row['final_cost'];
										  $product_image = $row['product_image'];
										  $product_quantity = $row['product_quantity'];
										  $discount=round((($initial_cost-$final_cost)/($initial_cost))*100);
										  echo '<div class="col-md-3 single-product">
										  <a href="cart_1.php?id1='.$final_cost.'&id2='.$product_id.'&id3= '.$product_name.'" style="margin-left:80%;"><img src="img/plus.png" alt=""></a>&nbsp;<a href="favourite_1.php?id1='.$final_cost.'&id2='.$product_id.'&id3= '.$product_name.'" style="margin-left:2%;"><img src="img/heart.png" alt=""></a>
											  <div class="content" style="border:10px solid white;">
											  <div class="content-overlay"></div>
												   <img class="content-image img-fluid d-block mx-auto" src="'.$product_image.'" alt="">
											  <div class="content-details fadeIn-bottom">
											  </div>
										  </div>
										  <br>
										  <div class="price">
										  			<div class="row align-items-center justify-content-center">
														<h3><a href = "details_1.php?id='.$product_name.'" style="color:#8BA6BC;">'.$product_name.'</a></h3>
													</div>
													<br>
													<div class="row align-items-center justify-content-center">
														<p class="text-white">&emsp;&emsp;<del style = "color : black">'.$initial_cost.'</del></p>&emsp;<h3>'.$final_cost.'</h3>
													</div>
													<br>
													<div class="row align-items-center justify-content-center">
														<h4 style = "color:white; text-align:center; background-color: #FF1493; border-radius: 25px; width:150px;">You save '.$discount.'%</h4>
													</div>';
												  if($product_quantity<5){
													  if($product_quantity==0){
														echo'<p class="row align-items-center justify-content-center" style = "color:red"> Out of Stock <p>';  
													  }
													  else{
													  echo'<p class="row align-items-center justify-content-center" style = "color:red"> Only '.$product_quantity.' left in stock<p>';
													  }
												  }
												  
												  if($product_quantity>0){
													echo'<a class="row align-items-center justify-content-center" href=" checkout.php?id1='.$product_id.'" style="color:#8BA6BC;font-size:20px;">Buy Now</a> <br>';
												  }
												  
												  
										echo' </div>
										</div>
										<br>';
									  }
								  }
							?>
							</div>
							<hr style="height:25px; background-color:#F0F0F0; z-index:-1">
						</section>
						<!-- End Best Seller -->
						<!-- Start Filter Bar -->
						<div class="filter-bar d-flex flex-wrap align-items-center">
							<div class="sorting mr-auto">
								<select>
									<option value="1">Show 12</option>
									<option value="1">Show 12</option>
									<option value="1">Show 12</option>
								</select>
							</div>
							<div class="sorting mr-auto">
								<select>
									<option value="category_1.php">Price : Low to High</option>
									<option value="category_2.php">Price : High to Low</option>
									<!-- <option value="1">Show 12</option> -->
								</select>
							</div>
						</div>
						<!-- End Filter Bar -->
					</div>
					<!-- <div class="col-xl-3 col-lg-4 col-md-5">
						<div class="sidebar-categories"> -->
							<!-- <div class="head">Others</div>
							<ul class="main-categories">
								<li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable" aria-expanded="false" aria-controls="fruitsVegetable"><span class="lnr lnr-arrow-right"></span>Food and Beverages<span class="number">(53)</span></a>
									<ul class="collapse" id="fruitsVegetable" data-toggle="collapse" aria-expanded="false" aria-controls="fruitsVegetable">
										<li class="main-nav-list child"><a href="#">Frozen Fish<span class="number">(13)</span></a></li>
										<li class="main-nav-list child"><a href="#">Dried Fish<span class="number">(09)</span></a></li>
										<li class="main-nav-list child"><a href="#">Fresh Fish<span class="number">(17)</span></a></li>
										<li class="main-nav-list child"><a href="#">Meat Alternatives<span class="number">(01)</span></a></li>
										<li class="main-nav-list child"><a href="#">Meat<span class="number">(11)</span></a></li>
									</ul>
								</li>

								<li class="main-nav-list"><a data-toggle="collapse" href="#meatFish" aria-expanded="false" aria-controls="meatFish"><span class="lnr lnr-arrow-right"></span>Medicines<span class="number">(53)</span></a>
									<ul class="collapse" id="meatFish" data-toggle="collapse" aria-expanded="false" aria-controls="meatFish">
										<li class="main-nav-list child"><a href="#">Frozen Fish<span class="number">(13)</span></a></li>
										<li class="main-nav-list child"><a href="#">Dried Fish<span class="number">(09)</span></a></li>
										<li class="main-nav-list child"><a href="#">Fresh Fish<span class="number">(17)</span></a></li>
										<li class="main-nav-list child"><a href="#">Meat Alternatives<span class="number">(01)</span></a></li>
										<li class="main-nav-list child"><a href="#">Meat<span class="number">(11)</span></a></li>
									</ul>
								</li>
								<li class="main-nav-list"><a data-toggle="collapse" href="#cooking" aria-expanded="false" aria-controls="cooking"><span class="lnr lnr-arrow-right"></span>Gifts<span class="number">(53)</span></a>
									<ul class="collapse" id="cooking" data-toggle="collapse" aria-expanded="false" aria-controls="cooking">
										<li class="main-nav-list child"><a href="#">Frozen Fish<span class="number">(13)</span></a></li>
										<li class="main-nav-list child"><a href="#">Dried Fish<span class="number">(09)</span></a></li>
										<li class="main-nav-list child"><a href="#">Fresh Fish<span class="number">(17)</span></a></li>
										<li class="main-nav-list child"><a href="#">Meat Alternatives<span class="number">(01)</span></a></li>
										<li class="main-nav-list child"><a href="#">Meat<span class="number">(11)</span></a></li>
									</ul>
								</li>
								<li class="main-nav-list"><a data-toggle="collapse" href="#beverages" aria-expanded="false" aria-controls="beverages"><span class="lnr lnr-arrow-right"></span>Clothes<span class="number">(24)</span></a>
									<ul class="collapse" id="beverages" data-toggle="collapse" aria-expanded="false" aria-controls="beverages">
										<li class="main-nav-list child"><a href="#">Frozen Fish<span class="number">(13)</span></a></li>
										<li class="main-nav-list child"><a href="#">Dried Fish<span class="number">(09)</span></a></li>
										<li class="main-nav-list child"><a href="#">Fresh Fish<span class="number">(17)</span></a></li>
										<li class="main-nav-list child"><a href="#">Meat Alternatives<span class="number">(01)</span></a></li>
										<li class="main-nav-list child"><a href="#">Meat<span class="number">(11)</span></a></li>
									</ul>
								</li>
								<li class="main-nav-list"><a data-toggle="collapse" href="#homeClean" aria-expanded="false" aria-controls="homeClean"><span class="lnr lnr-arrow-right"></span>Home and Cleaning<span class="number">(53)</span></a>
									<ul class="collapse" id="homeClean" data-toggle="collapse" aria-expanded="false" aria-controls="homeClean">
										<li class="main-nav-list child"><a href="#">Frozen Fish<span class="number">(13)</span></a></li>
										<li class="main-nav-list child"><a href="#">Dried Fish<span class="number">(09)</span></a></li>
										<li class="main-nav-list child"><a href="#">Fresh Fish<span class="number">(17)</span></a></li>
										<li class="main-nav-list child"><a href="#">Meat Alternatives<span class="number">(01)</span></a></li>
										<li class="main-nav-list child"><a href="#">Meat<span class="number">(11)</span></a></li>
									</ul>
								</li>
								<li class="main-nav-list"><a href="#">Pest Control<span class="number">(24)</span></a></li>
								<li class="main-nav-list"><a data-toggle="collapse" href="#officeProduct" aria-expanded="false" aria-controls="officeProduct"><span class="lnr lnr-arrow-right"></span>Office Products<span class="number">(77)</span></a>
									<ul class="collapse" id="officeProduct" data-toggle="collapse" aria-expanded="false" aria-controls="officeProduct">
										<li class="main-nav-list child"><a href="#">Frozen Fish<span class="number">(13)</span></a></li>
										<li class="main-nav-list child"><a href="#">Dried Fish<span class="number">(09)</span></a></li>
										<li class="main-nav-list child"><a href="#">Fresh Fish<span class="number">(17)</span></a></li>
										<li class="main-nav-list child"><a href="#">Meat Alternatives<span class="number">(01)</span></a></li>
										<li class="main-nav-list child"><a href="#">Meat<span class="number">(11)</span></a></li>
									</ul>
								</li>
								<li class="main-nav-list"><a data-toggle="collapse" href="#beauttyProduct" aria-expanded="false" aria-controls="beauttyProduct"><span class="lnr lnr-arrow-right"></span>Beauty Products<span class="number">(65)</span></a>
									<ul class="collapse" id="beauttyProduct" data-toggle="collapse" aria-expanded="false" aria-controls="beauttyProduct">
										<li class="main-nav-list child"><a href="#">Frozen Fish<span class="number">(13)</span></a></li>
										<li class="main-nav-list child"><a href="#">Dried Fish<span class="number">(09)</span></a></li>
										<li class="main-nav-list child"><a href="#">Fresh Fish<span class="number">(17)</span></a></li>
										<li class="main-nav-list child"><a href="#">Meat Alternatives<span class="number">(01)</span></a></li>
										<li class="main-nav-list child"><a href="#">Meat<span class="number">(11)</span></a></li>
									</ul>
								</li>
								<li class="main-nav-list"><a data-toggle="collapse" href="#healthProduct" aria-expanded="false" aria-controls="healthProduct"><span class="lnr lnr-arrow-right"></span>Health Products<span class="number">(29)</span></a>
									<ul class="collapse" id="healthProduct" data-toggle="collapse" aria-expanded="false" aria-controls="healthProduct">
										<li class="main-nav-list child"><a href="#">Frozen Fish<span class="number">(13)</span></a></li>
										<li class="main-nav-list child"><a href="#">Dried Fish<span class="number">(09)</span></a></li>
										<li class="main-nav-list child"><a href="#">Fresh Fish<span class="number">(17)</span></a></li>
										<li class="main-nav-list child"><a href="#">Meat Alternatives<span class="number">(01)</span></a></li>
										<li class="main-nav-list child"><a href="#">Meat<span class="number">(11)</span></a></li>
									</ul>
								</li>
								<li class="main-nav-list"><a href="#">Pet Care<span class="number">(29)</span></a></li>
								<li class="main-nav-list"><a data-toggle="collapse" href="#homeAppliance" aria-expanded="false" aria-controls="homeAppliance"><span class="lnr lnr-arrow-right"></span>Home Appliances<span class="number">(15)</span></a>
									<ul class="collapse" id="homeAppliance" data-toggle="collapse" aria-expanded="false" aria-controls="homeAppliance">
										<li class="main-nav-list child"><a href="#">Frozen Fish<span class="number">(13)</span></a></li>
										<li class="main-nav-list child"><a href="#">Dried Fish<span class="number">(09)</span></a></li>
										<li class="main-nav-list child"><a href="#">Fresh Fish<span class="number">(17)</span></a></li>
										<li class="main-nav-list child"><a href="#">Meat Alternatives<span class="number">(01)</span></a></li>
										<li class="main-nav-list child"><a href="#">Meat<span class="number">(11)</span></a></li>
									</ul>
								</li>
								<li class="main-nav-list"><a class="border-bottom-0" data-toggle="collapse" href="#babyCare" aria-expanded="false" aria-controls="babyCare"><span class="lnr lnr-arrow-right"></span>Baby Care<span class="number">(48)</span></a>
									<ul class="collapse" id="babyCare" data-toggle="collapse" aria-expanded="false" aria-controls="babyCare">
										<li class="main-nav-list child"><a href="#">Frozen Fish<span class="number">(13)</span></a></li>
										<li class="main-nav-list child"><a href="#">Dried Fish<span class="number">(09)</span></a></li>
										<li class="main-nav-list child"><a href="#">Fresh Fish<span class="number">(17)</span></a></li>
										<li class="main-nav-list child"><a href="#">Meat Alternatives<span class="number">(01)</span></a></li>
										<li class="main-nav-list child"><a href="#" class="border-bottom-0">Meat<span class="number">(11)</span></a></li>
									</ul>
								</li>
							</ul>
						</div>  -->
						<!-- <div class="sidebar-filter mt-50"> -->
							<!-- <div class="top-filter-head">Product Filters</div>
							<div class="common-filter">
								<div class="head">Active Filters</div>
								<ul>
									<li class="filter-list"><i class="fa fa-window-close" aria-hidden="true"></i>Gionee (29)</li>
									<li class="filter-list"><i class="fa fa-window-close" aria-hidden="true"></i>Black with red (09)</li>
								</ul>
							</div>
							<div class="common-filter">
								<div class="head">Brands</div>
								<form action="#">
									<ul>
										<li class="filter-list"><input class="pixel-radio" type="radio" id="apple" name="brand"><label for="apple">Apple<span>(29)</span></label></li>
										<li class="filter-list"><input class="pixel-radio" type="radio" id="asus" name="brand"><label for="asus">Asus<span>(29)</span></label></li>
										<li class="filter-list"><input class="pixel-radio" type="radio" id="gionee" name="brand"><label for="gionee">Gionee<span>(19)</span></label></li>
										<li class="filter-list"><input class="pixel-radio" type="radio" id="micromax" name="brand"><label for="micromax">Micromax<span>(19)</span></label></li>
										<li class="filter-list"><input class="pixel-radio" type="radio" id="samsung" name="brand"><label for="samsung">Samsung<span>(19)</span></label></li>
									</ul>
								</form> -->
							<!-- </div>
							<div class="common-filter">
								<div class="head">Color</div>
								<form action="#">
									<ul>
										<li class="filter-list"><input class="pixel-radio" type="radio" id="black" name="color"><label for="black">Black<span>(29)</span></label></li>
										<li class="filter-list"><input class="pixel-radio" type="radio" id="balckleather" name="color"><label for="balckleather">Black Leather<span>(29)</span></label></li>
										<li class="filter-list"><input class="pixel-radio" type="radio" id="blackred" name="color"><label for="blackred">Black with red<span>(19)</span></label></li>
										<li class="filter-list"><input class="pixel-radio" type="radio" id="gold" name="color"><label for="gold">Gold<span>(19)</span></label></li>
										<li class="filter-list"><input class="pixel-radio" type="radio" id="spacegrey" name="color"><label for="spacegrey">Spacegrey<span>(19)</span></label></li>
									</ul>
								</form>
							</div> -->
							<!-- <div class="common-filter">
								<div class="head">Price</div>
								<div class="price-range-area">
									<div id="price-range"></div>
									<div class="value-wrapper d-flex">
										<div class="price">Price:</div>
										<span>Rs</span><div id="lower-value"></div> <div class="to">to</div> 
										<span>Rs</span><div id="upper-value"></div>
									</div>
								</div>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		
            <!-- Start Most Search Product Area -->
            <section class="section-half">
                <div class="container">
                    <div class="organic-section-title text-center">
                        <h3>Most Searched Products</h3>
                    </div>
					<!-- <div class="row mt-30"> -->
					<div class="col-xs-12" >
						<div id ="imageCarousel" class = "carousel slides" data-interval = "3000" data-ride = "carousel" data-pause = "hover" data-wrap = "true" style = "border-color:black;" >
					
							<ol class = "carousel-indicators">
								<li data-target = "#imageCarousel" data-slide-to = "0" class = "active" style = "border-color:black;"></li>
								<li data-target = "#imageCarousel" data-slide-to = "1" style = "border-color:black;"></li>
								<li data-target = "#imageCarousel" data-slide-to = "2" style = "border-color:black;"></li>
							</ol>
							<div class = "carousel-inner">
								<div class = "item active" >
								  	<div class = "row">
									<?php
									$sql1 = "SELECT * FROM products WHERE category = 'Electronics' LIMIT 4;";
									$result1 = $conn->query($sql1);
									if($result1->num_rows>0){
										while($row = $result1->fetch_assoc()){
											$product_id = $row['product_id'];
											$product_image = $row['product_image'];
											$product_name = $row['product_name'];
											$final_cost = $row['final_cost'];
											echo '<div class = "col-xs-3" style = "background-color:white;">
								  	  
											<div class="single-search-product d-flex" style = "background-color:white;" >
												<a href="details_1.php?id='.$product_name.'"><img src="'.$product_image.'" alt=""></a>
												<div class="desc">
													<a href="#" class="title">'.$product_name.'</a>
													<div class="price"><span class="lnr lnr-tag"></span> Rs'.$final_cost.'</div>
													<a href=" checkout.php?id1='.$product_id.'">Buy Now <br>
												</div>
											</div>
									  	</div>';
										}
									}
									
									
									?>
									</div>
								</div>
								
								<div class = "item">
								  	<div class = "row">
										<?php
									  $sql3 = "SELECT * FROM products WHERE category = 'Food' LIMIT 4;";
									$result1 = $conn->query($sql1);
									if($result1->num_rows>0){
										while($row = $result1->fetch_assoc()){
											echo '<div class = "col-xs-3" style = "background-color:white;">
								  	  
											<div class="single-search-product d-flex" style = "background-color:white;" >
												<a href="details_1.php?id='.$product_name.'"><img src="'.$product_image.'" alt=""></a>
												<div class="desc">
													<a href="#" class="title">'.$product_name.'</a>
													<div class="price"><span class="lnr lnr-tag"></span> '.$final_cost.'</div>
													<a href=" checkout.php?id1='.$product_id.'">Buy Now</a> <br>
												</div>
											</div>
									  	</div>';
										}
									}
									?>
									</div>
								</div>
									
								<div class = "item">
								  	<div class = "row">
										<?php
									  $sql2 = "SELECT * FROM products WHERE category = 'Medicines' LIMIT 4;";
									$result2 = $conn->query($sql2);
									if($result2->num_rows>0){
										while($row = $result1->fetch_assoc()){
											echo '<div class = "col-xs-3" style = "background-color:white;">
								  	  
											<div class="single-search-product d-flex" style = "background-color:white;" >
											<a href="details_1.php?id='.$product_name.'"><img src="'.$product_image.'" alt=""></a>
												<div class="desc">
													<a href="#" class="title">'.$product_name.'</a>
													<div class="price"><span class="lnr lnr-tag"></span> '.$final_cost.'</div>
													<a href=" checkout.php?id1='.$product_id.'">Buy Now</a> <br>
												</div>
											</div>
									  	</div>';
										}
									}
									?>
									</div>
								</div>
										
									</div>
								</div>
							</div>
                        </div>
						<!-- <div class="row mt-30">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r1.jpg"  id="firstClone"  alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore fresh Blueberry</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> Rs240.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r5.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore Bell Pepper</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> Rs120.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r6.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore fresh Blackberry</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> Rs120.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r7.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore fresh Brocoli</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> Rs120.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r8.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore fresh Carrot</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> Rs120.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r9.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore fresh Strawberry</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> Rs240.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r10.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Prixma MG2 Light Inkjet</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> Rs240.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r11.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore fresh Cherry</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> Rs240.00 <del>Rs340.00</del></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r12.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore fresh Beans</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> Rs240.00 <del>Rs340.00</del></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div-->
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
