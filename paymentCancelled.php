<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
<link rel="stylesheet" href="css/styles.css">
</head>
<body>
<?php
require_once("./loadEnvironmentals.php");
include('connect.php');
$id1 = $_REQUEST['id1'];
$id2 = $_REQUEST['id2'];
// echo $id;

$sql = "UPDATE Payments SET amount = '$id2', payment_status = 'Cancelled' where event_uuid = '$id1';";
$result = $conn->query($sql);
if($result>0){
    
    echo '<script>
            setTimeout(function () { 
                swal({type: "success",title: "Success",text: "Your Payment has been Successfully Cancelled",confirmButtonClass: "btn-success",confirmButtonText: "Ok"},
                function(isConfirm){
                  if (isConfirm) {
                    window.location = "viewTransaction.php";
                  }
                }); }, 1000);
            </script>';
}
// // if(!array_key_exists("logged_in", $_SESSION)|| $_SESSION["logged_in"] == false){
// // 	header("Location: ./login.php");
// // }

// require_once("./php/class.phpmailer.php");

// // https://www.evoluted.net/thinktank/web-development/paypal-php-integration
// // error_reporting(0);

// // send_debug_mail("bayardd2@gmail.com", print_r($_POST, true));


// 	function send_debug_mail($email, $body) {
		
// 		$mail = new PHPMailer;
// 		$mailaddress = $email;
// 		$mail->isSMTP();
// 		$mail->Host = 'smtp.gmail.com';
// 		$mail->SMTPAuth = true;
// 		$mail -> Username = 'noreplytasteofIndia@gmail.com';
// 		$mail -> Password = 'India@2020';
// 		$mail->SMTPSecure = 'tls';
// 		$mail->Port = 587;                                    
// 		$mail->setFrom('noreplytasteofIndia@gmail.com', 'no reply');
// 		$mail->addAddress($mailaddress);
// 		$mail->Subject = 'Taste of India';
// 		$mail->Body = $body;
// 		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
// 		$mail->isHTML(true);
// 		return $mail->send();
// 	}

// 	// send_debug_mail("bayardd2@gmail.com", print_r($_POST, true));

// 	// For test payments we want to enable the sandbox mode. If you want to put live
// 	// payments through then this setting needs changing to `false`.
// 	$enableSandbox = enableSandbox;

// 	// Database settings. Change these for your database configuration.
// 	$dbConfig = [
// 		'host' => dbHost,
// 		'username' => dbUser,
// 		'password' => dbPass,
// 		'name' => dbName
// 	];

// 	// PayPal settings. Change these to your account details and the relevant URLs
// 	// for your site.
// 	$paypalConfig = [
// 		'email' => businessEmail,
// 		'return_url' => absoluteURL . 'viewTransaction.php',
// 		'cancel_url' => absoluteURL . 'paymentCancelled.php',
// 		'notify_url' => absoluteURL .'payments.php'
// 	];

// 	$paypalUrl = $enableSandbox ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';

// 	// Check if paypal request or response
// 	if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])) {

// 		// Grab the post data so that we can set up the query string for PayPal.
// 		// Ideally we'd use a whitelist here to check nothing is being injected into
// 		// our post data.
// 		$response["error"] = "";
// 		$data = [];
// 		foreach ($_POST as $key => $value) {
// 			$data[$key] = stripslashes($value);
// 		}

// 		$data["item_name"] = stripslashes($_POST["item_name"]);
// 		$data["amount"] = stripslashes($_POST["total_cost"]);
// 		$data['custom'] = stripslashes($_POST["unique_id"]);

// 		// Compare amount received with amount calculated
// 		$totalCost = stripslashes($_POST["total_cost"]);
// 		$eventUUID = stripslashes($_POST["unique_id"]);

// 		$expectedAmount = "";

// 		$conn = new mysqli($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['name']);

// 		$sql = "SELECT initial_price FROM Events WHERE event_uuid = ?";
// 		$stmt = $conn->prepare($sql);
//         $stmt->bind_param("s", $eventUUID);
//         $stmt->execute();
//         $stmt->store_result();
//         $stmt->bind_result($expectedAmount);
//         $result = $stmt->fetch();

// 		//Unable to get initial price for event, exit
// 		if($result == false){
// 			$response["error"] = "Unable to fetch event price";
// 			echo(json_encode($response));
// 			exit();
// 		}

