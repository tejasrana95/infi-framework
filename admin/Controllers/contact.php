<?php
class contact extends Controller{

	function __construct(){
		parent::__construct();

	
	}
	function index()
	{
		$url=get_id();
		$login =1;
		
		$send=addslashes(@$_REQUEST['Send']);
		if($send)
		{
			$name=addslashes(@$_REQUEST['name']);
			$email=addslashes(@$_REQUEST['email']);
			$contact_number=addslashes(@$_REQUEST['contact_number']);
			$msg=addslashes(@$_REQUEST['msg']);
			if($name!="" and $email!="" and $contact_number!="" and $msg!="")
			{
				$mail_data=array("name" => $name,
								"email" => $email,
								"contact_number" => $contact_number,
								"msg" => $msg);
				$send_mail=mail_send("contact",$email,$mail_data);
				if($send_mail)
				{
					redirect("contact/error/101");
				}
				else
				{
					redirect("contact/error/102");
				}
			}
				
			
			
		}
		
	
			$error_id=get_id();
			if(@$error_id[1]=="error")
			{
				
				if(@$error_id[2]=='101')
				{
					$this->view->notification='<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Success : </strong>Your Message has been send.</div>';
				}
				elseif(@$error_id[2]=='102')
				{
					$this->view->notification='<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error : </strong>Error occurred while sending your message. Please try again later.</div>';
				}
			}
		
		
		$this->view->render('contact');
	}
}

?>