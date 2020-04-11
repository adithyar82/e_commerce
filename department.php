<?php
    session_start();
    $id1 = $_REQUEST['id1'];
	$username = $_SESSION['username'];
	echo $_SESSION['username'];
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
		</head>
		<body>

			<!-- Start Header Area -->
			<header class="default-header">
				<div class="menutop-wrap">
					<div class="menu-top container">
						<div class="d-flex justify-content-between align-items-center">
							<ul class="list">
								<li><a href="tel:+12312-3-1209">+91 9823743493</a></li>
								<li><a href="mailto:support@colorlib.com">support@azimpatel.com</a></li>								
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
								<li><a href="#">Welcome '.$username.' </a></li>
							</ul>';
							}
							
							?>
							<ul class="list">
								<li><a href="logout.php">Logout</a></li>
							</ul>
						</div>
					</div>					
				</div>
				<nav class="navbar navbar-expand-lg  navbar-light">
					<div class="container">
						  <a class="navbar-brand" href="#">
							  <img src="img/logo.png" alt="">
							  <p> Company Logo </p>
						  </a>
						  <div class="search-container">
								<!-- <form action="/action_page.php">
								  <input type="text" size = "50" placeholder="Search.." name="search">
								  <button type="submit"><i class="fa fa-search"></i></button>
								</form> -->
                                <h3 style="margin-left:120px;"><?php echo $id1 ?></h3> 
						  </div>
						  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						    <span class="navbar-toggler-icon"></span>
						  </button>
						  <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
						    <ul class="navbar-nav">
								<li><a href="#home">Home</a></li>
								<!-- <li><a href="#catagory">Category</a></li>
								<li><a href="#men">Product</a></li> -->
								<!-- <li><a href="#women">Women</a></li> -->
								<!-- <li><a href="#latest">Recommendations</a></li> -->
									<!-- Dropdown -->
								    <!-- <li class="dropdown">
								      <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
								        Pages
								      </a>
								      <div class="dropdown-menu">
								        <<a class="dropdown-item" href="category.php">Category</a>
								        <a class="dropdown-item" href="single.php">Single</a> -->
								        <!-- <a class="dropdown-item" href="cart.php">Cart</a> -->
								        <!-- <a class="dropdown-item" href="checkout.php">Checkout</a>
								        <a class="dropdown-item" href="confermation.php">Confirmation</a>
								        <a class="dropdown-item" href="login.php">Login</a>
								        <a class="dropdown-item" href="tracking.php">Tracking</a> -->
								        <!-- <a class="dropdown-item" href="generic.php">Generic</a>
								        <a class="dropdown-item" href="elements.php">Elements</a>
								      </div>
								    </li-->
									<li class="dropdown">
								      <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
								        Category
								      </a>
								      <div class="dropdown-menu">
								        <a class="dropdown-item" href="department.php">Electronics</a>
								        <a class="dropdown-item" href="department.php">Groceries</a>
								        <!-- <a class="dropdown-item" href="cart.php">Cart</a> -->
								        <a class="dropdown-item" href="department.php">Fashion</a>
								        <a class="dropdown-item" href="department.php">Medicines</a>
								        <a class="dropdown-item" href="department.php">Sport Equipments</a>
								        <a class="dropdown-item" href="department.php">Hardware</a>
								        <!-- <a class="dropdown-item" href="generic.php">Generic</a>
								        <a class="dropdown-item" href="elements.php">Elements</a> -->
								      </div>
								    </li>									
						    </ul>
						  </div>						
					</div>
				</nav>
			</header>
            <!-- End Header Area -->

            <!-- Start Banner Area -->
            <!-- <section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                            <h1>Shop Category page</h1>
                             <nav class="d-flex align-items-center justify-content-start">
                                <a href="category.php">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="category.php">Category</a>
                            </nav>
                        </div>
                    </div>
                </div>
			</section> -->
			<section class="banner-area relative" id="home">
				<!-- <div class="container-fluid">
					<div class="row fullscreen align-items-center justify-content-center">
						<div class="col-lg-6 col-md-12 padding: 40px;">
							<img class="img-fluid" src="img/c39.png" alt="" width="100%" height="100%">
						</div>
						<div class="banner-content col-lg-6 col-md-12">
							<h1 class="title-top"><span>Flat</span> 50%Off</h1>
							<h1 class="text-uppercase">
								On Your <br>
								First Order
							</h1>
							<button class="primary-btn text-uppercase"><a href="#">Order Here</a></button>
						</div>							
					</div> -->
				</div>
			</section>
            <!-- End Banner Area -->
			<div class="container">
				<div class="row">
					<div class="col-xl-9 col-lg-8 col-md-7">
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
								        <!-- <a class="dropdown-item" href="cart.php">Cart</a> -->
								        <!-- <a class="dropdown-item" href="checkout.php">Checkout</a>
								        <a class="dropdown-item" href="confermation.php">Confirmation</a>
								        <a class="dropdown-item" href="login.php">Login</a>
								        <a class="dropdown-item" href="tracking.php">Tracking</a> -->
								        <!-- <a class="dropdown-item" href="generic.php">Generic</a>
								        <a class="dropdown-item" href="elements.php">Elements</a> -->
							    </div>
							<div class="sorting mr-auto">
								<select>
									<option value="1">Show 12</option>
									<option value="1">Show 12</option>
									<option value="1">Show 12</option>
								</select>
							</div>
							<div class="pagination">
								<a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
								<a href="#" class="active">1</a>
								<a href="#">2</a>
								<a href="#">3</a>
								<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
								<a href="#">6</a>
								<a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
							</div>
						</div>
						<!-- End Filter Bar -->
						<!-- Start Best Seller -->
						<section class="lattest-product-area pb-40 category-list">
						
							<div class="row">
							<?php 
								  include('connect_db.php');
								  session_start();
								  $sql = "SELECT * FROM products;";
								  $result = $conn->query($sql);
								  if($result->num_rows>0){
									  while($row = $result->fetch_assoc()){
										  $product_id = $row['product_id'];
										  $product_name = $row['product_name'];
										  $initial_cost = $row['initial_cost'];
										  $final_cost = $row['final_cost'];
										  $product_image = $row['product_image'];
										  echo '<div class="col-md-3 single-product">
										      <div class="content">
											  <div class="content-overlay"></div>
												   <img class="content-image img-fluid d-block mx-auto" src="'.$product_image.'" alt="">
											  <div class="content-details fadeIn-bottom">
													<div class="bottom d-flex align-items-center justify-content-center">
														<a href="favourite_1.php?id1='.$final_cost.'&id2='.$product_id.'&id3= '.$product_name.'"><span class="lnr lnr-heart"></span></a>
														<a href="#" data-toggle="modal" data-target="#exampleModal"><span class="lnr lnr-frame-expand"></span></a>
													</div>
											  </div>
										  </div>
										  <div class="price">
										  
												  <h5>'.$product_name.'</h5>
													<h3 class="text-white"><del style = "color : black">'.$initial_cost.'</del></h3>
												  <h3>'.$final_cost.'</h3>
												  <a href=" checkout.php?id1='.$final_cost.'&id2='.$product_id.'&id3= '.$product_name.'">Buy Now</a> <br>
												  <a href=" cart_1.php?id1='.$final_cost.'&id2='.$product_id.'&id3= '.$product_name.'">Add to Cart</a>
										   </div>
										</div>';
									  }
								  }
					               ?>
								
								<!-- <div class="col-xl-4 col-lg-6 col-md-12 col-sm-6 single-product">
								  <div class="content">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" src="" alt="">
								      <div class="content-details fadeIn-bottom">
									        <div class="bottom d-flex align-items-center justify-content-center">
												<a href="#"><span class="lnr lnr-heart"></span></a>
												<a href="#" data-toggle="modal" data-target="#exampleModal"><span class="lnr lnr-frame-expand"></span></a>
											</div>
								      </div>
								  </div>
								  <div class="price">
								  		<h5>Chicken Biriyani</h5>
										<h3 class="text-white"><del style = "color : black">Rs 300.0</del></h3>
								  		<h3>Rs200.00</h3>
										<a href=" checkout.php?id1=200&id2=2&id3= Chicken_Biriyani">Buy Now</a> <br>
										<a href=" cart_1.php?id1=200&id2=2&id3= Chicken_Biriyani"> Add to Cart</a>
								   </div>
								</div>
								<div class="col-xl-4 col-lg-6 col-md-12 col-sm-6 single-product">
								  <div class="content">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" src="img/c28.jpg" alt="">
								      <div class="content-details fadeIn-bottom">
									        <div class="bottom d-flex align-items-center justify-content-center">
												<a href="#"><span class="lnr lnr-heart"></span></a>
												<a href="#" data-toggle="modal" data-target="#exampleModal"><span class="lnr lnr-frame-expand"></span></a>
											</div>
								      </div>
								  </div>
								  <div class="price">
								  		<h5>Teddy Bear</h5>
										<h3 class="text-white"><del style = "color : black">Rs 500.0</del></h3>
								  		<h3>Rs400.00</h3>
										<a href=" checkout.php?id1=400&id2=3&id3= Teddy_Bear">Buy Now</a> <br>
										<a href=" cart_1.php?id1=400&id2=3&id3= Teddy_Bear">Add to Cart</a>
										
								   </div>
								</div>	
								<div class="col-xl-4 col-lg-6 col-md-12 col-sm-6 single-product">
								  <div class="content">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" src="img/c29.jpg" alt="">
								      <div class="content-details fadeIn-bottom">
									        <div class="bottom d-flex align-items-center justify-content-center">
												<a href="#"><span class="lnr lnr-heart"></span></a>
												<a href="#" data-toggle="modal" data-target="#exampleModal"><span class="lnr lnr-frame-expand"></span></a>
											</div>
								      </div>
								  </div>
								  <div class="price">
								  		<h5>Tops</h5>
										<h3 class="text-white"><del style = "color : black">Rs 800.0</del></h3>
								  		<h3>Rs600.00</h3>
										<a href=" checkout.php?id1=600&id2=4&id3= Tops">Buy Now</a> <br>
										<a href=" checkout.php?id1=600&id2=4&id3= Tops"> Add to Cart</a>
								   </div>
								</div>
								<div class="col-xl-4 col-lg-6 col-md-12 col-sm-6 single-product">
								  <div class="content">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" src="img/c30.jpeg" alt="">
								      <div class="content-details fadeIn-bottom">
									        <div class="bottom d-flex align-items-center justify-content-center">
												<a href="#"><span class="lnr lnr-heart"></span></a>
												<a href="#" data-toggle="modal" data-target="#exampleModal"><span class="lnr lnr-frame-expand"></span></a>
											</div>
								      </div>
								  </div>
								  <div class="price">
								  		<h5>Mobile Charger</h5>
										<h3 class="text-white"><del style = "color : black">Rs 300.0</del></h3>
								  		<h3>Rs280.00</h3>
										<a href=" checkout.php?id1=280&id2=5&id3= Mobile_Charger">Buy Now</a> <br>
										<a href=" cart_1.php?id1=280&id2=5&id3= Mobile_Charger">Add to Cart</a>
								   </div>
								</div>
								<div class="col-xl-4 col-lg-6 col-md-12 col-sm-6 single-product">
								  <div class="content">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" src="img/c31.jpg" alt="">
								      <div class="content-details fadeIn-bottom">
									        <div class="bottom d-flex align-items-center justify-content-center">
												<a href="#"><span class="lnr lnr-heart"></span></a>
												<a href="#" data-toggle="modal" data-target="#exampleModal"><span class="lnr lnr-frame-expand"></span></a>
											</div>
								      </div>
								  </div>
								  <div class="price">
								  		<h5>Rice</h5>
										<h3 class="text-white"><del style = "color : black">Rs 200.0</del></h3>
								  		<h3>Rs150.00</h3>
										<a href=" checkout.php?id1=150&id2=6&id3= Rice">Buy Now</a> <br>
										<a href=" cart_1.php?id1=150&id2=6&id3= Rice">Add to Cart</a>
								   </div>
								</div>	
								<div class="col-xl-4 col-lg-6 col-md-12 col-sm-6 single-product">
								  <div class="content">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" src="img/c32.jpg" alt="">
								      <div class="content-details fadeIn-bottom">
									        <div class="bottom d-flex align-items-center justify-content-center">
												<a href="#"><span class="lnr lnr-heart"></span></a>
												<a href="#" data-toggle="modal" data-target="#exampleModal"><span class="lnr lnr-frame-expand"></span></a>
											</div>
								      </div>
								  </div>
								  <div class="price">
								  		<h5>Washing Machine</h5>
										<h3 class="text-white"><del style = "color : black">Rs 2000.0</del></h3>
								  		<h3>Rs1500.00</h3>
										<a href=" checkout.php?id1=1500&id2=7&id3= Washing_Machine">Buy Now</a> <br>
										<a href=" cart_1.php?id1=1500&id2=7&id3= Washing_Machine">Add to Cart</a>
								   </div>
								</div>
								<div class="col-xl-4 col-lg-6 col-md-12 col-sm-6 single-product">
								  <div class="content">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" src="img/c33.jpg" alt="">
								      <div class="content-details fadeIn-bottom">
									        <div class="bottom d-flex align-items-center justify-content-center">
												<a href="#"><span class="lnr lnr-heart"></span></a>
												<a href="#" data-toggle="modal" data-target="#exampleModal"><span class="lnr lnr-frame-expand"></span></a>
											</div>
								      </div>
								  </div>
								  <div class="price">
								  		<h5>Mixer</h5>
										<h3 class="text-white"><del style = "color : black">Rs 1000.0</del></h3>
								  		<h3>Rs600.00</h3>
										<a href=" checkout.php?id1=600&id2=8&id3= Mixer">Buy Now</a> <br>
										<a href=" cart_1.php?id1=600&id2=8&id3= Mixer">Add to Cart</a>
								   </div>
								</div>
								<div class="col-xl-4 col-lg-6 col-md-12 col-sm-6 single-product">
								  <div class="content">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" src="img/c34.jpg" alt="">
								      <div class="content-details fadeIn-bottom">
									        <div class="bottom d-flex align-items-center justify-content-center">
												<a href="#"><span class="lnr lnr-heart"></span></a>
												<a href="#" data-toggle="modal" data-target="#exampleModal"><span class="lnr lnr-frame-expand"></span></a>
											</div>
								      </div>
								  </div>
								  <div class="price">
								  		<h5>Vegetable Cutter</h5>
										<h3 class="text-white"><del style = "color : black">Rs 180.0</del></h3>
								  		<h3>Rs150.00</h3>
										<a href=" checkout.php?id1=150&id2=9&id3= Vegetable Cutter">Buy Now</a> <br>
										<a href=" cart_1.php?id1=150&id2=9&id3= Vegetable Cutter">Add to Cart</a>
								   </div>
								</div>	
								<div class="col-xl-4 col-lg-6 col-md-12 col-sm-6 single-product">
								  <div class="content">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" src="img/c35.jpg" alt="">
								      <div class="content-details fadeIn-bottom">
									        <div class="bottom d-flex align-items-center justify-content-center">
												<a href="#"><span class="lnr lnr-heart"></span></a>
												<a href="#" data-toggle="modal" data-target="#exampleModal"><span class="lnr lnr-frame-expand"></span></a>
											</div>
								      </div>
								  </div>
								  <div class="price">
								  		<h5>Shoes</h5>
										<h3 class="text-white"><del style = "color : black">Rs 200.0</del></h3>
								  		<h3>Rs150.00</h3>
										<a href=" checkout.php?id1=150&id2=10&id3= Shoes">Buy Now</a> <br>
										<a href=" cart_1.php?id1=150&id2=10&id3= Shoes">Add to Cart</a>
								   </div>
								</div>
								<div class="col-xl-4 col-lg-6 col-md-12 col-sm-6 single-product">
								  <div class="content">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" src="img/c37.jpg" alt="">
								      <div class="content-details fadeIn-bottom">
									        <div class="bottom d-flex align-items-center justify-content-center">
												<a href="#"><span class="lnr lnr-heart"></span></a>
												 
												<a href="#" data-toggle="modal" data-target="#exampleModal"><span class="lnr lnr-frame-expand"></span></a>
											</div>
								      </div>
								  </div>
								  <div class="price">
								  		<h5>Apparels</h5>
										<h3 class="text-white"><del style = "color : black">Rs 250.0</del></h3>
								  		<h3>Rs150.00</h3>
										<a href=" checkout.php?id1=250&id2=11&id3= Apparels">Buy Now</a>
										<a href=" cart_1.php?id1=250&id2=11&id3= Apparels">Add to Cart</a>
								   </div>
								</div>
								<div class="col-xl-4 col-lg-6 col-md-12 col-sm-6 single-product">
								  <div class="content">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" src="img/c38.jpg" alt="">
								      <div class="content-details fadeIn-bottom">
									        <div class="bottom d-flex align-items-center justify-content-center">
												<a href="#"><span class="lnr lnr-heart"></span></a>
												 
												<a href="#" data-toggle="modal" data-target="#exampleModal"><span class="lnr lnr-frame-expand"></span></a>
											</div>
								      </div>
								  </div>
								  <div class="price">
								  		<h5>Furniture</h5>
										<h3 class="text-white"><del style = "color : black">Rs 2500.0</del></h3>
								  		<h3>Rs1000.00</h3>
										<a href=" checkout.php?id1=1000&id2=12&id3= Furniture">Buy Now</a>
										<a href=" cart_1.php?id1=1000&id2=12&id3= Furniture">Add to Cart</a>
								   </div>
								</div>-->																																							
							</div>
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
							<div class="pagination">
							
								<a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
								<a href="#" class="active">1</a>
								<a href="#" class = "active" >2</a>
								<a href="#" class = "active">3</a>
								<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
								<a href="#">6</a>
								<a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
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
					<div class="row mt-30">
					<div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r2.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore fresh Cabbage</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> Rs189.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r2.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore fresh Cabbage</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> Rs189.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r3.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore fresh Raspberry</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> Rs189.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r4.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore fresh Kiwi</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> Rs189.00</div>
                                </div>
                            </div>
						</div>
						<div class="row mt-30">
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
