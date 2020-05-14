<?php
echo'<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
include('connect_db.php');
include("./php/class.phpmailer.php"); 
$email_address = $_POST['email_address'];
$phone_number = $_POST['phone_number'];
$sql = "SELECT * FROM Users WHERE email_address = '$email_address';";
$result = $conn->query($sql);
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        $fname = $row['fname'];
    }
}
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
    $mail->Subject = 'E Commerce Website';
    $mail->Body    = '<h1 align =center>Dear '.$fname.' Welcome to E Commmerce Portal</h1>
                      <h2 align =center>The following link is to reset your password</h2>
                      <h3 aling = left><a href = "http://localhost:8888/shop/reset_password.php"> Login Using Your Credentials';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail -> isHTML(true);
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo '<script>
        setTimeout(function () { 
            swal({
            title: "Forgot Password",
            text: "Please find the link to reset your password in the mail box<br> E-mail has been sent successfully to your email adderss",
            type: "success",
            confirmButtonText: "OK"
            },
            function(isConfirm){
            if (isConfirm) {
                window.location.href = "forgot_password.php";
            }
            }); }, 1000);
        </script>';
    }
  
?>