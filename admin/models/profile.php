<?php

class Profile_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    function getuser() {
        $fetch = $this->sql->fetch("admin", array("uid" => base64_decode($_COOKIE['login_user_uid'])));
        return $fetch;
    }

    function validatepassword($password) {
        return $this->sql->check("admin", array("uid" => base64_decode($_COOKIE['login_user_uid']), "password" => md5($password['c_passWord'])));
    }

    function update($data) {
        $arraydata = array("password" => md5($data['passWord']), "name" => $data['name'], "email" => $data['email'],);
        if (trim($data['profilepic']) != "") {
            $arraydata['profilepic'] = $data['profilepic'];
        }
        return $this->sql->update("admin", $arraydata, array("uid" => base64_decode($_COOKIE['login_user_uid'])));
    }

}
