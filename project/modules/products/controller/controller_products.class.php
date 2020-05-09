<?php
	class controller_products {
	    function __construct() {
	        $_SESSION['module'] = "products";
	    }

	    function list_product() {
	    	require_once(VIEW_PATH_INC . "top/top_page_products.html");
        	require_once(VIEW_PATH_INC . "menu.php");
        	loadView('modules/products/view/', 'list_products.html');
			require_once(VIEW_PATH_INC . "footer.html");
			require_once(VIEW_PATH_INC . "bottom_page.html");
	    }

	}