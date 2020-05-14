<?php
class cart_model {
    private $bll;
    static $_instance;

    private function __construct() {
        $this->bll = cart_bll::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function showcart(){
        return $this->bll->showcart();
    }

    public function showlocalcart(){
        return $this->bll->showlocalcart();
    }

    public function addproduct(){
        return $this->bll->addproduct();
    }

    public function localdb(){
        $this->bll->localdb();
    }

    public function delete(){
        return $this->bll->delete();
    }

    public function changequ(){
        return $this->bll->changequ();
    }

    public function checkout(){
        return $this->bll->checkout();
    }

}