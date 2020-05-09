<?php

$path = $_SERVER['DOCUMENT_ROOT'] . '/FrameworkPHP_Marc/project/';
include($path . "resources/apikeys/apikeys_mailgun.php");

// SEND MAILGUN
function send_mailgun($arr){
    $apikey = mailgun::apikey_mailgun();
    $apiurl = mailgun::apibase_url();
        
    $config = array();
    $config['api_key'] = $apikey; //API Key
    $config['api_url'] = $apiurl; //API Base URL

   $message = array();
   $message['from'] = $arr['inputEmail'];
   $message['to'] =  "marctorresmartinez2@gmail.com";
   $message['h:Reply-To'] = $arr['inputName'];
   $message['subject'] = $arr['inputSubject'];
   $message['html'] = $arr['inputMessage'];

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $config['api_url']);
   curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
   curl_setopt($ch, CURLOPT_USERPWD, "api:{$config['api_key']}");
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
   curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
   curl_setopt($ch, CURLOPT_POST, true);
   curl_setopt($ch, CURLOPT_POSTFIELDS,$message);
   $result = curl_exec($ch);
   curl_close($ch);
 }



 function mailgun_alta($arr){
  $apikey = mailgun::apikey_mailgun();
  $apiurl = mailgun::apibase_url();
  $ruta = "<a href='" . amigable("?module=login&function=active_user&param=" . $arr['token'], true) . "'>aqu&iacute;</a>";

  $config = array();
  $config['api_key'] = $apikey; //API Key
  $config['api_url'] = $apiurl; //API Base URL

 $message = array();
 $message['from'] = "marctorresmartinez2@gmail.com";
 $message['to'] =  $arr['email'];
 $message['h:Reply-To'] = "Marc";
 $message['subject'] = "Darse de alta";
 $message['html'] = 'Gracias por unirte a nuestra aplicaci&oacute;n<br> Para finalizar el registro, pulsa ' . $ruta;

 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $config['api_url']);
 curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
 curl_setopt($ch, CURLOPT_USERPWD, "api:{$config['api_key']}");
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
 curl_setopt($ch, CURLOPT_POST, true);
 curl_setopt($ch, CURLOPT_POSTFIELDS,$message);
 $result = curl_exec($ch);
 curl_close($ch);
}

function send_mail_recover($arr){
  $apikey = mailgun::apikey_mailgun();
  $apiurl = mailgun::apibase_url();
  $ruta = '<a href="' . amigable("?module=login&function=new_pass&param=" . $arr['token'], true) . '">aqu&iacute;</a>';

  $config = array();
  $config['api_key'] = $apikey; //API Key
  $config['api_url'] = $apiurl; //API Base URL

 $message = array();
 $message['from'] = "marctorresmartinez2@gmail.com";
 $message['to'] =  $arr['email'];
 $message['h:Reply-To'] = "Marc";
 $message['subject'] = "RECOVER PASSWORD";
 $message['html'] = 'Para recuperar tu contraseña, pulsa ' . $ruta;

 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $config['api_url']);
 curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
 curl_setopt($ch, CURLOPT_USERPWD, "api:{$config['api_key']}");
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
 curl_setopt($ch, CURLOPT_POST, true);
 curl_setopt($ch, CURLOPT_POSTFIELDS,$message);
 $result = curl_exec($ch);
 curl_close($ch);
 return $result;
}
