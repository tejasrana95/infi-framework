<?php

class TestModule_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    function install() {
        $this->sql->query("
CREATE TABLE IF NOT EXISTS `" . PREFIX . "demo_module` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
 ");
    }

    function insert($data) {
        $insert = $this->sql->insert("demo_module", $data);
        return $insert;
    }

    function delete($data) {

        foreach ($data as $datas) {
            $deleted = $this->sql->delete("demo_module", array("uid" => $datas));
        }
        return $deleted;
    }

    function allData() {
        $fetch = $this->sql->fetchAll("demo_module", array(1 => 1));
        return $fetch;
    }

    function uninstall() {
        $this->sql->query("DROP TABLE `" . PREFIX . "demo_module`");
    }

}
