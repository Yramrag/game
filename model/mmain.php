<?php
/**
 * Created by PhpStorm.
 * User: Валентин
 * Date: 18.10.2016
 * Time: 23:04
 */

class Main {
    protected function front($root) {
        $path = $root . '/view/main.tpl';
        $str = file_get_contents($path);
        return $str;
    }

}