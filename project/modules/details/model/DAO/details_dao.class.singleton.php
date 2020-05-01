<?php
class details_dao {
    static $_instance;

    private function __construct() {

    }

    public static function getInstance() {
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }


    public function update_views($db, $id) {
        $sql = "UPDATE products SET views = views + 1 WHERE idproduct='$id'";
        $stmt = $db->ejecutar($sql);
    }

    public function select_product($db, $id) {
        $sql = "SELECT * FROM products WHERE idproduct='$id'";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

}
