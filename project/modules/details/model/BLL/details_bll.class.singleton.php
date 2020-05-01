<?php
	class details_bll{
	    private $dao;
	    private $db;
	    static $_instance;

	    private function __construct() {
	        $this->dao = details_dao::getInstance();
	        $this->db = db::getInstance();
	    }

	    public static function getInstance() {
	        if (!(self::$_instance instanceof self)){
	            self::$_instance = new self();
	        }
	        return self::$_instance;
	    }


		public function show_details(){
			$this->dao->update_views($this->db, $_GET['id']);
			return $this->dao->select_product($this->db, $_GET['id']);
		}

	}