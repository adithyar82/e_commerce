<?php
include('connect_db.php');
include("./php/class.phpmailer.php");
if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $email = $_POST['email_address'];
    $phone_number = $_POST['phone_number'];
    $comment = $_POST['comment'];
    $email_address = "harshithaeshwar007@gmail.com"; 
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
                      <h3 align =center>First Name : '.$fname.' </h3>
                      <h3 align =center>Email Address : '.$email_address.' </h3>
                      <h3 align =center>Phone Number : '.$phone_number.' </h3>
                      <h3 align =center>Issue : '.$comment.' </h3>';               
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
}

?>