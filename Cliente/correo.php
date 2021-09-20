<?php
session_start();
require "../PHPMailer/src/Exception.php";
require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/SMTP.php";

/*USE PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$oMail = new PHPMailer();
$oMail->isSMTP();
$oMail-> Host = "shared22.hostgator.co";
$oMail-> Port = 587;
$oMail-> SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;;
$oMail-> SMTPAuth = true;
$oMail->Username = "fabric42@shared22.hostgator.co";
$oMail-> Password= "E1020441991E";
$oMail-> setFrom("fabric42@shared22.hostgator.co","FABRICA DEL FRITO");
$oMail-> addAddress("fabricadelfrito@gmail.com");
$oMail->addCC('fabric42@shared22.hostgator.co');
$oMail-> Subject="FACTURA Fabrica Del Frito";
$oMail-> msgHTML($_SESSION['factura']);
//$oMail->send();

if(!$oMail->send()){
 echo $oMail->ErrorInfo;
}*/

$correo = $_SESSION['factura'];
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'shared22.hostgator.co';
    $mail->SMTPAuth = true;
    $mail->Username = 'fabric42@shared22.hostgator.co';
    $mail->Password = 'E1020441991E';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('fabric42@shared22.hostgator.co', 'FABRICA DEL FRITO');
    $mail->addAddress('estiven.a.martinez@gmail.com', 'FACTURA Fabrica Del Frito');
    $mail->addCC('fabric42@shared22.hostgator.co');

    //$mail->addAttachment('docs/dashboard.png', 'Dashboard.png');

    $mail->isHTML(true);
    $mail->Subject = 'Factura Fabrica del frito';
    $mail->Body = $correo;
    $mail->send();

    echo 'Te enviamos tu factura al correo registrado porfavor verifica tu bandeja <br> de entrada o en correos no deseados';
} catch (Exception $e) {
    echo 'A OCURRIDO UN ERROR FAVOR COMUNIQUESE CON TecnoEAM 3104964755';
}
