<?php
class details_model {
    private $bll;
    static $_instance;

    private function __construct() {
        $this->bll = details_bll::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }


    public function show_details(){
        return $this->bll->show_details();
    }

}