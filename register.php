<?php
include('connect_db.php');
if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $email_address = $_POST['email_address'];
    $phone_number = $_POST['phone_number'];
    $username = $_POST['username'];
    $password  = md5($_POST['pwd']);
}
$sql = "INSERT INTO Users(fname,email_address,phone_number,username,password) VALUES ('$fname','$email_address','$phone_number','$username','$password')";
// if (($result = $conn->query($sql))!== False){
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

$result = $conn->query($sql);
if ($result->num_rows >= 0) {

    echo '<script>
    alert("Successfully Registered");
    window.location="index.php";
    
    </script>';
    echo "done";
    }
    else if($result->num_rows == 0) {
  
      // echo '<script>
      
      // // 
      
      // </script>';
      echo  '<script>
      alert("Incorrect Credentials");
      window.location="index.php";
      </script>';
      }
?>