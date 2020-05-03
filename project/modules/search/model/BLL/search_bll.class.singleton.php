<?php
	class search_bll{
	    private $dao;
	    private $db;
	    static $_instance;

	    private function __construct() {
	        $this->dao = search_dao::getInstance();
	        $this->db = db::getInstance();
	    }

	    public static function getInstance() {
	        if (!(self::$_instance instanceof self)){
	            self::$_instance = new self();
	        }
	        return self::$_instance;
	    }


		public function prov(){
			return $this->dao->readProvince($this->db);
		}

		public function firstdrop(){
			return $this->dao->readShops($this->db, $_GET['prov']);
		}

		public function autocomplete(){
			return $this->dao->autocomplete($this->db);
		}

	}