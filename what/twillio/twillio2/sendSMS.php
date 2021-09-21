<?php 
 
// Update the path below to your autoload.php, 
// see https://getcomposer.org/doc/01-basic-usage.md 
/*require_once 'vendor/autoload.php'; 
 
use Twilio\Rest\Client; 
 
$sid    = "AC9a899368069a89cf305a8a2152ed5a2d"; 
$token  = "cc2fd3ce5b16c13a3c2f294270495a57"; 
$twilio = new Client($sid, $token); 
 
$message = $twilio->messages 
                  ->create("whatsapp:+573104964755", // to 
                           array( 
                               "from" => "whatsapp:+14155238886",       
                               "body" => "Hello! This is an editable text message. You are free to change it and write whatever you like." 
                           ) 
                  ); 
                  //AOkCtTZoUiNv5a2w7qRYeHz3sKSXuziMHp7xSBVB
print($message->sid);*/




// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require_once 'vendor/autoload.php';

use Twilio\Rest\Client;

// Find your Account SID and Auth Token at twilio.com/console
// and set the environment variables. See http://twil.io/secure
$sid = getenv("AC9a899368069a89cf305a8a2152ed5a2d");
$token = getenv("cc2fd3ce5b16c13a3c2f294270495a57");
$twilio = new Client($sid, $token);

$message = $twilio->messages
                  ->create("whatsapp:+573104964755", // to
                           [
                               "from" => "whatsapp:+14155238886",
                               "body" => "Hello, there!"
                           ]
                  );

print($message->sid);
