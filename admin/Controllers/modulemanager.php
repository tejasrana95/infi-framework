<?php

class ModuleManager extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $sql = new sql();
        $sql->connect();
        $getPage = getPage();
        $this->view->getPage = getPage();
        authentication();
        $dateTime = DateTime();

        $modulepath = BASEURL . MODULE;
        if (isset($_POST['disable'])) {
            for ($i = 0; $i < count($_POST['module_id']); $i++) {
                $query = $sql->update("sysmodule", array('enable' => 0), array('module_id' => $_POST['module_id'][$i]));
            }
            if ($query) {
                header("Location: " . URL . $getPage[0] . "/?action=view&reply=ModuleDisabled");
            } else {
                header("Location: " . URL . $getPage[0] . "/?action=view&reply=PageError");
            }
        }
        if (@$_GET['action'] == "install") {
            $modulefile = $modulepath . $_GET['module_id'] . '/' . $_GET['module_id'] . '.php';
            include($modulefile);
            $ObjOfodule = new $_GET['module_id']();
            $ObjOfodule->install();
            $query = $sql->insert("sysmodule", array('module_name' => $_GET['module_name'], 'module_id' => $_GET['module_id'], 'enable' => 0));
            $query = $sql->insert("urls", array('url' => $_GET['module_id'], "path" => $modulepath . $_GET['module_id'], "link_id" => $_GET['module_id'], "link_with" => "module"));
            if ($query) {
                header("Location: " . URL . $getPage[0] . "/?reply=ModuleInstalled");
            } else {
                header("Location: " . URL . $getPage[0] . "/?reply=PageError");
            }
        } elseif (@$_GET['action'] == "uninstall") {
            $modulefile = $modulepath . $_GET['module_id'] . '/' . $_GET['module_id'] . '.php';
            include($modulefile);
            $ObjOfodule = new $_GET['module_id']();
            $ObjOfodule->uninstall();
            $query = $sql->delete("sysmodule", array('module_id' => $_GET['module_id']));
            $query = $sql->delete("urls", array("link_id" => $_GET['module_id']));
            if ($query) {
                header("Location: " . URL . $getPage[0] . "/?reply=ModuleRemoved");
            } else {
                header("Location: " . URL . $getPage[0] . "/?reply=PageError");
            }
        } elseif (@$_GET['action'] == "disable") {
            $query = $sql->update("sysmodule", array('enable' => 0), array('module_id' => $_GET['module_id']));
            if ($query) {
                header("Location: " . URL . $getPage[0] . "/?reply=ModuleDisabled");
            } else {
                header("Location: " . URL . $getPage[0] . "/?reply=PageError");
            }
        } elseif (@$_GET['action'] == "enable") {
            $query = $sql->update("sysmodule", array('enable' => 1), array('module_id' => $_GET['module_id'],));
            if ($query) {
                header("Location: " . URL . $getPage[0] . "/?reply=ModuleEnabled");
            } else {
                header("Location: " . URL . $getPage[0] . "/?reply=PageError");
            }
        }



        $dir = $modulepath;

        $module_detail = array();
        if (is_dir($dir)) {
            if ($modules = opendir($dir)) {
                $i = 0;
                while (($file = readdir($modules)) !== false) {
                    if ($file != "." && $file != "..") {
                        $module_header = $dir . $file . '/info.module';
                        if (file_exists($module_header)) {
                            $module_infos = file($module_header, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                            foreach ($module_infos as $module) {
                                    $temp_module = explode("=", $module);
                                    if (count($temp_module) == 2) {
                                        $module_detail[$i][strtolower(trim($temp_module[0]))] = trim($temp_module[1]);
                                    }
                                }
                            $module_detail[$i]["module_id"] = trim($file);
                            //check module install
                            $check = $sql->check("sysmodule", array("module_id" => $file));
                            if ($check == 1) {
                                $module_detail[$i]["module_install"] = 1;
                                $check = $sql->check("sysmodule", array("module_id" => $file, 'enable' => 1));
                                if ($check == 1) {
                                    $module_detail[$i]["module_enable"] = 1;
                                } else {
                                    $module_detail[$i]["module_enable"] = 0;
                                }
                            } else {
                                $module_detail[$i]["module_install"] = 0;
                                $module_detail[$i]["module_enable"] = 0;
                            }
                            $i+=1;
                        }
                    }
                }
                closedir($modules);
            }
        }
        $this->view->module_list = $module_detail;
        if (GET('reply')) {
            $this->view->noti = msg(GET('reply'));
        }


        $this->view->render('modulemanager');
    }

}
