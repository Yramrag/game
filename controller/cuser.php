<?php
/**
 * Created by PhpStorm.
 * User: Валентин
 * Date: 18.10.2016
 * Time: 21:17
 */
require_once $root . '/model/muser.php';
class Cuser extends User {
  public function login($connect) {
      $output = parent::login($_POST['login'], $_POST['password']);
      return $output;
  }

    public function common($connect) {
        $output = parent::common($_SESSION['user']['login'], $connect);
        return $output;
    }

    public function register($connect) {
        $output = parent::register($_POST['login'], $_POST['password'], $connect);
        return $output;
    }
}
?>