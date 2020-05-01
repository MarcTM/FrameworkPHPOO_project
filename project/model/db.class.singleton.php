<?php
    class db {
        private $server;
        private $user;
        private $password;
        private $database;
        private $link;
        private $stmt;
        private $array;
        static $_instance;

        private function __construct() {
            $this->setConexion();
            $this->conectar();
        }
        
        private function setConexion() {
            require_once 'Conf.class.singleton.php';
            $conf = Conf::getInstance();
            
            $this->server = $conf->getHostDB();
            $this->database = $conf->getDB();
            $this->user = $conf->getUserDB();
            $this->password = $conf->getPassDB();
        }

        private function __clone() {

        }

        public static function getInstance() {
            if (!(self::$_instance instanceof self))
                self::$_instance = new self();
            return self::$_instance;
        }

        // PDO
        private function conectar() {
            $this->link = new PDO("mysql:host=$this->server;dbname=$this->database", $this->user, $this->password);
            $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        // MYSQLI
        // private function conectar() {
        //     $this->link = new mysqli($this->server, $this->user, $this->password);
        //     $this->link->select_db($this->database);
        // }

        // PDO
        public function ejecutar($sql) {
            $this->stmt = $this->link->prepare($sql);
            $this->stmt->execute();

            return $this->stmt;
        }

        // MYSQLI
        // public function ejecutar($sql) {
        //     $this->stmt = $this->link->query($sql);
        //     return $this->stmt;
        // }
        
        // PDO
        public function listar($stmt) {
            $rdo = $stmt->fetchObject();

            return $rdo;
        }

        public function listar_arr($stmt) {
            $rdo = $stmt->fetchAll();

            $this->array = array();
            foreach ($rdo as $row) {
                array_push($this->array, $row);
            }
            return $this->array;
        }

        // MYSQLI
        // public function listar($stmt) {
        //     $this->array = array();
        //     while ($row = $stmt->fetch_array(MYSQLI_ASSOC)) {
        //         array_push($this->array, $row);
        //     }
        //     return $this->array;
        // }

    }
