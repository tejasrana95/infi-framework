<?php

class Model {

    function __construct() {
         $this->sql = new sql();
         $this->sql->connect();
         return $this->sql;
    }
}

?>