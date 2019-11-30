<?php
class Systems extends Controller {

    function __construct() {
        parent::__construct();
    }
    function index() {
		$sql=new sql();
		$sql->connect();
		$getPage=getPage();
		$this->view->getPage=$getPage;
		authentication();
		
	
		 if(isset($_POST['delete'])){
			for($i=0;$i<count($_POST['uid']);$i++)
			{
				$delete=$sql->delete('system',array("uid"=>$_POST['uid'][$i]));
			}
			if($delete)
			{
				header("Location: ".URL.$getPage[0]."/?reply=SystemVariableDeleted");
			}
			else
			{
				header("Location: ".URL.$getPage[0]."/?reply=PageError");
			}
		}
				
		if(isset($_POST['submit']) and isset($_POST['editId'])){
                  
			$update=$sql->update("system",array("system"=>$_POST['system'],"value"=>$_POST['value']),array('uid'=>$_POST['editId']));
                        
                        if($update)
			{
				header("Location: ".URL.$getPage[0]."/?reply=SystemVariableUpdated");
			}
			else
			{
				header("Location: ".URL.$getPage[0]."/?reply=PageError");
			}
		}
		elseif(isset($_POST['submit'])){
			$insert=$sql->insert("system",array("system"=>$_POST['system'],"value"=>$_POST['value']));
			if($insert)
			{
				header("Location: ".URL.$getPage[0]."/?reply=SystemVariableAdded");
			}
			else
			{
				header("Location: ".URL.$getPage[0]."/?reply=PageError");
			}
		}
		if(GET('editId')){
			$this->view->editFetch=$sql->fetch('system',array("uid"=>GET('editId')));
		}
		
		$this->view->FetchSystem=$sql->fetchAll("system",array("reserved !"=>'1'),"order by uid asc");
    	
		if(GET('reply'))
		{
			$this->view->noti=msg(GET('reply'));
		}
                
                
               if (checkPermission('premission_site')) {
            $this->view->render('systems');
        } else {
            $this->view->render('permission_denied');
        }
      
    }

}

