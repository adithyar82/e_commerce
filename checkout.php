    <?php
    session_start();
    require_once('config.php');
    include('connect_db.php');
    
    if(!isset($_SESSION['uname'])){
		header("location:index.php");
    }
    $uname = $_SESSION['uname'];
    $product_id = $_REQUEST['id1'];

    $coupon_code = $_REQUEST['id2'];
    $sql = "SELECT * FROM shipping;";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        while ($row = $result->fetch_assoc()){
            $address_1 = $row['address_1'];
            $address_2 = $row['address_2'];
            $city = $row['city'];
            $state = $row['state'];
            $zipcode = $row['zip'];
            $country = $row['country'];

        }
    }
    $order_id = rand(1000000,99999999);
    $_SESSION['order_id'] = $order_id;
    $sql_12 = "UPDATE items SET order_id = '$order_id' WHERE username = '$uname';";
    $result_12 = $conn->query($sql_12);
    $sql1 = "SELECT * FROM Users WHERE username  = '$uname';";
    $result1= $conn->query($sql1);
    if($result1->num_rows>0){
        while ($row = $result1->fetch_assoc()){
            $fname = $row['fname'];
            $email_address = $row['email_address'];
            $phone_number = $row['phone_number'];

        }
    }
    $sql2 = "SELECT * FROM products WHERE product_id = '$product_id';";
    $result2 = $conn->query($sql2);
    if($result2->num_rows>0){
        while($row = $result2->fetch_assoc()){
            $product_name = $row['product_name'];
            $final_cost = $row['final_cost'];
            $product_quantity = $row['product_quantity'];
        }
    }
    $sql_1 = "SELECT * FROM coupons WHERE coupon_code = '$coupon_code';";
    $result_1 = $conn->query($sql_1);
    if($result_1->num_rows>0){
        while($row = $result_1->fetch_assoc()){
            $value = $row['value'];
        }
    }
    $total_cost = $final_cost - $value;
    $_SESSION['id4'] = $total_cost;
    $_SESSION['id2'] = $product_id;
    $_SESSION['id3'] = $product_name;
    // $order_id = rand(10000000,99999999);
    $sql_2 = "SELECT MIN(status) as delivery_status FROM delivery_log;";
    $result_2 = $conn->query($sql_2);
    if($result_2->num_rows>0){
        while($row = $result_2->fetch_assoc()){
            $delivery_status = $row['delivery_status'];
            if($delivery_status == 0){
                echo'<script>
                alert("Currently there are no delivery boys available in your locality");
                window.location = "category.php"
                </script>';
            }
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
                            <ul class="list">
								<li><a href="contact_us.php">Contact Support</a></li>
                                <li><a href="faq.php">Help ?</a></li>
							</ul>	
                                								
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
                            <h1>Product Checkout</h1>
                             <nav class="d-flex align-items-center justify-content-start">
                                <a href="category.php">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="checkout.php">Product Checkout</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Banner Area -->
            <!-- Start Checkout Area -->
            <div class="container">
                <div class="checkput-login">
                    <div class="top-title">
                        <p>Returning Customer? <a data-toggle="collapse" href="#checkout-login" aria-expanded="false" aria-controls="checkout-login">Click here to login</a></p>
                    </div>
                    <div class="collapse" id="checkout-login">
                        <div class="checkout-login-collapse d-flex flex-column">
                            <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing & Shipping section.</p>
                            <form action="#" class="d-block">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <input type="text" placeholder="Username or Email*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Username or Email*'" required class="common-input mt-10">

                                    </div>
                                    <div class="col-lg-4">
                                        <input type="password" placeholder="Password*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Password*'" required class="common-input mt-10">
                                    </div>
                                </div>
                                <div class="d-flex align-items-center flex-wrap">
                                    <button class="view-btn color-2 mt-20 mr-20"><span>Login</span></button>
                                    <div class="mt-20">
                                        <input type="checkbox" class="pixel-checkbox" id="login-1">
                                        <label for="login-1">Remember me</label>
                                    </div>
                                </div>
                            </form>
                            <a href="#" class="mt-10">Lost your password?</a>
                        </div>
                    </div>
                </div>
                <div class="checkput-login mt-20">
                    <div class="top-title">
                        <p>Have a coupon? <a data-toggle="collapse" href="#checkout-cupon" aria-expanded="false" aria-controls="checkout-cupon">Click here to enter your code</a></p>
                    </div>
                    <div class="collapse" id="checkout-cupon">
                        <div class="checkout-login-collapse d-flex flex-column">
                            <form action="#" class="d-block">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <input type="text" placeholder="Enter coupon code" onfocus="this.placeholder=''" onblur="this.placeholder = 'Enter coupon code'" required class="common-input mt-10">
                                    </div>
                                </div>
                                <button class="view-btn color-2 mt-20"><span>Apply Coupon</span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Checkout Area -->
            <!-- Start Billing Details Form -->
            <div class="container">
                <form method = "POST" action="confermation_1.php" class="billing-form">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h3 class="billing-title mt-20 mb-10">Billing Details</h3>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" name = "fname" placeholder="First name*" onfocus="this.placeholder=''" onblur="this.placeholder = 'First name*'" value = "<?php echo $fname ?>" required class="common-input">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name = "lname" placeholder="Last name*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Last name*'" required class="common-input">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name = "pnname" placeholder="Phone number*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Phone number*'" value = "<?php echo $phone_number?> " required class="common-input">
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" name = "ename" placeholder="Email Address*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Email Address*'" value = "<?php echo $email_address?>" required class="common-input">
                                    <input type="text" name = "order_id" placeholder="Email Address*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Email Address*'" value = "<?php echo $order_id?>" required class="common-input" hidden>
                                    <input type="text" name = "product_id" placeholder="Email Address*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Email Address*'" value = "<?php echo $product_id?>" required class="common-input" hidden>
                                </div>
                                <div class="col-lg-12">
                                    <div class="sorting">
                                        <select>
                                            <option value="1">Country*</option>
                                            <option value="1">Default sorting</option>
                                            <option value="1">Default sorting</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <input name = "address_1" type="text" placeholder="Address line 01*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Address line 01*'" value = "<?php echo $address_1 ?>" required class="common-input">
                                </div>
                                <div class="col-lg-12">
                                    <input name = "address_2" type="text" placeholder="Address line 02*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Address line 02*'" value = "<?php echo $address_2 ?>" class="common-input">
                                </div>
                                <div class="col-lg-12">
                                    <input name = "city" type="text" placeholder="Town/City*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Town/City*'" value = "<?php echo $city ?>" required class="common-input">
                                </div>
                                <div class="col-lg-12">
                                    <input name = "state" type="text" placeholder="State*" onfocus="this.placeholder=''" onblur="this.placeholder = 'State*'" value = "<?php echo $state ?>" required class="common-input">
                                </div>
                                <div class="col-lg-12">
                                    <input name = "country" type="text" placeholder="Country*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Country*'" value = "<?php echo $country ?>" required class="common-input">
                                </div>
                                <div class="col-lg-12">
                                    <div class="sorting">
                                        <select>
                                            <option value="1">District*</option>
                                            <option value="1">Default sorting</option>
                                            <option value="1">Default sorting</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <input name="zip" type="text" placeholder="Postcode/ZIP" onfocus="this.placeholder=''" onblur="this.placeholder = 'Postcode/ZIP'" value = "<?php echo $zipcode ?>" required class="common-input">
                                </div>
                            </div>
                            <div class="mt-20">
                                <input type="checkbox" name = " " class="pixel-checkbox" id="login-3">
                                <label for="login-3">Create an account?</label>
                            </div>
                            <h3 class="billing-title mt-20 mb-10">Billing Details</h3>
                            <div class="mt-20">
                                <input type="checkbox" name = "shipping_address" class="pixel-checkbox" id="login-6">
                                <label for="login-6">Ship to a different address?</label>
                            </div>
                            <div class="row">
                            <div class="col-lg-12">
                                    <input name = "address_11" type="text" placeholder="Address line 01*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Address line 01*'" class="common-input">
                                </div>
                                <div class="col-lg-12">
                                    <input name = "address_12" type="text" placeholder="Address line 02*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Address line 02*'" class="common-input">
                                </div>
                                <div class="col-lg-12">
                                    <input name = "city_1" type="text" placeholder="Town/City*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Town/City*'" class="common-input">
                                </div>
                                <div class="col-lg-12">
                                    <input name = "state_1" type="text" placeholder="State*" onfocus="this.placeholder=''" onblur="this.placeholder = 'State*'" class="common-input">
                                </div>
                                <div class="col-lg-12">
                                    <input name = "country_1" type="text" placeholder="Country*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Country*'" class="common-input">
                                </div>
                                <div class="col-lg-12">
                                    <div class="sorting">
                                        <select>
                                            <option value="1">District*</option>
                                            <option value="1">Default sorting</option>
                                            <option value="1">Default sorting</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <input name="zip_1" type="text" placeholder="Postcode/ZIP" onfocus="this.placeholder=''" onblur="this.placeholder = 'Postcode/ZIP'" class="common-input">
                                </div>
                            </div>
                            <br>
                            <textarea placeholder="Order Notes" onfocus="this.placeholder=''" onblur="this.placeholder = 'Order Notes'" class="common-textarea"></textarea>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="order-wrapper mt-50">
                                <h3 class="billing-title mb-10">Your Order</h3>
                                <div class="order-list">
                                   <div class="list-row d-flex justify-content-between">
									<div>Product</div>
									<div>Total</div>
								</div>
							<div class="list-row d-flex justify-content-between">
								<div><?php echo $product_name?></div>
								<div>x 01</div>
								<div><?php echo $total_cost?></div>
							</div>
							<div class="list-row d-flex justify-content-between">
								<h6>Subtotal</h6>
								<div><?php echo $final_cost?></div>
							</div>
							<div class="list-row d-flex justify-content-between">
								<h6>Shipping</h6>
								<div>Flat rate: Rs50.00</div>
							</div>
                            <?php	
                            if($value>0){
                                echo'<div class="list-row d-flex justify-content-between">
								<h6>Coupon Code</h6>
								<div>'.$coupon_code.'</div>
							</div>
							<div class="list-row d-flex justify-content-between">
								<h6>Value</h6>
								<div>'.$value.'</div>
                            </div>';
                            echo'<a href = "buy_coupons_1.php?id1='.$product_id.'" button class="view-btn color-2 w-100 mt-20"><span>Change Coupon</span></button></a>';
                            }
                            else{
                                echo'<a href = "buy_coupons_1.php?id1='.$product_id.'" button class="view-btn color-2 w-100 mt-20"><span>Apply Coupon</span></button></a>';
                            }
                            ?>
                            <div class="list-row border-bottom-0 d-flex justify-content-between">
                            
                                
							</div>
							<div class="list-row border-bottom-0 d-flex justify-content-between">
								<h6>Total</h6>
								<div class="total"><?php echo $total_cost?></div>
							</div>
                                    </div>
                                    
                                    <div class="mt-20 d-flex align-items-start">
                                        
                                        <!-- <label for="login-4">I’ve read and accept the <a href="#" class="terms-link">terms & conditions*</a></label> -->
                                    </div>
                                    
                                    <div class="mt-20 d-flex align-items-start">
                                        <input type="checkbox" class="pixel-checkbox" id="login-4">
                                        <label for="login-4">I’ve read and accept the <a href="#" class="terms-link">terms & conditions*</a></label>
                                    </div>
                                    <button class="view-btn color-2 w-100 mt-20"><span>Proceed to Checkout</span></button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>              
                                

            <!-- End Billing Details Form -->

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

            <script src="js/vendor/jquery-2.2.4.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
            <script src="js/vendor/bootstrap.min.js"></script>
            <script src="js/jquery.ajaxchimp.min.js"></script>
            <script src="js/jquery.nice-select.min.js"></script>
            <script src="js/jquery.sticky.js"></script>
            <script src="js/ion.rangeSlider.js"></script>
            <script src="js/jquery.magnific-popup.min.js"></script>
            <script src="js/main.js"></script>  
        </body>
    </html>