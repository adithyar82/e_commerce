<?php
include('connect_db.php');
    session_start();
    $id1 = $_REQUEST['id1'];
    $id2 = $_REQUEST['id2'];
    $id3 = $_REQUEST['id3'];
    $id4 = $id1 + 50;
    $_SESSION['id1'] = $id1;
    $_SESSION['id2'] = $id2;
    $_SESSION['id3'] = $id3;
    $_SESSION['id4'] = $id4;
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
    $sql1 = "SELECT * FROM Users WHERE username  = 'abc';";
        $result1= $conn->query($sql1);
        if($result1->num_rows>0){
            while ($row = $result1->fetch_assoc()){
                $fname = $row['fname'];
                $email_address = $row['email_address'];
                $phone_number = $row['phone_number'];

            }
    }
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
								<li><a href="tel:+12312-3-1209">+91 8095566699</a></li>
								<li><a href="contact_us.php">support@azimpatel.com</a></li>								
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
                                <span class="glyphicon glyphicon-user"> </span>
								<li><a href="#">Welcome '.$username.' </a></li>
							</ul>';
							}
							
							?>
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
									<!-- Dropdown -->
								    <!-- <li class="dropdown">
								      <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
								        Pages
								      </a>
								      <div class="dropdown-menu">
								        <a class="dropdown-item" href="category.php">Category</a>
								        <a class="dropdown-item" href="single.php">Single</a>
								        <a class="dropdown-item" href="cart.php">Cart</a> 
								        <a class="dropdown-item" href="checkout.php">Checkout</a>
								        <a class="dropdown-item" href="confermation.php">Confirmation</a>
								        <a class="dropdown-item" href="login.php">Login</a>
								        <a class="dropdown-item" href="tracking.php">Tracking</a>
								        <a class="dropdown-item" href="generic.php">Generic</a>
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
                            <h1>Edit Address</h1>
                             <nav class="d-flex align-items-center justify-content-start">
                                <a href="category.php">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="checkout.php">Edit Address</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Banner Area -->
            <!-- Start Checkout Area -->         
            <!-- End Checkout Area -->
            <!-- Start Billing Details Form -->
            <div class="container" style="margin-left:23%; margin-bottom:10%">
                <form method = "POST" action="confermation.php" class="billing-form">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" name = "fname" placeholder="First name*" onfocus="this.placeholder=''" onblur="this.placeholder = 'First name*'" value = "<?php echo $fname?>" required class="common-input">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name = "lname" placeholder="Last name*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Last name*'" required class="common-input">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name = "pnname" placeholder="Phone number*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Phone number*'" value = "<?php echo $phone_number?>" required class="common-input">
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" name = "ename" placeholder="Email Address*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Email Address*'" value = "<?php echo $email_address?>" required class="common-input">
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
                                    <input name = "address_1" type="text" placeholder="Address line 01*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Address line 01*'" value = "<?php echo $address_1?>" required class="common-input">
                                </div>
                                <div class="col-lg-12">
                                    <input name = "address_2" type="text" placeholder="Address line 02*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Address line 02*'" value = "<?php echo $address_2?>" class="common-input">
                                </div>
                                <div class="col-lg-12">
                                    <input name = "city" type="text" placeholder="Town/City*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Town/City*'" value = "<?php echo $city?>" required class="common-input">
                                </div>
                                <div class="col-lg-12">
                                    <input name = "state" type="text" placeholder="State*" onfocus="this.placeholder=''" onblur="this.placeholder = 'State*'" value = "<?php echo $city?>" required class="common-input">
                                </div>
                                <div class="col-lg-12">
                                    <input name = "country" type="text" placeholder="Country*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Country*'" value = "<?php echo $state?>" required class="common-input">
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
                                    <input name="zip" type="text" placeholder="Postcode/ZIP" onfocus="this.placeholder=''" onblur="this.placeholder = 'Postcode/ZIP'" value = "<?php echo $zipcode?>" required class="common-input">
                                </div>
                                <button class="view-btn color-2 w-100 mt-20"><span>Save Address</span></button>
                            </div>
                            
                           
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- End Billing Details Form -->

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