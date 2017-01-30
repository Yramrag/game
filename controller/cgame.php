<?php
/**
 * Created by PhpStorm.
 * User: Валентин
 * Date: 20.10.2016
 * Time: 0:42
 */
require_once $root . '/model/mgame.php';
class Cgame extends Game {
    public function create($id, $login) {
        $html = parent::createGame($id, $login);
        return $html;
    }
}