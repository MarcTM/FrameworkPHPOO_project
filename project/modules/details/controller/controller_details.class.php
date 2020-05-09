<?php
	class controller_details {
	    function __construct() {
	        $_SESSION['module'] = "details";
	    }

	    function list_details() {
	    	require_once(VIEW_PATH_INC . "top/top_page_details.html");
        	require_once(VIEW_PATH_INC . "menu.php");
        	loadView('modules/details/view/', 'details.html');
			require_once(VIEW_PATH_INC . "footer.html");
			require_once(VIEW_PATH_INC . "bottom_page.html");
		}
		
		function show_details() {
			$json = loadModel(MODEL_DETAILS, "details_model", "show_details");
			echo json_encode($json);
	    }

	}