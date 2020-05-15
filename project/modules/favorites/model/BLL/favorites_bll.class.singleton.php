<?php
	class favorites_bll{
	    private $dao;
	    private $db;
	    static $_instance;

	    private function __construct() {
	        $this->dao = favorites_dao::getInstance();
	        $this->db = db::getInstance();
	    }

	    public static function getInstance() {
	        if (!(self::$_instance instanceof self)){
	            self::$_instance = new self();
	        }
	        return self::$_instance;
	    }


		public function checkfav(){
			$decodetoken = json_decode(decode_token($_POST['token']))->name;
			return $this->dao->check_fav($this->db, $decodetoken);
		}

		public function addfav(){
			$decodetoken = json_decode(decode_token($_POST['token']))->name;
			return $this->dao->add_fav($this->db, $_POST['id'], $decodetoken);
		}

		public function delfav(){
			$decodetoken = json_decode(decode_token($_POST['token']))->name;
			return $this->dao->del_fav($this->db, $_POST['id'], $decodetoken);
		}
	}