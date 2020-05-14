<?php
	class controller_cart {
	    function __construct() {
	        $_SESSION['module'] = "cart";
	    }

	    function list_cart() {
	    	require_once(VIEW_PATH_INC . "top/top_page_cart.php");
        	require_once(VIEW_PATH_INC . "menu.php");
        	loadView('modules/cart/view/', 'cart.html');
			require_once(VIEW_PATH_INC . "footer.html");
			require_once(VIEW_PATH_INC . "bottom_page.html");
		}
		

		function showcart(){
			$json = loadModel(MODEL_CART, "cart_model", "showcart");
			echo json_encode($json);
		}

		function showlocalcart(){
			$json = loadModel(MODEL_CART, "cart_model", "showlocalcart");
			echo json_encode($json);
		}

		function addproduct(){
			$json = loadModel(MODEL_CART, "cart_model", "addproduct");
			echo json_encode($json);
		}

		function localdb(){
			loadModel(MODEL_CART, "cart_model", "localdb");
		}

		function delete(){
			$json = loadModel(MODEL_CART, "cart_model", "delete");
			echo json_encode($json);
		}

		function changequ(){
			$json = loadModel(MODEL_CART, "cart_model", "changequ");
			echo json_encode($json);
		}

		function checkout(){
			$json = loadModel(MODEL_CART, "cart_model", "checkout");
			echo json_encode($json);
		}

	}