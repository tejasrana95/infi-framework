<?php

class Page extends Controller {

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
        $this->view->category = $sql->fetchAll("category", array("parent" => '0'));
        $this->view->template = $sql->fetchAll("template", array("1" => '1'));
        $this->view->modules = $sql->fetchAll("modules", array("active" => '1'));
        if (isset($_POST['delete'])) {
            for ($i = 0; $i < count($_POST['uid']); $i++) {
                $delete = $sql->delete('page', array("uid" => $_POST['uid'][$i]));
            }
            if ($delete) {
                header("Location: " . URL .$getPage[0]. "/?action=view&reply=PageDeleted");
            } else {
                header("Location: " . URL .$getPage[0]. "/?action=view&reply=PageError");
            }
        }


        if (isset($_POST['submit']) and isset($_POST['editUid'])) {
            if (isset($_POST['modules'])) {
                $modules = implode(',', $_POST['modules']);
            } else {
                $modules = "";
            }
            $arraydata = array("title" => $_POST['title'],
                "heading" => $_POST['heading'],
                "content" => $_POST['content'],
                "category" => $_POST['category'],
                "subCategory" => $_POST['subCategory'],
                "template" => $_POST['template'],
                "seoTitle" => $_POST['seoTitle'],
                "keywords" => $_POST['keywords'],
                "description" => $_POST['description'],
                "crawl" => $_POST['crawl'],
                "optional1" => $_POST['optional1'],
                "optional2" => $_POST['optional2'],
                "optional3" => $_POST['optional3'],
                "searchTags" => $_POST['searchTags'],
                "customJS" => $_POST['customJS'],
                "customCSS" => $_POST['customCSS'],
                "LastModify" => $dateTime['date_with_time'],
                "LastModifyBy" => base64_decode($_COOKIE['login_user_uid']),
                "permalink" => $_POST['permalink'],
                "modules" => $modules,
            );
            if ($_POST['image']) {
                $arraydata["featuredImage"] = $_POST['image'];
            }
            $update = $sql->update('page', $arraydata, array("uid" => $_POST['editUid']));
            if ($_POST['submit'] == "continue") {
                if ($update) {
                    header("Location: " . URL .$getPage[0]. "/?action=edit&editUid=" . $_POST['editUid'] . "&reply=PageUpdated");
                } else {
                    header("Location: " . URL .$getPage[0]. "/?action=edit&editUid=" . $_POST['editUid'] . "&reply=PageError");
                }
            } else {
                if ($update) {
                    header("Location: " . URL .$getPage[0]. "/?action=view&reply=PageUpdated");
                } else {
                    header("Location: " . URL .$getPage[0]. "/?action=view&reply=PageError");
                }
            }
        } elseif (isset($_POST['submit'])) {
            $random_digit = time();
            if ($_POST['image']) {
                $fileLocation = $_POST['image'];
            } else {
                $fileLocation = "";
            }
            if (isset($_POST['modules'])) {
                $modules = implode(',', $_POST['modules']);
            } else {
                $modules = "";
            }
            $arraydata = array("title" => $_POST['title'],
                "heading" => $_POST['heading'],
                "content" => $_POST['content'],
                "category" => $_POST['category'],
                "subCategory" => $_POST['subCategory'],
                "template" => $_POST['template'],
                "seoTitle" => $_POST['seoTitle'],
                "keywords" => $_POST['keywords'],
                "description" => $_POST['description'],
                "crawl" => $_POST['crawl'],
                "optional1" => $_POST['optional1'],
                "optional2" => $_POST['optional2'],
                "optional3" => $_POST['optional3'],
                "searchTags" => $_POST['searchTags'],
                "customJS" => $_POST['customJS'],
                "customCSS" => $_POST['customCSS'],
                "LastModify" => $dateTime['date_with_time'],
                "LastModifyBy" => base64_decode($_COOKIE['login_user_uid']),
                "featuredImage" => $fileLocation,
                "modules" => $modules,
            );
            $insert = $sql->insert('page', $arraydata);
            $last_id = $insert;
            $permalink = permalink($last_id);

            $update = $sql->update('page', array("permalink" => $permalink), array("uid" => $last_id));

            if ($_POST['submit'] == "continue") {
                if ($update) {
                   
                    header("Location: " . URL .$getPage[0]. "/?action=edit&editUid=" . $last_id . "&reply=PageUpdated");
                } else {
                    header("Location: " . URL .$getPage[0]. "/?action=view&reply=PageError");
                }
            } else {
                if ($insert and $update) {
                    header("Location: " . URL .$getPage[0]. "/?action=view&reply=PageCreated");
                } else {
                    header("Location: " . URL .$getPage[0]. "/?action=view&reply=PageError");
                }
            }
        }




        if (GET('action') == 'view') {
            $page = (int) (GET("page") ? GET("page") : 1 );
            if (GET('search')) {
                $statement = "page where title like '%" . GET('q') . "%' or heading like '%" . GET('q') . "%' order by uid desc";
                $this->view->oldData = "action=" . GET('action') . "&q=" . GET('q') . "search=" . GET('q');
            } else {
                $statement = "page order by uid desc";
                $this->view->oldData = "action=" . GET('action');
            }
            $limit = 50;
            $this->view->statement = $statement;
            $this->view->limit = $limit;
            $this->view->page = $page;
            $this->view->PagingNationFetch = $sql->PagingNationFetch($statement, $page, $limit);
        } elseif (GET('action') == 'edit') {
            $this->view->editrow = $sql->fetch("page", array("uid" => GET('editUid')));
            $this->view->editmodules = explode(',', $this->view->editrow['modules']);
            $this->view->Subcategory = $sql->fetchAll("category", array("parent" => $this->view->editrow['category']));
        }


        if (GET('reply')) {
            $this->view->noti = msg(GET('reply'));
        }

        if (checkPermission('premission_page')) {
            $this->view->render('page');
        } else {
            $this->view->render('permission_denied');
        }
    }

}
