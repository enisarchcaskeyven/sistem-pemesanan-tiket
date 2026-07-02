<?php

session_start();

require_once "../model/User.php";

if(isset($_POST['login'])){

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $user = new User();

    $data = $user->login($username, $password);

    if($data){

        $_SESSION['id_user']  = $data['id_user'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['nama']     = $data['nama'];

        header("Location: ../view/dashboard.php");
        exit();

    }else{

        echo "<script>
                alert('Username atau Password salah!');
                window.location='../index.php';
              </script>";
        exit();

    }

}
?>