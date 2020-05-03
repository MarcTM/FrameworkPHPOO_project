<?php
class search_model {
    private $bll;
    static $_instance;

    private function __construct() {
        $this->bll = search_bll::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

   
    public function prov(){
        return $this->bll->prov();
    }

    public function firstdrop(){
        return $this->bll->firstdrop();
    }

    public function autocomplete(){
        return $this->bll->autocomplete();
    }

}