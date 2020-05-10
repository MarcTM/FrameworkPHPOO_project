<?php
	class controller_login{
		function __construct(){
			 $_SESSION['module'] = "login";
		}


		function check_session(){
			if ($_SESSION['user']){
                echo "yes";
                exit();
            }else{
                echo "no";
                exit();
            }
		}

		function list_login(){
			require_once(VIEW_PATH_INC . "top/top_page_home.html");
        	require_once(VIEW_PATH_INC . "menu.php");
        	loadView('modules/login/view/', 'login.php');
			require_once(VIEW_PATH_INC . "footer.html");
			require_once(VIEW_PATH_INC . "bottom_page.html");
		}

		function list_register(){
			require_once(VIEW_PATH_INC . "top/top_page_home.html");
        	require_once(VIEW_PATH_INC . "menu.php");
        	loadView('modules/login/view/', 'register.php');
			require_once(VIEW_PATH_INC . "footer.html");
			require_once(VIEW_PATH_INC . "bottom_page.html");
		}

		function recover_pass(){
			require_once(VIEW_PATH_INC . "top/top_page_home.html");
        	require_once(VIEW_PATH_INC . "menu.php");
        	loadView('modules/login/view/', 'recover.php');
			require_once(VIEW_PATH_INC . "footer.html");
			require_once(VIEW_PATH_INC . "bottom_page.html");
		}

		function send_rec_mail(){
			$result['token'] = loadModel(MODEL_LOGIN, "login_model", "send_rec_mail");
			$result['email'] = $_POST['email'];

			if($result['token']){
				$mail = send_mail_recover($result);
				echo json_encode($mail);
			}else{
				echo json_encode("no");
			}
		}

		function new_pass(){
			if (isset($_GET['param'])) {
				$_SESSION['token'] = $_GET['param'];
			}

			require_once(VIEW_PATH_INC . "top/top_page_home.html");
        	require_once(VIEW_PATH_INC . "menu.php");
        	loadView('modules/login/view/', 'new_pass.php');
			require_once(VIEW_PATH_INC . "footer.html");
			require_once(VIEW_PATH_INC . "bottom_page.html");
		}

		function update_pass(){
			loadModel(MODEL_LOGIN, "login_model", "update_pass");
			unset($_SESSION['token']);
			echo "completed";
		}

		function check_register(){
			$json = loadModel(MODEL_LOGIN, "login_model", "check_register");
			echo json_encode($json);
		}

		function insert_user(){
			$data = json_decode($_POST['data'],true);

			$result['token'] = loadModel(MODEL_LOGIN, "login_model", "insert_user");
			$result['email'] = $data['email'];
			mailgun_alta($result);
		}

		////////////
		// GOOGLE AND GITHUB
		//////////////////////
		function check_user_social(){
			$result = loadModel(MODEL_LOGIN, "login_model", "check_user_social");
			if($result){
				$_SESSION['user'] = $_POST['user'];
				$_SESSION['avatar'] = $_POST['avatar'];
				echo json_encode($result);
			}else{
				echo json_encode("no");
			}
		}

		function insert_user_social(){
			$token = loadModel(MODEL_LOGIN, "login_model", "insert_user_social");
			
			$_SESSION['user'] = $_POST['user'];
			$_SESSION['avatar'] = $_POST['avatar'];

			echo json_encode($token);
		}
		////////////////////
		////////////////////

		function active_user(){
			if (isset($_GET['param'])) {
				loadModel(MODEL_LOGIN, "login_model", "active_user");
			}	
		}	
		
		function validate_login(){
			$result = loadModel(MODEL_LOGIN, "login_model", "validate_login");
			echo json_encode($result);
		}	
	
	}