<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
  <script src="https://unpkg.com/jquery-input-mask-phone-number@1.0.11/dist/jquery-input-mask-phone-number.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/styles.css">
 
</head>
<body>
<div class="container">
<!-- <div id="jsGridVendor" style="margin : auto"></div> -->
<?php
// require_once("./loadEnvironmentals.php");

// echo $uname;
include('connect_db.php');
// echo $user_id;
$sql = "SELECT  * FROM payment";
$result = $conn->query($sql);
echo "<div class='w3-container table-responsive'>
      <table class = 'w3-table-all table table-bordered table-sm' id='dtBasicExample'>
      <thead><tr><th class='th-sm'>Order Id </th><th class='th-sm'>Product Name</th><th class='th-sm'>Transaction Id</th><th class='th-sm'>Total Cost</th><th class='th-sm'> Name</th><th class='th-sm'>Payment Status</th><th class='th-sm'></th></tr></thead><tbody>";
      if ($result->num_rows >= 0) {
        while($row = $result->fetch_assoc()) {
                    echo "<tr><td>{$row['order_id']}</td><td>{$row['product_name']}</td><td>{$row['transaction_id']}</td><td>{$row['final_cost']}</td><td>{$row['fname']}</td><td>{$row['status']}</td><td></td></tr>"; 
        }
    }
            echo "</tbody></table>
                </div>";
?>
</div>
  <!-- JavaScript libs are placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      $('#dtBasicExample').DataTable({
        "searching": true
      });
      $('.dataTables_length').addClass('bs-select');
    });
  </script> 
</body>
</html>
