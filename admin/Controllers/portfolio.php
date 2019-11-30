<?php

class Portfolio extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $sql = new sql();
        $sql->connect();

        authentication();

        $sql = new sql();
        $sql->connect();
        $getPage = getPage();
        $this->view->getPage = $getPage;
        $dateTime = DateTime();
        if (isset($_POST['delete'])) {
            for ($i = 0; $i < count($_POST['uid']); $i++) {
                $delete = $sql->delete('portfolio', array("uid" => $_POST['uid'][$i]));
            }
            if ($delete) {
                header("Location: " . URL . $getPage[0] . "?action=view&reply=PageDeleted");
            } else {
                header("Location: " . URL . $getPage[0] . "?action=view&reply=PageError");
            }
        }


        if (isset($_POST['submit']) and isset($_POST['editUid'])) {

            $arraydata = array("title" => $_POST['title'],
                "content" => $_POST['content'],
                "client" => $_POST['client'],
                "type" => $_POST['type'],
                "technology" => $_POST['technology'],
            );

            if ($_FILES['featuredImage']['name']) {
                $random_digit = time();
                $file_name = $_FILES['featuredImage']['name'];
                $new_file_name = $random_digit . $file_name;
                move_uploaded_file($_FILES["featuredImage"]["tmp_name"], dirname(BASEURL) . '/' .VIEW. IMAGES . 'portfolio/' . $new_file_name);
                $fileLocation = IMAGES . 'portfolio/' . $new_file_name;
                $arraydata["featuredImage"] = $fileLocation;
            }

            $update = $sql->update('portfolio', $arraydata, array("uid" => $_POST['editUid']));
            if ($update) {
                header("Location: " . URL . $getPage[0] . "?action=view&reply=PageUpdated");
            } else {
                header("Location: " . URL . $getPage[0] . "?action=view&reply=PageError");
            }
        } elseif (isset($_POST['submit'])) {
            $random_digit = time();
            if ($_FILES['featuredImage']['name']) {
                $file_name = $_FILES['featuredImage']['name'];
                $new_file_name = $random_digit . $file_name;
                move_uploaded_file($_FILES["featuredImage"]["tmp_name"], dirname(BASEURL) . '/' .VIEW. IMAGES . 'portfolio/' . $new_file_name);
                $fileLocation = IMAGES . 'portfolio/' . $new_file_name;
                
            } else {
                $fileLocatiom = "";
            }
            $arraydata = array("title" => $_POST['title'],
                "content" => $_POST['content'],
                "client" => $_POST['client'],
                "type" => $_POST['type'],
                "technology" => $_POST['technology'],
                "featuredImage"=>$fileLocation
            );
            $insert = $sql->insert('portfolio', $arraydata);

            if ($insert) {
                header("Location: " . URL . $getPage[0] . "?action=view&reply=PageCreated");
            } else {
                header("Location: " . URL . $getPage[0] . "?action=view&reply=PageError");
            }
        }




        if (GET('action') == 'view') {
            $page = (int) (GET("page") ? GET("page") : 1 );
            if (GET('search')) {
                $statement = "portfolio where title like '%" . GET('q') . "%' like '%" . GET('q') . "%' order by uid desc";
                $this->view->oldData = "action=" . GET('action') . "&q=" . GET('q') . "search=" . GET('q');
            } else {
                $statement = "portfolio order by uid desc";
                $this->view->oldData = "action=" . GET('action');
            }
            $limit = 50;
            $this->view->statement = $statement;
            $this->view->limit = $limit;
            $this->view->page = $page;
            $this->view->PagingNationFetch = $sql->PagingNationFetch($statement, $page, $limit);
        } elseif (GET('action') == 'edit') {
            $this->view->editrow = $sql->fetch("portfolio", array("uid" => GET('editUid')));
        }


        if (GET('reply')) {
            $this->view->noti = msg(GET('reply'));
        }

        if (checkPermission('premission_page')) {
            $this->view->render('portfolio');
        } else {
            $this->view->render('permission_denied');
        }
    }

}
