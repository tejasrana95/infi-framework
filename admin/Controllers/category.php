<?php

class Category extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $sql = new sql();
        $sql->connect();
        $getPage = getPage();

        authentication();

        $this->view->category = $sql->fetchAll("category", array("parent" => '0'));

        if (isset($_POST['delete'])) {
            for ($i = 0; $i < count($_POST['uid']); $i++) {
                $delete = $sql->delete('category', array("uid" => $_POST['uid'][$i]));
            }
            if ($delete) {
                header("Location: " . URL . $getPage[0] . "/?action=view&reply=CatDeleted");
            } else {
                header("Location: " . URL . $getPage[0] . "/?action=view&reply=PageError");
            }
        }
        if (isset($_POST['addCategory'])) {
            $insert = $sql->insert("category", array("parent" => 0, "text" => $_POST['category']));
            if ($insert) {
                header("Location: " . URL . $getPage[0] . "/?reply=CategoryCreated");
            } else {
                header("Location: " . URL . $getPage[0] . "/?reply=PageError");
            }
        } elseif (isset($_POST['addSubCategory'])) {
            $insert = $sql->insert("category", array("parent" => $_POST['categoryId'], "text" => $_POST['Subcategory']));
            if ($insert) {
                header("Location: " . URL . $getPage[0] . "/?reply=CategoryCreated");
            } else {
                header("Location: " . URL . $getPage[0] . "/?reply=PageError");
            }
        }

        if (GET('editId')) {
            $this->view->editFetch = $sql->fetch('category', array("uid" => GET('editId')));
        }
        if (isset($_POST['update'])) {
            $update = $sql->update("category", array("text" => $_POST['subCat']), array("uid" => $_POST['editId']));
            $update1 = $sql->update("category", array("text" => $_POST['categorys']), array("uid" => $_POST['parentId']));
            if ($update && $update1) {
                header("Location: " . URL . $getPage[0] . "/?reply=CategoryUpdated");
            } else {
                header("Location: " . URL . $getPage[0] . "/?reply=PageError");
            }
        }

               //$this->view->Fetchcat = $sql->fetchAll("category", array("parent !" => '0'), "order by parent");
 $this->view->Fetchcat = $sql->fetchAll("category", array("1" => '1'), "order by uid");

        if (GET('reply')) {
            $this->view->noti = msg(GET('reply'));
        }

        if (checkPermission('premission_site')) {
            $this->view->render('category');
        } else {
            $this->view->render('permission_denied');
        }
    }

}
