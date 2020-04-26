<?php
	class controller_cart {
	    function __construct() {
	        $_SESSION['module'] = "cart";
	    }

	    function list_cart() {
	    	require_once(VIEW_PATH_INC . "top/top_page_cart.html");
        	require_once(VIEW_PATH_INC . "menu/menu_default.php");
        	loadView('modules/cart/view/', 'cart.html');
			require_once(VIEW_PATH_INC . "footer.html");
			require_once(VIEW_PATH_INC . "bottom_page.html");
	    }

	}