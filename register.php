<?php
include('connect_db.php');
include("./php/class.phpmailer.php");  
if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $email_address = $_POST['email_address'];
    $phone_number = $_POST['phone_number'];
    $username = $_POST['username'];
    $password  = md5($_POST['pwd']);
    $arr1 = rand(1000000,9999999);
    $referral_code = $username.$arr1;
    $role = "user";
}
$sql_1 = "SELECT * FROM Users where email_address = '$email_address';";
$registration_status = 0;
$result_1 = $conn->query($sql_1);
if($result_1->num_rows>0){
    echo '<script>
    alert("Email address has already been Registered")
    window.location = "index.php";
    </script>';
}
else{
$sql = "INSERT INTO Users(user_id,fname,email_address,phone_number,username,password,referral_code,role) VALUES (Null, '$fname','$email_address','$phone_number','$username','$password','$referral_code','$role')";
// if (($result = $conn->query($sql))!== False){
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }
function my_simple_crypt( $string, $action = 'e' ) {
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
$email = my_simple_crypt($email_address,'e');
$registration_status = 1;
$result = $conn->query($sql);
if ($result->num_rows >= 0) {
    $mail = new PHPMailer;
    $mailaddress = $email_address;                               // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail -> Username = 'contact.azeempatel@gmail.com';
    $mail -> Password = 'AzeemPatel46#';                          // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->setFrom('contact.azeempatel@gmail.com', 'no reply');
    $mail->addAddress($mailaddress);     // Add a recipient                                  // Set email format to HTML
    $mail->Subject = 'Loket.in-E Commerce Website';
    $mail->Body    = '<h2 align =center>loket.in</h2>
                      <h3 align =center>Dear '.$fname.' Welcome to Loket E Commerce Website </h3>
                      <h4 align =center>Your email address is '.$email_address.', kindly use this for sigining in into the website.</h4>
                      <h5 align =center><a href = "http://localhost:8888/shop/category.php?id1='.$registration_status.'&id2='.$email.'"> Login Using Your Credentials</h5>
                      <h5 align =right>Help ?</h5>';               
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
      window.location="category.php";
      </script>';
      }
    }
?>