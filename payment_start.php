<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paypal Integration Test</title>
</head>
<body>

<?php

$firstName = "test1";
$lastName = "test2";
$email = "test1@odu.edu";
$amount = 7;
$itemName = "dummy item 1";


echo <<<EOD

	<style>
	
	.payment-button {
		width:200px;
		height:100px;
		
	}
	
	</style>


    <form name = "hidden-payment-form" class="paypal" action="payments.php" method="post" id="paypal_form">
        <input type="hidden" name="cmd" value="_xclick" />
        <input type="hidden" name="no_note" value="1" />
        <input type="hidden" name="lc" value="UK" />
        <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
        <input type="hidden" name="first_name" value="$firstName" />
        <input type="hidden" name="last_name" value="$lastName" />
        <input type="hidden" name="payer_email" value="$email" />
        <input type="hidden" name="item_number" value="1" / >
		<input type="hidden" name="item_name" value="$itemName" / >
		<input type="hidden" name="amount" value="$amount" / >
		<input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-medium.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"/>
    </form>

EOD;

?>

</body>
</html>