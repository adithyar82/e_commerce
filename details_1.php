<?php
	session_start();
	if(!isset($_SESSION['uname'])){
		header("location:index.php");
	}
	$uname = $_SESSION['uname'];
	$product_name = $_REQUEST['id'];
	echo $_SESSION['username'];
	include('connect_db.php');
	$registration_status = $_REQUEST['id1'];
	$encrypted = $_REQUEST['id2'];
	function my_simple_crypt( $string, $action = 'd') {
    // you may change these values to your own
    $secret_key = 'my_simple_secret_key';
    $secret_iv = 'my_simple_secret_iv';
  
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
  
    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }
  
    return $output;
  }
	$email_address = my_simple_crypt($encrypted, 'd' );
	echo $email_address;
	$sql = "UPDATE Users SET registration_status = '$registration_status' WHERE email_address = '$email_address';";
	$result = $conn->query($sql)
?>
<!DOCTYPE html>
    <html lang="zxx" class="no-js">
    <head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<script>
		$('#rating-form').on('change','[name="rating"]',function(){
		$('#selected-rating').text($('[name="rating"]:checked').val());
	});
	</script>

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
			<link rel="stylesheet" href="css/styles.css">
			<script>
				$('#row').pagination({
				dataSource: [1, 2, 3, 4, 5, 6, 7, ... , 40],
				pageSize: 5,
				showGoInput: true,
				showGoButton: true,
				callback: function(data, pagination) {
					// template method of yourself
					var html = template(data);
					dataContainer.html(html);
				}
			})
			</script>
			<script type="text/javascript">
				function Copy() 
				{
					alert("Link has been copied to the clipboard")
					var Url = document.getElementById("paste-box");
					Url.value = window.location.href;
					Url.focus();
					Url.select();  
					document.execCommand("Copy");
				}
			</script>
			<script>
				function myFunction() {
					var x = document.getElementById("myDIV");
					if (x.style.display === "none") {
						x.style.display = "block";
					} else {
						x.style.display = "none";
					}
				}
			</script>
		</head>
        <script>
		$('#rating-form').on('change','[name="rating"]',function(){
		$('#selected-rating').text($('[name="rating"]:checked').val());
        });
        </script>
        <body>

            <!-- Start Header Area -->
            <header class="default-header">
                <div class="menutop-wrap">
                    <div class="menu-top container">
					<div class="d-flex justify-content-between align-items-center">
                            <ul class="list">
                                <li><a href="contact_us.php">+91 8095566699   |   contact.azeempatel@gmail.com.com</a></li>                             
                            </ul>
                            <ul class="list">
								<li><a href="logout.php" style = "margin-rigth:15px;">Logout</a></li>
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
                                <li><a href="category.php">Home</a></li>
                                <!-- <li><a href="delivery_status_1.php">My Orders</a></li> -->
                                <!-- <li><a href="#men">Men<a/a></li>
                                <li><a href="#women">Women</a></li>
                                <li><a href="#latest">latest</a></li> -->
                                    <!-- Dropdown -->
                                    <!-- <li clas os="dropdown">
                                      <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                        Pages
                                      </a>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="category.html">Category</a>
                                        <a class="dropdown-item" href="single.html">Single</a>
                                        <a class="dropdown-item" href="cart.html">Cart</a>
                                        <a class="dropdown-item" href="checkout.html">Checkout</a>
                                        <a class="dropdown-item" href="confermation.html">Confermation</a>
                                        <a class="dropdown-item" href="login.html">Login</a>
                                        <a class="dropdown-item" href="tracking.html">Tracking</a>
                                        <a class="dropdown-item" href="generic.html">Generic</a>
                                        <a class="dropdown-item" href="elements.html">Elements</a>
                                      </div>
                                    </li>                                    -->
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
                            <h1>Single Product Page</h1>
                             <nav class="d-flex align-items-center justify-content-start">
                                <a href="index.html">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="single.html">Single Product Page</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Banner Area -->

            <!-- Start Product Details -->
            <div class="container">
                <div class="product-quick-view">
                    <div class="row align-items-center">
                    <?php 
										include('connect_db.php');
										//   session_start();
										$sql = "SELECT * FROM products WHERE product_name = '$product_name';";
										$result = $conn->query($sql);
										$sql_3 = "SELECT * FROM shops;";
										$result_3 = $conn->query($sql_3);
										if($result_3->num_rows>0){
											while($row=$result_3->fetch_assoc()){
												$address_12 = $row['address_1'];
												$city_12 = $row['city'];
												$state_12 = $row['state'];
												$zipcode_12 = $row['zipcode'];
												$country_12 = $row['country'];
											}
                                        }
                                        $sql_2 = "SELECT AVG(ratings) as average_ratings FROM product_ratings WHERE product_name = '$product_name';";
										$result_2 = $conn->query($sql_2);
										if($result_2->num_rows>0){
											while($row = $result_2->fetch_assoc()){
												$average_ratings = $row['average_ratings'];
											}
										}

                                        $sql3 = "SELECT COUNT(ratings) as total_ratings FROM product_ratings WHERE product_name = '$product_name';";
										$result3 = $conn->query($sql3);
										if($result3->num_rows>0){
											while($row = $result3->fetch_assoc()){
												$total_ratings = $row['total_ratings'];
											}
										}
										$sql_2 = "SELECT COUNT(reviews) as total_reviews FROM product_reviews WHERE product_name = '$product_name';";
										$result_2 = $conn->query($sql_2);
										if($result_2->num_rows>0){
											while($row = $result_2->fetch_assoc()){
												$total_reviews = $row['total_reviews'];
											}
										}
										
										$shop_address = $address_12.' '.$city_12.' '.$state_12.' '.$zipcode_12.' '.$country_12;
										if($result->num_rows>0){
											while($row = $result->fetch_assoc()){
												
												$product_id = $row['product_id'];
												$product_name = $row['product_name'];
												$initial_cost = $row['initial_cost'];
												$final_cost = $row['final_cost'];
												$product_image = $row['product_image'];
												$product_quantity = $row['product_quantity'];
												$category = $row['category'];
                                                $discount=round((($initial_cost-$final_cost)/($initial_cost))*100);
                                                $discount_price = $initial_cost - $final_cost;
                    
                        echo' 
                        <div class="col-lg-6">
						<img class="content-image" src="'.$product_image.'" alt="">
                        </div>
                            
                        
                        <div class="col-lg-6">
                            <div class="quick-view-content">
                                <div class="top">
                                    <h3 class="head">'.$product_name.'</h3>

                                    <div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span><h5 style="margin-top:2%; margin-left:2%;" class="text-white"><del style = "color : black">'.$initial_cost.'</del>&emsp;</h5> <span class="ml-10">Rs '.$final_cost.'</span></div>
                                    <h4 style="margin-bottom:3%;margin-top:2%">Discount :&emsp; Rs.	'.$discount_price.' &nbsp; '.$discount.'% off</h4>
                                    <h6 style="margin-left:15%;"> (Inclusive of all taxes)</h6><br>
                                    <div class="category">Category: <span>'.$category.'</span></div>';
                                    if($product_quantity>0){
                                        echo'<div class="available">Availibility: <span style="color:green">In Stock</span></div>';
                                    }
                                    else{
                                    echo '<div class="available">Availibility: <span style="color:red">Out of Stock</span></div>';
                                    }
                                echo'
                                </div>
                                
                                <div class="available">Delivery Within: <span>2 hrs</span></div>
                                <div class="available">Cash on Delivery Not Available<span></span></div>
                                    <div class="d-flex mt-20">
                                        <a href="cart_1.php?id1='.$final_cost.'&id2='.$product_id.'&id3= '.$product_name.'" class="view-btn color-2"><span>Add to Cart</span></a><br>';
                                        if($product_quantity>0){
                                        echo '<a href=" checkout.php?id1='.$product_id.'" class="view-btn color-2"><span>Buy Now</span></a>';
                                        }
                                        echo'<a href="#" class="like-btn"><span class="lnr lnr-layers"></span></a>
                                        <a href="updated_favourite.php?id1='.$final_cost.'&id2='.$product_id.'&id3= '.$product_name.'" class="like-btn"><span class="lnr lnr-heart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>';
                                            }
                                        }
                                    ?>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="details-tab-navigation d-flex justify-content-center mt-30">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li>
                            <a class="nav-link" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-expanded="true">Description</a>
                        </li>
                        <li>
                            <a class="nav-link" id="specification-tab" data-toggle="tab" href="#specification" role="tab" aria-controls="specification">Specification</a>
                        </li>
                        <li>
                            <!-- <a class="nav-link" id="comments-tab" data-toggle="tab" href="#comments" role="tab" aria-controls="comments">Comments</a> -->
                        </li>
                        <li>
                            <a class="nav-link active" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews">Reviews</a>
                        </li>
                    </ul>
                </div>
                <br>
                <?php 
                echo'<div class="available">Shop Address: <span> <a href="http://maps.google.com/maps?q='.$shop_address.'" target="_blank">'.
                                $address_12.','.$city_12.','.$state_12.','.$zipcode_12.','.$country_12.'
                                </a></span></div>';
                ?>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane" id="description" role="tabpanel" aria-labelledby="description" style = "background-color:white;">
                        <div class="description">
                            <p>Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in Reading at the age of 15, where she went to secretarial school and then into an insurance office. After moving to London and then Hampton, she eventually married her next door neighbour from Reading, John Cook. He was an officer in the Merchant Navy and after he left the sea in 1956, they bought a pub for a year before John took a job in Southern Rhodesia with a motor company. Beryl bought their young son a box of watercolours, and when showing him how to use it, she decided that she herself quite enjoyed painting. John subsequently bought her a child’s painting set for her birthday and it was with this that she produced her first significant work, a half-length portrait of a dark-skinned lady with a vacant expression and large drooping breasts. It was aptly named ‘Hangover’ by Beryl’s husband and still hangs in their house today</p>
                            <p>It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and the death of spouses or grown children leaving for college are all reasons that someone accustomed to cooking for more than one would suddenly need to learn how to adjust all the cooking practices utilized before into a streamlined plan of cooking that is more efficient for one person creating less waste. The mission</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="specification" role="tabpanel" aria-labelledby="specification" style = "background-color:white;">
                        <div class="specification-table">
                            <div class="single-row">
                                <span>Width</span>
                                <span>128mm</span>
                            </div>
                            <div class="single-row">
                                <span>Height</span>
                                <span>508mm</span>
                            </div>
                            <div class="single-row">
                                <span>Depth</span>
                                <span>85mm</span>
                            </div>
                            <div class="single-row">
                                <span>Weight</span>
                                <span>52gm</span>
                            </div>
                            <div class="single-row">
                                <span>Quality checking</span>
                                <span>Yes</span>
                            </div>
                            <div class="single-row">
                                <span>Freshness Duration</span>
                                <span>03days</span>
                            </div>
                            <div class="single-row">
                                <span>When packeting</span>
                                <span>Without touch of hand</span>
                            </div>
                            <div class="single-row">
                                <span>Each Box contains</span>
                                <span>60pcs</span>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="comments" role="tabpanel" aria-labelledby="comments" style = "background-color:white;">
                        <div class="review-wrapper">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="total-comment">
                                        <div class="single-comment">
                                            <div class="user-details d-flex align-items-center flex-wrap">
                                                <img src="img/organic-food/u1.png" class="img-fluid order-1 order-sm-1" alt="">
                                                <div class="user-name order-3 order-sm-2">
                                                    <h5>Blake Ruiz</h5>
                                                    <span>12th Feb, 2017 at 05:56 pm</span>
                                                </div>
                                                <a href="#" class="view-btn color-2 reply order-2 order-sm-3"><i class="fa fa-reply" aria-hidden="true"></i><span>Reply</span></a>
                                            </div>

                                            <p class="user-comment">
                                                Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer hears tales of diamonds and begins dreaming of vast riches. He sells his farm and hikes off over the horizon, never to be heard from again.
                                            </p>
                                        </div>
                                        <div class="single-comment reply-comment">
                                            <div class="user-details d-flex align-items-center flex-wrap">
                                                <img src="img/organic-food/u2.png" class="img-fluid order-1 order-sm-1" alt="">
                                                <div class="user-name order-3 order-sm-2">
                                                    <h5>Logan May</h5>
                                                    <span>12th Feb, 2017 at 05:56 pm</span>
                                                </div>
                                                <a href="#" class="view-btn color-2 reply order-2 order-sm-3"><i class="fa fa-reply" aria-hidden="true"></i><span>Reply</span></a>
                                            </div>
                                            <p class="user-comment">
                                                Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer hears tales of diamonds and begins dreaming of vast riches. He sells his farm and hikes off over the horizon, never to be heard from again.
                                            </p>
                                        </div>
                                        <div class="single-comment">
                                            <div class="user-details d-flex align-items-center flex-wrap">
                                                <img src="img/organic-food/u3.png" class="img-fluid order-1 order-sm-1" alt="">
                                                <div class="user-name order-3 order-sm-2">
                                                    <h5>Aaron Anderson</h5>
                                                    <span>12th Feb, 2017 at 05:56 pm</span>
                                                </div>
                                                <a href="#" class="view-btn color-2 reply order-2 order-sm-3"><i class="fa fa-reply" aria-hidden="true"></i><span>Reply</span></a>
                                            </div>
                                            <p class="user-comment">
                                                Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer hears tales of diamonds and begins dreaming of vast riches. He sells his farm and hikes off over the horizon, never to be heard from again.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="add-review" style = "background-color:white;">
                                        <h3>Post a comment</h3>
                                        <form action="#" class="main-form">
                                            <input type="text" placeholder="Your Full name" onfocus="this.placeholder=''" onblur="this.placeholder = 'Your Full name'" required class="common-input">
                                            <input type="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" placeholder="Email Address" onfocus="this.placeholder=''" onblur="this.placeholder = 'Email Address'" required class="common-input">
                                            <input type="text" placeholder="Phone Number" onfocus="this.placeholder=''" onblur="this.placeholder = 'Phone Number'" required class="common-input">
                                            <textarea placeholder="Messege" onfocus="this.placeholder=''" onblur="this.placeholder = 'Messege'" required class="common-textarea"></textarea>
                                            <button class="view-btn color-2"><span>Submit Now</span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="reviews" role="tabpanel" aria-labelledby="reviews" style = "background-color:white;" >
                        <div class="review-wrapper">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="review-stat d-flex align-items-center flex-wrap">
                                        <div class="review-overall">
                                            <h3>Overall</h3>
                                            <div class="main-review"><?php echo round($average_ratings,2)?></div>
                                            <span>Based on <?php echo $total_ratings?> Ratings</span>
                                        </div>
                                        <div class="review-count">
                                            <h4>Based on <?php echo $total_reviews?> Reviews</h4>
                                            <div class="single-review-count d-flex align-items-center">
                                                <span>5 Star</span>
                                                <div class="total-star five-star d-flex align-items-center">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                                <span>01</span>
                                            </div>
                                            <div class="single-review-count d-flex align-items-center">
                                                <span>4 Star</span>
                                                <div class="total-star four-star d-flex align-items-center">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                                <span>01</span>
                                            </div>
                                            <div class="single-review-count d-flex align-items-center">
                                                <span>3 Star</span>
                                                <div class="total-star three-star d-flex align-items-center">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                                <span>01</span>
                                            </div>
                                            <div class="single-review-count d-flex align-items-center">
                                                <span>2 Star</span>
                                                <div class="total-star two-star d-flex align-items-center">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                                <span>00</span>
                                            </div>
                                            <div class="single-review-count d-flex align-items-center">
                                                <span>1 Star</span>
                                                <div class="total-star one-star d-flex align-items-center">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                                <span>00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="total-comment">
                                        <?php 
                                        $sql_1 = "SELECT * FROM product_reviews WHERE product_name = '$product_name';";
                                        $result_1 = $conn->query($sql_1);
                                        
                                       
                                        if($result_1->num_rows>0){
                                            while($row=$result_1->fetch_assoc()){
                                                
                                                $review_id = $row['id'];
                                                $fname = $row['fname'];
                                                $reviews = $row['reviews'];
                                                $ratings = $row['ratings'];
                        
                                                echo'<div class="single-comment">
                                                <div class="user-details d-flex align-items-center">
                                                   
                                                    <div class="user-name">
                                                        <h5>'.$fname.'</h5>';
                                                        if($ratings == 1){
                                                            echo'<div class="total-star five-star d-flex align-items-center">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </div>';

                                                        }
                                                        else if($ratings == 2)
                                                        {
                                                            echo'<div class="total-star five-star d-flex align-items-center">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>  
                                                        </div>';
                                                        }
                                                        else if($ratings == 3){
                                                            echo'<div class="total-star five-star d-flex align-items-center">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </div>';
                                                        }
                                                        else if($ratings == 4){
                                                            echo'<div class="total-star five-star d-flex align-items-center">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </div>';
                                                        }
                                                        else if ($ratings == 5){
                                                            echo'<div class="total-star five-star d-flex align-items-center">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </div>';
                                                        }
                                                    echo'</div>
                                                </div>
                                                <p class="user-comment">'.$reviews.'
                                                    
                                                </p>
                                            </div>';
                                            }
                                        }
                                        
                                        ?>
                                       
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="add-review">
                                        <h3>Add a Review</h3>
                                        <div class="single-review-count mb-15 d-flex align-items-center">
                                            
                                        </div>
                                        <form method = "POST" action="product_reviews.php">
                                        <span>Your Rating:</span>
                                            <span class="rating-star" style="margin-left:28%;">
																	<input type="radio" name="rating" value="5"><span class="star"></span>
																
																		<input type="radio" name="rating" value="4"><span class="star"></span>
																
																		<input type="radio" name="rating" value="3"><span class="star"></span>
																
																		<input type="radio" name="rating" value="2"><span class="star"></span>
																
																	<input type="radio" name="rating" value="1"><span class="star"></span>
																</span> 
                                            <span>Outstanding</span>
                                            <input type="text" name = "fname" placeholder="Your Full name" onfocus="this.placeholder=''" onblur="this.placeholder = 'Your Full name'" required class="common-input">
                                            <input type="email" name = "email_address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" placeholder="Email Address" onfocus="this.placeholder=''" onblur="this.placeholder = 'Email Address'" required class="common-input">
                                            <input type="text" name = "phone_number" placeholder="Phone Number" onfocus="this.placeholder=''" onblur="this.placeholder = 'Phone Number'" required class="common-input">
                                            <input type="text" name = "product_name" placeholder="Phone Number" onfocus="this.placeholder=''" onblur="this.placeholder = 'Phone Number'" value = "<?php echo $product_name?>" class="common-input" hidden>
                                            <textarea placeholder="Review" name = "reviews" onfocus="this.placeholder=''" onblur="this.placeholder = 'Review'" required class="common-textarea"></textarea>
                                            <input type = "submit" name ="submit" class="view-btn color-2"><span>Submit Now</span></button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Details -->
                    
            <!-- Start Most Search Product Area -->
            <section class="pt-100 pb-100">
                <div class="container">
                    <div class="organic-section-title text-center">
                        <h3>Most Searched Products</h3>
                    </div>
                    <div class="row mt-30">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="02-11-product-details.html"><img src="img/r1.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="02-11-product-details.html" class="title">Pixelstore fresh Blueberry</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> $240.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="02-11-product-details.html"><img src="img/r2.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="02-11-product-details.html" class="title">Pixelstore fresh Cabbage</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> $189.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="02-11-product-details.html"><img src="img/r3.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="02-11-product-details.html" class="title">Pixelstore fresh Raspberry</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> $189.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="02-11-product-details.html"><img src="img/r4.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="02-11-product-details.html" class="title">Pixelstore fresh Kiwi</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> $189.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="02-11-product-details.html"><img src="img/r5.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="02-11-product-details.html" class="title">Pixelstore Bell Pepper</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> $120.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="02-11-product-details.html"><img src="img/r6.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="02-11-product-details.html" class="title">Pixelstore fresh Blackberry</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> $120.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="02-11-product-details.html"><img src="img/r7.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="02-11-product-details.html" class="title">Pixelstore fresh Brocoli</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> $120.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="02-11-product-details.html"><img src="img/r8.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="02-11-product-details.html" class="title">Pixelstore fresh Carrot</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> $120.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="02-11-product-details.html"><img src="img/r9.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="02-11-product-details.html" class="title">Pixelstore fresh Strawberry</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> $240.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="02-11-product-details.html"><img src="img/r10.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="02-11-product-details.html" class="title">Prixma MG2 Light Inkjet</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> $240.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="02-11-product-details.html"><img src="img/r11.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="02-11-product-details.html" class="title">Pixelstore fresh Cherry</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> $240.00 <del>$340.00</del></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="02-11-product-details.html"><img src="img/r12.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="02-11-product-details.html" class="title">Pixelstore fresh Beans</a>
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
                        <p class="footer-text m-0">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </footer>   
            <!-- End footer Area -->      
            <!-- Modal Quick Product View -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="container relative">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="product-quick-view">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="quick-view-carousel">
                                        <div class="item" style="background: url(img/organic-food/q1.jpg);">

                                        </div>
                                        <div class="item" style="background: url(img/organic-food/q1.jpg);">

                                        </div>
                                        <div class="item" style="background: url(img/organic-food/q1.jpg);">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="quick-view-content">
                                        <div class="top">
                                            <h3 class="head">Mill Oil 1000W Heater, White</h3>
                                            <div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span class="ml-10">$149.99</span></div>
                                            <div class="category">Category: <span>Household</span></div>
                                            <div class="available">Availibility: <span>In Stock</span></div>
                                        </div>
                                        <div class="middle">
                                            <p class="content">Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.</p>
                                            <a href="#" class="view-full">View full Details <span class="lnr lnr-arrow-right"></span></a>
                                        </div>
                                        <div class="bottom">
                                            <div class="color-picker d-flex align-items-center">Color:
                                                <span class="single-pick"></span>
                                                <span class="single-pick"></span>
                                                <span class="single-pick"></span>
                                                <span class="single-pick"></span>
                                                <span class="single-pick"></span>
                                            </div>
                                            <div class="quantity-container d-flex align-items-center mt-15">
                                                Quantity:
                                                <input type="text" class="quantity-amount ml-15" value="1" />
                                                <div class="arrow-btn d-inline-flex flex-column">
                                                    <button class="increase arrow" type="button" title="Increase Quantity"><span class="lnr lnr-chevron-up"></span></button>
                                                    <button class="decrease arrow" type="button" title="Decrease Quantity"><span class="lnr lnr-chevron-down"></span></button>
                                                </div>

                                            </div>
                                            <div class="d-flex mt-20">
                                                <a href="#" class="view-btn color-2"><span>Add to Cart</span></a>
                                                <a href="#" class="like-btn"><span class="lnr lnr-layers"></span></a>
                                                <a href="#" class="like-btn"><span class="lnr lnr-heart"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
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