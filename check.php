<?php

$con=new mysqli('localhost','root','','vote');
if($con->connect_errno)
{
    echo $con->connect_error;
    die();

}
$gmail=$_GET['email'];

//echo "$gmail";

$sql = "SELECT password FROM register WHERE email='$gmail'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
   //output data of each row
  while($row = $result->fetch_assoc()) {
   //echo  $row["password"]. "<br>";
    
$min=$row['password'];
//echo $min;
}}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
    // code...

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'myrightsmyvote@gmail.com';                     //SMTP username
    $mail->Password   = 'xpyylhtqpcutmfhg';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('myrightsmyvote@gmail.com', 'myvote');
    $mail->addAddress($_GET['email']);     //Add a recipient
   
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'your Password is';
    $mail->Body    = $min;
    $content="my name is billa";
    $mail->AltBody = 'hello world';

    $mail->send();
    echo '<script>alert("your Password has sent to your mail .use to login,after change the password")</script>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
