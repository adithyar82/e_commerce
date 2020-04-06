    <?php
    session_start();
    $id1 = $_REQUEST['id1'];
    $id2 = $_REQUEST['id2'];
    $id3 = $_REQUEST['id3'];
    $id4 = $id1 + 50;
    $_SESSION['id1'] = $id1;
    $_SESSION['id2'] = $id2;
    $_SESSION['id3'] = $id3;
    $_SESSION['id4'] = $id4;
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
								echo '</span> <ul class="list">
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
							  <!-- <img src="img/logo.png" alt=""> -->
							  <p> Company Logo </p>
						  </a>
						  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						    <span class="navbar-toggler-icon"></span>
						  </button>
						  <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
						    <ul class="navbar-nav">
								<li><a href="#home">Home</a></li>
								<li><a href="#catagory">Category</a></li>
								<li><a href="#men">Product</a></li>
								<!-- <li><a href="#women">Women</a></li> -->
								<li><a href="#latest">Recommendations</a></li>
									<!-- Dropdown -->
								    <li class="dropdown">
								      <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
								        Pages
								      </a>
								      <div class="dropdown-menu">
								        <a class="dropdown-item" href="category.php">Category</a>
								        <a class="dropdown-item" href="single.php">Single</a>
								        <!-- <a class="dropdown-item" href="cart.php">Cart</a> -->
								        <a class="dropdown-item" href="checkout.php">Checkout</a>
								        <a class="dropdown-item" href="confermation.php">Confirmation</a>
								        <a class="dropdown-item" href="login.php">Login</a>
								        <a class="dropdown-item" href="tracking.php">Tracking</a>
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
                <form method = "POST" action="confermation.php" class="billing-form">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h3 class="billing-title mt-20 mb-10">Billing Details</h3>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" name = "fname" placeholder="First name*" onfocus="this.placeholder=''" onblur="this.placeholder = 'First name*'" required class="common-input">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name = "lname" placeholder="Last name*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Last name*'" required class="common-input">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name = "pnname" placeholder="Phone number*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Phone number*'" required class="common-input">
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" name = "ename" placeholder="Email Address*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Email Address*'" required class="common-input">
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
                                    <input name = "address_1" type="text" placeholder="Address line 01*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Address line 01*'" required class="common-input">
                                </div>
                                <div class="col-lg-12">
                                    <input name = "address_2" type="text" placeholder="Address line 02*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Address line 02*'" class="common-input">
                                </div>
                                <div class="col-lg-12">
                                    <input name = "city" type="text" placeholder="Town/City*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Town/City*'" required class="common-input">
                                </div>
                                <div class="col-lg-12">
                                    <input name = "state" type="text" placeholder="State*" onfocus="this.placeholder=''" onblur="this.placeholder = 'State*'" required class="common-input">
                                </div>
                                <div class="col-lg-12">
                                    <input name = "country" type="text" placeholder="Country*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Country*'" required class="common-input">
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
                                    <input name="zip" type="text" placeholder="Postcode/ZIP" onfocus="this.placeholder=''" onblur="this.placeholder = 'Postcode/ZIP'" required class="common-input">
                                </div>
                            </div>
                            <div class="mt-20">
                                <input type="checkbox" class="pixel-checkbox" id="login-3">
                                <label for="login-3">Create an account?</label>
                            </div>
                            <h3 class="billing-title mt-20 mb-10">Billing Details</h3>
                            <div class="mt-20">
                                <input type="checkbox" class="pixel-checkbox" id="login-6">
                                <label for="login-6">Ship to a different address?</label>
                            </div>
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
								<div><?php echo $id3?></div>
								<div>x 02</div>
								<div><?php echo $id1?></div>
							</div>
							<div class="list-row d-flex justify-content-between">
								<h6>Subtotal</h6>
								<div><?php echo $id1?></div>
							</div>
							<div class="list-row d-flex justify-content-between">
								<h6>Shipping</h6>
								<div>Flat rate: Rs50.00</div>
							</div>
							<div class="list-row border-bottom-0 d-flex justify-content-between">
								<h6>Total</h6>
								<div class="total"><?php echo $id4?></div>
							</div>
                                    </div>
                                    <div class="d-flex align-items-center mt-10">
                                        <input class="pixel-radio" type="radio" id="check" name="brand">
                                        <label for="check" class="bold-lable">Check payments</label>
                                    </div>
                                    <p class="payment-info">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <input class="pixel-radio" type="radio" id="paypal" name="brand">
                                            <label for="paypal" class="bold-lable">Paypal</label>
                                        </div>
                                        <img src="img/organic-food/pm.jpg" alt="" class="img-fluid">
                                    </div>
                                    <p class="payment-info">Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                    <div class="mt-20 d-flex align-items-start">
                                        <!-- <input type="checkbox" class="pixel-checkbox" id="login-4"> -->
                                        <!-- <label for="login-4">I’ve read and accept the <a href="#" class="terms-link">terms & conditions*</a></label> -->
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <input class="pixel-radio" type="radio" id="paypal" name="brand">
                                            <label for="paypal" class="bold-lable">Paytm</label>
                                        </div>
                                        <img src="img/organic-food/pm.jpg" alt="" class="img-fluid">
                                    </div>
                                    <p class="payment-info">Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                    <div class="mt-20 d-flex align-items-start">
                                        
                                        <!-- <label for="login-4">I’ve read and accept the <a href="#" class="terms-link">terms & conditions*</a></label> -->
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <input class="pixel-radio" type="radio" id="paypal" name="brand">
                                            <label for="paypal" class="bold-lable">PhonePe</label>
                                        </div>
                                        <img src="img/organic-food/pm.jpg" alt="" class="img-fluid">
                                    </div>
                                    <p class="payment-info">Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                    <div class="mt-20 d-flex align-items-start">
                                        
                                        <!-- <label for="login-4">I’ve read and accept the <a href="#" class="terms-link">terms & conditions*</a></label> -->
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <input class="pixel-radio" type="radio" id="paypal" name="brand">
                                            <label for="paypal" class="bold-lable">Google Pay</label>
                                        </div>
                                        <img src="img/organic-food/pm.jpg" alt="" class="img-fluid">
                                    </div>
                                    <p class="payment-info">Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
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