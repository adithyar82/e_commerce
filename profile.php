    <?php
    include('connect_db.php');
    session_start();
    // $username = $_SESSION['username'];
    $username = "abc";
    $sql = "SELECT * FROM Users where fname = '$username';";
    $result = $conn->query($sql);
    if($result->num_rows>=0){
        while($row = $result->fetch_assoc()){
            $fname = $row['fname'];
            $username = $row['username'];
            $phone_number = $row['phone_number'];
            $email_address = $row['email_address'];
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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
								<li><a href="#" style="margin-right:20px">Welcome '.$uname.' </a></li>
							</ul>';
							}
							
							?>
                            <ul class="list">
								<li><span class="glyphicon glyphicon-log-out" style="float:right; margin-right:5px; font-size:20px"> &nbsp; &nbsp;</span><a href="logout.php" style = "margin-rigth:15px;">Logout</a></li>
							</ul>
                        </div>
                    </div>                  
                </div>
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container">
                          <a class="navbar-brand" href="category.php">
                            <img style="margin-left:25px;" src="img/logo.png" alt="">
                            <p> Company Logo </p>
                          </a>
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>
                          <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li><a href="category.php">Home</a></li>
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
                            <h1>Profile Page</h1>
                             <nav class="d-flex align-items-center justify-content-start">
                                <a href="category.php">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="profile.php">Profile Page</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Banner Area -->
            

		    <!-- Start My Account -->
            <section>
                <div class="container" style="margin-left:22%; margin-bottom:7%; margin-top:7%">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="register-form">
                                <h3 class="billing-title text-center"><span style="font-size:75px;" class="glyphicon glyphicon-user"></span></h3>
                                <p class="text-center mt-40 mb-30"><?php echo $fname; ?></p>
                                <form>
                                    <h4 style="color:white;">Phone Number</h4><br>
                                    <br>
                                    <h4 style="color:white;">Email Address</h4><br>
                                    <br>
                                    <h4 style="color:white;">Saved Address</h4><br>
                                    <br>
                                    <h4><a style="color:white;" href = "edit_address.php">Edit Address</a></h4><br>
                                    <br>
                                    <h4><a style="color:white;" href = "favourite.php">Favourites</a></h4><br>
                                    <br>
                                    <h4><a style="color:white;" href="order.php">View Orders</a></h4><br>
                                    <br>
                                    <button href="update_profile.php" class="view-btn color-2 w-100 mt-20"><span>Update Profile</span></button><br>
                                    <br>
                                    <br>
                                    <h4><a style="color:white; float:right; margin-right:5%" href = "contact_us.php" >Help ?</a></h4><br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

		    <!-- End My Account -->


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
                            <p class="footer-text m-0">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved </p>
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
