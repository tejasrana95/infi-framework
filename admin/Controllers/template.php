<?php

class Template extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $sql = new sql();
        $sql->connect();
        $getPage = getPage();
        authentication();
        $this->view->getPage = $getPage;


       
        if (isset($_POST['delete'])) {
            for ($i = 0; $i < count($_POST['uid']); $i++) {
                $delete = $sql->delete('template', array("uid" => $_POST['uid'][$i]));
            }
            if ($delete) {
                header("Location: " . URL . $getPage[0] . "/?action=view&reply=TempDeleted");
            } else {
                header("Location: " . URL . $getPage[0] . "/?action=view&reply=PageError");
            }
        }

        if (isset($_POST['templateSubmit']) && $_POST['edituid']) {
            $update = $sql->update("template", array("name" => $_POST['templateName']), array("uid" => $_POST['edituid']));
            if ($update) {
                header("Location: " . URL . $getPage[0] . "/?reply=TemplateUpdated");
            } else {
                header("Location: " . URL . $getPage[0] . "/?reply=PageError");
            }
        } elseif (isset($_POST['templateSubmit'])) {
            $insert = $sql->insert("template", array("name" => $_POST['templateName']));
            if ($insert) {
                header("Location: " . URL . $getPage[0] . "/?reply=TemplateCreated");
            } else {
                header("Location: " . URL . $getPage[0] . "/?reply=PageError");
            }
        }

        if (GET('editId')) {
            $this->view->editFetch = $sql->fetch('template', array("uid" => GET('editId')));
        }


        $this->view->FetchTem = $sql->fetchAll("template", array("1" => '1'), "order by uid");

        if (GET('reply')) {
            $this->view->noti = msg(GET('reply'));
        }


        if (checkPermission('premission_site')) {
            $this->view->render('template');
        } else {
            $this->view->render('permission_denied');
        }
    }

}
