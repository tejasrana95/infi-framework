<?php
class Filemanager extends Controller {

    function __construct() {
        parent::__construct();
    }
    function index() {
		$sql=new sql();
		$sql->connect();
		
		authentication();
		if(GET('reply')=="Ok")
		{
			header('Location: '.URL.'home/');
		}
		elseif(GET('reply')=="InvalidLogin")
		{
			$this->view->noti=msg('InvalidLogin');
		}
		elseif(GET('reply')=="AccountBlock")
		{
			$this->view->noti=msg('AccountBlock');
		}
			
    
        if (checkPermission('premission_filemanager')) {
            $this->view->render('filemanager');
        } else {
            $this->view->render('permission_denied');
        }
       
    }

}

