<html>
<body>
<?php
require_once("./loadEnvironmentals.php");

$txn_id = $_SESSION['txn_id'];
$_SESSION['txn_id'] = $_POST['txn_id'];
echo '
	<form id="successform" action="viewTransaction.php" method="post">
		<input type="hidden" name="isPaymentSuccessful" value="true" />
		<input type="submit" name="submit" id="submitBtn" />
	</form>
	<script>
		document.getElementById("submitBtn").click();
	</script>
';

?>

<body>
</html>