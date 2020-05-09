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


    // public function data_social($arrArgument){
    //     return $this->bll->data_social_BLL($arrArgument);
    // }
    // public function rid_social($arrArgument){
    //     return $this->bll->rid_social_BLL($arrArgument);
    // }
    // public function exist_user($arrArgument){
    //     return $this->bll->exist_user_BLL($arrArgument);
    // }
    // public function type_user($arrArgument){
    //     return $this->bll->type_user_BLL($arrArgument);
    // }
    // public function print_user($arrArgument){
    //     return $this->bll->print_user_BLL($arrArgument);
    // }
    // public function update_user($arrArgument){
    //     return $this->bll->update_user_BLL($arrArgument);
    // }
    // public function get_mail_to($arrArgument){
    //     return $this->bll->get_mail_to_BLL($arrArgument);
    // }
    // public function update_passwd($arrArgument){
    //     return $this->bll->update_passwd_BLL($arrArgument);
    // }
    // public function modify_avatar($arrArgument){
    //     return $this->bll->modify_avatar_BLL($arrArgument);
    // }
    // public function print_dog($arrArgument){
    //     return $this->bll->print_dog_BLL($arrArgument);
    // }
    // public function print_adoption($arrArgument){
    //     return $this->bll->print_adoption_BLL($arrArgument);
    // }
    // public function conceal_dog($arrArgument){
    //     return $this->bll->conceal_dog_BLL($arrArgument);
    // }
    // public function visible_dog($arrArgument){
    //     return $this->bll->visible_dog_BLL($arrArgument);
    // }
}