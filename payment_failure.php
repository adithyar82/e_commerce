<html>
<body>
<?php

echo '
	<form id="successform" action="viewTransaction.php" method="post">
		<input type="hidden" name="isPaymentCancelled" value="true" />
		<input type="submit" name="submit" id="submitBtn" />
	</form>
	<script>
		document.getElementById("submitBtn").click();
	</script>
'
?>
<body>
</html>