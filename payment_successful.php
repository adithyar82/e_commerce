<html>
<body>
<?php
// require_once("./loadEnvironmentals.php");
$order_id = $_REQUEST['id'];
$txn_id = $_SESSION['txn_id'];
$_SESSION['txn_id'] = $_POST['txn_id'];
echo '
	<form id="successform" action="T_status_success.php" method="post">
		<input type="hidden" name="isPaymentSuccessful" value="true" />
		<input type="hidden" name="order_id" value="'.$order_id.'" />
		<input type="submit" name="submit" id="submitBtn" />
	</form>
	<script>
		document.getElementById("submitBtn").click();
	</script>
';

?>

<body>
</html>