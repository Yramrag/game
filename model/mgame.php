<?php
/**
 * Created by PhpStorm.
 * User: Валентин
 * Date: 19.10.2016
 * Time: 23:25
 */

class Game {
    protected function createGame($id, $login) {
        global $connect;
        $id = (int)$id;
        $start = array(0, 0, 0, 0, 0, 0, 0, 0, 0);
        $field = serialize($start);
        $sql = "INSERT INTO game (X_id, O_id, turn, field, date) VALUES ('{$id}', 0, 'X', '$field', NOW())";
        $result = mysqli_query($connect, $sql);
        $gameid = mysqli_insert_id($connect);
        global $root;
        $output = file_get_contents($root . '/view/field.tpl');
        $output = str_replace('{--LOGIN--}', $login, $output);
        $output = str_replace('{--1--}', 'X', $output);
        $output = str_replace('{--2--}', 'O', $output);
        $output = str_replace('{--ID--}', $gameid, $output);
        return $output;
    }

    protected function connectGame($id, $login) {
        global $connect;
        global $root;
        $id = (int)$id;
        $sql = "SELECT t1.id, t2.login FROM game AS t1 JOIN user AS t2 ON t1.X_ID = t2.id WHERE t1.O_id = 0 ORDER BY t1.date DESC LIMIT 1";
        $result = mysqli_query($connect, $sql);
        if (mysqli_affected_rows($connect) == 0) {
            $output = file_get_contents($root . '/view/nogame.tpl');
        }
        else {
            $res = mysqli_fetch_assoc($result);

        }



    }
}