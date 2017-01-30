<?php
/**
 * Created by PhpStorm.
 * User: Валентин
 * Date: 18.10.2016
 * Time: 23:11
 */
require_once $root  . '/model/mmain.php';
class Cmain extends Main {
    public function generate() {
        $ret = parent::front($_SERVER['DOCUMENT_ROOT']);
        return $ret;
    }
}