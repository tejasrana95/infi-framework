<?php
$sql = new sql();
$sql->connect();
$system = $sql->fetchAll("system", array("1" => '1'));
foreach ($system as $systems) {
    define($systems['system'], $systems['value']);
}
define ('TEMPLATE',URL.VIEW.THEME.'/');
?>