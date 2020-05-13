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
			return $this->dao->check_fav($this->db, $_POST['token']);
		}

		public function addfav(){
			return $this->dao->add_fav($this->db, $_POST['id'], $_POST['token']);
		}

		public function delfav(){
			return $this->dao->del_fav($this->db, $_POST['id'], $_POST['token']);
		}
	}