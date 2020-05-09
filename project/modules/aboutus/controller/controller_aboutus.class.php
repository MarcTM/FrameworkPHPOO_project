<?php
	class controller_aboutus {
	    function __construct() {
	        $_SESSION['module'] = "aboutus";
	    }

	    function list_aboutus() {
	    	require_once(VIEW_PATH_INC . "top/top_page.html");
        	require_once(VIEW_PATH_INC . "menu.php");
        	loadView('modules/aboutus/view/', 'aboutus.html');
			require_once(VIEW_PATH_INC . "footer.html");
			require_once(VIEW_PATH_INC . "bottom_page.html");
	    }

	}