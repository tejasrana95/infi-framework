<?php

class Bootstrap {

    function __construct() {
        $url = addslashes(@$_GET['url']);
        $url = explode('/', $url);
        if (EXTENSION != "") {
            $url = explode(EXTENSION, $url[0]);
        }
        $file = CONTROLLER . $url[0] . '.php';
        $files = VIEW . $url[0] . '.php';
        $view = new View();
        if (empty($url[0])) {
            if (!file_exists(CONTROLLER . 'index.php')) {
                $error_name = 'index.php';
                $folder = CONTROLLER;
                require_once(VQMod::modCheck(PUBLICS . 'errors.php'));
                die();
            } else {
                require_once(VQMod::modCheck(CONTROLLER . 'index.php'));
                $controller = new Index();
                $controller->index();
                return false;
                $controller->index();
            }
        } elseif (file_exists($file)) {
            require_once(VQMod::modCheck($file));
            $controller = new $url[0];
            $controller->index();
        } elseif (file_exists($files)) {
            $view->render($url[0]);
        } else {
            $sql = new sql();
            $sql->connect();
            $permalinks = permalinkGrabber();
            $check = $sql->check("page", array("permalink" => $permalinks));
            if ($check) {
                require_once(VQMod::modCheck(CONTROLLER . "p.php"));
                $controller = new P;
                $controller->index();
            } else {
                $notfound = links(URL . "404/");
                $view->render("404");
            }
        }
    }
    
    private function _callControllerMethod()
    {
        $length = count($this->_url);
        
        // Make sure the method we are calling exists
        if ($length > 1) {
            if (!method_exists($this->_controller, $this->_url[1])) {
                $this->_error();
            }
        }
        
        // Determine what to load
        switch ($length) {
            case 5:
                //Controller->Method(Param1, Param2, Param3)
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
                break;
            
            case 4:
                //Controller->Method(Param1, Param2)
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
                break;
            
            case 3:
                //Controller->Method(Param1, Param2)
                $this->_controller->{$this->_url[1]}($this->_url[2]);
                break;
            
            case 2:
                //Controller->Method(Param1, Param2)
                $this->_controller->{$this->_url[1]}();
                break;
            
            default:
                $this->_controller->index();
                break;
        }
    }
    

}

?>