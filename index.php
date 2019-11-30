<?php
//error_reporting('E_ALL');
ini_set('display_errors', '1');
session_start();
require_once('vqmod/vqmod.php');
VQMod::bootup();
//use an autoloader
require_once(VQMod::modCheck('config/paths.php'));
require_once(VQMod::modCheck('config/sysconfig.php'));
require_once(VQMod::modCheck('libs/Bootstrap.php'));
require_once(VQMod::modCheck('libs/Controller.php'));
require_once(VQMod::modCheck('libs/Model.php'));
require_once(VQMod::modCheck('libs/View.php'));
require_once(VQMod::modCheck('libs/system.php'));
if (DB_DRIVER == "MYSQLI") {
    require_once(VQMod::modCheck('libs/sqli.php'));
} else {
    require_once(VQMod::modCheck('libs/sql.php'));
}
require_once(VQMod::modCheck('libs/encryption.php'));
require_once(VQMod::modCheck('functions/functions.php'));
require_once(VQMod::modCheck('public/lang.php'));
require_once(VQMod::modCheck('functions/date.php'));
require_once(VQMod::modCheck('functions/menu.php'));
require_once(VQMod::modCheck('config/config.php'));
$app = new Bootstrap();
