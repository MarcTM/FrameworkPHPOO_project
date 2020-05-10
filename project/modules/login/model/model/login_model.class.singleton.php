<?php
class login_model {
    private $bll;
    static $_instance;

    private function __construct() {
        $this->bll = login_bll::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }


    public function check_register(){
        return $this->bll->check_register();
    }

    public function insert_user(){
        return $this->bll->insert_user();
    }

    ////////////
	// GOOGLE AND GITHUB
	//////////////////////
    public function check_user_social(){
        return $this->bll->check_user_social();
    }

    public function insert_user_social(){
        return $this->bll->insert_user_social();
    }
    /////////////
    //////////////

    public function active_user(){
        $this->bll->active_user();
    }

    public function validate_login(){
        return $this->bll->validate_login();
    }

    public function send_rec_mail(){
        return $this->bll->send_rec_mail();
    }

    public function update_pass(){
        $this->bll->update_pass();
    }

}