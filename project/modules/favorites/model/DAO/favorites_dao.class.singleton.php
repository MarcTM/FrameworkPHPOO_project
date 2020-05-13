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


    public function check_fav($db, $token) {
        $sql = "SELECT email FROM users WHERE token = '$token'";
        $stmt = $db->ejecutar($sql);
        $result = $db->listar_arr($stmt);
        $email = $result[0]['email'];        

        $sql = "SELECT DISTINCT prod FROM favorites WHERE email = '$email'";
        $stmt = $db->ejecutar($sql);
        return $db->listar_arr($stmt);
    }

    public function add_fav($db, $id, $token) {
        $sql = "SELECT email FROM users WHERE token = '$token'";
        $stmt = $db->ejecutar($sql);
        $result = $db->listar_arr($stmt);
        $email = $result[0]['email'];
        
        $sql = "INSERT INTO favorites VALUES ('$email','$id')";
        $db->ejecutar($sql);
    }

    public function del_fav($db, $id, $token) {
        $sql = "SELECT email FROM users WHERE token = '$token'";
        $stmt = $db->ejecutar($sql);
        $result = $db->listar_arr($stmt);
        $email = $result[0]['email'];

        $sql = "DELETE FROM favorites WHERE email = '$email' AND prod = '$id'";
        $db->ejecutar($sql);
    }
}
