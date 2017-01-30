<?php
/**
 * Created by PhpStorm.
 * User: Валентин
 * Date: 18.10.2016
 * Time: 20:50
 */
class User {
    private function templ($login, $stats) {
        global $root;
        $output = file_get_contents($root . '/view/common.tpl');
        $output = str_replace('{--LOGIN--}', $login, $output);
        $output = str_replace('{--WIN--}', $stats['win'], $output);
        $output = str_replace('{--LOOSE--}', $stats['loose'], $output);
        $output = str_replace('{--STANDOFF--}', $stats['parity'], $output);
        return $output;
    }
    protected function login($login, $password) {
        global $connect;
       // die($login . ' ' . $password . ' ' . $connect);
    $login = mysqli_real_escape_string($connect, $login);
    $pass = md5($password);
    $sql = "SELECT * FROM user WHERE login = '{$login}' AND password = '{$pass}'";
    $result = mysqli_query($connect, $sql);
    if (mysqli_affected_rows($connect) == 0) {return false;}
    else {
        $res = mysqli_fetch_assoc($result);
        //$data['login'] = $login;
        $stats = unserialize($res['statistic']);
        $_SESSION['user']['login'] = $login;
        $_SESSION['user']['id'] = $res['id'];
        $out = $this->templ($login, $stats);
        return $out;
    }
}

    protected function common($login, $connect) {
        $login = mysqli_real_escape_string($connect, $login);
        $sql = "SELECT statistic FROM user WHERE login = '{$login}'";
        $result = mysqli_query($connect, $sql);
        if (mysqli_affected_rows($connect) == 0) {return false;}
        else {
            $res = mysqli_fetch_assoc($result);
            $data['login'] = $login;
            $stats = unserialize($res['statistic']);
            $_SESSION['user']['login'] = $login;
            $out = $this->templ($login, $stats);
            return $out;
        }
    }

    protected function register($login, $password, $connect) {
        if ($login == '') {die('enter your login, please');}
        if ($password == '') {die('enter your password, please');}
        $login = mysqli_real_escape_string($connect, $login);
        $sql = "SELECT id FROM user WHERE login = '{$login}'";
        $result = mysqli_query($connect, $sql);
        if (mysqli_affected_rows($connect) == 0) {
            $password = md5($password);
            $arr = array();
            $arr['win'] = 0;
            $arr['loose'] = 0;
            $arr['parity'] = 0;
            $stat = serialize($arr);
            $sql = "INSERT INTO user (login, password, statistic) VALUES ('{$login}', '{$password}', '{$stat}')";
            $result1 = mysqli_query($connect, $sql);
            if ($result1) {
                $this->login($login, $password, $connect);
            }

        }
        else {die('Login is already in use');}
        return true;
    }
}
?>