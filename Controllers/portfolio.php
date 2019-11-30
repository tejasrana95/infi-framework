<?php
class Portfolio extends Controller {

    function __construct() {
        parent::__construct();
    }
    function index() {
        $sql = new sql();
        $sql->connect();
        if(isset($_GET['portfolioId']))
        {
            $this->view->row = $sql->fetch("portfolio", array("uid" => addslashes($_GET['portfolioId'])));
        }
        else
        {
            $this->view->row = $sql->fetch("portfolio", array("1" =>"1"),"order by RAND() LIMIT 1");
        }
        $this->view->allrow = $sql->fetchAll("portfolio", array("1" =>"1"),"order by uid desc");
        $this->view->render('portfolio');
    }
}

?>