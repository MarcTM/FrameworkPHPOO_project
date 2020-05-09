<?php
	class controller_services {
	    function __construct() {
	        $_SESSION['module'] = "services";
	    }

	    function list_services() {
	    	require_once(VIEW_PATH_INC . "top/top_page.html");
        	require_once(VIEW_PATH_INC . "menu.php");
        	loadView('modules/services/view/', 'services.html');
			require_once(VIEW_PATH_INC . "footer.html");
			require_once(VIEW_PATH_INC . "bottom_page.html");
	    }

	}