// 		// Now, compare the actual calculated cost of the event with the value that was sent from the paypal form submission
// 		if($expectedAmount != $totalCost){
// 			$response["error"] = "Cost does not match expected value";
// 			echo(json_encode($response));
// 			exit();
// 		}

// 		$conn->autocommit(FALSE);
			
// 		// This script will run once before the transaction is sent, use it to upload the initial payment record into the database
// 		$sql = "INSERT INTO Payments (event_id, event_name, first_name, last_name, u_id, event_uuid) VALUES (?,?,?,?,?,?)";
// 		$stmt = $conn->prepare($sql);
// 		$stmt->bind_param("isssis", $data["item_number"], $data["item_name"], $_SESSION["first_name"], $_SESSION["last_name"], $_SESSION["user_id"], $eventUUID);
// 		$isSuccessful = $stmt->execute();

// 		//Probably not necessary
// 		if(!$isSuccessful){
// 			send_debug_mail("bayardd2@gmail.com", "Insert Event failed");
// 			$conn->rollback();
// 		}
// 		else{
// 			$conn->commit();
// 		}

// 		// Set the PayPal account.
// 		$data['business'] = $paypalConfig['email'];

// 		// Set the PayPal return addresses.
// 		$data['return'] = stripslashes($paypalConfig['return_url']);
// 		$data['cancel_return'] = stripslashes($paypalConfig['cancel_url']);
// 		$data['notify_url'] = stripslashes($paypalConfig['notify_url']);

// 		// Set the details about the product being purchased, including the amount
// 		// and currency so that these aren't overridden by the form data.
// 		// $data['item_name'] = $itemName;
// 		// $data['amount'] = $itemAmount;
// 		$data['currency_code'] = 'USD';
		

// 		// send_debug_mail("bayardd2@gmail.com", print_r($data, true));
// 		// Build the query string from the data.
// 		$queryString = http_build_query($data);

// 		// send_debug_mail("bayardd2@gmail.com", "redirecting");
		
// 		// Redirect to paypal IPN
// 		header('location:' . $paypalUrl . '?' . $queryString);
// 		exit();

// 	} else {
// 		// send_debug_mail("bayardd2@gmail.com", print_r($_POST, true));
// 		// Create a connection to the database.
// 		$conn = new mysqli($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['name']);
// 		// Assign posted variables to local data array.
// 		$data = [
// 			'item_name' => $_POST['item_name'],
// 			'item_number' => $_POST['item_number'],
// 			'payment_status' => $_POST['payment_status'],
// 			'payment_amount' => $_POST['mc_gross'],
// 			'payment_currency' => $_POST['mc_currency'],
// 			'txn_id' => $_POST['txn_id'],
// 			'receiver_email' => $_POST['receiver_email'],
// 			'payer_email' => $_POST['payer_email'],
// 			'custom' => $_POST['custom'],
// 		];
// 		send_debug_mail("bayardd2@gmail.com", "test debug 1");
		
// 		// We need to verify the transaction comes from PayPal and check we've not
// 		// already processed the transaction before adding the payment to our
// 		// database.
// 		if (verifyTransaction($_POST) && checkTxnid($data['txn_id'])) {

// 			$errors = [];

// 			// send_debug_mail("bayardd2@gmail.com", "Payment was initiated, response from paypal.");
			
// 			//Two queries, Insert payment and update event
// 			$conn->autocommit(FALSE);

// 			if (addPayment($data, $conn) != false) {

// 				// send_debug_mail("bayardd2@gmail.com", "Transaction Verified");
				
// 				// Update event, set paid to 1
// 				$sql = "UPDATE Events SET is_paid = 1, transaction_id = ? WHERE event_uuid = ?";
// 				// send_debug_mail("bayardd2@gmail.com", "Partway");
// 				$stmt = $conn->prepare($sql);
// 				// send_debug_mail("bayardd2@gmail.com", "Prepared");
// 				$stmt->bind_param("ss", $data["txn_id"] , $data["custom"]);
// 				// send_debug_mail("bayardd2@gmail.com", "ran");
//         		$eventSuccessfullyUpdated = $stmt->execute();

// 				// send_debug_mail("bayardd2@gmail.com", "SQL Ran");

