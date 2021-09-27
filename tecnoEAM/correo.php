<?php
$nombre = (isset($_POST['Nombre']))?$_POST['Nombre']:"";
$email=(isset($_POST['Email']))?$_POST['Email']:"";
$telefono= (isset($_POST['Telefono']))?$_POST['Telefono']:"";
$mensaje=(isset($_POST['Mensaje']))?$_POST['Mensaje']:"";

require "../PHPMailer/src/Exception.php";
require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/SMTP.php";


$correo = "Hola me llamo $nombre y mi telefono es $telefono \n mi correo es $email \n $mensaje";


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

    $mail->setFrom('fabric42@shared22.hostgator.co', 'INFORMACION TECNOEAM ');
    $mail->addAddress('tecnoeam2021@gmail.com'," HOLA SOY $nombre");
    //$mail->addCC('fabric42@shared22.hostgator.co');

    //$mail->addAttachment('docs/dashboard.png', 'Dashboard.png');
 
   
    $mail->isHTML(true);
    $mail->Subject = 'INTERES DE CLLIENTE EN FABRICA DEL FRITO';
    $mail->body =$correo;
    $mail->send();

    $_SESSION['mail'] = 'MENSAJE ENVIADO CON EXITO A LA FABRICA DEL FRITO NOS PONDREMOS EN CONTACTO ';
    header('Location: tecnoEAM.php?env=ok');
} catch (Exception $e) {
    header('Location: tecnoEAM.php?env=nok');
    
}



?>  


