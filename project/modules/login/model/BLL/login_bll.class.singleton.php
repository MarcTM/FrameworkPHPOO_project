<?php
	class login_bll{
	    private $dao;
	    private $db;
	    static $_instance;

	    private function __construct() {
	        $this->dao = login_dao::getInstance();
	        $this->db = db::getInstance();
	    }

	    public static function getInstance() {
	        if (!(self::$_instance instanceof self)){
	            self::$_instance = new self();
	        }
	        return self::$_instance;
		}
		

		public function check_register(){
			return $this->dao->check_existing_account($this->db, $_GET['email'], $_GET['user']);
		}

		public function insert_user(){
			$data = json_decode($_POST['data'],true);
			return $this->dao->insert_user($this->db, $data);
		}

		////////////
		// GOOGLE AND GITHUB
		//////////////////////
		public function check_user_social(){
			return $this->dao->check_user_social($this->db, $_POST['iduser']);
		}

		public function insert_user_social(){
			return $this->dao->insert_user_social($this->db, $_POST);
		}
		/////////////
		///////////////

		public function active_user(){
			$this->dao->active_user($this->db, $_GET['param']);
		}

		public function validate_login(){
			$cred = json_decode($_POST['credentials'],true);
			return $this->dao->validate_login($this->db, $cred);
		}

		public function send_rec_mail(){
			return $this->dao->recover_pass($this->db, $_POST['email']);
		}

		public function update_pass(){
			$this->dao->update_pass($this->db, $_SESSION['token'], $_POST['pass']);
		}
		
	}