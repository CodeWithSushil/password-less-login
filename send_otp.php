<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$con = mysqli_connect('localhost:3306', 'root', 'root', 'otplogin');
$email = $_POST['email'];
$res = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
$count = mysqli_num_rows($res);
if ($count > 0) {
    $otp = rand(11111, 99999);
    mysqli_query($con, "UPDATE users SET otp='$otp' WHERE email='$email'");
$_SESSION['Email']=$email;
    $html = "Your OTP verification code is "."<b>". $otp ."</b>";
    $subject = "OTP Verification";
    require_once('vendor/autoload.php');
    $mail = new PHPMailer(true);
    try {
      //  $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'rahulnand306@gmail.com';
        $mail->Password = 'rjecdltlhrumtwkk';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('rahulnand306@gmail.com', 'Mailer');
        $mail->addAddress($email, "Rahul Nand");
        $mail->isHTML(true);
        $mail->Subject = "$subject";
        $mail->Body = "$html";
        $mail->send();
       // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
 echo "yes";
} else {
    echo "not";
}

?>