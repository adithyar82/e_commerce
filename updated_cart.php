<?php
	session_start();
	 
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
                                <!-- <li><a href="delivery_checkout.php">Checkout</a></li>
                                <li><a href="delivery_status_1.php">My Orders</a></li> -->
                                <!-- <li><a href="#men">Men</a></li>
                                <li><a href="#women">Women</a></li>
                                <li><a href="#latest">latest</a></li> -->
                                    <!-- Dropdown -->
                                    <!-- <li class="dropdown">
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
                            <h1>Cart</h1>
                            
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Banner Area -->

            <!-- Start Product Details -->
            
                    <?php 
										include('connect_db.php');
										//   session_start();
										$sql = "SELECT * FROM items;";
										$result = $conn->query($sql);
										if($result->num_rows>0){
											while($row = $result->fetch_assoc()){
												$item_id = $row['id'];
												$item_price = $row['item_price'];
												$item_name = $row['item_name'];
												$initial_cost = $row['initial_cost'];
												$final_cost = $row['final_cost'];
												$product_image = $row['product_image'];
                                                $product_quantity = $row['product_quantity'];
                                                $product_quantity_1 = $row['initial_quantity'];

                                                
                        echo' 
                        <div class="container">
                            <div>
                                <div>
                        <div class="col-lg-3">
                            <img class="content-image" src="'.$product_image.'" alt="">
                        </div>
                            
                        
                        <div class="col-lg-3">
                            <div class="quick-view-content">
                                <div class="top">
                                    <h3 class="head">'.$item_name.' &nbsp; <a href="favourite_1.php?id1='.$final_cost.'&id2='.$product_id.'&id3= '.$product_name.'" style = "color : black"><span class="glyphicon glyphicon-heart" style="font-size:20px;"></span></a></h3>
                                    <div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span><span class="ml-10">Rs '.$initial_cost.'</span>  <a href="cart_1.php?id1='.$final_cost.'&id2='.$product_id.'&id3= '.$product_name.'" style = "color : black"> </span&nbsp; &nbsp;<a href="favourite_1.php?id1='.$final_cost.'&id2='.$product_id.'&id3= '.$product_name.'" style = "color : black"></div> 
                                    
                                    
                                    
                                </div>
                                <div class="category">Category: <span>'.$category.'</span>';
                                if($product_quantity>0){
                                    echo'<div class="available">Availibility: <span style="color:green">In Stock</span></div>';
                                }
                                else{
                                echo '<div class="available">Availibility: <span style="color:red">Out of Stock</span></div>';
                                }
                                echo'
                                </div>
                               
                                    
                                    <div class="quantity-container d-flex align-items-center">
                                    Quantity: &nbsp; &nbsp; <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">'.$product_quantity.' </a>';
                                    if($product_quantity_1 == 0){
                                        echo '<p> Out of Stock</p>';
                                }
                                else if($product_quantity_1 == 1){
                                    echo '<div class="dropdown-menu">
                                    <a class="dropdown-item" href="quantity.php?id1=1&id2='.$item_id.'">1</a>
                                    <a class="dropdown-item" href="quantity.php?id1=1&id2='.$item_id.'">1</a>
                                    <!-- <a class="dropdown-item" href="cart.php">Cart</a> -->
                                    <!-- <a class="dropdown-item" href="checkout.php">Checkout</a>
                                    <a class="dropdown-item" href="confermation.php">Confirmation</a>
                                    <a class="dropdown-item" href="login.php">Login</a>
                                    <a class="dropdown-item" href="tracking.php">Tracking</a> -->
                                    <!-- <a class="dropdown-item" href="generic.php">Generic</a>
                                    <a class="dropdown-item" href="elements.php">Elements</a> -->
                                </div>';
                                }
                                else if($product_quantity_1 == 2){
                                echo'
                                <div class="dropdown-menu">
                                        <a class="dropdown-item" href="quantity.php?id1=1&id2='.$item_id.'">1</a>
                                        <a class="dropdown-item" href="quantity.php?id1=1&id2='.$item_id.'">1</a>
                                        <a class="dropdown-item" href="quantity.php?id1=2&id2='.$item_id.'">2</a>
                                        <!-- <a class="dropdown-item" href="cart.php">Cart</a> -->
                                        <!-- <a class="dropdown-item" href="checkout.php">Checkout</a>
                                        <a class="dropdown-item" href="confermation.php">Confirmation</a>
                                        <a class="dropdown-item" href="login.php">Login</a>
                                        <a class="dropdown-item" href="tracking.php">Tracking</a> -->
                                        <!-- <a class="dropdown-item" href="generic.php">Generic</a>
                                        <a class="dropdown-item" href="elements.php">Elements</a> -->
                                </div>';
                                }
                                else if($product_quantity_1 == 3){
                                    echo'<div class="dropdown-menu">
                                    <a class="dropdown-item" href="quantity.php?id1=1&id2='.$item_id.'">1</a>
                                    <a class="dropdown-item" href="quantity.php?id1=1&id2='.$item_id.'">1</a>
                                    <a class="dropdown-item" href="quantity.php?id1=2&id2='.$item_id.'">2</a>
                                    <a class="dropdown-item" href="quantity.php?id1=3&id2='.$item_id.'">3</a>
                                    <!-- <a class="dropdown-item" href="cart.php">Cart</a> -->
                                    <!-- <a class="dropdown-item" href="checkout.php">Checkout</a>
                                    <a class="dropdown-item" href="confermation.php">Confirmation</a>
                                    <a class="dropdown-item" href="login.php">Login</a>
                                    <a class="dropdown-item" href="tracking.php">Tracking</a> -->
                                    <!-- <a class="dropdown-item" href="generic.php">Generic</a>
                                    <a class="dropdown-item" href="elements.php">Elements</a> -->
                                </div>';
                                }
                                else if($product_quantity_1 == 4){
                                    echo '<div class="dropdown-menu">
                                    <a class="dropdown-item" href="quantity.php?id1=1&id2='.$item_id.'">1</a>
                                    <a class="dropdown-item" href="quantity.php?id1=1&id2='.$item_id.'">1</a>
                                    <a class="dropdown-item" href="quantity.php?id1=2&id2='.$item_id.'">2</a>
                                    <a class="dropdown-item" href="quantity.php?id1=3&id2='.$item_id.'">3</a>
                                    <a class="dropdown-item" href="quantity.php?id1=4&id2='.$item_id.'">4</a>
                                    <!-- <a class="dropdown-item" href="cart.php">Cart</a> -->
                                    <!-- <a class="dropdown-item" href="checkout.php">Checkout</a>
                                    <a class="dropdown-item" href="confermation.php">Confirmation</a>
                                    <a class="dropdown-item" href="login.php">Login</a>
                                    <a class="dropdown-item" href="tracking.php">Tracking</a> -->
                                    <!-- <a class="dropdown-item" href="generic.php">Generic</a>
                                    <a class="dropdown-item" href="elements.php">Elements</a> -->
                                 </div>';
                                }
                                else if($product_quantity_1 == 5){
                                    echo '<div class="dropdown-menu">
                                    <a class="dropdown-item" href="quantity.php?id1=1&id2='.$item_id.'">1</a>
                                    <a class="dropdown-item" href="quantity.php?id1=1&id2='.$item_id.'">1</a>
                                    <a class="dropdown-item" href="quantity.php?id1=2&id2='.$item_id.'">2</a>
                                    <a class="dropdown-item" href="quantity.php?id1=3&id2='.$item_id.'">3</a>
                                    <a class="dropdown-item" href="quantity.php?id1=4&id2='.$item_id.'">4</a>
                                    <a class="dropdown-item" href="quantity.php?id1=5&id2='.$item_id.'">5</a>
                                    <!-- <a class="dropdown-item" href="cart.php">Cart</a> -->
                                    <!-- <a class="dropdown-item" href="checkout.php">Checkout</a>
                                    <a class="dropdown-item" href="confermation.php">Confirmation</a>
                                    <a class="dropdown-item" href="login.php">Login</a>
                                    <a class="dropdown-item" href="tracking.php">Tracking</a> -->
                                    <!-- <a class="dropdown-item" href="generic.php">Generic</a>
                                    <a class="dropdown-item" href="elements.php">Elements</a> -->
                                 </div>';
                                }
                                else{
                                echo'
                                <div class="dropdown-menu">
                                        <a class="dropdown-item" href="quantity.php?id1=1&id2='.$item_id.'">1</a>
                                        <a class="dropdown-item" href="quantity.php?id1=1&id2='.$item_id.'">1</a>
                                        <a class="dropdown-item" href="quantity.php?id1=2&id2='.$item_id.'">2</a>
                                        <a class="dropdown-item" href="quantity.php?id1=3&id2='.$item_id.'">3</a>
                                        <a class="dropdown-item" href="quantity.php?id1=4&id2='.$item_id.'">4</a>
                                        <a class="dropdown-item" href="quantity.php?id1=5&id2='.$item_id.'">5</a>
                                        <a class="dropdown-item" href="quantity.php?id1=6&id2='.$item_id.'">6</a>
                                        <!-- <a class="dropdown-item" href="cart.php">Cart</a> -->
                                        <!-- <a class="dropdown-item" href="checkout.php">Checkout</a>
                                        <a class="dropdown-item" href="confermation.php">Confirmation</a>
                                        <a class="dropdown-item" href="login.php">Login</a>
                                        <a class="dropdown-item" href="tracking.php">Tracking</a> -->
                                        <!-- <a class="dropdown-item" href="generic.php">Generic</a>
                                        <a class="dropdown-item" href="elements.php">Elements</a> -->
                                </div>';
                                }
                                echo'
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="quantity.php?id1=1&id2='.$item_id.'">1</a>
                                        <a class="dropdown-item" href="quantity.php?id1=1&id2='.$item_id.'">1</a>
                                        <!-- <a class="dropdown-item" href="cart.php">Cart</a> -->
                                        <!-- <a class="dropdown-item" href="checkout.php">Checkout</a>
                                        <a class="dropdown-item" href="confermation.php">Confirmation</a>
                                        <a class="dropdown-item" href="login.php">Login</a>
                                        <a class="dropdown-item" href="tracking.php">Tracking</a> -->
                                        <!-- <a class="dropdown-item" href="generic.php">Generic</a>
                                        <a class="dropdown-item" href="elements.php">Elements</a> -->
                                    </div>
                                    
                                </div>
                                </div>
                                <h3> Sub Total : '.$final_cost.' </h3>
                                <br>
                                <br>
                                
                                <div class="d-flex mt-30">
                                        <a href=" cart_2.php?id1='.$item_id.'" class="view-btn color-2"><span>Remove Item</span></a>
                                
                                        
                                        <a href=" checkout.php?id1='.$final_cost.'&id2='.$product_id.'&id3= '.$product_name.'" class="view-btn color-2"><span>Buy Now<br></span></a><br>
                                </div>
                            </div>
                        </div>
                    
                        </div>
                        </div>
                    </div>
                    <br>
                    <hr style="height:25px; background-color:#F0F0F0; z-index:-1">
                    <br>';
                                            }
                                        }
                                    ?>
                   

            <!-- End Product Details -->
            <div>
                    <a href = "checkout_1.php"  button class="view-btn color-2 w-100 mt-20"><span>Buy Now</span></button>
                </div>     
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