// 				if($eventSuccessfullyUpdated != true){
// 					$errors[] = "Unable to register new event";
// 					send_debug_mail("bayardd2@gmail.com", mysqli_error($conn));
// 				}

// 				// send_debug_mail("bayardd2@gmail.com", "Past SQL Check");

// 				// Add transaction into event price tracker now that it has been verified
// 				$sql = "INSERT INTO Event_Price_Tracker (event_id, event_price) VALUES (?,?)";
//         		$stmt = $conn->prepare($sql);
//        			$stmt->bind_param("ss", $data["item_number"] , $data["payment_amount"]);
// 				$paymentSuccessfullyAdded = $stmt->execute();
				
// 				if($paymentSuccessfullyAdded != true){
// 					$errors[] = "Unable to register new event";
// 				}

// 				//Insert data if all transactions go correctly.
// 				if(count($errors) == 0){
// 					send_debug_mail("bayardd2@gmail.com", "Success");
// 					$conn->commit();
// 				}
// 				else{
// 					send_debug_mail("bayardd2@gmail.com", "Failed");
// 					$conn->rollback();
// 				}

// 				$conn->close();
// 			}
// 		}else{
// 			//Rollback, first query failed.
// 			$conn->rollback();
// 			$conn->close();
// 			send_debug_mail("bayardd2@gmail.com", "Transaction is invalid");
// 		}
// 	}


// 	function verifyTransaction($data) {
// 		global $paypalUrl;
	
// 		$req = 'cmd=_notify-validate';
// 		foreach ($data as $key => $value) {
// 			$value = urlencode(stripslashes($value));
// 			$value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i', '${1}%0D%0A${3}', $value); // IPN fix
// 			$req .= "&$key=$value";
// 		}
	
// 		$ch = curl_init($paypalUrl);
// 		curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
// 		curl_setopt($ch, CURLOPT_POST, 1);
// 		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// 		curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
// 		curl_setopt($ch, CURLOPT_SSLVERSION, 6);
// 		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
// 		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
// 		curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
// 		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
// 		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
// 		$res = curl_exec($ch);
	
// 		if (!$res) {
// 			$errno = curl_errno($ch);
// 			$errstr = curl_error($ch);
// 			curl_close($ch);
// 			throw new Exception("cURL error: [$errno] $errstr");
// 		}
	
// 		$info = curl_getinfo($ch);
	
// 		// Check the http response
// 		$httpCode = $info['http_code'];
// 		if ($httpCode != 200) {
// 			throw new Exception("PayPal responded with http code $httpCode");
// 		}
	
// 		curl_close($ch);
	
// 		return $res === 'VERIFIED';
// 	}

// 	function checkTxnid($txnid) {
// 		global $conn;
	
// 		$txnid = $conn->real_escape_string($txnid);
// 		$results = $conn->query('SELECT * FROM `Payments` WHERE transaction_id = \'' . $txnid . '\'');
	
// 		return ! $results->num_rows;
// 	}

// 	function addPayment($data, &$conn) {
		
// 		// send_debug_mail("bayardd2@gmail.com", print_r($data, true));
// 		// send_debug_mail("bayardd2@gmail.com", $data["payment_amount"]);
	
// 		if (is_array($data)) {
// 			$status = "Success";
// 			try{				
// 				$sql = 'UPDATE Payments SET transaction_id = ?, amount = ?, payment_status = ? WHERE event_uuid = ?';
// 				$stmt = $conn->prepare($sql);
// 				$stmt->bind_param(
// 					'sdss',
// 					$data["txn_id"],
// 					$data["payment_amount"],
// 					$status,
// 					$data["custom"]	
// 				);
// 				$paymentSuccessfullyInserted = $stmt->execute();
				
// 			}
// 			catch(mysqli_sql_exception $e){
// 				send_debug_mail("bayardd2@gmail.com", $e->errorMessage);
// 			}

			

// 			// send_debug_mail("bayardd2@gmail.com", mysqli_error($conn));
// 			// send_debug_mail("bayardd2@gmail.com", "query");
// 			return $paymentSuccessfullyInserted;
// 		}

// 		// send_debug_mail("bayardd2@gmail.com", "not array");
// 		return false;
// 	}



?>
</body>
</html>