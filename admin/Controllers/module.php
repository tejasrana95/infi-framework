<?php

class Module extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $sql = new sql();
        $sql->connect();
        $getPage = getPage();
        $this->view->getPage = $getPage;
        authentication();

        if (isset($_POST['delete'])) {
            for ($i = 0; $i < count($_POST['uid']); $i++) {
                $delete = $sql->delete('modules', array("uid" => $_POST['uid'][$i]));
            }
            if ($delete) {
                header("Location: " . URL . $getPage[0] . "/?reply=ModuleDeleted");
            } else {
                header("Location: " . URL . $getPage[0] . "/?reply=PageError");
            }
        }

        if (isset($_POST['submit']) and isset($_POST['editId'])) {
            $update = $sql->update("modules", array("moduleName" => $_POST['title'], "source" => $_POST['source'], "responsiveCode" => 12, "active" => $_POST['enable']), array('uid' => $_POST['editId']));
            if ($_POST['submit'] == "continue") {
                if ($update) {
                    header("Location: " . URL . $getPage[0] . "/?action=edit&editId=" . $_POST['editId'] . "&reply=ModuleUpdated");
                } else {
                    header("Location: " . URL . $getPage[0] . "/?action=edit&editId=" . $_POST['editId'] . "&reply=PageError");
                }
            } else {
                if ($update) {
                    header("Location: " . URL . $getPage[0] . "/?reply=ModuleUpdated");
                } else {
                    header("Location: " . URL . $getPage[0] . "/?reply=PageError");
                }
            }
        } elseif (isset($_POST['submit'])) {
            $insert = $sql->insert("modules", array("moduleName" => $_POST['title'], "source" => $_POST['source'], "responsiveCode" => 12, "active" => $_POST['enable']));
            if ($_POST['submit'] == "continue") {
                if ($insert) {
                    header("Location: " . URL . $getPage[0] . "/?action=edit&editId=" . $insert . "&reply=ModuleAdded");
                } else {
                    header("Location: " . URL . $getPage[0] . "/?action=edit&editId=" . $insert . "&reply=PageError");
                }
            } else {
                if ($insert) {
                    header("Location: " . URL . $getPage[0] . "/?reply=ModuleAdded");
                } else {
                    header("Location: " . URL . $getPage[0] . "/?reply=PageError");
                }
            }
        } elseif (GET('activateId')) {

            if (GET('action') == 'deactivate') {
                $activation = $sql->update("modules", array("active" => 0), array("uid" => GET('activateId')));
            } else {
                $activation = $sql->update("modules", array("active" => 1), array("uid" => GET('activateId')));
            }
            if ($activation) {
                header("Location: " . URL . $getPage[0] . "/?reply=Module" . GET('action'));
            } else {
                header("Location: " . URL . $getPage[0] . "/?reply=Module" . GET('action'));
            }
        }

        if (GET('editId')) {
            $this->view->editFetch = $sql->fetch('modules', array("uid" => GET('editId')));
        }
        if (isset($_POST['UpdateMenu'])) {
            $update = $sql->update("menu", array("label" => $_POST['menuLabel'], "link" => $_POST['menuLink'], "sort" => $_POST['menuSort'], "noLink" => $_POST['MenunoLink']), array("uid" => $_POST['ParentId']));
            $update1 = $sql->update("menu", array("label" => $_POST['SubmenuLabel'], "link" => $_POST['SubmenuLink'], "sort" => $_POST['SubmenuSort'], "noLink" => $_POST['SubmenunoLink']), array("uid" => $_POST['SubmenuId']));
            if ($update && $update1) {
                header("Location: " . URL . $getPage[0] . "/?reply=MenuUpdated");
            } else {
                header("Location: " . URL . $getPage[0] . "/?reply=PageError");
            }
        }

        $this->view->FetchModule = $sql->fetchAll("modules", array("1" => '1'), "order by uid asc");

        if (GET('reply')) {
            $this->view->noti = msg(GET('reply'));
        }




        if (checkPermission('premission_site')) {
            $this->view->render('module');
        } else {
            $this->view->render('permission_denied');
        }
    }

}
