<?php
session_start();
$connect = mysqli_connect('localhost', 'root', '', 'game');
$root = $_SERVER['DOCUMENT_ROOT'];
if ($_GET['action'] == 'logout') {
    unset($_SESSION['user']['login']);
    header ('Location: index.php');
}
//print_r($_SESSION);
if ($_GET['action'] == 'create') {
    require_once $root . '/controller/cgame.php';
   $game = new Cgame();
   echo $game->create($_SESSION['user']['id'], $_SESSION['user']['login']);
}
if ($_POST['register']) {
    require_once $root . '/controller/cuser.php';
    $user = new Cuser();
    $user->register($connect);
}

if (!$_SESSION['user']['login'] && !$_GET['action'] && !$_POST['enter']) {
    require_once $root . '/controller/cmain.php';
    $main = new Cmain();
    echo $main->generate();
}
else if ($_POST['enter']) {
    require_once $root . '/controller/cuser.php';
    $user = new Cuser();
    echo $user->login($connect);
}

else if ($_SESSION['user']['login']) {
    require_once $root . '/controller/cuser.php';
    $user = new Cuser();
    echo $user->common($connect);
}
//comment
?>