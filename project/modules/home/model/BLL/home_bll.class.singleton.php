<?php
	class home_bll{
	    private $dao;
	    private $db;
	    static $_instance;

	    private function __construct() {
	        $this->dao = home_dao::getInstance();
	        $this->db = db::getInstance();
	    }

	    public static function getInstance() {
	        if (!(self::$_instance instanceof self)){
	            self::$_instance = new self();
	        }
	        return self::$_instance;
	    }


		public function carousel(){
			return $this->dao->select_carousel($this->db);
		}

		public function count_cat(){
			return $this->dao->count_cat($this->db);
		}

		public function category(){
			return $this->dao->select_category($this->db, $_GET['offset']);
		}

		public function cat_views(){
			return $this->dao->update_views_cat($this->db, $_GET['cat']);
		}

		public function count_prods(){
			return $this->dao->count_prods($this->db);
		}

		public function views(){
			return $this->dao->select_views($this->db, $_GET['offset']);
		}

}