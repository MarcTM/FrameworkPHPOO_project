<?php
class favorites_model {
    private $bll;
    static $_instance;

    private function __construct() {
        $this->bll = favorites_bll::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }


    public function checkfav(){
        return $this->bll->checkfav();
    }

    public function addfav(){
        return $this->bll->addfav();
    }

    public function delfav(){
        return $this->bll->delfav();
    }
}