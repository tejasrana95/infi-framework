<?php

class Slider extends Controller {

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

        if (isset($_POST['delete'])) {
            for ($i = 0; $i < count($_POST['uid']); $i++) {
                $delete = $sql->delete('slider', array("uid" => $_POST['uid'][$i]));
            }
            if ($delete) {
                header("Location: " . URL . "slider/?action=view&reply=SliderDeleted");
            } else {
                header("Location: " . URL . "slider/?action=view&reply=PageError");
            }
        }


        if (isset($_POST['submit']) and isset($_POST['editUid'])) {

            $arraydata = array("title" => $_POST['title'],
                "sort" => $_POST['sort'],
            );
            if ($_POST['image'] != "") {
                $arraydata["image"] = $_POST['image'];
            }
            $update = $sql->update('slider', $arraydata, array("uid" => $_POST['editUid']));
            if ($update) {
                header("Location: " . URL . "slider/?action=view&reply=SliderUpdated");
            } else {
                header("Location: " . URL . "slider/?action=view&reply=PageError");
            }
        } elseif (isset($_POST['submit'])) {
            $random_digit = time();
            if ($_POST['image'] != "") {
                $fileLocation = $_POST['image'];
            } else {
                $fileLocation = "";
            }
            $arraydata = array("title" => $_POST['title'],
                "sort" => $_POST['sort'],
                "image" => $fileLocation,
            );

            $insert = $sql->insert('slider', $arraydata);
            if ($_POST['ajaxformsubmit']) {
                 if ($insert) {
                     echo msg('SliderCreated');
                } else {
                     echo msg('PageError');
                }
                die();
            } else {
                if ($insert) {
                    header("Location: " . URL . "slider/?action=view&reply=SliderCreated");
                } else {
                    header("Location: " . URL . "slider/?action=view&reply=PageError");
                }
            }
        }



        $this->view->sliderFetch = $sql->fetchAll('slider', array(1 => 1));
        if (GET('action') == 'edit') {
            $this->view->editrow = $sql->fetch("slider", array("uid" => GET('editUid')));
        }
        if(isset($_GET['ajaxData']))
        {
            echo (json_encode($this->view->sliderFetch));
            die();           
        }


        if (GET('reply')) {
            $this->view->noti = msg(GET('reply'));
        }

        if (checkPermission('premission_page')) {
            $this->view->render('slider');
        } else {
            $this->view->render('permission_denied');
        }
    }

}
