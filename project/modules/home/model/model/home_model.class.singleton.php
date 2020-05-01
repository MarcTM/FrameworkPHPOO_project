<?php
class home_model {
    private $bll;
    static $_instance;

    private function __construct() {
        $this->bll = home_bll::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }


    public function carousel(){
        return $this->bll->carousel();
    }

    public function count_cat(){
        return $this->bll->count_cat();
    }

    public function category(){
        return $this->bll->category();
    }

    public function cat_views(){
        return $this->bll->cat_views();
    }

    public function count_prods(){
        return $this->bll->count_prods();
    }

    public function views(){
        return $this->bll->views();
    }

}