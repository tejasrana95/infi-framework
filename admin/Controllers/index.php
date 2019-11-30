<?php
class Index extends Controller {
    function __construct() {
        parent::__construct();
    }
    function index() {
       
		$sql=new sql();
		$sql->connect();
	     
if(@$_POST['username'] && @$_POST['password'])
{

	$sql=new sql();
	$sql->connect();
	$array_data=array('username' => addslashes($_POST['username']),
						'password' => addslashes(md5($_POST['password'])));
	$check=$sql->check('admin',$array_data);
	$dateTime=DateTime();
	if($check)
	{
            if($sql->check("admin",array('active'=>'1'),$array_data)){
		$fetch=$sql->fetch("admin", $array_data);
		
		
		//Set Cookie
		$login_id=base64_encode($fetch['uid']);
		$name=base64_encode(addslashes($_POST['username']));
                $fullname=base64_encode(stripslashes($fetch['name']));
                $login_pic=base64_encode(stripslashes($fetch['profilepic']));
                $shortname=(preg_split('/\s+/', stripslashes($fetch['name'])));
                setcookie("login_short_name", base64_encode($shortname[0]),time()+86400);
                setcookie("login_pic", $login_pic,time()+86400);
                setcookie("login_name", $fullname,time()+86400);
		setcookie("login_username", $name,time()+86400);
		setcookie("login_user_uid", $login_id,time()+86400);
		setcookie("login_user_permission", $fetch['permission'],time()+86400);
		
		//activate Session
		$session = base64_encode(URL.'-TEJAS-'.md5(rand(123456,123456789)));
		$_SESSION['login']=base64_decode('SU5GSSBDTVM=');
		$_SESSION['login_code']=$session;
		
                //setting Permission
                $permission=getPermission($fetch['permission']);
                $_SESSION['permission_blog']=$permission['permission_blog'];
                $_SESSION['premission_page']=$permission['premission_page'];
                $_SESSION['premission_site']=$permission['premission_site'];
                $_SESSION['premission_filemanager']=$permission['premission_filemanager'];
                $_SESSION['premission_user']=$permission['premission_user'];
                $_SESSION['permission_other']=$permission['permission_other'];
                $_SESSION['permission_other1']=$permission['permission_other1'];
                $_SESSION['permission_other2']=$permission['permission_other2'];
                $_SESSION['permission_other3']=$permission['permission_other3'];
                $_SESSION['permission_other4']=$permission['permission_other4'];
                
                
                
		//update login record
		$updateArray=array("ip"=>$_SERVER['REMOTE_ADDR'], "lastAcess" =>$dateTime['date_with_time']);
		$update=$sql->update("admin",$updateArray,array("uid"=>$fetch['uid']));
		
		
		header('Location: '.URL.'home/');
            }
            else
            {
                header('Location: '.URL.'?reply=AccountBlock');
            }
	}
	else
	{
		if(isset($_COOKIE["attemp"]))
		{
			$attemp=$_COOKIE["attemp"]+1;
			setcookie("attemp", $attemp,time()+86400);
		}
		else
		{
			setcookie("attemp", 1,time()+86400);
		}
		
		header('Location: '.URL.'?reply=InvalidLogin');
	}
}
                
                
		if(@$_COOKIE['attemp']==3)
		{
			header("Location: ".URL."public/error.php?error=10101010");
		}
		authentication('Login');
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
			
    
        $this->view->render('index');
    }
}
