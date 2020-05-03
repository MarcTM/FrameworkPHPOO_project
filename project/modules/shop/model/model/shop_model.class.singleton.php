<?php
class shop_model {
    private $bll;
    static $_instance;

    private function __construct() {
        $this->bll = shop_bll::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }


    public function maps(){
        return $this->bll->maps();
    }

    public function countnormal(){
        return $this->bll->countnormal();
    }

    public function normalshop(){
        return $this->bll->normalshop();
    }

    public function countcarousel(){
        return $this->bll->countcarousel();
    }

    public function fromcarousel(){
        return $this->bll->fromcarousel();
    }

    public function countcat(){
        return $this->bll->countcat();
    }

    public function fromcat(){
        return $this->bll->fromcat();
    }

    public function countsearchbar(){
        return $this->bll->countsearchbar();
    }

    public function searchbar(){
        return $this->bll->searchbar();
    }

    public function filter(){
        return $this->bll->filter();
    }

}
