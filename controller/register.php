<?php


require_once "../model/User.php";



if(isset($_POST['register'])){


    $username = $_POST['username'];

    $nama = $_POST['nama'];

    $password = $_POST['password'];



    $user = new User();



    $hasil = $user->register(

        $username,

        $nama,

        $password

    );





    if($hasil){



        echo "


        <script>


        alert('Register berhasil, silakan login');


        window.location='../view/login.php';


        </script>


        ";



    }else{



        echo "


        <script>


        alert('Username sudah digunakan');


        window.location='../view/register.php';


        </script>


        ";



    }



}



?>