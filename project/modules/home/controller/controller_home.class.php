<?php
	class controller_home {
	    function __construct() {
	        $_SESSION['module'] = "home";
	    }

	    function list_home() {
	    	require_once(VIEW_PATH_INC . "top/top_page_home.php");
        	require_once(VIEW_PATH_INC . "menu.php");
        	loadView('modules/home/view/', 'home.html');
			require_once(VIEW_PATH_INC . "footer.html");
			require_once(VIEW_PATH_INC . "bottom_page.html");
		}
		
		function carousel(){
			$json = loadModel(MODEL_HOME, "home_model", "carousel");
			echo json_encode($json);
		}

		function count_cat(){
			$json = loadModel(MODEL_HOME, "home_model", "count_cat");
			echo json_encode($json);
		}

		function category(){
			$json = loadModel(MODEL_HOME, "home_model", "category");
			echo json_encode($json);
		}

		function cat_views(){
			$json = loadModel(MODEL_HOME, "home_model", "cat_views");
			echo json_encode($json);
		}

		function count_prods(){
			$json = loadModel(MODEL_HOME, "home_model", "count_prods");
			echo json_encode($json);
		}

		function views(){
			$json = loadModel(MODEL_HOME, "home_model", "views");
			echo json_encode($json);
		}

	}