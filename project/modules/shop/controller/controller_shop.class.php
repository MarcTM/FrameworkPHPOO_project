<?php
	class controller_shop {
	    function __construct() {
	        $_SESSION['module'] = "shop";
	    }

	    function list_shop() {
	    	require_once(VIEW_PATH_INC . "top/top_page_shop.php");
        	require_once(VIEW_PATH_INC . "menu.php");
        	loadView('modules/shop/view/', 'shop.html');
			require_once(VIEW_PATH_INC . "footer.html");
			require_once(VIEW_PATH_INC . "bottom_page.html");
		}

		function maps(){
			$json = loadModel(MODEL_SHOP, "shop_model", "maps");
			echo json_encode($json);
		}

		function countnormal(){
			$json = loadModel(MODEL_SHOP, "shop_model", "countnormal");
			echo json_encode($json);
		}

		function normalshop(){
			$json = loadModel(MODEL_SHOP, "shop_model", "normalshop");
			echo json_encode($json);
		}
		
		function countcarousel(){
			$json = loadModel(MODEL_SHOP, "shop_model", "countcarousel");
			echo json_encode($json);
		}

		function fromcarousel(){
			$json = loadModel(MODEL_SHOP, "shop_model", "fromcarousel");
			echo json_encode($json);
		}

		function countcat(){
			$json = loadModel(MODEL_SHOP, "shop_model", "countcat");
			echo json_encode($json);
		}

		function fromcat(){
			$json = loadModel(MODEL_SHOP, "shop_model", "fromcat");
			echo json_encode($json);
		}

		function countsearchbar(){
			$json = loadModel(MODEL_SHOP, "shop_model", "countsearchbar");
			echo json_encode($json);
		}

		function searchbar(){
			$json = loadModel(MODEL_SHOP, "shop_model", "searchbar");
			echo json_encode($json);
		}

		function filter(){
			$json = loadModel(MODEL_SHOP, "shop_model", "filter");
			echo json_encode($json);
		}

	}