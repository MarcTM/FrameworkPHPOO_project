<?php
	class controller_shop {
	    function __construct() {
	        $_SESSION['module'] = "shop";
	    }

	    function list_shop() {
	    	require_once(VIEW_PATH_INC . "top/top_page_shop.html");
        	require_once(VIEW_PATH_INC . "menu/menu_default.php");
        	loadView('modules/shop/view/', 'shop.html');
			require_once(VIEW_PATH_INC . "footer.html");
			require_once(VIEW_PATH_INC . "bottom_page.html");
	    }

	}