<?php
class P extends Controller {

    function __construct() {
        parent::__construct();
    }
    function index() {
        $sql = new sql();
        $sql->connect();
        $permalinks = permalinkGrabber();
		$this->view->permalinks=$permalinks;
        $this->view->row = $sql->fetch("page", array("permalink" => $permalinks));
        $this->view->modules= explode(',',$this->view->row['modules']);
		
		
		
		 $send = addslashes(@$_REQUEST['submit']);

        if ($send) {
		
            if ($_SESSION['security_code'] == $_REQUEST['security']) {

                $name = addslashes(@$_REQUEST['name']);
                $email = addslashes(@$_REQUEST['email']);
                $contact_number = addslashes(@$_REQUEST['phone']);
                $msg = addslashes(@$_REQUEST['message']);
                $website = addslashes(@$_REQUEST['website']);
				$pageurl = addslashes(@$_REQUEST['pageurl']);

                if ($name != "" and $email != "" and $msg != "") {
                    $mail_data = array("name" => $name,
                        "email" => $email,
                        "phone" => $contact_number,
                        "msg" => $msg);
                    $send_mail = mailer("contact", $email, $mail_data);
                    if ($send_mail) {
header("Location: ".URL.$_REQUEST['pageurl'].".html?msg=success");
					
                    } else {
header("Location: ".URL.$_REQUEST['pageurl'].".html?msg=error");            
            
                    }
                }
            } else {
			header("Location: ".URL.$_REQUEST['pageurl'].".html?msg=secureid");
            }
        }

        $error_id = @$_GET['msg'];

        if (@$error_id == "error") {

            $this->view->noti = '<div class="alert alert-danger fade in">
                        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <strong>Oh snap! </strong> Error while Message sending... Please try again.
                        </div>';
        } elseif (@$error_id == "success") {

            $this->view->noti = '<div class="alert alert-success fade in">
                        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        	<strong>Succss!</strong> Message Successfully sent. Thank you.
                        </div>';
        } elseif (@$error_id == "secureid") {

            $this->view->noti = '<div class="alert alert-danger fade in">
                        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        	<strong>Warning!</strong> Invalid Security Code.
                        </div>';
        }
		
		
        $this->view->render('p');
    }
}

?>