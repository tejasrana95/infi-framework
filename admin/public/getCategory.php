<?php
require '../config/paths.php';
require '../config/sysconfig.php';
require '../libs/Bootstrap.php';
require '../libs/Controller.php';
require '../libs/Model.php';
require '../libs/View.php';
require '../libs/encryption.php';
require BASEPATH . 'libs/system.php';
if (DB_DRIVER == "MYSQLI") {
        require BASEPATH . 'libs/sqli.php';
} else {
    require BASEPATH . 'libs/sql.php';
}
require '../functions/functions.php';
require '../public/lang.php';
require '../functions/date.php';

if($_GET['cat']){
	$sql=new sql();
	$sql->connect();
	
	$row=$sql->fetchAll("category",array("parent"=>$_GET['cat']));
	if(isset($row)){
	foreach($row as $rows)
	{	
		echo '<option label="" value="'.$rows['uid'].'"';
			echo ' >'.$rows['text'].'</option>';
	}
	}
	else
	{
		echo '<option label="" value="">No Data Available </option>';
	}
}

?>