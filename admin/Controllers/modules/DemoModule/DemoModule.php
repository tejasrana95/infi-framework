<?php

class TestModule extends Controller {

    function __construct() {
        $this->sql = new sql();
        $this->sql->connect();
        $this->getPage = ModulePath();
        authentication();
        parent::__construct();
    }

    function install() {
        $query = $this->sql->query("
CREATE TABLE IF NOT EXISTS `" . PREFIX . "demo_module` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
 ");
    }

    function index() {
        $this->view->getURL=$this->getPage;
        $this->view->MetaTitle = "Hello World";
        $this->view->MetaKeywords = "Hello World";
        $this->view->MetaDescription = "";
        $this->view->modulerender('testmodule');
    }
    function insert()
    {
        
    }

    function uninstall() {
        $query = $this->sql->query("DROP TABLE `" . PREFIX . "demo_module`");
    }

}
