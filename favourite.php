<?php
    session_start();
    include('connect_db.php');
    $username = $_SESSION['username'];
    // $id1 = $_REQUEST['id1'];
    // $id2 = $_REQUEST['id2'];
    // $id3 = $_REQUEST['id3'];
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
                                <li><a href="tel:+12312-3-1209">+12312-3-1209</a></li>
                                <li><a href="mailto:support@colorlib.com">support@colorlib.com</a></li>                             
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
                                <li><a href="#home">Home</a></li>
                                <li><a href="#catagory">Category</a></li>
                                <li><a href="#men">Men</a></li>
                                <li><a href="#women">Women</a></li>
                                <li><a href="#latest">latest</a></li>
                                    <!-- Dropdown -->
                                    <li class="dropdown">
                                      <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                        Pages
                                      </a>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="category.php">Category</a>
                                        <a class="dropdown-item" href="single.php">Single</a>
                                        <a class="dropdown-item" href="cart.php">Cart</a>
                                        <a class="dropdown-item" href="checkout.php">Checkout</a>
                                        <a class="dropdown-item" href="confermation.php">Confermation</a>
                                        <a class="dropdown-item" href="login.php">Login</a>
                                        <a class="dropdown-item" href="tracking.php">Tracking</a>
                                        <a class="dropdown-item" href="generic.php">Generic</a>
                                        <a class="dropdown-item" href="elements.php">Elements</a>
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
                            <h1>Shopping Cart</h1>
                             <nav class="d-flex align-items-center justify-content-start">
                                <a href="category.php">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="cart.php">Your Favourites</a>
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
                            <h6>Quantity</h6>
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
                $sql = "SELECT * FROM favourites WHERE username = '$username';";
                $result=$conn->query($sql);
                $sql1 = "SELECT SUM(item_price) as total_cost FROM favourites WHERE username ='$username';";
                $result1 = $conn->query($sql1);
                // 
                if($result->num_rows>0){
                    while($row = $result->fetch_assoc()){
                        $item_name = $row['item_name'];
                        $item_price = $row['item_price']; 
                        $item_id = $row['id'];
                         echo'
                            <div class="cart-single-item">
                            <div class="row align-items-center">
                                <div class="col-md-6 col-12">
                                    <div class="product-item d-flex align-items-center">
                                        <h6>'.$item_name.'</h6>
                                    </div>
                                </div>
                                <div class="col-md-2 col-6">
                                    <div class="price">'.$item_price.'</div>
                                </div>
                                <div class="col-md-2 col-6">
                                <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                1
                              </a>
                        <div class="dropdown-menu">
                                <a class="dropdown-item" href="category_1.php">1</a>
                                <a class="dropdown-item" href="category_2.php">2</a>
                                <a class="dropdown-item" href="category_1.php">3</a>
                                <a class="dropdown-item" href="category_2.php">4</a>
                                <a class="dropdown-item" href="category_1.php">5</a>
                                <a class="dropdown-item" href="category_2.php">6</a>
                                <!-- <a class="dropdown-item" href="cart.php">Cart</a> -->
                                <!-- <a class="dropdown-item" href="checkout.php">Checkout</a>
                                <a class="dropdown-item" href="confermation.php">Confirmation</a>
                                <a class="dropdown-item" href="login.php">Login</a>
                                <a class="dropdown-item" href="tracking.php">Tracking</a> -->
                                <!-- <a class="dropdown-item" href="generic.php">Generic</a>
                                <a class="dropdown-item" href="elements.php">Elements</a> -->
                        </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="total">'.$item_price.'</div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <span class="glyphicon glyphicon-remove"> </span>
                                    <div class="total"><a href = "cart_2.php?id1='.$item_id.'">Delete Item</a></div>
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
                ?>
                
                
                <!-- <div class="cart-single-item">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-12">
                            <div class="product-item d-flex align-items-center">
                                <img src="img/ci2.jpg" class="img-fluid" alt="">
                                <h6>Pixelstore fresh Blackberry</h6>
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="price">$360.00</div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="quantity-container d-flex align-items-center mt-15">
                                <input type="text" class="quantity-amount" value="1" />
                                <div class="arrow-btn d-inline-flex flex-column">
                                    <button class="increase arrow" type="button" title="Increase Quantity"><span class="lnr lnr-chevron-up"></span></button>
                                    <button class="decrease arrow" type="button" title="Decrease Quantity"><span class="lnr lnr-chevron-down"></span></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="total">$720.00</div>
                        </div>
                    </div>
                </div>
                <div class="cart-single-item">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-12">
                            <div class="product-item d-flex align-items-center">
                                <img src="img/ci3.jpg" class="img-fluid" alt="">
                                <h6>Pixelstore fresh Blackberry</h6>
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="price">$360.00</div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="quantity-container d-flex align-items-center mt-15">
                                <input type="text" class="quantity-amount" value="1" />
                                <div class="arrow-btn d-inline-flex flex-column">
                                    <button class="increase arrow" type="button" title="Increase Quantity"><span class="lnr lnr-chevron-up"></span></button>
                                    <button class="decrease arrow" type="button" title="Decrease Quantity"><span class="lnr lnr-chevron-down"></span></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="total">$720.00</div>
                        </div>
                    </div>
                </div> -->
                <div class="cupon-area d-flex align-items-center justify-content-between flex-wrap">
                    <a href="category.php" class="view-btn color-2"><span>Update Cart</span></a>
                    <div class="cuppon-wrap d-flex align-items-center flex-wrap">
                        <div class="cupon-code">
                            <input type="text">
                            <button class="view-btn color-2"><span>Apply</span></button>
                        </div>
                        <a href="#" class="view-btn color-2 have-btn"><span>Have a Coupon?</span></a>
                    </div>
                </div>
                <div class="subtotal-area d-flex align-items-center justify-content-end">
                    <div class="title text-uppercase">Subtotal</div>
                    <div class="subtotal"><?php echo $total_cost ?></div>
                </div>
                <div class="shipping-area d-flex justify-content-end">
                    <div class="tile text-uppercase">Shipping</div>
                    <form action="#" class="d-inline-flex flex-column align-items-end">
                        <ul class="d-flex flex-column align-items-end">
                            <li class="filter-list">
                                <label for="flat-rate">Flat Rate:<span>Rs 50.00</span></label>
                                <input class="pixel-radio" type="radio" id="flat-rate" name="brand">
                            </li>
                            <li class="filter-list">
                                <label for="free-shipping">Free Shipping</label>
                                <input class="pixel-radio" type="radio" id="free-shipping" name="brand">
                            </li>
                            <li class="filter-list">
                                <label for="flat-rate-2">Flat Rate:<span>Rs 50.00</span></label>
                                <input class="pixel-radio" type="radio" id="flat-rate-2" name="brand">
                            </li>
                            <li class="filter-list">
                                <label for="local-delivery">Local Delivery:<span>Rs 50.00</span></label>
                                <input class="pixel-radio" type="radio" id="local-delivery" name="brand">
                            </li>
                            <li class="calculate">Calculate Shipping</li>
                        </ul>
                        <div class="sorting">
                            <select>
                                <option value="1">Bangladesh</option>
                                <option value="1">India</option>
                                <option value="1">Srilanka</option>
                            </select>
                        </div>
                        <div class="sorting mt-20">
                            <select>
                                <option value="1">Select a State</option>
                                <option value="1">Select a State</option>
                                <option value="1">Select a State</option>
                            </select>
                        </div>
                        <input type="text" placeholder="Postcode/Zipcode" onfocus="this.placeholder=''" onblur="this.placeholder = 'Postcode/Zipcode'" required class="common-input mt-10">
                        <button class="view-btn color-2 mt-10"><span>Update Details</span></button>
                    </form>

                </div>
                <div>
                    <button class="view-btn color-2 w-100 mt-20"><span>Proceed to Checkout</span></button>
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