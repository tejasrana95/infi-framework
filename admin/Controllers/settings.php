<?php

class Settings extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {


        authentication();

        $sql = new sql();
        $sql->connect();
        $getPage = getPage();
        $this->view->getPage = $getPage;
        $dateTime = DateTime();


        $dir = BASEPATH . VIEW;


        $theme_detail = array();
        if (is_dir($dir)) {
            if ($modules = opendir($dir)) {
                $i = 0;
                while (($file = readdir($modules)) !== false) {
                    if ($file != "." && $file != "..") {
                        $theme_detail[] = $file;
                    }
                }
            }
        }
        $this->view->theme_detail = $theme_detail;



        if (isset($_POST['submit'])) {

            $arraydata = $_POST['setting'];
            $newarray = array();
            $delete = $sql->delete('system', array("reserved" => '1'));
            foreach ($arraydata as $array => $data) {
                $newarray['system'] = $array;
                $newarray['value'] = $data;
                $newarray["reserved"] = '1';
                $update = $sql->insert('system', $newarray);
            }
            if ($update) {
                header("Location: " . URL . $getPage[0] . "/?action=view&reply=SystemVariableUpdated");
            } else {
                header("Location: " . URL . $getPage[0] . "/?action=view&reply=PageError");
            }
        }
            $row = $sql->fetchAll('system', array("reserved" => '1'));

            $new_array=array();
            foreach($row as $rows)
            {
                $new_array[$rows['system']]=$rows['value'];
            }
                
                $this->view->systemrow=$new_array;

        if (GET('reply')) {
            $this->view->noti = msg(GET('reply'));
        }

        $this->view->render('Settings');
    }

}
