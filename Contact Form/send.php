<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/PHPMailer.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
                    //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'example.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'your-mail.com';                     //SMTP username
    $mail->Password   = 'your-password';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress('alpham26m@gmail.com');     //Add a recipient
    

    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'QUERIES';
    $mail->Body    = " SENDER NAME: $name <br> SENDER Email: $email<br>MESSAGE: $message";
    

    $mail->send();
    echo '<div style="text-align: center;"><h2 style="font-weight: bold;">Message has been sent!</h2></div>';
}catch (Exception $e) {
    echo '<div style="text-align: center;"><h2 style="font-weight: bold; color: red;">Message could not be sent. Mailer Error: ' . $mail->ErrorInfo . '</h2></div>';
}
}
echo '<div style="text-align: center;"><a href="contact.html"><button style="background-color: crimson; color: white; padding: 10px 20px; border: none; cursor: pointer;">Back</button></a></div>';
