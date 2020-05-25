<?php
include('connect_db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bigdeal - Multi-purpopse E-commerce Html Template</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="big-deal">
    <meta name="keywords" content="big-deal">
    <meta name="author" content="big-deal">
    <link rel="icon" href="../assets/images/favicon/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon/favicon.ico" type="image/x-icon">

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">

    <!--icon css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/themify.css">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/slick-theme.css">


    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">


    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/color3.css" media="screen" id="color">
</head>
<body>

<!-- loader start -->
<div class="loader-wrapper">
    <div>
        <img src="../assets/images/loader.gif" alt="loader">
    </div>
</div>
<!-- loader end -->

<!--header start-->
<header>
    <div class="mobile-fix-option"></div>
    <div class="top-header">
        <div class="custom-container">
            <div class="row">
                <div class="col-xl-5 col-md-7 col-sm-6">
                    <div class="top-header-left">
                        <div class="shpping-order">
                            <!-- <h6>free shipping on order over $99 </h6> -->
                        </div>
                        <div class="app-link">
                            <h6>
                                <!-- Download aap -->
                            </h6>
                            <ul>
                                <!-- <li><a><i class="fa fa-apple" ></i></a></li>
                                <li><a><i class="fa fa-android" ></i></a></li>
                                <li><a><i class="fa fa-windows" ></i></a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-md-5 col-sm-6">
                    <div class="top-header-right">
                        <div class="top-menu-block">
                            <ul>
                                <!-- <li><a href="#">gift cards</a></li>
                                <li><a href="#">Notifications</a></li> -->
                                <li><a href="#">help & contact</a></li>
                                <!-- <li><a href="#">todays deal</a></li>
                                <li><a href="#">track order</a></li>
                                <li><a href="#">shipping </a></li>
                                <li><a href="#">easy returns</a></li> -->
                            </ul>
                        </div>
                        <div class="language-block">
                            <div class="language-dropdown">
                  <!-- <span  class="language-dropdown-click">
                    english <i class="fa fa-angle-down" aria-hidden="true"></i>
                  </span> -->
                                <!-- <ul class="language-dropdown-open">
                                    <li><a href="#">hindi</a></li>
                                    <li><a href="#">english</a></li>
                                    <li><a href="#">marathi</a></li>
                                    <li><a href="#">spanish</a></li>
                                </ul> -->
                            </div>
                            <div class="curroncy-dropdown">
                  <!-- <span class="curroncy-dropdown-click">
                    usd<i class="fa fa-angle-down" aria-hidden="true"></i>
                  </span> -->
                                <!-- <ul class="curroncy-dropdown-open">
                                    <li><a href="#"><i class="fa fa-inr"></i>inr</a></li>
                                    <li><a href="#"><i class="fa fa-usd"></i>usd</a></li>
                                    <li><a href="#"><i class="fa fa-eur"></i>eur</a></li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="layout-header2">
        <div class="container">
            <div class="col-md-12">
                <div class="main-menu-block">
                    <div class="sm-nav-block">
                        <span class="sm-nav-btn"><i class="fa fa-bars"></i></span>
                        <!-- <ul class="nav-slide">
                            <li>
                                <div class="nav-sm-back">
                                    back <i class="fa fa-angle-right pl-2"></i>
                                </div>
                            </li>
                            <li><a href="#">western ware</a></li>
                            <li><a href="#">TV, Appliances</a></li>
                            <li><a href="#">Pets Products</a></li>
                            <li><a href="#">Car, Motorbike</a></li>
                            <li><a href="#">Industrial Products</a></li>
                            <li><a href="#">Beauty, Health Products</a></li>
                            <li><a href="#">Grocery Products </a></li>
                            <li><a href="#">Sports</a></li>
                            <li><a href="#">Bags, Luggage</a></li>
                            <li><a href="#">Movies, Music </a></li>
                            <li><a href="#">Video Games</a></li>
                            <li><a href="#">Toys, Baby Products</a></li>
                            <li class="mor-slide-open">
                                <ul>
                                    <li><a href="#">Bags, Luggage</a></li>
                                    <li><a href="#">Movies, Music </a></li>
                                    <li><a href="#">Video Games</a></li>
                                    <li><a href="#">Toys, Baby Products</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="mor-slide-click">
                                    mor category
                                    <i class="fa fa-angle-down pro-down" ></i>
                                    <i class="fa fa-angle-up pro-up" ></i>
                                </a>
                            </li>
                        </ul> -->
                    </div>
                    <div class="logo-block">
                        <a href="index.html"><img src="../assets/images/layout-2/logo/logo.png" class="img-fluid  " alt="logo"></a>
                    </div>
                    
                    <div class="cart-block cart-hover-div " onclick="openCart()">
                        <div class="cart ">
                            <!-- <span class="cart-product">0</span> -->
                            <!-- <ul>
                                <li class="mobile-cart  ">
                                    <a href="#">
                                        <i class="icon-shopping-cart "></i>
                                    </a>
                                </li>
                            </ul> -->
                        </div>
                        <div class="cart-item">
                            <!-- <h5>shopping</h5>
                            <h5>cart</h5> -->
                        </div>
                    </div>
                    <div class="menu-nav">
              <span class="toggle-nav">
                <i class="fa fa-bars "></i>
              </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</header>
<!--header end-->

<!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2 style="color:#0A99F3"><strong>register</strong></h2>
                        <ul>
                            <!-- <li><a href="#">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="#">register</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!--section start-->
<section class="login-page section-big-py-space bg-light">
    <div class="custom-container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4">
                <div class="theme-card">
                    <h3 class="text-center">Create account</h3>
                    <form method = "POST" action = "registration.php">
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <label for="email">First Name</label>
                                <input type="text" name = "fname" class="form-control" id="fname" placeholder="First Name" required="">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="review">Last Name</label>
                                <input type="text" name = "lname" class="form-control" id="lname" placeholder="Last Name" required="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <label for="email">Email</label>
                                <input type="email" name = "email_address" class="form-control" id="email" placeholder="Email" required="">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" name = "phone_number" class="form-control" id="email" placeholder="Phone Number" required="">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="review">Password</label>
                                <input type="password" name = "pwd" pattern="(?=.*[a-z])(?=.*[A-Z]).{6,}" name = "password" class="form-control" id="review" placeholder="Enter your password" required="">
                            </div>
                            <div class="col-md-12 form-group"><input type = "submit" name = "submit" class="view-btn color-2 w-100 mt-20"><span>Submit</span></a></div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 ">
                                <p >Have you already account? <a href="login.php" class="txt-default">click</a> here to &nbsp;<a href="login.php" class="txt-default">Login</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Section ends-->


<!--footer start-->
<footer class="footer-2">
    <div class="container ">
        <div class="row">
            <div class="col-12">
                <div class="footer-main-contian">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 pr-lg-0">
                            <div class="footer-left">
                                <div class="footer-logo">
                                    <img src="../assets/images/layout-2/logo/logo.png" class="img-fluid  " alt="logo">
                                </div>
                                <div class="footer-detail">
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,</p>
                                    <ul class="paymant-bottom">
                                        <li><a href="#"><img src="../assets/images/layout-1/pay/1.png" class="img-fluid" alt="pay"></a></li>
                                        <li><a href="#"><img src="../assets/images/layout-1/pay/2.png" class="img-fluid" alt="pay"></a></li>
                                        <li><a href="#"><img src="../assets/images/layout-1/pay/3.png" class="img-fluid" alt="pay"></a></li>
                                        <li><a href="#"><img src="../assets/images/layout-1/pay/4.png" class="img-fluid" alt="pay"></a></li>
                                        <li><a href="#"><img src="../assets/images/layout-1/pay/5.png" class="img-fluid" alt="pay"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 p-l-md-0">
                            <div class="footer-right">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="subscribe-section">
                                            <div class="row">
                                                <div class="col-md-5 pr-lg-0">
                                                    <div class="subscribe-block">
                                                        <div class="subscrib-contant ">
                                                            <h4>subscribe to newsletter</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-7 p-l-md-0">
                                                    <div class="subscribe-block">
                                                        <div class="subscrib-contant">
                                                            <div class="input-group" >
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" ><i class="fa fa-envelope-o" ></i></span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="your email" >
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text telly" ><i class="fa fa-telegram" ></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class=account-right>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="footer-box">
                                                        <div class="footer-title">
                                                            <h5>my account</h5>
                                                        </div>
                                                        <div class="footer-contant">
                                                            <ul>
                                                                <li><a href="#">about us</a></li>
                                                                <li><a href="#">contact us</a></li>
                                                                <li><a href="#">terms & conditions</a></li>
                                                                <li><a href="#">returns & exchanges</a></li>
                                                                <li><a href="#">shipping & delivery</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="footer-box">
                                                        <div class="footer-title">
                                                            <h5>quick link</h5>
                                                        </div>
                                                        <div class="footer-contant">
                                                            <ul>
                                                                <li><a href="#">store location</a></li>
                                                                <li><a href="#"> my account</a></li>
                                                                <li><a href="#"> orders tracking</a></li>
                                                                <li><a href="#"> size guide</a></li>
                                                                <li><a href="#">FAQ </a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="footer-box footer-contact-box">
                                                        <div class="footer-title">
                                                            <h5>contact us</h5>
                                                        </div>
                                                        <div class="footer-contant">
                                                            <ul class="contact-list">
                                                                <li><i class="fa fa-map-marker"></i><span>big deal store demo store <br> <span> india-3654123</span></span></li>
                                                                <li><i class="fa fa-phone"></i><span>call us: 123-456-7898</span></li>
                                                                <li><i class="fa fa-envelope-o"></i><span>email us: support@bigdeal.com</span></li>
                                                                <li><i class="fa fa-fax"></i><span>fax 123456</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="app-link-block  bg-transparent">
        <div class="container">
            <div class="row">
                <div class="app-link-bloc-contain app-link-bloc-contain-1">
                    <div class="app-item-group">
                        <div class="app-item">
                            <img src="../assets/images/layout-1/app/1.png" class="img-fluid" alt="app-banner">
                        </div>
                        <div class="app-item">
                            <img src="../assets/images/layout-1/app/2.png" class="img-fluid" alt="app-banner">
                        </div>
                    </div>
                    <div class="app-item-group ">
                        <div class="sosiyal-block" >
                            <h6>follow us</h6>
                            <ul class="sosiyal">
                                <li><a href="#"><i class="fa fa-facebook" ></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" ></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" ></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" ></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" ></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sub-footer-contain">
                        <p><span>2018 - 19 </span>copy right by themeforest powered by pixel strap</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer end-->

<!-- tap to top -->
<div class="tap-top">
    <div>
        <i class="fa fa-angle-double-up"></i>
    </div>
</div>
<!-- tap to top End -->

<!-- Add to cart bar -->
<div id="cart_side" class=" add_to_cart right">
    <a href="javascript:void(0)" class="overlay" onclick="closeCart()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>my cart</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeCart()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="cart_media">
            <ul class="cart_product">
                <li>
                    <div class="media">
                        <a href="#">
                            <img alt="" class="mr-3" src="../assets/images/layout-4/product/1.jpg">
                        </a>
                        <div class="media-body">
                            <a href="#">
                                <h4>item name</h4>
                            </a>
                            <h4>
                                <span>1 x $ 299.00</span>
                            </h4>
                        </div>
                    </div>
                    <div class="close-circle">
                        <a href="#">
                            <i class="ti-trash" aria-hidden="true"></i>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="media">
                        <a href="#">
                            <img alt="" class="mr-3" src="../assets/images/layout-4/product/2.jpg">
                        </a>
                        <div class="media-body">
                            <a href="#">
                                <h4>item name</h4>
                            </a>
                            <h4>
                                <span>1 x $ 299.00</span>
                            </h4>
                        </div>
                    </div>
                    <div class="close-circle">
                        <a href="#">
                            <i class="ti-trash" aria-hidden="true"></i>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="media">
                        <a href="#"><img alt="" class="mr-3" src="../assets/images/layout-4/product/3.jpg"></a>
                        <div class="media-body">
                            <a href="#">
                                <h4>item name</h4>
                            </a>
                            <h4><span>1 x $ 299.00</span></h4>
                        </div>
                    </div>
                    <div class="close-circle">
                        <a href="#">
                            <i class="ti-trash" aria-hidden="true"></i>
                        </a>
                    </div>
                </li>
            </ul>
            <ul class="cart_total">
                <li>
                    <div class="total">
                        <h5>subtotal : <span>$299.00</span></h5>
                    </div>
                </li>
                <li>
                    <div class="buttons">
                        <a href="cart.html" class="btn btn-normal btn-xs view-cart">view cart</a>
                        <a href="#" class="btn btn-normal btn-xs checkout">checkout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Add to cart bar end-->

<!-- My account bar start-->
<div id="myAccount" class="add_to_cart right account-bar">
    <a href="javascript:void(0)" class="overlay" onclick="closeAccount()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>my account</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeAccount()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <form class="theme-form">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" placeholder="Email" required="">
            </div>
            <div class="form-group">
                <label for="review">Password</label>
                <input type="password" class="form-control" id="review" placeholder="Enter your password" required="">
            </div>
            <div class="form-group">
                <a href="#" class="btn btn-rounded btn-block ">Login</a>
            </div>
            <div>
                <h5 class="forget-class"><a href="forget-pwd.html" class="d-block">forget password?</a></h5>
                <h6 class="forget-class"><a href="register.html" class="d-block">new to store? Signup now</a></h6>
            </div>
        </form>
    </div>
</div>
<!-- Add to account bar end-->

<!-- Add to wishlist bar -->
<div id="wishlist_side" class="add_to_cart right">
    <a href="javascript:void(0)" class="overlay" onclick="closeWishlist()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>my wishlist</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeWishlist()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="cart_media">
            <ul class="cart_product">
                <li>
                    <div class="media">
                        <a href="#">
                            <img alt="" class="mr-3" src="../assets/images/layout-1/media-banner/1.jpg">
                        </a>
                        <div class="media-body">
                            <a href="#">
                                <h4>item name</h4>
                            </a>
                            <h4>
                                <span>sm</span>
                                <span>, blue</span>
                            </h4>
                            <h4>
                                <span>$ 299.00</span>
                            </h4>
                        </div>
                    </div>
                    <div class="close-circle">
                        <a href="#">
                            <i class="ti-trash" aria-hidden="true"></i>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="media">
                        <a href="#">
                            <img alt="" class="mr-3" src="../assets/images/layout-1/media-banner/2.jpg">
                        </a>
                        <div class="media-body">
                            <a href="#">
                                <h4>item name</h4>
                            </a>
                            <h4>
                                <span>sm</span>
                                <span>, blue</span>
                            </h4>
                            <h4>
                                <span>$ 299.00</span>
                            </h4>
                        </div>
                    </div>
                    <div class="close-circle">
                        <a href="#">
                            <i class="ti-trash" aria-hidden="true"></i>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="media">
                        <a href="#"><img alt="" class="mr-3" src="../assets/images/layout-1/media-banner/3.jpg"></a>
                        <div class="media-body">
                            <a href="#"><h4>item name</h4></a>
                            <h4>
                                <span>sm</span>
                                <span>, blue</span>
                            </h4>
                            <h4><span>$ 299.00</span></h4>
                        </div>
                    </div>
                    <div class="close-circle">
                        <a href="#">
                            <i class="ti-trash" aria-hidden="true"></i>
                        </a>
                    </div>
                </li>
            </ul>
            <ul class="cart_total">
                <li>
                    <div class="total">
                        <h5>subtotal : <span>$299.00</span></h5>
                    </div>
                </li>
                <li>
                    <div class="buttons">
                        <a href="wishlist.html" class="btn btn-normal btn-block  view-cart">view wislist</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Add to wishlist bar end-->

<!-- add to  setting bar  start-->
<div id="mySetting" class="add_to_cart right">
    <a href="javascript:void(0)" class="overlay" onclick="closeSetting()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>my setting</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeSetting()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="setting-block">
            <div >
                <h5>language</h5>
                <ul>
                    <li><a href="#">english</a></li>
                    <li><a href="#">french</a></li>
                </ul>
                <h5>currency</h5>
                <ul>
                    <li><a href="#">uro</a></li>
                    <li><a href="#">rupees</a></li>
                    <li><a href="#">pound</a></li>
                    <li><a href="#">doller</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Add to setting bar end-->

<!-- latest jquery-->
<script src="../assets/js/jquery-3.3.1.min.js" ></script>

<!-- menu js-->
<script src="../assets/js/menu.js"></script>

<!-- popper js-->
<script src="../assets/js/popper.min.js" ></script>

<!-- slick js-->
<script  src="../assets/js/slick.js"></script>

<!-- Bootstrap js-->
<script src="../assets/js/bootstrap.js" ></script>

<!-- Theme js-->
<script src="../assets/js/script.js" ></script>

</body>
</html>
