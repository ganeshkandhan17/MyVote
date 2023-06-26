<?php
$con = new mysqli('localhost', 'root', '', 'vote');
if ($con->connect_errno) {
    echo $con->connect_error;
    die();
}

$gmail = $_GET['email'];

$sql = "SELECT password FROM register WHERE email='$gmail'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $min = $row['password'];
    }
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'myrightsmyvote@gmail.com';
    $mail->Password = 'xpyylhtqpcutmfhg';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('myrightsmyvote@gmail.com', 'myvote');
    $mail->addAddress($_GET['email']);

    $mail->isHTML(true);
    $mail->Subject = 'Forgot password';
    $mail->Body =  $min . ' Use this password to login and change the password ' ;
    $content = "my name is billa";
    $mail->AltBody = 'hello world';

    $mail->send();
    echo '<script>alert("Your password has been sent to your email. Please use it to log in and change the password."); window.location.href = "SignIn.html";</script>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
