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
            <nav class="navbar navbar-expand-lg  navbar-light d-flex justify-content-center">
                <div class="container" style="width:1500px;">
                    <a class="navbar-brand" style="margin-left:20px;" href="category.php">
                        <img style="margin-left:25px;" src="img/logo.png" alt="">
                        <p> Company Logo </p>
                    </a>		
                </div>
            </nav>
        </header>
        <!-- End Header Area -->
                
        <!-- Start Banner Area -->
        <section class="banner-area organic-breadcrumb">
            <div class="container">
                <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                    <div class="col-md-12">
                        <h1>Shop Inventory</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Banner Area -->

        <section class="brand-area pb-100">
        <div class="menutop-wrap d-flex justify-content-center">
        <div class="col-md-8">
            <div class="menu-top container">
                <div class="d-flex justify-content-center">
                    <ul class="list">
                        <li><img src="img/online-shopping.png" alt=""></li>
                        <li><h3>Shop Details</h3></li>
                        <li>
                <form method = "POST" action = "">
                            <button type="submit" name="submit" form="upload"><img src="img/upload.png" alt=""></button>   
                        </li>
                    </ul>
                </div>
                    <input name = "shop_name" type="text" placeholder="Shop Name*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Shop Name*'" required class="common-input">
                    <input name = "address_1" type="text" placeholder="Address line 01*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Address line 01*'" required class="common-input">
                    <input name = "address_2" type="text" placeholder="Address line 02*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Address line 02*'" required class="common-input">
                    <input name = "city" type="text" placeholder="Town/City*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Town/City*'" required class="common-input">
                    <input name = "state" type="text" placeholder="State*" onfocus="this.placeholder=''" onblur="this.placeholder = 'State*'" required class="common-input">
                    <input name = "country" type="text" placeholder="Country*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Country*'" required class="common-input">
                    <input name = "zipcode" type="text" placeholder="Pin-Code*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Pin-Code*'" required class="common-input">
                    <input name = "contact_name" type="text" placeholder="Contact Person Name*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Contact Person Name*'" required class="common-input">
                    <input type="email" name = "email_address" placeholder="Email Address*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Email Address'" required class="common-input mt-20">
                    <input type="tel" pattern="[0-9]{10}" title="Must contain 10 digit number" name = "phone_number" placeholder="Phone number*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Phone number*'" required class="common-input mt-20">
                </form>
                <div class="menu-top container">
                    <div class="d-flex justify-content-center">
                        <ul class="list">
                            <li><h3>Shop Code &emsp;:</h3></li>&emsp;&emsp;&emsp;&emsp;
                            <li><a><img src="img/barcode.png" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </section>

        <!-- start footer Area -->
        <section>		
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
        </section>	
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