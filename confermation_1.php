<?php
    echo'<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
    session_start();
    if(!isset($_SESSION['uname'])){
		header("location:index.php");
	}
    include("connect_db.php");
    include("./php/class.phpmailer.php");  
    // $fname = $_SESSION['username'];
    $total_cost = $_SESSION['id1'];
    $order_id = rand(1000000,99999999);
    $name = $_SESSION['id3'];
    $final_cost = $_SESSION['id4'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $ename = $_POST['ename'];
    $address_1 = $_POST['address_1'];
    $address_2 = $_POST['address_2'];
    $email_address = $_SESSION['email_address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $zip = $_POST['zip'];
    $shipping_address = $_POST['shipping_address'];
    $address_11 = $_POST['address_11'];
    $address_12 = $_POST['address_12'];
    $city_1 = $_POST['city_1'];
    $state_1 = $_POST['state_1'];
    $country_1 = $_POST['country_1'];
    $zip_1= $_POST['zip_1'];
    $status = 'ordered';
    $sql_1 = "SELECT * FROM products where product_id  = '$order_id';";
    $result_1 = $conn->query($sql_1);
    if($result_1->num_rows>=0){
        while($row = $result_1->fetch_assoc()){
            $product_image = $row['product_image'];
            $shop_id = $row['shop_id'];
            $final_cost = $row['final_cost'];
        }
    }
    $sql = "INSERT INTO order_status(order_id,item_id,fname,final_cost,product_name, delivery_boy, payment_id, product_quantity,status,product_image, shop_id) VALUES (Null,'$order_id','$fname','$final_cost', '$name', ' ','$order_id', '1','$status','$product_image','$shop_id');";
    $result = $conn->query($sql);
    
    $sql1 = "SELECT * FROM products WHERE product_id = '$order_id';";
    $result1 = $conn->query($sql1);
    if($result1->num_rows>0){
        while($row = $result1->fetch_assoc()){
            $product_quantity = $row['product_quantity'];
    }

    
    $product_quantity = $product_quantity - 1;
}
    $sql3 = "INSERT INTO shipping(shipping_id, product_id, address_1, address_2,city,state,zipcode,country) VALUES (Null, '$order_id','$address_1','$address_2','$city','$state','$zip','$country');";
    $result3 = $conn->query($sql3);
    
    $sql_2 = "UPDATE products SET product_quantity = '$product_quantity' WHERE product_id = '$order_id';";
    $result_2 = $conn->query($sql_2);
    $payment_type = "abc";
    $fname = "abc";
    $payment_status = "Successful";
    
    $sql_3 = "INSERT INTO payment(payment_id,final_cost,payment_type,time_created,order_id,fname,product_name,product_image,status) VALUES (Null, '$final_cost', '$payment_type', CURRENT_TIME(), '$order_id','$fname','$name','$product_image','$payment_status');";
    $result_3 = $conn->query($sql_3);

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
        </head>
        <body>

            <!-- Start Header Area -->
            <header class="default-header">
				<div class="menutop-wrap">
					<div class="menu-top container" style="margin-left:3%;">
						<div class="form-group has-feedback has-feedback-left">
							<!-- <label>Pickup Location</label> -->
							<!-- \\] -->
							<!-- <input type="text" style="text-align:center; margin-left:20%" size="100"  placeholder="Pickup Location" /> -->
							
						</div>
						
						<div class="d-flex justify-content-between align-items-center">
                                <li><a href="contact_us.php">+91 8095566699</a></li>
                                <li><a href="contact_us.php">contact.azeempatel@gmail.com</a></li>
                                <li><a href="faq.php">Help ?</a></li>								
						</div>
					</div>	
					<br>				
				</div>
				<nav class="navbar navbar-expand-lg  navbar-light" style="margin-right:20%">
					<div class="container" style="width:1500px;">

						  <a class="navbar-brand" style="margin-left:20px;" href="category.php">
							  <img style="margin-left:10px;" src="img/logo.png" alt="">
							  <p> Company Logo </p>
						  </a>
						  
						  <div class="search-form" style="margin-left:2%; margin-top:2.5%">
           					 <form action="#" method="get">
              					<input type="search" name="search" id="search" style="width:300px;" placeholder="Type keywords &amp; press enter...">
             					<button type="submit" class="d-none"></button>
           					 </form>
						  </div>

						  <div style="margin-left:1%; margin-top:1%"><a href="#"><span class="glyphicon glyphicon-search"> </span></a></div>
	
						  <div class="collapse navbar-collapse" style = "margin-left:35%;" id="navbarSupportedContent">
						    <ul class="navbar-nav" style="width:1500px;">
								<li><a href="category.php">Home</a></li>
									<!-- Dropdown -->
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    Orders
                                    </a>
                                    <div class="dropdown-menu" style="margin-top:10px">
                                    <a class="dropdown-item" href="order.php">Your Orders</a>
                                    <a class="dropdown-item" href="order_status.php">Current Orders</a>
                                    <!-- <a class="dropdown-item" href="login.php">Cancelled Orders</a> -->
                                    <a class="dropdown-item" href="tracking.php">Tracking</a>
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
                            <h1>Order Confermation</h1>
                             <nav class="d-flex align-items-center justify-content-start">
                                <a href="category.php">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="confermation.php">Confermation</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Banner Area -->

		<!-- Start Checkout Area -->
		<div class="container" style="margin-left:17%">
			<!-- <p class="text-center" style="font-size:25px">Thank you. Your order has been received.</p> -->
			<div class="row mt-50">
				<div class="col-md-4">
					<h3 class="billing-title mt-20 pl-15">Order Info</h3>
					<table class="order-rable">
						<tr>
							<td>Order number</td>
							<td>: <?php echo $order_id ?></td>
						</tr>
						<tr>
							<td>Date</td>
							<td>: <?php echo date("d/m/Y")?></td>
						</tr>
						<tr>
							<td>Total</td>
							<td>: <?php echo $final_cost ?> </td>
						</tr>
						<tr>
							<td>Payment method</td>
							<td>: Check payments</td>
						</tr>
					</table>
				</div>
				<div class="col-md-4">
					<h3 class="billing-title mt-20 pl-15">Billing Address</h3>
					<table class="order-rable">
						<tr>
							<td>Street</td>
							<td>: <?php echo $address_1 ?></td>
						</tr>
						<tr>
							<td>City</td>
							<td>: <?php echo $city ?></td>
						</tr>
						<tr>
							<td>State</td>
							<td>: <?php echo $state?></td>
						</tr>
						<tr>
							<td>Country</td>
							<td>: <?php echo $country ?></td>
						</tr>
						<tr>
							<td>Postcode</td>
							<td>: <?php echo $zip ?></td>
						</tr>
					</table>
				</div>
                <?php
                echo'
				<div class="col-md-4">
					<h3 class="billing-title mt-20 pl-15">Shipping Address</h3>
                    <table class="order-rable">';
                    if(isset($_POST['shipping_address'])){
                    echo'
						<tr>
							<td>Street</td>
							<td>: '.$address_11.'</td>
						</tr>
						<tr>
							<td>City</td>
							<td>: '.$city_1.'</td>
						</tr>
						<tr>
							<td>Country</td>
							<td>: '.$country_1.'</td>
						</tr>
						<tr>
							<td>Postcode</td>
							<td>: '.$zip_1.'</td>
                        </tr>';
                    }
                    else{
                        echo'
                            <tr>
                                <td>Street</td>
                                <td>: '.$address_1.'</td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td>: '.$city.'</td>
                            </tr>
                            <tr>
                                <td>Country</td>
                                <td>: '.$country.'</td>
                            </tr>
                            <tr>
                                <td>Postcode</td>
                                <td>: '.$zip.'</td>
                            </tr>';
                        }
					echo'</table>
                </div>';
                ?>
			</div>
		</div>
		<!-- End Checkout Area -->
		<!-- Start Billing Details Form -->
		<div class="container" style="margin-left:17%">
			<div class="billing-form">
				<div class="row">
					<div class="col-12">
						<div class="order-wrapper mt-50">
							<h3 class="billing-title mb-10">Your Order</h3>
							<div class="order-list">
								<div class="list-row d-flex justify-content-between">
									<div>Product</div>
									<div>Total</div>
								</div>
								<div class="list-row d-flex justify-content-between">
									<div><?php echo $name?></div>
									<div>x 02</div>
									<div><?php echo $total_cost?></div>
								</div>
								<div class="list-row d-flex justify-content-between">
									<h6>Subtotal</h6>
									<div><?php echo $total_cost?></div>
								</div>
								<div class="list-row d-flex justify-content-between">
									<h6>Shipping</h6>
									<div>Flat rate: Rs50.00</div>
								</div>
								<div class="list-row border-bottom-0 d-flex justify-content-between">
									<h6>Total</h6>
									<div class="total"><?php echo $final_cost?></div>
								</div>
							</div>
                            
						</div>
					</div>
				</div>
			</div>
		</div>
        <?php
                                $firstName = $fname;
                                $lastName = $lname;
                                $amount = $final_cost;
    
                                $itemName = $name;
                                $email=$email_address;
                                echo <<<EOD
                                
    <style>
    
    .payment-button {
      width:200px;
      height:100px;
      
    }
    
    </style>
  
  
  
  
    
    <form name = "hidden-payment-form" class="paypal" action="payments_1.php" method="post" id="paypal_form">
        <input type="hidden" name="cmd" value="_xclick" />
        <input type="hidden" name="no_note" value="1" />
        <input type="hidden" name="lc" value="IN" />
        <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
        <input type="hidden" name="first_name" value="$firstName" />
        <input type="hidden" name="last_name" value="$lastName" />
        <input type="hidden" name="payer_email" value="$email" />
        <input type="hidden" name="item_number" value="1" / >
        <input type="hidden" name="item_name" value="$itemName" / >
        <input type="hidden" name="order_id" value="$order_id"/ >
		<input type="hidden" name="amount" value="$amount" / >
    <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-medium.png" border="0" type = "submit" name="submit1" alt="PayPal - The safer, easier way to pay online!"/>
    </form>
EOD;

echo <<<EOD
                                
    <style>
    
    .payment-button {
      width:200px;
      height:100px;
      
    }
    
    </style>
  
  
  
  
    
    <form name = "hidden-payment-form" class="paypal" action="./PaytmKit/TxnTest.php" method="post" id="paypal_form">
        <input type="hidden" name="cmd" value="_xclick" />
        <input type="hidden" name="no_note" value="1" />
        <input type="hidden" name="lc" value="IN" />
        <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
        <input type="hidden" name="first_name" value="$firstName" />
        <input type="hidden" name="last_name" value="$lastName" />
        <input type="hidden" name="payer_email" value="$email" />
        <input type="hidden" name="item_number" value="1" / >
        <input type="hidden" name="order_id" value="$order_id" / >
		<input type="hidden" name="item_name" value="$itemName" / >
		<input type="hidden" name="amount" value="$amount" / >
        <button class="view-btn color-2 w-20 mt-20"><span style = "color:#0984D1; font-weight:bold;">PAYTM</span></button>
    </form>
EOD;

  
$final_amount = $amount * 100;



    ?>
    
    <form action="" method="POST"> 
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="rzp_test_wziRFtUD6cTGmR" // Enter the Key ID generated from the Dashboard
    data-amount="<?php echo $final_amount ?>" // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    data-currency="INR"
    data-buttontext="Pay with Razorpay"
    data-name="<?php echo $itemName ?>"
    data-description="Test transaction"
    data-image="https://example.com/your_logo.jpg"
    data-prefill.name="Aditya Ritesh"
    data-prefill.email="maditya183@gmail.com"
    data-prefill.contact="8971966482"
    data-theme.color="#F37254"
></script>
<input type="hidden" custom="Hidden Element" name="hidden">
</form>
		<!-- End Billing Details Form -->

            <!-- Start Most Search Product Area -->
            <!-- <section class="section-half">
                <div class="container" style="margin-left:17%">
                    <div class="organic-section-title text-center">
                        <h3>Most Searched Products</h3>
                    </div>
                    <div class="row mt-30">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r1.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore fresh Blueberry</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> Rs240.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r2.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore fresh Cabbage</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> Rs189.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r3.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore fresh Raspberry</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> Rs189.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r4.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore fresh Kiwi</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> Rs189.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r5.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore Bell Pepper</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> Rs120.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r6.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore fresh Blackberry</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> Rs120.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r7.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore fresh Brocoli</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> Rs120.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r8.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore fresh Carrot</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> Rs120.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r9.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore fresh Strawberry</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> Rs240.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r10.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Prixma MG2 Light Inkjet</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> Rs240.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r11.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore fresh Cherry</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> Rs240.00 <del>Rs340.00</del></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-search-product d-flex">
                                <a href="#"><img src="img/r12.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Pixelstore fresh Beans</a>
                                    <div class="price"><span class="lnr lnr-tag"></span> Rs240.00 <del>Rs340.00</del></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
            <!-- End Most Search Product Area -->

            <!-- start footer Area -->  
            <?php
                                $firstName = $fname ;
                                $lastName = $lname;
                                $amount = $final_cost;
                                $itemName = $product_quantity;
                                $email = $email_address;
                                echo <<<EOD
                                
    <style>
    
    .payment-button {
      width:200px;
      height:100px;
      
    }
    
    </style>
  
  
  
  
    
    <form name = "hidden-payment-form" class="paypal" action="payments_1.php" method="post" id="paypal_form">
        <input type="hidden" name="cmd" value="_xclick" />
        <input type="hidden" name="no_note" value="1" />
        <input type="hidden" name="lc" value="IN" />
        <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
        <input type="hidden" name="first_name" value="$firstName" />
        <input type="hidden" name="last_name" value="$lastName" />
        <input type="hidden" name="payer_email" value="$email" />
        <input type="hidden" name="item_number" value="1" / >
        <input type="hidden" name="item_name" value="$itemName" / >
        <input type="hidden" name="order_id" value="$order_id"/ >
		<input type="hidden" name="amount" value="$amount" / >
    <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-medium.png" border="0" type = "submit" name="submit1" alt="PayPal - The safer, easier way to pay online!"/>
    </form>
EOD;
// $order_id = rand(1000000,99999999);
echo <<<EOD
                                
    <style>
    
    .payment-button {
      width:200px;
      height:100px;
      
    }
    
    </style>
  
  
  
  
    
    <form name = "hidden-payment-form" class="paypal" action="./PaytmKit/TxnTest.php" method="post" id="paypal_form">
        <input type="hidden" name="cmd" value="_xclick" />
        <input type="hidden" name="no_note" value="1" />
        <input type="hidden" name="lc" value="IN" />
        <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
        <input type="hidden" name="first_name" value="$firstName" />
        <input type="hidden" name="last_name" value="$lastName" />
        <input type="hidden" name="payer_email" value="$email" />
        <input type="hidden" name="item_number" value="1" / >
        <input type="hidden" name="order_id" value="$order_id" / >
		<input type="hidden" name="item_name" value="$itemName" / >
		<input type="hidden" name="amount" value="$amount" / >
        <button class="view-btn color-2 w-20 mt-20"><span style = "color:#0984D1; font-weight:bold;">PAYTM</span></button>
    </form>
EOD;

  
$final_amount = $amount * 100;



    ?>
    
    <form action="" method="POST"> 
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="rzp_test_wziRFtUD6cTGmR" // Enter the Key ID generated from the Dashboard
    data-amount="<?php echo $final_amount ?>" // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    data-currency="INR"
    data-buttontext="Pay with Razorpay"
    data-name="<?php echo $itemName ?>"
    data-description="Test transaction"
    data-image="https://example.com/your_logo.jpg"
    data-prefill.name="Aditya Ritesh"
    data-prefill.email="maditya183@gmail.com"
    data-prefill.contact="8971966482"
    data-theme.color="#F37254"
></script>
<input type="hidden" custom="Hidden Element" name="hidden">
</form>
            <br>
            <br>
            <br>    
            <footer class="footer-area section-gap">
                <div class="container" style="margin-left:17%">
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
                                    <!-- <a href="#"><i class="fa fa-dribbble"></i></a>
                                    <a href="#"><i class="fa fa-behance"></i></a> -->
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
            <script src="js/owl.carousel.min.js"></script>            
            <script src="js/main.js"></script>  
        </body>
    </html>
