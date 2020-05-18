Í<?php 
$_SESSION['amount'] = $_POST['amount'];
$amount = $_SESSION['amount'];
$order_id = $_POST['order_id'];
<<<<<<< HEAD
// $order_id = rand(10000000,99999999);
=======
>>>>>>> fa1e5017ce2b8087d3787c42f4203f48e2e0da1a
echo $amount;
	include("./php/class.phpmailer.php");
	function send_debug_mail($email, $body) {
		
		$mail = new PHPMailer;
		$mailaddress = $email;
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail -> Username = 'contact.azeempatel@gmail.com';
		$mail -> Password = 'AzeemPatel46#';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;                                    
		$mail->setFrom('contact.azeempatel@gmail.com', 'no reply');
		$mail->addAddress($mailaddress);
		$mail->Subject = 'E-commerce';
		$mail->Body = $body;
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		$mail->isHTML(true);
		return $mail->send();
	}


	session_start();
	send_debug_mail("harshithaeshwar007@gmail.com", print_r($_POST, true));

	// $_SESSION['txn_id'] = $_POST['txn_id'];
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	// For test payments we want to enable the sandbox mode. If you want to put live
	// payments through then this setting needs changing to `false`.
	$enableSandbox = true;

	// Database settings. Change these for your database configuration.
	$dbConfig = [
		'host' => 'localhost',
		'username' => 'admin',
		'password' => 'monarchs',
		'name' => 'E_Commerce'
	];

	// PayPal settings. Change these to your account details and the relevant URLs
	// for your site.
	$paypalConfig = [
		'email' => 'sb-ov0ot1549898@business.example.com',
		'return_url' => "https://loket.in/confermation.php?id=".$order_id,
		'cancel_url' => 'https://example.com/payment-cancelled.html',
		'notify_url' => 'https://loket.in/confermation.php',
	];

	$paypalUrl = $enableSandbox ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';

	// Check if paypal request or response
	if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])) {
		 
		// Grab the post data so that we can set up the query string for PayPal.
		// Ideally we'd use a whitelist here to check nothing is being injected into
		// our post data.
		$data = [];
		foreach ($_POST as $key => $value) {
			$data[$key] = stripslashes($value);
		}
		// $data['amount'] = $am
		// Set the Pay Pal account.
		$data['business'] = $paypalConfig['email'];

		// Set the PayPal return addresses.
		$data['return'] = stripslashes($paypalConfig['return_url']);
		// $data['cancel_return'] = stripslashes($paypalConfig['cancel_url']);
		$data['notify_url'] = stripslashes($paypalConfig['notify_url']);

		// Set the details about the product being purchased, including the amount
		// and currency so that these aren't overridden by the form data.
		// $data['item_name'] = $itemName;
		// $data['amount'] = $itemAmount;
		$data['currency_code'] = 'INR';

		// Add any custom fields for the query string.
		//$data['custom'] = USERID;

		// Build the query string from the data.
		$queryString = http_build_query($data);

		// Redirect to paypal IPN
		header('location:' . $paypalUrl . '?' . $queryString);
		exit();

	} else {
		// Handle the PayPal response.
		$_SESSION['txn_id'] = $_POST['txn_id'];
		// Create a connection to the database.
		$db = new mysqli($dbConfig['localhost'], $dbConfig['admin'], $dbConfig['monarchs'], $dbConfig['e_commerce']);
		// Assign posted variables to local data array.
		$data = [
			'item_name' => $_POST['item_name'],
			'item_number' => $_POST['item_number'],
			'payment_status' => $_POST['payment_status'],
			'payment_amount' => $_POST['mc_gross'],
			'payment_currency' => $_POST['mc_currency'],
			'txn_id' => $_POST['txn_id'],
			'receiver_email' => $_POST['receiver_email'],
			'payer_email' => $_POST['payer_email'],
			'custom' => $_POST['custom'],
		];
		// We need to verify the transaction comes from PayPal and check we've not
		// already processed the transaction before adding the payment to our
		// database.
		if (verifyTransaction($_POST) && checkTxnid($data['txn_id'])) {
			if (addPayment($data) !== false) {
				// Payment successfully added.
			}
		}
	}






?>