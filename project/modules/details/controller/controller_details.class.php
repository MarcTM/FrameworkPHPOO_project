<?php
	class controller_details {
	    function __construct() {
	        $_SESSION['module'] = "details";
	    }

	    function list_details() {
	    	require_once(VIEW_PATH_INC . "top/top_page_homepage.html");
        	require_once(VIEW_PATH_INC . "menu/menu_default.php");
        	loadView('modules/home/view/', 'list_home.html');
			require_once(VIEW_PATH_INC . "footer.html");
			require_once(VIEW_PATH_INC . "bottom_page.html");
	    }

	}