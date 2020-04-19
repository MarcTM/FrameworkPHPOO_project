<?php
	$path = $_SERVER['DOCUMENT_ROOT'] . '/FrameworkPHP_Marc/test_email_mailgun/';
    include($path . "apikeys/apikeys_mailgun.php");
    
    function send_mailgun($email){
		$apikey = mailgun::apikey_mailgun();
		$apiurl = mailgun::apibase_url();

    	$config = array();
    	$config['api_key'] = $apikey; //API Key
    	$config['api_url'] = $apiurl; //API Base URL

    	$message = array();
    	$message['from'] = "prueba@gmail.com";
    	$message['to'] = $email;
    	$message['h:Reply-To'] = "prueba@gmail.com";
    	$message['subject'] = "Hello, this is a test";
    	$message['html'] = 'Hello ' . $email . ',</br></br> This is a test';
     
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
    
    $json = send_mailgun('marctorresmartinez2@gmail.com');
	print_r($json);
?>