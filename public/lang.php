<?php
function msg($msgId){
$msg['InvalidLogin']='<div class="alert alert-danger" id="msg">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <i class="fa fa-ban-circle"></i><strong>Error : </strong> Invalid username or password.</div>';

$msg['AccountBlock']='<div class="alert alert-danger" id="msg">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <i class="fa fa-ban-circle"></i><strong>Error : </strong> Your Account is blocked.</div>';	

$msg['PageCreated']='<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Page created.</div>';	
$msg['PageUpdated']='<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Page Updated.</div>';
$msg['PageDeleted']='<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Page Deleted.</div>';
$msg['CategoryCreated']='<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Category created.</div>';
$msg['CategoryUpdated']='<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Category Updated.</div>';
$msg['TemplateCreated']='<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Template created.</div>';
$msg['TemplateUpdated']='<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Template Updated.</div>';



$msg['PageError']='<div class="alert alert-danger" id="msg">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <i class="fa fa-ban-circle"></i><strong>Error : </strong> Unable to perform Action. Please try again.</div>';	
return $msg[$msgId];
	}
?>