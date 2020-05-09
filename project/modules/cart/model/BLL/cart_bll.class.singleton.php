<?php
	class cart_bll{
	    private $dao;
	    private $db;
	    static $_instance;

	    private function __construct() {
	        $this->dao = cart_dao::getInstance();
	        $this->db = db::getInstance();
	    }

	    public static function getInstance() {
	        if (!(self::$_instance instanceof self)){
	            self::$_instance = new self();
	        }
	        return self::$_instance;
		}
		
		public function showcart(){
			return $this->dao->show_prod($this->db);
		}

		public function showlocalcart(){
			return $this->dao->show_localprod($this->db, $_GET['id']);
		}

		public function localdb(){
			$product = $this->dao->check_prod($this->db, $_GET['id']);

			if (!$product){
				$this->dao->add_prod($this->db, $_GET['id']);
				return ("not exists");
			}else{
				return $product;
			}
		}

		public function delete(){
			return $this->dao->delete($this->db, $_GET['id']);
		}

		public function changequ(){
			return $this->dao->changequ($this->db, $_GET['num'], $_GET['id']);
		}

		public function checkout(){
			return $this->dao->checkout($this->db);
		}


	}