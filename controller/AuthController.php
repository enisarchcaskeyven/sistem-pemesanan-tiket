<?php
session_start();

require_once "../config/Database.php";
require_once "../model/User.php";

$db = (new Database())->koneksi();
$user = new User($db);

if (isset($_POST['register'])) {

    $user->register($_POST['username'], $_POST['password'], $_POST['nama']);

    header("Location: ../view/login.php");
}

if (isset($_POST['login'])) {

    $login = $user->login($_POST['username'], $_POST['password']);

    if ($login) {
        $_SESSION['user'] = $login;
        header("Location: ../view/dashboard.php");
    } else {
        echo "Login gagal";
    }
}