<?php

function msg($msgId) {
    $msg['InvalidLogin'] = '<div class="alert alert-danger" id="msg">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <i class="fa fa-ban-circle"></i><strong>Error : </strong> Invalid username or password.</div>';

    $msg['AccountBlock'] = '<div class="alert alert-danger" id="msg">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <i class="fa fa-ban-circle"></i><strong>Error : </strong> Your Account is blocked.</div>';

    //common
    $msg['Error'] = '<div class="alert alert-danger" id="msg">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <i class="fa fa-ban-circle"></i><strong>Error : </strong> Unable to perform Action. Please try again.</div>';
    $msg['Success'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Action executed successfully.</div>';
    
    
    
    $msg['PageCreated'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Page created.</div>';
    $msg['PageUpdated'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Page Updated.</div>';
    $msg['PageDeleted'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Page Deleted.</div>';
    $msg['CategoryCreated'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Category created.</div>';
    $msg['CategoryUpdated'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Category Updated.</div>';
    $msg['TemplateCreated'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Template created.</div>';
    $msg['TemplateUpdated'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Template Updated.</div>';
    $msg['Moduledeactivate'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Module Deactivated.</div>';
    $msg['Moduleactivate'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Module Activated.</div>';
    $msg['ModuleAdded'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Module Added.</div>';
    $msg['ModuleUpdated'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Module Updated.</div>';
    $msg['ModuleDeleted'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Module Deleted.</div>';
    $msg['SystemVariableAdded'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> System Variable Added.</div>';
    $msg['SystemVariableUpdated'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> System Variable Updated.</div>';
    $msg['SystemVariableDeleted'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> System Variable Deleted.</div>';

    $msg['MenuCreated'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Menu Deleted.</div>';
    $msg['MenuUpdated'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Menu Updated.</div>';
    $msg['SystemVariableDeleted'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> System Variable Deleted.</div>';
    $msg['UserUpdated'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> User Updated.</div>';
    $msg['UserCreated'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> User Created.</div>';

    $msg['PageError'] = '<div class="alert alert-danger" id="msg">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <i class="fa fa-ban-circle"></i><strong>Error : </strong> Unable to perform Action. Please try again.</div>';
    $msg['PasswordNotMatch'] = '<div class="alert alert-danger" id="msg">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <i class="fa fa-ban-circle"></i><strong>Error : </strong> Password Not Match. Please try again.</div>';
    $msg['UserAlready'] = '<div class="alert alert-danger" id="msg">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <i class="fa fa-ban-circle"></i><strong>Error : </strong> User already Exists. Please try again.</div>';
    $msg['BlogCreated'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Blog Created.</div>';
    $msg['BlogUpdated'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Blog updated.</div>';
    $msg['BlogDeleted'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Blog Deleted.</div>';
//slider
    $msg['SliderCreated'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Slider created.</div>';
    $msg['SliderUpdated'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Slider Updated.</div>';
    $msg['SliderDeleted'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Slider Deleted.</div>';
    $msg['TempDeleted'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Template Deleted.</div>';
    $msg['MenuDeleted'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Menu Deleted.</div>';
    $msg['CatDeleted'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Category Deleted.</div>';

//modules
    $msg['permissiondenied'] = '<div class="alert alert-danger" id="msg">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <i class="fa fa-ban-circle"></i><strong>Error : </strong> You do not have rights to access module.</div>';
    $msg['ModuleInstalled'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Module Installed.</div>';
    $msg['ModuleRemoved'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Module uninstalled.</div>';
    $msg['ModuleDisabled'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Module Disabled.</div>';
    $msg['ModuleEnabled'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Module Enabled.</div>';
//profile
    $msg['ProfileUpdate'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Profile Updated. Please login again to update system.</div>';
    $msg['BothPasswordNotMatch'] = '<div class="alert alert-danger" id="msg">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <i class="fa fa-ban-circle"></i><strong>Error : </strong> Both Password you entered Not Matched. Please try again.</div>';
//vqmod
    $msg['XmlDisabled'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> XML Disbaled.</div>';
    $msg['XmlEnabled'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> XML Enabled.</div>';
    $msg['XmlDeleted'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> XML Deleted.</div>';
//vqmod log
    $msg['LogCleaned'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Log Deleted.</div>';
//vqmos cache
    $msg['CacheCleaned'] = '<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Cache Deleted.</div>';

//test_module
    $msg['TestModule_Success']='<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Insterted Successfully.</div>';
    $msg['TestModule_deleted']='<div class="alert alert-success" id="msg">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ok-sign"></i><strong>Success : </strong> Deleted Successfully.</div>';
    
    return $msg[$msgId];
}

?>
