<?php

class view {

    public function render($name) {
        $url = addslashes(@$_GET['url']);
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        global $MetaTitle;
        global $MetaKeywords;
        global $MetaDescription;
        global $AddScript;
        global $AddCSS;
        global $AddFooterScript;
        if (isset($this->MetaTitle)) {
            $MetaTitle = $this->MetaTitle;
        }
        if (isset($this->MetaKeywords)) {
            $MetaKeywords = $this->MetaKeywords;
        }
        if (isset($this->MetaDescription)) {
            $MetaDescription = $this->MetaDescription;
        }
        if (isset($this->AddScript) && !empty($this->AddScript)) {
            $AddScript = $this->AddScript;
        }
        if (isset($this->AddCSS) && !empty($this->AddCSS)) {
            $AddCSS = $this->AddCSS;
        }
        if (isset($this->AddFooterScript) && !empty($this->AddFooterScript)) {
            $AddFooterScript = $this->AddFooterScript;
        }
        if ($url[0] != "modules") {
            if (!file_exists(BASEURL . VIEW . $name . ".php")) {
                $error_name = $name . '.php';
                $folder = VIEW;
                require_once(VQMod::modCheck(BASEURL . PUBLICS . 'errors.php'));
                die();
            } else {
                require_once(VQMod::modCheck(BASEURL . VIEW . $name . ".php"));
            }
        } else {
            if (!file_exists(MODULEVIEW . $url[1] . '/' . $name . ".php")) {
                $error_name = MODULEVIEW . $url[1] . '/' . $name . '.php';
                $folder = MODULEVIEW;
                require_once(VQMod::modCheck(BASEURL . PUBLICS . 'errors.php'));
                die();
            } else {
                require_once(VQMod::modCheck(BASEURL . MODULEVIEW . $url[1] . '/' . $name . ".php"));
            }
        }
    }

    public function modulerender($name) {
        $url = addslashes(@$_GET['url']);
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        global $MetaTitle;
        global $MetaKeywords;
        global $MetaDescription;
        global $AddScript;
        global $AddCSS;
        global $AddFooterScript;
        if (isset($this->MetaTitle)) {
            $MetaTitle = $this->MetaTitle;
        }
        if (isset($this->MetaKeywords)) {
            $MetaKeywords = $this->MetaKeywords;
        }
        if (isset($this->MetaDescription)) {
            $MetaDescription = $this->MetaDescription;
        }
        if (isset($this->AddScript) && !empty($this->AddScript)) {
            $AddScript = $this->AddScript;
        }
        if (isset($this->AddCSS) && !empty($this->AddCSS)) {
            $AddCSS = $this->AddCSS;
        }
        if (isset($this->AddFooterScript) && !empty($this->AddFooterScript)) {
            $AddFooterScript = $this->AddFooterScript;
        }
        if (!file_exists(MODULEVIEW . $url[1] . '/' . $name . ".php")) {
            $error_name = MODULEVIEW . $url[1] . '/' . $name . '.php';
            $folder = MODULEVIEW;
            require_once(VQMod::modCheck(BASEURL . PUBLICS . 'errors.php'));
            die();
        } else {
            fnGetHeader();
            require_once(VQMod::modCheck(BASEURL . MODULEVIEW . $url[1] . '/' . $name . ".php"));
            fnGetFooter();
        }
    }

}

?>