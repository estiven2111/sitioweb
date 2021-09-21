<?php 
 
// Update the path below to your autoload.php, 
// see https://getcomposer.org/doc/01-basic-usage.md 
require_once './what/vendor/autoload.php'; 
 
use Twilio\Rest\Client; 
 
$sid    = "AC87b155a3ab3797391e07b17de934cdb1"; 
$token  = "d2615d8168f76a2df7ae21dce0868076"; 
$twilio = new Client ($sid, $token); 
 
$message = $twilio->messages 
                  ->create("whatsapp:+573104964755", // to 
                           array( 
                               "from" => "whatsapp:+14155238886",       
                               "body" => "Hello! This is an editable text message. You are free to change it and write whatever you like." 
                           ) 
                  ); 
 
print($message->sid);