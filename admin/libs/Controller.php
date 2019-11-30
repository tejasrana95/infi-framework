<?php

class Controller {

    function __construct() {
        $this->view = new View();
    }

    /**
     * 
     * @param string $name Name of the model
     * @param string $path Location of the models
     */
    public function loadModel($name, $modelPath = MODEL) {
        $path = $modelPath . $name . '.php';
        if (file_exists($path)) {
            require_once(VQMod::modCheck($path));
            $modelName = $name . '_Model';
            $this->model = new $modelName();
        }
    }

}

function getController($Cont_roller) {
    $dirSize = 0;
    if (!$dh = opendir($Cont_roller)) {
        return false;
    }
    while ($file = readdir($dh)) {
        if ($file == "." || $file == "..") {
            continue;
        }
        if (is_file($Cont_roller . "/" . $file)) {
            $dirSize += filesize($Cont_roller . "/" . $file);
        }
        if (is_dir($Cont_roller . "/" . $file)) {
            $dirSize += getController($Cont_roller . "/" . $file);
        }
    }
    closedir($dh);
    return $dirSize;
}

?>