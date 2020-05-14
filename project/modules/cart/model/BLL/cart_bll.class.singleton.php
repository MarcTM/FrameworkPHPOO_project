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
			return $this->dao->show_prod($this->db, $_POST['token']);
		}

		public function showlocalcart(){
			return $this->dao->show_localprod($this->db, $_GET['id']);
		}

		public function addproduct(){
			$exists = $this->dao->check_prod($this->db, $_POST['id'], $_POST['token']);

			if($exists===false){
				$this->dao->add_prod($this->db, $_POST['id'], $_POST['token']);			
			}else{
				return "exists";
			}
		}

		public function localdb(){
			$product = $this->dao->check_prod($this->db, $_POST['id'], $_POST['token']);

			if ($product===false){
				$this->dao->add_prod($this->db, $_POST['id'], $_POST['token']);
			}
		}

		public function delete(){
			return $this->dao->delete($this->db, $_POST['id'], $_POST['token']);
		}

		public function changequ(){
			return $this->dao->changequ($this->db, $_POST['num'], $_POST['id'], $_POST['token']);
		}

		public function checkout(){
			return $this->dao->checkout($this->db, $_POST['token']);
		}


	}