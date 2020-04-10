<?php
include('connect_db.php');
include("./php/class.phpmailer.php"); 
$email_address = $_POST['email_address'];
$phone_number = $_POST['phone_number'];
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
                      <h2 align =center>This is to inform you that your password has been reset</h2>
                      <h3 aling = left><a href = "http://localhost:8888/shop/reset_password.php"> Login Using Your Credentials';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail -> isHTML(true);
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo'<script>
        alert("Email has been sent successfully");
        window.location= "index.php";
        </script>';
    }
  
?>