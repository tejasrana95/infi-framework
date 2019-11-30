<?php

class Menu extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $sql = new sql();
        $sql->connect();
        $getPage = getPage();
        $this->view->getPage = $getPage;
        authentication();

        $this->view->menu = $sql->fetchAll("menu", array("1" => '1'));

        if (isset($_POST['delete'])) {
            for ($i = 0; $i < count($_POST['uid']); $i++) {
                $delete = $sql->delete('menu', array("uid" => $_POST['uid'][$i]));
            }
            if ($delete) {
                header("Location: " . URL . $getPage[0] . "/?action=view&reply=MenuDeleted");
            } else {
                header("Location: " . URL . $getPage[0] . "/?action=view&reply=PageError");
            }
        }
        if (isset($_POST['addMenu'])) {
            $insert = $sql->insert("menu", array("parent" => 0, "label" => $_POST['menu'], "link" => $_POST['link'], "sort" => $_POST['sort'], "noLink" => $_POST['noLink']));
            if ($insert) {
                header("Location: " . URL . $getPage[0] . "/?reply=MenuCreated");
            } else {
                header("Location: " . URL . $getPage[0] . "/?reply=PageError");
            }
        } elseif (isset($_POST['addSubMenu'])) {
            $insert = $sql->insert("menu", array("parent" => $_POST['parent'], "label" => $_POST['label'], "link" => $_POST['link'], "sort" => $_POST['sort'], "noLink" => $_POST['noLink']));
            if ($insert) {
                header("Location: " . URL . $getPage[0] . "/?reply=MenuCreated");
            } else {
                header("Location: " . URL . $getPage[0] . "/?reply=PageError");
            }
        }

        if (GET('editId')) {
            $this->view->editFetch = $sql->fetch('menu', array("uid" => GET('editId')));
            $this->view->editFetchParent = $sql->fetch('menu', array("uid" => $this->view->editFetch['parent']));
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

        $this->view->FetchMenu = $sql->fetchAll("menu", array("1" => '1'), "order by uid asc");

        if (GET('reply')) {
            $this->view->noti = msg(GET('reply'));
        }



        if (checkPermission('premission_site')) {
            $this->view->render('menu');
        } else {
            $this->view->render('permission_denied');
        }
    }

}
