<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
include("./php/class.phpmailer.php");
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
    $mail = new PHPMailer;
    $mailaddress = $email_address;                               // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail -> Username = 'noreplytasteofIndia@gmail.com';
    $mail -> Password = 'India@2020';                          // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->setFrom('noreplytasteofIndia@gmail.com', 'no reply');
    $mail->addAddress($mailaddress);     // Add a recipient                                  // Set email format to HTML
    $mail->Subject = 'E Commerce Website';
    $mail->Body    = '<h1 align =center>Dear '.$fname.' Welcome to E Commmerce Portal</h1>
                      <h2 align =center>Your username is '.$username.' Kindly use this for future reference </h2>
                      <h3 aling = left><a href = "http://localhost:8888/shop/category.php"> Login Using Your Credentials';
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
  
  

    echo '<script>
    alert("Successfully Registered");
    window.location="category.php";
    
    </script>';
    echo "done";
    
    }
    else if($result->num_rows == 0) {
  
      // echo '<script>
      
      // // 
      
      // </script>';
      echo  '<script>
      alert("Incorrect Credentials");
      window.location="category.php";
      </script>';
      }
?>