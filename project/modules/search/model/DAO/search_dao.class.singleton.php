<?php
class search_dao {
    static $_instance;

    private function __construct() {

    }

    public static function getInstance() {
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }


    public function readProvince($db) {
        $sql = "SELECT DISTINCT city FROM shops ORDER BY city ASC";
        $stmt = $db->ejecutar($sql);
        return $db->listar_arr($stmt);
    }

    public function readShops($db, $province) {
        $sql = "SELECT name FROM shops WHERE city='$province'";
        $stmt = $db->ejecutar($sql);
        return $db->listar_arr($stmt);
    }

    public function autocomplete($db) {
        $val = $_POST['auto'];
        $shop = $_POST['shop'];

        $sql = "SELECT DISTINCT p.* FROM products p, shops s WHERE p.cod_shop = s.cod_shop AND s.name = '$shop' AND p.product LIKE '".$val. "%'";
        $stmt = $db->ejecutar($sql);

        $rdo = $stmt->fetchAll();

        foreach ($rdo as $row) {
            echo 
            '<div class="autoelement">
                <a  class="element" id="'.$row['product'].'">'.utf8_encode($row['product']).'</a>
            </div>';
        }
    }

}
