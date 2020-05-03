<?php
	class controller_search {
	    function __construct() {
	        $_SESSION['module'] = "search";
	    }

		
		function prov(){
			$json = loadModel(MODEL_SEARCH, "search_model", "prov");
			echo json_encode($json);
		}

		function firstdrop(){
			$json = loadModel(MODEL_SEARCH, "search_model", "firstdrop");
			echo json_encode($json);
		}

		function autocomplete(){
			$json = loadModel(MODEL_SEARCH, "search_model", "autocomplete");
			echo ($json);
		}


	}