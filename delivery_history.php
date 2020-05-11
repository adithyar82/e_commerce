<?php
    include('connect_db.php');
	session_start();
	if(!isset($_SESSION['uname'])){
		header("location:index.php");
	}
	$username = $_SESSION['uname'];
    echo $_SESSION['username'];
    $sql = "SELECT * FROM order_status WHERE fname = '$username';";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            $final_cost = $row['final_cost'];
            $product_name = $row['product_name'];
            $order_id = $row['order_id'];

        }
	}
	$order_id = $_REQUEST['id'];
	$status = $_REQUEST['id1'];
	$total_distance = $_REQUEST['id2'];
	$delivery_time = $_REQUEST['id3'];
	$sql1 = "UPDATE order_status SET status = '$status', delivery_boy = '$username', total_distance = '$total_distance', delivery_time = '$delivery_time' WHERE order_id = '$order_id';";
	$result1 = $conn->query($sql1);
	?>
    <!DOCTYPE html>
    <html lang="zxx" class="no-js">
    <head>
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
            <link rel="stylesheet" href="css/owl.carousel.css">            
            <link rel="stylesheet" href="css/font-awesome.min.css">
            <link rel="stylesheet" href="css/nice-select.css">
            <link rel="stylesheet" href="css/ion.rangeSlider.css" />
            <link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
            <link rel="stylesheet" href="css/bootstrap.css">
            <link rel="stylesheet" href="css/main.css">
        </head>
        <body>

            <!-- Start Header Area -->
            <header class="default-header">
                <div class="menutop-wrap">
                    <div class="menu-top container">
					<div class="d-flex justify-content-between align-items-center">
                            <ul class="list">
                                <li><a href="contact_us.php">+91 8095566699   |   contact.azeempatel@gmail.com.com</a></li>                             
                            </ul>
                            <ul class="list">
								<li><a href="logout.php" style = "margin-rigth:15px;">Logout</a></li>
                            </ul>
                        </div>
                    </div>                  
                </div>
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container">
                          <a class="navbar-brand" href="category.php">
                            <img src="img/logo.png" alt="">
                          </a>
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>
                          <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li><a href="delivery_checkout.php">Checkout</a></li>
                                <li><a href="delivery_status_1.php">My Orders</a></li>
                                <!-- <li><a href="#men">Men</a></li>
                                <li><a href="#women">Women</a></li>
                                <li><a href="#latest">latest</a></li> -->
                                    <!-- Dropdown -->
                                    <!-- <li class="dropdown">
                                      <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                        Pages
                                      </a>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="category.html">Category</a>
                                        <a class="dropdown-item" href="single.html">Single</a>
                                        <a class="dropdown-item" href="cart.html">Cart</a>
                                        <a class="dropdown-item" href="checkout.html">Checkout</a>
                                        <a class="dropdown-item" href="confermation.html">Confermation</a>
                                        <a class="dropdown-item" href="login.html">Login</a>
                                        <a class="dropdown-item" href="tracking.html">Tracking</a>
                                        <a class="dropdown-item" href="generic.html">Generic</a>
                                        <a class="dropdown-item" href="elements.html">Elements</a>
                                      </div>
                                    </li>                                    -->
                            </ul>
                          </div>                        
                    </div>
                </nav>
            </header>
            <!-- End Header Area -->

            <!-- Start Banner Area -->
            <section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                            <h1>Order History</h1>
                             <!-- <nav class="d-flex align-items-center justify-content-start">
                                <a href="index.html">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="single.html">Single Product Page</a>
                            </nav> -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Banner Area -->

			<!-- Start Product Details -->
			<?php
include('connect_db.php');
$sql = "SELECT * FROM order_status where status = 'delivered'";
$result = $conn->query($sql);
if($result->num_rows>0){
	while($row = $result->fetch_assoc()){
		$fname = $row['fname'];
		$order_id = $row['order_id'];
		$product_name = $row['product_name'];
		$final_cost = $row['final_cost'];
		$status = $row['status'];
		$product_image = $row['product_image'];
		$shop_id = $row['shop_id'];
		$sql_2 = "SELECT * FROM shipping WHERE shipping_id = '$order_id';";
		$result_2 = $conn->query($sql_2);
		if($result_2->num_rows>0){
			while($row=$result_2->fetch_assoc()){
				$address_1 = $row['address_1'];
				$city = $row['city'];
				$state = $row['state'];
				$zipcode = $row['zipcode'];
				$country = $row['country'];
			}
		}
		$sql_3 = "SELECT * FROM shops WHERE shop_id = '$shop_id';";
		$result_3 = $conn->query($sql_3);
		if($result_3->num_rows>0){
			while($row=$result_3->fetch_assoc()){
				$address_12 = $row['address_1'];
				$city_12 = $row['city'];
				$state_12 = $row['state'];
				$zipcode_12 = $row['zipcode'];
				$country_12 = $row['country'];
			}
		}
		$delivery_address = $address_1.' '.$city.' '.$state.' '.$zipcode.' '.$country;
		$shop_address = $address_12.' '.$city_12.' '.$state_12.' '.$zipcode_12.' '.$country_12;
			echo'
			
            <div class="container">
                <div class="product-quick-view">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
						<img class="content-image" src="'.$product_image.'" alt="">
                        </div>
                        <div class="col-lg-6">
                            <div class="quick-view-content">
                                <div class="top">
                                    <h3 class="head">Order Id: '.$order_id.'<h3>
                                    <div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span class="ml-10">Rs '.$final_cost.'</span></div>
                                    <div class="category">Name: '.$fname.' <span></span></div><br>
									<div class="available">Phone Number: '.$phone_number.' <span></span></div><br>
									<div class="available">Product Name: '.$product_name.'<span></span></div><br>
									<div class="available">Order Status:'.$status.' <span></span></div><br>
									<div class="available">Pickup Location: '.
									$address_12.','.$city_12.','.$state_12.','.$zipcode_12.','.$country_12.'
								<span></span></div><br>
									<div class="available">Delivery Location: '.
									$address_1.','.$city.','.$state.','.$zipcode.','.$country.'
								<span></span></div><br>
                                </div>
                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                ';
				}
			}
			?>
            </section> 
            <!-- End Most Search Product Area -->
			<!-- start footer Area --> 
			<br>     
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
                                            <div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span class="ml-10">$149.99</span></div>
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
			</div> ';
										}
									}
									?>
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