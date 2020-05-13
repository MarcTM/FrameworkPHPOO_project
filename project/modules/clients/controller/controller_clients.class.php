<?php
	class controller_clients {
	    function __construct() {
	        $_SESSION['module'] = "clients";
	    }

	    function list_clients() {
	    	require_once(VIEW_PATH_INC . "top/top_page_clients.php");
        	require_once(VIEW_PATH_INC . "menu.php");
        	loadView('modules/clients/view/', 'list_clients.html');
			require_once(VIEW_PATH_INC . "footer.html");
			require_once(VIEW_PATH_INC . "bottom_page.html");
	    }

	}