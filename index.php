<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
//require 'main-config.php';
require 'local-config.php';

// Create a new PHPMailer instance
$mail = new PHPMailer();

// Enable SMTP debugging (optional)
$mail->SMTPDebug = SMTP::DEBUG_OFF;

// Set the SMTP options
$mail->isSMTP();
$mail->Host = SMTP_HOST;
$mail->Port = SMTP_PORT;
$mail->SMTPAuth = SMTP_AUTH;
$mail->SMTPAutoTLS = SMTP_AUTO_TLS;
$mail->SMTPSecure = SMTP_SECURE;
$mail->Username = SMTP_USERNAME;
$mail->Password = SMTP_PASSWORD;

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email =$_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    // Send email to the default recipient
    $defaultEmail = 'a4medqureshi8@gmail.com';
    $mail->addAddress($defaultEmail, 'Ahmed Raza');
    $mail->Subject = 'Message from Ahmnonymous.netlify.app';
    $mail->Body  = 'Name: ' . $name . "\n";
    $mail->Body .= 'Email: ' . $email . "\n";
    $mail->Body .= 'Subject: ' . $subject . "\n";
    $mail->Body .= 'Message: ' . $message . "\n";
    
    // Send the email to the default recipient
    if ($mail->send()) {
        $messages[] = 'Email sent successfully.';
    } else {
        $messages[] = 'Email not sent successfully.';
    }
}
header("Location: index.html");
exit();  
?>