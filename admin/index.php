<?php
//error_reporting('E_ALL');
ini_set('display_errors', '1');
session_start();

require_once('config/paths.php');
require_once('config/sysconfig.php');

//VQmod initialization
require_once(BASEPATH.'vqmod/vqmod.php');
VQMod::bootup(); //VqMod boot
//Infi Initialization

require_once(VQMod::modCheck(BASEURL . 'libs/Bootstrap.php'));
require_once(VQMod::modCheck(BASEURL . 'libs/Controller.php'));
require_once(VQMod::modCheck(BASEURL . 'libs/Model.php'));
require_once(VQMod::modCheck(BASEURL . 'libs/View.php'));
require_once(VQMod::modCheck(BASEURL . 'libs/encryption.php'));
require_once(VQMod::modCheck(BASEPATH . 'libs/system.php'));
if (DB_DRIVER == "MYSQLI") {
    require_once(VQMod::modCheck(BASEPATH . 'libs/sqli.php'));
} else {
    require_once(VQMod::modCheck(BASEPATH . 'libs/sql.php'));
}
require_once(VQMod::modCheck(BASEURL . 'functions/functions.php'));
require_once(VQMod::modCheck(BASEURL . 'public/lang.php'));
require_once(VQMod::modCheck(BASEURL . 'functions/date.php'));
//Infi Boot
$app = new Bootstrap();
?>