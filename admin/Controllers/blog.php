<?php

class Blog extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $sql = new sql();
        $sql->connect();
 $getPage = getPage();
        authentication();

        $getBlog = getBlog();
        $this->view->getBlog = $getBlog;
        $dateTime = DateTime();
        $this->view->category = $sql->fetchAll("category", array("parent" => '0'));
        $this->view->template = $sql->fetchAll("template", array("1" => '1'));

        if (isset($_POST['delete'])) {
            for ($i = 0; $i < count($_POST['uid']); $i++) {
                $delete = $sql->delete('blog', array("uid" => $_POST['uid'][$i]));
            }
            if ($delete) {
                header("Location: " . URL . $getPage[0]. "?action=view&reply=BlogDeleted");
            } else {
                header("Location: " . URL .  $getPage[0]."?action=view&reply=PageError");
            }
        }

        if (isset($_POST['submit']) and isset($_POST['editUid'])) {

            $arraydata = array("title" => $_POST['title'],
                "heading" => $_POST['heading'],
                "content" => $_POST['content'],
                "category" => $_POST['category'],
                "subCategory" => $_POST['subCategory'],
                "templates" => $_POST['template'],
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
            );
            //$permalink=permalink($_POST['editUid']);
            //$update=$sql->update('page',array("permalink"=>$permalink),array("uid"=>$_POST['editUid']));
            if ($_FILES['featuredImage']['name']) {
                $random_digit = time();
                $file_name = $_FILES['featuredImage']['name'];
                $new_file_name = $random_digit . $file_name;
                move_uploaded_file($_FILES["featuredImage"]["tmp_name"], BASEURL . IMAGES . $new_file_name);
                $fileLocation = IMAGES . $new_file_name;
                $arraydata["featuredImage"] = $fileLocation;
            }

            $update = $sql->update('blog', $arraydata, array("uid" => $_POST['editUid']));
            if ($update) {
                header("Location: " . URL . $getPage[0]."?action=view&reply=BlogUpdated");
            } else {
                header("Location: " . URL . $getPage[0]."?action=view&reply=PageError");
            }
        } elseif (isset($_POST['submit'])) {
            $random_digit = time();
            $arraydata = array("title" => $_POST['blog_title'], "doa" => $dateTime['mysql_date']);
            $insert = $sql->insert('blog', $arraydata);
            $last_id = $sql->last_id();
            $permalink = permalink($last_id, 'blog');
            $update = $sql->update('blog', array("permalink" => $permalink, "doa" => $dateTime['mysql_date']), array("uid" => $last_id));

            if ($insert and $update) {
                header("Location: " . URL .$getPage[0]."?action=view&reply=BlogCreated");
            } else {
                header("Location: " . URL . $getPage[0]."?action=view&reply=PageError");
            }
        }



        $page = (int) (GET("blog") ? GET("blog") : 1 );
        if (GET('search')) {
            $statement = "blog where title like '%" . GET('q') . "%' or heading like '%" . GET('q') . "%' order by uid desc";
            $this->view->oldData = "action=" . GET('action') . "&q=" . GET('q') . "search=" . GET('q');
        } else {
            $statement = "blog order by uid desc";
            $this->view->oldData = "action=" . GET('action');
        }
        $limit = 50;
        $this->view->statement = $statement;
        $this->view->limit = $limit;
        $this->view->page = $page;
        $this->view->PagingNationFetch = $sql->PagingNationFetch($statement, $page, $limit);

        if (GET('action') == 'edit') {
            $this->view->editrow = $sql->fetch("blog", array("uid" => GET('editUid')));
            $this->view->Subcategory = $sql->fetchAll("category", array("parent" => $this->view->editrow['category']));
        }


        if (checkPermission('permission_blog')) {
            $this->view->render('blog');
        } else {
            $this->view->render('permission_denied');
        }
    }

}
