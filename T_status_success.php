
<?php
include('connect_db.php');
include("./php/class.phpmailer.php"); 
$payment_status = $_POST['isPaymentSuccessful'];
echo $_POST['isPaymentSuccessful'];
echo $payment_status;

$encrypted = $_REQUEST['id'];
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
  $order_id = my_simple_crypt($encrypted, 'd' );
  $sql = "SELECT order_status.fname, order_status.product_name, order_status.item_id,order_status.product_quantity, order_status.final_cost, payment.status,payment.time_created, payment.payment_type FROM order_status INNER JOIN payment ON order_status.payment_id = payment.order_id  WHERE order_status.payment_id = '$order_id'";

$order_id = $_POST['order_id'];
$ORDER_ID = $_REQUEST['id2'];
echo $_POST['order_id'];
$transaction_id = $_POST['txn_id'];
echo $transaction_id;
$sql = "SELECT order_status.fname, order_status.product_name, order_status.item_id,order_status.product_quantity, order_status.final_cost, payment.status,payment.time_created, payment.payment_type FROM order_status INNER JOIN payment ON order_status.payment_id = payment.order_id  WHERE order_status.payment_id = '$order_id'";
$result = $conn->query($sql);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $fname = $row['fname'];
        $final_cost = $row['final_cost'];
        $product_name = $row['product_name'];
        $product_quanity = $row['product_quanity'];
        $payment_type = $row['payment_type'];
    }
}

  $mail = new PHPMailer;
            $mailaddress = "harshithaeshwar007@gmail.com";                              // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail -> Username = 'contact.azeempatel@gmail.com';
            $mail -> Password = 'AzeemPatel46#';                          // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
            $mail->setFrom('contact.azeempatel@gmail.com', 'no reply');
            $mail->addAddress($mailaddress);     // Add a recipient                                  // Set email format to HTML
            $mail->Subject = 'E Commerce Website';
            $mail->Body    = '<h1 align =center>Dear '.$fname.' Thank you for Placing your order through E Commerce Portal</h1>
                                <h2 align =center>Your Order Details are as follows :</h2>
                                <h2 align =center>Order Id : '.$order_id.'</h2>
                                <h2 align =center>Product name : '.$product_name.'</h2>
                                <h2 align =center>Total Cost: '.$final_cost.'</h2>
                                <h3 aling = left><a href = "http://loket.in/testing/order_status.php"> Track Your Order Here ';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail -> isHTML(true);
            if(!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                // echo'<script>
                // alert("Email has been sent successfully");
                // window.location= "cashier.php";
                // </script>';
            }

$sql_12 = "UPDATE payment SET transaction_id = '$ORDER_ID' WHERE order_id = '$order_id';";
$result_12 = $conn->query($sql_12);
if($result_12->num_rows>0){
    while($row=$result_12->fetch_assoc()){
        $id = $row['order_id'];
        $fname = $row['fname'];
        $final_cost = $row['final_cost'];
        $product_name = $row['product_name'];
        $payment_id = $row['payment_id'];
        $product_quantity = $row['product_quantity'];
        $mail = new PHPMailer;
        $mailaddress = "harshithaeshwar007@gmail.com";                              // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail -> Username = 'contact.azeempatel@gmail.com';
        $mail -> Password = 'AzeemPatel46#';                          // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        $mail->setFrom('contact.azeempatel@gmail.com', 'no reply');
        $mail->addAddress($mailaddress);     // Add a recipient                                  // Set email format to HTML
        $mail->Subject = 'E Commerce Website';
        $mail->Body    = '<h1 align =center>Dear '.$fname.' Thank you for Placing your order through E Commerce Portal</h1>
                            <h2 align =center>Your Order Details are as follows :</h2>
                            <h2 align =center>Order Id : '.$order_id.'</h2>
                            <h2 align =center>Product name : '.$product_name.'</h2>
                            <h2 align =center>Total Cost: '.$final_cost.'</h2>
                            <h3 aling = left><a href = "http://localhost:8888/shop/order_status.php"> Track Your Order Here ';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail -> isHTML(true);
        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo '<script>
        setTimeout(function () { 
            swal({
            title: "Payment",
            text: "Transaction successful",
            type: "success",
            confirmButtonText: "OK"
            },
            function(isConfirm){
            if (isConfirm) {
                window.location.href = "T_status_success.php";
            }
            }); }, 1000);
        </script>';
        }
    }
}
>>>>>>> 4800be375c48dafd771b960bb8990e65c6002d0a
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
        <body>

        <!-- Start Header Area -->
        <header class="default-header">
            <nav class="navbar navbar-expand-lg  navbar-light" style="margin-right:20%">
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
                    <div class="col-lg-12">
                        <h1>Transaction Status</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Banner Area -->
        
        <section class="brand-area pb-100">
            <div class="container">
                <div class="logo-wrap">
                    <div class="d-flex justify-content-center">
                        <img src="img/success.png" alt="">
                    </div>
                    <br>
                    <h1 class="d-flex justify-content-center" style="color:green;">Payment Successful</h1><br>
                    <h3>Order Id: <?php echo $order_id;?></h3><br>
                    <h3>First Name: <?php echo $fname?></h3><br>
                    <h3>Total Cost: <?php echo $final_cost?></h3><br>
                    <h3>Transaction Type:<?php echo $payment_type;?></h3><br>
                    <button style="width:200px; background-color:green; color:white;" onclick="myFunction()">Product Details</button>
                        <div id="myDIV">
                            <br>
                            <h3>Product Name: <?php echo $product_name?></h3><br>
                            <h3>Product Quanity: <?php echo $product_quantity?></h3><br>
                        </div>
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