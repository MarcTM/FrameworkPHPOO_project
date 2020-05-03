<?php
	class shop_bll{
	    private $dao;
	    private $db;
	    static $_instance;

	    private function __construct() {
	        $this->dao = shop_dao::getInstance();
	        $this->db = db::getInstance();
	    }

	    public static function getInstance() {
	        if (!(self::$_instance instanceof self)){
	            self::$_instance = new self();
	        }
	        return self::$_instance;
		}
		


		public function maps(){
			return $this->dao->get_maps($this->db);
		}

		public function countnormal(){
			return $this->dao->countnormal($this->db);
		}

		public function normalshop(){
			return $this->dao->select_all_product($this->db, $_GET['offset']);
		}

		public function countcarousel(){
			return $this->dao->countcarousel($this->db, $_GET['name']);
		}

		public function fromcarousel(){
			return $this->dao->select_car($this->db, $_GET['name'], $_GET['offset']);
		}

		public function countcat(){
			return $this->dao->countcat($this->db, $_GET['name']);
		}


		public function fromcat(){
			return $this->dao->select_cat($this->db, $_GET['name'], $_GET['offset']);
		}

		public function countsearchbar(){
			return $this->dao->countsearchbar($this->db, $_GET['province'], $_GET['shop'], $_GET['prod']);
		}

		public function searchbar(){
			return $this->dao->select_search($this->db, $_GET['province'], $_GET['shop'], $_GET['prod'], $_GET['offset']);
		}

		public function filter(){
			return $this->dao->filter($this->db, $_GET['checks'], $_GET['count']);
		}

	}
	