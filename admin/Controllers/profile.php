<?php

class Profile extends Controller {

    function __construct() {
        authentication();
        parent::__construct();
        $this->view->MetaTitle = base64_decode($_COOKIE['login_name']) . "'s Profile";
        $this->view->getUrl = getPage();
    }

    function index() {
        $this->view->editrow = $this->model->getuser();

        if (GET('reply')) {
            $this->view->noti = msg(GET('reply'));
        }

        $this->view->render('profile');
    }

    function update() {
        if (isset($_POST['profile'])) {
            if ($_POST['profile']['passWord'] == $_POST['profile']['passWord1']) {
                $check = $this->model->validatepassword($_POST['profile']);
                if (isset($check) && $check) {
                    $update = $this->model->update($_POST['profile']);
                    if ($update) {
                        header("Location: " . URL . $this->view->getUrl[0] . "/?reply=ProfileUpdate");
                    } else {
                        header("Location: " . URL . $this->view->getUrl[0] . "/?reply=PageError");
                    }
                } else {
                    header("Location: " . URL . $this->view->getUrl[0] . "/?reply=PasswordNotMatch");
                }
            } else {
                header("Location: " . URL . $this->view->getUrl[0] . "/?reply=BothPasswordNotMatch");
            }
        }
    }

}
