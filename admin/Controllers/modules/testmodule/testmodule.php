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
        $this->model->install();
    }

    function index() {
        $this->view->ModulePath = ModulePath();
        $this->view->MetaTitle = "Hello World";
        $this->view->MetaKeywords = "Hello World";
        $this->view->MetaDescription = "";

        //fetch all data
        $this->view->allData = $this->model->allData();
        //end fetch all data

        if (@$_GET['reply']) {
            $this->view->noti = msg($_GET['reply']);
        }
        $this->view->modulerender('testmodule');
    }

    function delete()
    {
        $delete = $this->model->delete(@$_POST['delete_testmodule_uid']);
        if (isset($delete) && $delete) {
            redirect($this->getPage, array("reply" => "TestModule_deleted"));
        }
    }
    function insert() {
        $insert = $this->model->insert(@$_POST['testmodule']);
        if (isset($insert) && $insert) {
            redirect($this->getPage, array("reply" => "TestModule_Success"));
        }
    }

    function uninstall() {
        $this->model->uninstall();
    }

}
