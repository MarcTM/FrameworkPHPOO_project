<?php
    class login_dao {
        static $_instance;

        private function __construct() {

        }

        public static function getInstance() {
            if(!(self::$_instance instanceof self)){
                self::$_instance = new self();
            }
            return self::$_instance;
        }


        public function check_existing_account($db, $email, $user) {
            $sql = "SELECT * FROM users WHERE email = '$email' AND user = '$user' AND password != ''";
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }

        public function insert_user($db, $data) {
            $user = $data['user'];
            $email = $data['email'];
            $password = password_hash($data['pass'], PASSWORD_DEFAULT);
            // $token = md5(uniqid(rand(),true));
            $token = bin2hex(openssl_random_pseudo_bytes(20));
            $avatar = 'view/assets/img/avatars/default.jpg';

            $sql = "INSERT INTO users(IDuser,user,email,password,type,avatar,activate,token) VALUES('$user','$user','$email','$password','user','$avatar',0,'$token')";
            $db->ejecutar($sql);
            return $token;
        }

        ////////////
		// GOOGLE AND GITHUB
		//////////////////////
        public function check_user_social($db, $id) {
            $sql = "SELECT * FROM users WHERE IDuser = '$id'";
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }

        public function insert_user_social($db, $data) {
            $iduser = $data['iduser'];
            $user = $data['user'];
            $email = $data['email'];
            $token = encode_token($iduser);
            $avatar = $data['avatar'];;

            $sql = "INSERT INTO users(IDuser,user,email,password,type,avatar,activate,token) VALUES('$iduser','$user','$email','','user','$avatar',1,'$token')";
            $db->ejecutar($sql);
            return $token;
        }
        //////////////////
        //////////////////

        public function active_user($db, $param) {
            $sql = "UPDATE users SET activate = 1 WHERE token = '$param' AND activate = 0";
            $db->ejecutar($sql);

            // $sql = "UPDATE users SET token = '' WHERE token = '$param'";
            // $db->ejecutar($sql);
        }

        public function validate_login($db, $cred) {
            $email = $cred['email'];
            $pass = $cred['pass'];

            $sql = "SELECT * FROM users WHERE email = '$email' AND password != ''";
            $stmt = $db->ejecutar($sql);
            $result = $db->listar($stmt);

            if($result===false){
                return "not exists";
            }else{
                $sql = "SELECT * FROM users WHERE email = '$email' AND password != '' AND activate = 1";
                $stmt = $db->ejecutar($sql);
                $result = $db->listar_arr($stmt);

                if($result[0]===null){
                    return "not activated";
                }else{
                    if (password_verify($pass,$result[0]['password'])) {
                        $_SESSION['user'] = $result[0]['user'];
                        $_SESSION['avatar'] = $result[0]['avatar'];
                        return encode_token($result[0]['IDuser']);
                    }else{
                        return "incorrect";
                    }
                }
            }
        }

        public function recover_pass($db, $email) {
            $sql = "SELECT token FROM users WHERE email = '$email' AND password != ''";
            $stmt = $db->ejecutar($sql);
            $result = $db->listar_arr($stmt);
            return $result[0]['token'];
        }

        public function update_pass($db, $token, $newpass) {
            $password = password_hash($newpass, PASSWORD_DEFAULT);
            $newtoken = bin2hex(openssl_random_pseudo_bytes(20));
            
            $sql = "UPDATE users SET password = '$password', token = '$newtoken' WHERE token = '$token'";
            $stmt = $db->ejecutar($sql);
        }
        
    }
