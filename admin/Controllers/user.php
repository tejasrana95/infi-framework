<?php

class User extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $sql = new sql();
        $sql->connect();

        authentication();
        $getPage = getPage();
        $this->view->getPage = $getPage;
        $sql = new sql();
        $sql->connect();
        $dateTime = DateTime();

        if (isset($_POST['delete'])) {
            for ($i = 0; $i < count($_POST['uid']); $i++) {
                $delete = $sql->delete('admin', array("uid" => $_POST['uid'][$i]));
            }
            if ($delete) {
                header("Location: " . URL . $getPage[0] . "/?action=view&reply=UserDeleted");
            } else {
                header("Location: " . URL . $getPage[0] . "User/?action=view&reply=UserDeleteError");
            }
        }


        if (isset($_POST['submit']) and isset($_POST['editUid'])) {
            $blog_premission = ($_POST['blog_premission']) ? $_POST['blog_premission'] : 0;
            $page_premission = ($_POST['page_premission']) ? $_POST['page_premission'] : 0;
            $site_premission = ($_POST['site_premission']) ? $_POST['site_premission'] : 0;
            $filemanager_premission = ($_POST['filemanager_premission']) ? $_POST['filemanager_premission'] : 0;
            $user_premission = ($_POST['user_premission']) ? $_POST['user_premission'] : 0;


            $permission = $blog_premission . $page_premission . $site_premission . $filemanager_premission . $user_premission . '0' . '0' . '0' . '0' . '0';

            if ($_POST['passWord']) {
                if ($_POST['passWord'] == $_POST['passWord1']) {
                    $arraydata['password'] = md5($_POST['passWord']);
                } else {
                    header("Location: " . URL . $getPage[0] . "/?action=edit&reply=PasswordNotMatch&editUid=" . $_POST['editUid']);
                }
            }

            $arraydata['permission'] = $permission;
            $arraydata['name'] = $_POST['name'];
            $arraydata['email'] = $_POST['email'];

            $update = $sql->update('admin', $arraydata, array("uid" => $_POST['editUid']));

            if ($update) {
                header("Location: " . URL . $getPage[0] . "/?action=view&reply=UserUpdated");
            } else {
                header("Location: " . URL . $getPage[0] . "/?action=view&reply=PageError");
            }
        } elseif (GET('activateId')) {

            if (GET('action') == 'deactivate') {
                $activation = $sql->update("admin", array("active" => 0), array("uid" => GET('activateId')));
            } else {
                $activation = $sql->update("admin", array("active" => 1), array("uid" => GET('activateId')));
            }
            if ($activation) {
                header("Location: " . URL . $getPage[0] . "/?reply=Module" . GET('action'));
            } else {
                header("Location: " . URL . $getPage[0] . "/?reply=Module" . GET('action'));
            }
        } elseif (isset($_POST['submit'])) {
            $blog_premission = ($_POST['blog_premission']) ? $_POST['blog_premission'] : 0;
            $page_premission = ($_POST['page_premission']) ? $_POST['page_premission'] : 0;
            $site_premission = ($_POST['site_premission']) ? $_POST['site_premission'] : 0;
            $filemanager_premission = ($_POST['filemanager_premission']) ? $_POST['filemanager_premission'] : 0;
            $user_premission = ($_POST['user_premission']) ? $_POST['user_premission'] : 0;


            $permission = $blog_premission . $page_premission . $site_premission . $filemanager_premission . $user_premission . '0' . '0' . '0' . '0' . '0';


            if ($_POST['passWord'] == $_POST['passWord1']) {
                if (!$sql->check("admin", array("username" => $_POST['userName']))) {
                    $arraydata = array("username" => $_POST['userName'],
                        "password" => md5($_POST['passWord']),
                        "permission" => $permission,
                        "active" => 1,
                        "name" => $_POST['name'],
                        "email" => $_POST['email'],
                    );
                    $insert = $sql->insert('admin', $arraydata);

                    if ($insert) {
                        header("Location: " . URL . $getPage[0] . "/?action=view&reply=UserCreated");
                    } else {
                        header("Location: " . URL . $getPage[0] . "/?action=view&reply=PageError");
                    }
                } else {
                    header("Location: " . URL . $getPage[0] . "/?action=add&reply=UserAlready");
                }
            } else {
                header("Location: " . URL . $getPage[0] . "/?action=add&reply=PasswordNotMatch");
            }
        }

        if (GET('action') == 'view') {
            $page = (int) (GET("page") ? GET("page") : 1 );
            if (GET('search')) {
                $statement = "admin where username like '%" . GET('q') . "%' order by uid desc";
                $this->view->oldData = "action=" . GET('action') . "&q=" . GET('q') . "search=" . GET('q');
            } else {
                $statement = "admin order by uid desc";
                $this->view->oldData = "action=" . GET('action');
            }
            $limit = 50;
            $this->view->statement = $statement;
            $this->view->limit = $limit;
            $this->view->page = $page;

            $this->view->PagingNationFetch = $sql->PagingNationFetch($statement, $page, $limit);
        } elseif (GET('action') == 'edit') {
            $this->view->editrow = $sql->fetch("admin", array("uid" => GET('editUid')));
            $this->view->editPermission = getPermission($this->view->editrow['permission']);
        }

        if (GET('reply')) {
            $this->view->noti = msg(GET('reply'));
        }

        if (checkPermission('premission_user')) {
            $this->view->render('user');
        } else {
            $this->view->render('permission_denied');
        }
    }

}
