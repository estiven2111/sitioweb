<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'shared22.hostgator.co';//smtp.gmail.com 
    $mail->SMTPAuth = true;
    $mail->Username = 'fabricadelfrito@fabricadelfrito.com';//fabric42@shared22.hostgator.co
    $mail->Password = 'E1020441e!';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('fabricadelfrito@fabricadelfrito.com', 'FABRICA DEL FRITO');
    $mail->addAddress('estiven.a.martinez@gmail.com', 'estiven.a.martinez@gmail.com');
    $mail->addCC('concopia@gmail.com');

    $mail->addAttachment('docs/dashboard.png', 'Dashboard.png');

    $mail->isHTML(true);
    $mail->Subject = 'Prueba desde GMAIL';
    $mail->Body = 'Hola, <br/>Esta es una prueba desde <b>Gmail</b>.';
    $mail->send();

    echo 'Correo enviado';
} catch (Exception $e) {
    
}

/*$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->isSMTP();
$mail->Host = 'shared22.hostgator.co';//smtp.gmail.com 
$mail->SMTPAuth = true;
$mail->Username = 'fabric42@shared22.hostgator.co';
$mail->Password = 'E1020441991E';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;*/
