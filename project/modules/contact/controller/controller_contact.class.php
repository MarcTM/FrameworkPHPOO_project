<?php
	class controller_contact {
	    function __construct() {
	        $_SESSION['module'] = "contact";
	    }

	    function list_contact() {
	    	require_once(VIEW_PATH_INC . "top/top_page_contact.html");
        	require_once(VIEW_PATH_INC . "menu.php");
        	loadView('modules/contact/view/', 'contact.html');
			require_once(VIEW_PATH_INC . "footer.html");
			require_once(VIEW_PATH_INC . "bottom_page.html");
		}
		

		// MAILGUN (CONTACT LIST)
		function send_email(){
			$data_mail = array();
			$data_mail = json_decode($_POST['fin_data'],true);
			$arrArgument = array(
				'inputName' => $data_mail['cname'],
				'inputEmail' => $data_mail['cemail'],
				'inputSubject' => $data_mail['matter'],
				'inputMessage' => $data_mail['message']
			);
			
			send_mailgun($arrArgument);
		}

	}