    <?php
    session_start();
    if(!isset($_SESSION['uname'])){
		header("location:index.php");
	}
    include('connect_db.php');
    $username = $_SESSION['username'];
    $product_id = $_SESSION['product_id'];
    $cost = $_REQUEST['id'];
    // $id1 = $_REQUEST['id1'];
    // $id2 = $_REQUEST['id2'];
    // $id3 = $_REQUEST['id3'];
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
							  <img style="margin-left:10px;" src="img/logo.png" alt="">
							  <p> Company Logo </p>
						  </a>
						  
						  <div class="search-form" style="margin-left:2%; margin-top:2.5%">
           					 <form action="#" method="get">
              					<input type="search" name="search" id="search" style="width:300px;" placeholder="Type keywords &amp; press enter...">
             					<button type="submit" class="d-none"></button>
           					 </form>
						  </div>

						  <div style="margin-left:1%; margin-top:1%"><a href="#"><span class="glyphicon glyphicon-search"> </span></a></div>
	
						  <div class="collapse navbar-collapse" style = "margin-left:35%;" id="navbarSupportedContent">
						    <ul class="navbar-nav" style="width:1500px;">
								<li><a href="category.php">Home</a></li>
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
                                    <li><a href="favourite.php"><span class="glyphicon glyphicon-heart"> </span></a></li>
                                </li>									
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
                            <h1>Shopping Cart</h1>
                             <nav class="d-flex align-items-center justify-content-start">
                                <a href="category.php">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="cart.php">Shopping Cart</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Banner Area -->

            <!-- Start Cart Area -->
            <div class="container">
                <div class="cart-title">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="ml-15">Product</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>Price</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>Change Product Quantity</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>Total</h6>
                        </div>
                    </div>
                </div>
                <?php
                session_start();
                include('connect_db.php');
                $username = $_SESSION['username'];
                $sql = "SELECT * FROM items WHERE username = '$username';";
                $result=$conn->query($sql);
                $sql1 = "SELECT SUM(final_cost) as total_cost FROM items WHERE username ='$username';";
                $result1 = $conn->query($sql1);
                // 
                if($result->num_rows>0){
                    while($row = $result->fetch_assoc()){
                        $item_name = $row['item_name'];
                        $item_price = $row['item_price']; 
                        $product_quantity = $row['product_quantity'];
                        $product_quantity_1 = $row['initial_quantity'];
                        // $item_id = $row['id'];
                        $total_price = $product_quantity * $item_price;
                        
                         echo'
                            <div class="cart-single-item">
                            <div class="row align-items-center">
                                <div class="col-md-6 col-12">
                                    <div class="product-item d-flex align-items-center">
                                        <h3>'.$item_name.'</h3>
                                    </div>
                                </div>
                                <div class="col-md-2 col-6">
                                    <div class="price">'.$item_price.'</div>
                                </div>
                                <div class="col-md-2 col-6">
                                <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">'.$product_quantity.'
                                
                              </a>';
                        if($product_quantity_1 == 0){
                                echo '<p> Out of Stock</p>';
                        }
                        else if($product_quantity_1 == 1){
                            echo '<div class="dropdown-menu">
                            <a class="dropdown-item" href="quantity.php?id1=1&id2='.$item_id.'">1</a>
                            <a class="dropdown-item" href="quantity.php?id1=1&id2='.$item_id.'">1</a>
                            <!-- <a class="dropdown-item" href="cart.php">Cart</a> -->
                            <!-- <a class="dropdown-item" href="checkout.php">Checkout</a>
                            <a class="dropdown-item" href="confermation.php">Confirmation</a>
                            <a class="dropdown-item" href="login.php">Login</a>
                            <a class="dropdown-item" href="tracking.php">Tracking</a> -->
                            <!-- <a class="dropdown-item" href="generic.php">Generic</a>
                            <a class="dropdown-item" href="elements.php">Elements</a> -->
                        </div>';
                        }
                        else if($product_quantity_1 == 2){
                        echo'
                        <div class="dropdown-menu">
                                <a class="dropdown-item" href="quantity.php?id1=1&id2='.$item_id.'">1</a>
                                <a class="dropdown-item" href="quantity.php?id1=1&id2='.$item_id.'">1</a>
                                <a class="dropdown-item" href="quantity.php?id1=2&id2='.$item_id.'">2</a>
                                <!-- <a class="dropdown-item" href="cart.php">Cart</a> -->
                                <!-- <a class="dropdown-item" href="checkout.php">Checkout</a>
                                <a class="dropdown-item" href="confermation.php">Confirmation</a>
                                <a class="dropdown-item" href="login.php">Login</a>
                                <a class="dropdown-item" href="tracking.php">Tracking</a> -->
                                <!-- <a class="dropdown-item" href="generic.php">Generic</a>
                                <a class="dropdown-item" href="elements.php">Elements</a> -->
                        </div>';
                        }
                        else if($product_quantity_1 == 3){
                            echo'<div class="dropdown-menu">
                            <a class="dropdown-item" href="quantity.php?id1=1&id2='.$item_id.'">1</a>
                            <a class="dropdown-item" href="quantity.php?id1=1&id2='.$item_id.'">1</a>
                            <a class="dropdown-item" href="quantity.php?id1=2&id2='.$item_id.'">2</a>
                            <a class="dropdown-item" href="quantity.php?id1=3&id2='.$item_id.'">3</a>
                            <!-- <a class="dropdown-item" href="cart.php">Cart</a> -->
                            <!-- <a class="dropdown-item" href="checkout.php">Checkout</a>
                            <a class="dropdown-item" href="confermation.php">Confirmation</a>
                            <a class="dropdown-item" href="login.php">Login</a>
                            <a class="dropdown-item" href="tracking.php">Tracking</a> -->
                            <!-- <a class="dropdown-item" href="generic.php">Generic</a>
                            <a class="dropdown-item" href="elements.php">Elements</a> -->
                        </div>';
                        }
                        else if($product_quantity_1 == 4){
                            echo '<div class="dropdown-menu">
                            <a class="dropdown-item" href="quantity.php?id1=1&id2='.$item_id.'">1</a>
                            <a class="dropdown-item" href="quantity.php?id1=1&id2='.$item_id.'">1</a>
                            <a class="dropdown-item" href="quantity.php?id1=2&id2='.$item_id.'">2</a>
                            <a class="dropdown-item" href="quantity.php?id1=3&id2='.$item_id.'">3</a>
                            <a class="dropdown-item" href="quantity.php?id1=4&id2='.$item_id.'">4</a>
                            <!-- <a class="dropdown-item" href="cart.php">Cart</a> -->
                            <!-- <a class="dropdown-item" href="checkout.php">Checkout</a>
                            <a class="dropdown-item" href="confermation.php">Confirmation</a>
                            <a class="dropdown-item" href="login.php">Login</a>
                            <a class="dropdown-item" href="tracking.php">Tracking</a> -->
                            <!-- <a class="dropdown-item" href="generic.php">Generic</a>
                            <a class="dropdown-item" href="elements.php">Elements</a> -->
                         </div>';
                        }
                        else if($product_quantity_1 == 5){
                            echo '<div class="dropdown-menu">
                            <a class="dropdown-item" href="quantity.php?id1=1&id2='.$item_id.'">1</a>
                            <a class="dropdown-item" href="quantity.php?id1=1&id2='.$item_id.'">1</a>
                            <a class="dropdown-item" href="quantity.php?id1=2&id2='.$item_id.'">2</a>
                            <a class="dropdown-item" href="quantity.php?id1=3&id2='.$item_id.'">3</a>
                            <a class="dropdown-item" href="quantity.php?id1=4&id2='.$item_id.'">4</a>
                            <a class="dropdown-item" href="quantity.php?id1=5&id2='.$item_id.'">5</a>
                            <!-- <a class="dropdown-item" href="cart.php">Cart</a> -->
                            <!-- <a class="dropdown-item" href="checkout.php">Checkout</a>
                            <a class="dropdown-item" href="confermation.php">Confirmation</a>
                            <a class="dropdown-item" href="login.php">Login</a>
                            <a class="dropdown-item" href="tracking.php">Tracking</a> -->
                            <!-- <a class="dropdown-item" href="generic.php">Generic</a>
                            <a class="dropdown-item" href="elements.php">Elements</a> -->
                         </div>';
                        }
                        else{
                        echo'
                        <div class="dropdown-menu">
                                <a class="dropdown-item" href="quantity.php?id1=1&id2='.$item_id.'">1</a>
                                <a class="dropdown-item" href="quantity.php?id1=1&id2='.$item_id.'">1</a>
                                <a class="dropdown-item" href="quantity.php?id1=2&id2='.$item_id.'">2</a>
                                <a class="dropdown-item" href="quantity.php?id1=3&id2='.$item_id.'">3</a>
                                <a class="dropdown-item" href="quantity.php?id1=4&id2='.$item_id.'">4</a>
                                <a class="dropdown-item" href="quantity.php?id1=5&id2='.$item_id.'">5</a>
                                <a class="dropdown-item" href="quantity.php?id1=6&id2='.$item_id.'">6</a>
                                <!-- <a class="dropdown-item" href="cart.php">Cart</a> -->
                                <!-- <a class="dropdown-item" href="checkout.php">Checkout</a>
                                <a class="dropdown-item" href="confermation.php">Confirmation</a>
                                <a class="dropdown-item" href="login.php">Login</a>
                                <a class="dropdown-item" href="tracking.php">Tracking</a> -->
                                <!-- <a class="dropdown-item" href="generic.php">Generic</a>
                                <a class="dropdown-item" href="elements.php">Elements</a> -->
                        </div>';
                        }
                        
                                echo'</div>
                                <div class="col-md-2 col-12">
                                    <div class="total">'.$total_price.'</div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <ul>
                                        <div class="total"><a href = "cart_2.php?id1='.$item_id.'">Remove Item</a></div>
                                        <span class="glyphicon glyphicon-remove"> </span>
                                    </ul>
                                </div>
                            </div>
                            </div>';
                        }
                    }
                if($result1->num_rows>0){
                    while($row = $result1->fetch_assoc()){
                        $total_cost = $row['total_cost'];
                    }
                }
                $total_cost = $total_cost - $cost;
                
                ?>
                <div class="subtotal-area d-flex align-items-center justify-content-end">
                    <div class="title text-uppercase">Subtotal</div>
                    <div class="subtotal"><?php echo $total_cost ?></div>
                </div>
                <div style = "margin-left:80%">
                <form method ="POST" action = "buy_coupons.php">
                    <input type="text" name = "referral_code" placeholder="Enter Referral Code" onfocus="this.placeholder=''" onblur="this.placeholder = 'Full name*'" required class="common-input mt-20 wt-40">
                    <input type = "submit" name = "submit" class="view-btn color-2 w-100 mt-20"><span></span>
                <form>
                </div>
                <div>
                    <a href = "checkout_1.php"  button class="view-btn color-2 w-100 mt-20"><span>Buy Now</span></button>
                </div>
                <div>
                    <a href = "buy_coupons.php?id=<?php echo $total_cost?>" button class="view-btn color-2 w-100 mt-20"><span>Apply Coupon</span></button>
                </div>
            </div>
            <!-- End Cart Area -->

            <!-- Start Most Search Product Area -->
            <section class="section-half">
                <div class="container">
                    <div class="organic-section-title text-center">
                        <h3>Most Searched Products</h3>
                    </div>
                    <div class="row mt-30">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r1.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore fresh Blueberry</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> $240.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r2.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore fresh Cabbage</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> $189.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r3.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore fresh Raspberry</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> $189.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r4.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore fresh Kiwi</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> $189.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r5.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore Bell Pepper</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> $120.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r6.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore fresh Blackberry</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> $120.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r7.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore fresh Brocoli</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> $120.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r8.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore fresh Carrot</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> $120.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r9.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore fresh Strawberry</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> $240.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r10.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Prixma MG2 Light Inkjet</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> $240.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r11.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore fresh Cherry</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> $240.00 <del>$340.00</del></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r12.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore fresh Beans</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> $240.00 <del>$340.00</del></div>
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

                                        <!-- <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">

                                        <div class="d-flex flex-row">

                                            <input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">


                                                <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                                                <div style="position: absolute; left: -5000px;">
                                                    <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                                                </div> -->
                                            
                                            <!-- <div class="col-lg-4 col-md-4">
                                                <button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
                                            </div>
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
                        <p class="footer-text m-0">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved></p>
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
