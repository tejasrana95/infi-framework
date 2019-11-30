<?php

class vqmod_manager extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $sql = new sql();
        $sql->connect();
        authentication();


        $this->view->getPage = getPage();
        $getPage = getPage();
        $dateTime = DateTime();


        $dir = BASEPATH . 'vqmod/xml/';


        if ((isset($_REQUEST['action']) && isset($_REQUEST['xml'])) && $_REQUEST['action'] == "disable") {
            $ext = substr($_REQUEST['xml'], strrpos($_REQUEST['xml'], '.') + 1);
            $newext = "._xml";
            $newfilename = str_replace("." . $ext, $newext, $_REQUEST['xml']);
            $task = rename($dir . $_REQUEST['xml'], $dir . $newfilename);
            if ($task) {
                header("Location: " . URL . $getPage[0] . "/?reply=XmlDisabled");
            } else {
                header("Location: " . URL . $getPage[0] . "/?reply=PageError");
            }
        } elseif ((isset($_REQUEST['action']) && isset($_REQUEST['xml'])) && $_REQUEST['action'] == "enable") {
            $ext = substr($_REQUEST['xml'], strrpos($_REQUEST['xml'], '.') + 1);
            $newext = ".xml";
            $newfilename = str_replace("." . $ext, $newext, $_REQUEST['xml']);
            $task = rename($dir . $_REQUEST['xml'], $dir . $newfilename);
            if ($task) {
                header("Location: " . URL . $getPage[0] . "/?reply=XmlEnabled");
            } else {
                header("Location: " . URL . $getPage[0] . "/?reply=PageError");
            }
        } elseif ((isset($_REQUEST['action']) && isset($_REQUEST['xml'])) && $_REQUEST['action'] == "delete") {
            $task = unlink($dir . $_REQUEST['xml']);
            if ($task) {
                header("Location: " . URL . $getPage[0] . "/?reply=XmlDeleted");
            } else {
                header("Location: " . URL . $getPage[0] . "/?reply=PageError");
            }
        } elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == "deleteLog") {
            //log remover
            $dir = BASEPATH . 'vqmod/logs/';
            if (is_dir($dir)) {
                if ($log = opendir($dir)) {
                    while (($file = readdir($log)) !== false) {
                        if ($file != "." && $file != "..") {
                            $task = unlink($dir . $file);
                        }
                    }
                }
            }
            if ($task) {
                header("Location: " . URL . $getPage[0] . "/?reply=LogCleaned");
            } else {
                header("Location: " . URL . $getPage[0] . "/?reply=PageError");
            }
        }elseif (isset($_REQUEST['action']) && isset($_REQUEST['cache']) && $_REQUEST['action'] == "deleteCache") {
            //log remover
            $dir = BASEPATH . 'vqmod/vqcache/';
            if (is_dir($dir)) {
                if ($log = opendir($dir)) {
                    foreach($_REQUEST['cache'] as $cache){
                        $task = unlink($dir . $cache);
                    }
                }
            }
            if ($task) {
                header("Location: " . URL . $getPage[0] . "/?reply=CacheCleaned");
            } else {
                header("Location: " . URL . $getPage[0] . "/?reply=PageError");
            }
        }



        $xml_detail = array();
        if (is_dir($dir)) {
            if ($xml = opendir($dir)) {
                $i = 0;
                while (($file = readdir($xml)) !== false) {
                    if ($file != "." && $file != "..") {
                        $ext = substr($file, strrpos($file, '.') + 1);
                        if ($ext == "xml" || $ext == "_xml") {
                            $xml_row = simplexml_load_file($dir . $file);
                            foreach ($xml_row as $item => $value) {
                                if ($item != "file") {
                                    $xml_detail[$i][$item] = $value->asXML();
                                }
                            }
                            if ($ext == "xml") {
                                $xml_detail[$i]['enable'] = "1";
                            } else {
                                $xml_detail[$i]['enable'] = "0";
                            }
                            $xml_detail[$i]['path'] = $file;
                            $i+=1;
                        }
                    }
                }
            }
        }
        $this->view->xml_detail = $xml_detail;


//        Log viewer
        $dir = BASEPATH . 'vqmod/logs/';
        $Log_detail = "---------------------------- VQ Mod Logs -----------------------------\n\n\n\n";
        if (is_dir($dir)) {
            if ($log = opendir($dir)) {
                $i = 0;
                while (($file = readdir($log)) !== false) {
                    if ($file != "." && $file != "..") {
                        $Log_detail .= "======================================================================\n";
                        $Log_detail .= "*******************************" . $file . "******************************\n";
                        $Log_detail .= "======================================================================\n";
                        $Log_detail .= file_get_contents($dir . $file);
                    }
                }
            }
        }
        $this->view->Log_detail = $Log_detail;
        
        //        Cached files
        $dir = BASEPATH . 'vqmod/vqcache/';
        $cache_detail = array();
        if (is_dir($dir)) {
            if ($log = opendir($dir)) {
                $i = 0;
                while (($file = readdir($log)) !== false) {
                    if ($file != "." && $file != "..") {
                        $cache_detail[]= $file;
                    }
                }
            }
        }
        $this->view->cache_detail = $cache_detail;
        
        
        if (GET('reply')) {
            $this->view->noti = msg(GET('reply'));
        }

        $this->view->render('vqmod_manager');
    }

}
