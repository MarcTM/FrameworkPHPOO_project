<?php
class home_dao {
    static $_instance;

    private function __construct() {

    }

    public static function getInstance() {
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }


    public function select_carousel($db) {
        $sql = "SELECT * FROM carousel";
        $stmt = $db->ejecutar($sql);
        return $db->listar_arr($stmt);
    }

    public function count_cat($db) {
        $sql = "SELECT COUNT(*) cuenta FROM category";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    public function select_category($db, $offset) {
        $sql = "SELECT * FROM category ORDER BY views DESC LIMIT 4 OFFSET $offset";
        $stmt = $db->ejecutar($sql);
        return $db->listar_arr($stmt);
    }

    public function update_views_cat($db, $cat) {
        $sql = "UPDATE category SET views = views + 1 WHERE id='$cat'";
        $stmt = $db->ejecutar($sql);
    }

    public function count_prods($db) {
        $sql = "SELECT COUNT(*) cuenta FROM products";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    public function select_views($db, $offset) {
        $sql = "SELECT * FROM products ORDER BY views DESC LIMIT 4 OFFSET $offset";
        $stmt = $db->ejecutar($sql);
        return $db->listar_arr($stmt);
    }

}
