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
			$decodetoken = json_decode(decode_token($_POST['token']))->name;
			return $this->dao->show_prod($this->db, $decodetoken);
		}

		public function showlocalcart(){
			return $this->dao->show_localprod($this->db, $_GET['id']);
		}

		public function addproduct(){
			$decodetoken = json_decode(decode_token($_POST['token']))->name;
			$exists = $this->dao->check_prod($this->db, $_POST['id'], $decodetoken);

			if($exists===false){
				$this->dao->add_prod($this->db, $_POST['id'], $decodetoken);			
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
			$decodetoken = json_decode(decode_token($_POST['token']))->name;
			return $this->dao->delete($this->db, $_POST['id'], $decodetoken);
		}

		public function changequ(){
			$decodetoken = json_decode(decode_token($_POST['token']))->name;
			return $this->dao->changequ($this->db, $_POST['num'], $_POST['id'], $decodetoken);
		}

		public function checkout(){
			$decodetoken = json_decode(decode_token($_POST['token']))->name;
			return $this->dao->checkout($this->db, $decodetoken);
		}


	}