<?php
class cart_dao {
    static $_instance;

    private function __construct() {

    }

    public static function getInstance() {
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }


    public function show_prod($db, $token) {
        $sql = "SELECT email FROM users WHERE token = '$token'";
        $stmt = $db->ejecutar($sql);
        $result = $db->listar_arr($stmt);
        $email = $result[0]['email'];

        $sql = "SELECT c.email, c.idproduct, p.product, p.flavour, p.brand, p.kg, p.datecaducity, p.img, p.price, c.quantity, (c.quantity * p.price) total FROM cart c, products p WHERE c.idproduct = p.idproduct AND email = '$email'";
        $stmt = $db->ejecutar($sql);
        return $db->listar_arr($stmt);
    }

    public function show_localprod($db, $id) {
        $sql = "SELECT p.idproduct, p.product, p.flavour, p.brand, p.kg, p.datecaducity, p.img, p.price FROM products p WHERE p.idproduct = '$id'";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    public function check_prod($db, $id, $token) {
        $sql = "SELECT email FROM users WHERE token = '$token'";
        $stmt = $db->ejecutar($sql);
        $result = $db->listar_arr($stmt);
        $email = $result[0]['email'];

        $sql = "SELECT * FROM cart WHERE email = '$email' AND idproduct = '$id'";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    public function add_prod($db, $id, $token) {
        $sql = "SELECT email FROM users WHERE token = '$token'";
        $stmt = $db->ejecutar($sql);
        $result = $db->listar_arr($stmt);
        $email = $result[0]['email'];

        $sql = "INSERT INTO cart VALUES ('$email','$id','1')";
        $db->ejecutar($sql);
    }

    public function delete($db, $id, $token) {
        $sql = "SELECT email FROM users WHERE token = '$token'";
        $stmt = $db->ejecutar($sql);
        $result = $db->listar_arr($stmt);
        $email = $result[0]['email'];

        $sql = "DELETE FROM cart WHERE email = '$email' AND idproduct = '$id'";
        $db->ejecutar($sql);
    }

    public function changequ($db, $num, $id, $token) {
        $sql = "SELECT email FROM users WHERE token = '$token'";
        $stmt = $db->ejecutar($sql);
        $result = $db->listar_arr($stmt);
        $email = $result[0]['email'];

		$sql = "UPDATE cart SET quantity = $num WHERE email = '$email' AND idproduct = '$id'";
        $db->ejecutar($sql);
    }

    public function checkout($db, $token) {
        $sql = "SELECT email FROM users WHERE token = '$token'";
        $stmt = $db->ejecutar($sql);
        $result = $db->listar_arr($stmt);
        $email = $result[0]['email'];

        $sql1 = "INSERT INTO checkout SELECT * FROM cart c, (SELECT NOW() day) day WHERE c.email='$email'";
        $db->ejecutar($sql1);

        $sql2 = "DELETE FROM cart WHERE email = '$email'";
        $db->ejecutar($sql2);
    }

}
