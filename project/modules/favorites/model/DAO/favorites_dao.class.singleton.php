<?php
class favorites_dao {
    static $_instance;

    private function __construct() {

    }

    public static function getInstance() {
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }


    public function check_fav($db) {
        $email = $_SESSION['email'];

        $sql = "SELECT DISTINCT prod FROM favorites WHERE email = '$email'";
        $stmt = $db->ejecutar($sql);
        return $db->listar_arr($stmt);
    }
}
