<?php
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
require("vendor/autoload.php");
$mail =new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug =3;
$mail ->SMTPSecure="tls";
$mail ->Port=587;
$mail ->SMTPAuth = true;
$mail->Host="smtp.gmail.com";
$mail->Username="myrightsmyvote@gmail.com" ;
$mail->Password="bzwrdeibuxijbbpq";
$mail->setFrom("myrightsmyvote@gmail.com");
$mail->addAddress("purushothamanjerry03@gmail.com");
$mail->Subject ="I am from your wepsite ";
$mail->Body="Hi friends";
if($mail->send()){
	echo "Mail sent successfully";
}

?>
