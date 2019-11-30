<?php

class order extends Controller {

    function __construct() {

        parent::__construct();
    }

    function index() {

        $url = getId();

        $login = 1;


        $send = addslashes(@$_REQUEST['submit']);

        if ($send) {
            if ($_SESSION['security_code'] == $_REQUEST['security']) {

                $name = addslashes(@$_REQUEST['name']);
                $email = addslashes(@$_REQUEST['email']);
                $contact_number = addslashes(@$_REQUEST['phone']);
                $msg = addslashes(@$_REQUEST['message']);
                $website = addslashes(@$_REQUEST['website']);
                $package = addslashes(@$_REQUEST['package']);
                if ($name != "" and $email != "" and $msg != "") {
                    $mail_data = array("name" => $name,
                        "email" => $email,
                        "phone" => $contact_number,
                        "website" => $website,
                        "package" => $package,
                        "msg" => $msg);
                    $send_mail = mailer("order", $email, $mail_data);
                    if ($send_mail) {
                        redirect("order.html?msg=success");
                    } else {
                        redirect("order.html?msg=error");
                    }
                }
            } else {
                redirect("order.html?msg=secureid");
            }
        }



//<div class="alert alert-danger fade in">
//      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
//      <h4>Oh snap! Error while Sending Mail!</h4>
//    
//    </div>

        $error_id = @$_GET['msg'];

        if (@$error_id == "error") {

            $this->view->noti = '<div class="alert alert-danger fade in">
                        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <strong>Oh snap! </strong> Error while Order sending... Please try again.
                        </div>';
        } elseif (@$error_id == "success") {

            $this->view->noti = '<div class="alert alert-success fade in">
                        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        	<strong>Succss!</strong> Order Successfully sent. Thank you.
                        </div>';
        } elseif (@$error_id == "secureid") {

            $this->view->noti = '<div class="alert alert-danger fade in">
                        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        	<strong>Warning!</strong> Invalid Security Code.
                        </div>';
        }
        $this->view->render('order');
    }

}

?>