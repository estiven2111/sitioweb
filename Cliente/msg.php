<?php 
 

// php twillio envio sms

//// Update the path below to your autoload.php, 
//// see https://getcomposer.org/doc/01-basic-usage.md 
//require_once '/path/to/vendor/autoload.php'; 
// 
//use Twilio\Rest\Client; 
// 
//$sid    = "AC87b155a3ab3797391e07b17de934cdb1"; 
//$token  = "[AuthToken]"; 
//$twilio = new Client($sid, $token); 
// 
//$message = $twilio->messages 
//                  ->create("+573104964755", // to 
//                           array(  
//                               "messagingServiceSid" => "MG82bef1e137869d61138462365dc56109",      
//                               "body" => "HOLA GRACIAS POR SU PEDIDO" 
//                           ) 
//                  ); 
// 
//print($message->sid);


// envio correo a gmail por php

//require 'PHPMailer/Exception.php';
//require 'PHPMailer/PHPMailer.php';
//require 'PHPMailer/SMTP.php';
//
//
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
// 
//$oMail= new PHPMailer();
//$oMail->isSMTP();
//$oMail->Host="smtp.gmail.com";
//$oMail->Port=587;
//$oMail->SMTPSecure="tls";
//$oMail->SMTPAuth=true;
//$oMail->Username="estiven.a.martinez@gmail.com";
//$oMail->Password="E1020441991E";
//$oMail->setFrom("estiven.a.martinez@gmail.com","Pepito el que pica papas");
//$oMail->addAddress("estiven.a.martinez@outlook.com","Pepito2");
//$oMail->Subject="Hola pepe el que pica";
//$oMail->msgHTML("Hola soy un mensaje");
// 
//if(!$oMail->send())
//  echo $oMail->ErrorInfo; 





error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_STRICT);

require_once "Mail.php";

$host = "smtp.gmail.com";
$username = "estiven.a.martinez@gmail.com";
$password = "E1020441991E";
$port = "587";
$to = "estiven.a.martinez@outlook.com";
$email_from = "estiven.a.martinez@gmail.com";
$email_subject = "Línea de asunto aquí:";
$email_body = "Lo que tu quieras";
$email_address = "responder-a@example.com";

$headers = array ('From' => $email_from, 'To' => $to, 'Subject' => $email_subject, 'Reply-To' => $email_address);
$smtp = Mail::factory('smtp', array ('host' => $host, 'port' => $port, 'auth' => true, 'username' => $username, 'password' => $password));
$mail = $smtp->send($to, $headers, $email_body);


if (PEAR::isError($mail)) {
echo("<p>" . $mail->getMessage() . "</p>");
} else {
echo("<p>Message successfully sent!</p>");





