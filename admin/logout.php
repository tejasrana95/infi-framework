<?php

session_start();
require 'config/paths.php';
require 'config/sysconfig.php';
require 'libs/Bootstrap.php';
require 'libs/Controller.php';
require 'libs/Model.php';
require 'libs/View.php';
require 'libs/encryption.php';
require 'functions/sql.php';
require 'functions/functions.php';
require 'public/lang.php';
require 'functions/date.php';




unset($_SESSION['login']);
unset($_SESSION['login_code']);

session_destroy();
setcookie("login_username", "", time() - 86400);
setcookie("login_user_uid", "", time() - 86400);
setcookie("login_user_permission", "", time() - 86400);
setcookie("login_short_name", "", time() - 86400);
setcookie("login_name", "", time() - 86400);
setcookie("login_pic", "",time()-86400);
header("Location: " . URL);
?>

