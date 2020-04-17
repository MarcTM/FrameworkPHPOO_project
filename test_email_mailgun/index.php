<?php
    // https://github.com/mailgun/mailgun-php
    // Authorized Recipients -> afegir a 'yomogan@gmail.com'
    
    function send_mailgun($email){
    	$config = array();
    	$config['api_key'] = "key-3986fd9a1377d005b3db7eef3029fa4c"; //API Key
    	$config['api_url'] = "https://api.mailgun.net/v3/sandboxaec7a85de70542f19d1d00a77af035d2.mailgun.org"; //API Base URL

    	$message = array();
    	$message['from'] = "marctorresmartinez@gmail.com";
    	$message['to'] = $email;
    	$message['h:Reply-To'] = "marctorresmartinez@gmail.com";
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