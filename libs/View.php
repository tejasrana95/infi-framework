<?php

class view {

    public function render($name) {
        if (!file_exists(VIEW . THEME . '/' . $name . ".php")) {
            $error_name = THEME . '/' . $name . '.php';
            $folder = VIEW;
            require_once(VQMod::modCheck(PUBLICS . 'errors.php'));
            die();
        } else {
            require_once(VQMod::modCheck(VIEW . THEME . '/' . $name . ".php"));
        }
    }

}

?>