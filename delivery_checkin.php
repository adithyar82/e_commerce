<?php
session_start();
include('connect_db.php');
if(!isset($_SESSION['uname'])){
    header("location:index.php");
}
$username = $_SESSION['uname'];
$sql1 = "SELECT COUNT(status) as ordered FROM order_status WHERE status != 'ordered';";
	$result1 = $conn->query($sql1);
	if($result1->num_rows>0){
		while($row = $result1->fetch_assoc()){
			$ordered = $row['ordered'];
		}
	}
$sql2 = "SELECT COUNT(status) as delivered FROM order_status WHERE status = 'delivered';";
$result2 = $conn->query($sql2);
if($result2->num_rows>0){
    while($row = $result2->fetch_assoc()){
        $delivered = $row['delivered'];
    }
}
$sql_1 = "SELECT COUNT(status) as ordered_1 FROM order_status WHERE status != 'ordered' and delivery_boy = '$username';";
	$result_1 = $conn->query($sql_1);
	if($result_1->num_rows>0){
		while($row = $result_1->fetch_assoc()){
			$ordered_1 = $row['ordered_1'];
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
            <script src="js/register.js"></script>
		</head>
		<body>

			<!-- Start Header Area -->
			<header class="default-header">
				<div class="menutop-wrap">
					<div class="menu-top container">
						<div class="d-flex justify-content-between align-items-center">
							<ul class="list">
								<li><a href="contact_us.php">+91 8095566699   |   contact.azeempatel@gmail.com</a></li>
															
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
                            <ul class="list">
                                <li><a href="faq.php">Help ?</a></li>
                            </ul>
						</div>
					</div>					
				</div>
				<nav class="navbar navbar-expand-lg  navbar-light">
					<div class="container">
						  <a class="navbar-brand" href="#">
							  <img style="margin-left:25%;"src="img/logo.png" alt="">
							  <p> Company Logo </p>
						  </a>
						  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						    <span class="navbar-toggler-icon"></span>
						  </button>
					</div>
				</nav>
			</header>
            <!-- End Header Area -->
            <!-- End Banner Area -->
		<!-- Start My Account -->
		<div class="container" style="margin-left:30%; margin-bottom:7%; margin-top:7%">
			<div class="row">
				<div class="col-lg-6">
					<div class="login-form" style="margin-bottom:-7%; margin-top-7%">
						<h3 class="billing-title text-center"><span  style="font-size:50px;" class="glyphicon glyphicon-user"></span></h3>
                        <h4 class="text-center mt-20 mb-40"><?php echo $username ?></h4>
						<p class="text-center mt-10 mb-40">Welcome back !</p>
                        <button onclick="location.href = 'delivery_details_1.php';" class="view-btn color-2 w-100 mt-10" ><span>Check In</span></button>
                        <h4 class="text-center mt-20 mb-40">Activities Finished</h4>
                        <p class="text-center mt-20 mb-40"><?php echo $delivered ?></p>
                        <h4 class="text-center mt-10 mb-40">Activities Pending</h4>
                        <p class="text-center mt-20 mb-40"><?php echo $ordered ?></p>
                        <h4 class="text-center mt-10 mb-40">My Activities Pending</h4>
                        <p class="text-center mt-20 mb-40"><?php echo $ordered_1 ?></p>
                        <h4 class="text-center mt-10 mb-40">Overall Rating</h4>
						<form method = "POST" action = "login_1.php">
                            <h5 class="text-center mt-10 mb-40">Overall Review</h5>
							<textarea type="text" name = "comment" cols="5" rows="2" placeholder="Comment*" onfocus="this.placeholder=" onblur="this.placeholder = Comment*" required class="common-input mt-10"></textarea>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- End My Account -->
		
            
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
                        <p class="footer-text m-0">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
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
