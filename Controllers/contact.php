<?php

class contact extends Controller {

    function __construct() {

        parent::__construct();
    }

    function index() {

        $url = getId();

        $login = 1;


        $send = addslashes(@$_REQUEST['submit']);

        if ($send) {
            if ($_SESSION['security_code'] == $_REQUEST['captcha']) {

                $name = addslashes(@$_REQUEST['name']);
                $email = addslashes(@$_REQUEST['mail']);
                $msg = addslashes(@$_REQUEST['comment']);

                if (trim($name) == "") {
                    echo '<div class="alert alert-danger fade in">
                        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <strong>Oh snap! </strong> name is required.
                        </div>';
                } elseif (trim($email) == "") {
                    echo '<div class="alert alert-danger fade in">
                        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <strong>Oh snap! </strong> email is required.
                        </div>';
                } elseif (trim($msg) == "") {
                    echo '<div class="alert alert-danger fade in">
                        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <strong>Oh snap! </strong> message is required.
                        </div>';
                }
            
            if ($name != "" and $email != "" and $msg != "") {
                $mail_data = array("name" => $name,
                    "email" => $email,
                    "msg" => $msg);
                $send_mail = mailer("contact", $email, $mail_data);
                if ($send_mail) {
                    echo '<div class="alert alert-success fade in">
                        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        	<strong>Succss!</strong> Message Successfully sent. Thank you.
                        </div>';
                } else {
                    echo '<div class="alert alert-danger fade in">
                        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <strong>Oh snap! </strong> Error while Message sending... Please try again.
                        </div>';
                }
            }
        } else {
            echo '<div class="alert alert-danger fade in">
                        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        	<strong>Warning!</strong> Invalid Security Code.
                        </div>';
        }
        die();
        }


        $this->view->render('contact');
    }

}

?>