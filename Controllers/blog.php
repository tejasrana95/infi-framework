<?php
class P extends Controller{

	function __construct(){
		parent::__construct();

	
	}
	function index()
	{
		$url=addslashes(@$_GET['url']);
		$url=rtrim($url,'/');
		$url=explode('/',$url);
		
		$file=view_path.$url[1].'.php';
		if(file_exists($file))
		{
			$this->view->render($url[1]);
		}
		else
		{
			$this->view->render("404");
			//return false;
		}
		
		
		
		
	}
}

?>