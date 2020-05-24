<?php
include('connect_db.php');
$product_code = uniqid();
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

            <!-- <script>
                function myFunction() {
                var x = document.getElementById("myDIV");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
                }
            </script> -->

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

                    <div class="collapse navbar-collapse" style = "margin-left:83%;" id="navbarSupportedContent">
                        <ul class="navbar-nav" style="width:1500px;">
                            <li><a href="category.php ">Home</a></li>					
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
                    <div class="col-md-12">
                        <h1>Product Inventory</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Banner Area -->
        
        <section class="brand-area pb-100">
        <div class="menutop-wrap d-flex justify-content-center">
            <div class="menu-top container">
                <div class="d-flex justify-content-center">
                    <ul class="list">
                        <li><h3>Product Details</h3></li>&emsp;&emsp;&emsp;&emsp;
                        <li><a><img src="img/camera.png" alt=""></a></li>
                        <li>
                        <form method = "POST" action = "inventory_1.php" id = "upload">
                                <button type="submit" name="submit" form="upload"><img src="img/upload.png" alt=""></button>
                            
                        </li>
                    </ul>
                </div>

                    <div class="d-flex justify-content-center">
                   
                    </div>
                
                    <input id = "product_name" type="text" name = "product_name" placeholder="Product Name*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Product Name*'" required class="common-input mt-20">
                    <input type="text" name = "description" placeholder="Description*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Description*'" required class="common-input mt-20"></textarea><br>
                    <section>
                    
                        <div id="myDIV">
                            <br>
                            <h5>Width:<input id = "width" type="number" name = "width" placeholder="Width*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Width*'" class="common-input mt-20"></h5><br>
                            <h5>Depth:<input id = "depth" type="number" name = "depth" placeholder="Depth*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Depth*'" class="common-input mt-20"></h5><br>
                            <h5>Weight:<input id = "weight" type="number" name = "weight" placeholder="Weight*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Weight*'" class="common-input mt-20"></h5><br>
                            <h5>Height:<input id = "quantity" type="number" name = "height" placeholder="Height*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Height*'" class="common-input mt-20"></h5><br>
                            <h5>Colour:<input id = "colour" type="text" name = "colour" placeholder="Weight*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Colour*'" class="common-input mt-20"></h5><br>
                            <h5>Size:<input id = "size" type="number" name = "size" placeholder="Size*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Size*'" class="common-input mt-20"></h5><br>
                            <h5>Expiry Date:<input id = "date" type="date" name = "date" placeholder="Date*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Date*'" class="common-input mt-20"></h5><br>
                        </div>
                    </section>
                    
                    <div class="mt-20 d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <input type="checkbox" name = "test" class="pixel-checkbox" id="login-1"><label for="login-1">Apply Default Tax Amount</label></div>
                    </div>
                    <input id = "tax" type="text" name = "tax" placeholder="Tax*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Tax*'" class="common-input mt-20"></h5><br>
                    <input id = "quantity" type="text" name = "quantity" placeholder="Quantity*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Quantity*'" class="common-input mt-20"></h5><br>
                    <input id = "purchase_price" type="text" name = "initial_cost" placeholder="Purchase Size*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Purchase Price*'" class="common-input mt-20"></h5><br>
                    <input id = "selling_price" type="text" name = "final_cost" placeholder="Selling Price*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Selling Price'" required class="common-input mt-20"><br>
                    <h5>Product Code:  <?php echo $product_code?></h5>
                    <input id = "product_code" type="text" name = "product_code" placeholder="Selling Price*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Selling Price'" value = "<?php echo $product_code?>" hidden class="common-input mt-20">
                    
                </form>
            </div>
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
                    <label for="cars">Choose a car:</label>

				
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