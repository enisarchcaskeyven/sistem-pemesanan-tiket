<?php


require_once "../config/Database.php";


class User{


private $db;



function __construct(){


    $database = new Database();

    $this->db = $database->koneksi();


}




function register($username,$nama,$password){



    $cek = mysqli_query(

        $this->db,

        "SELECT * FROM user 
        WHERE username='$username'"

    );



    if(mysqli_num_rows($cek) > 0){

        return false;

    }




    $simpan = mysqli_query(

        $this->db,

        "INSERT INTO user 
        (username,nama,password)

        VALUES

        ('$username',
        '$nama',
        '$password')"

    );



    return $simpan;


}






function login($username,$password){



    $data = mysqli_query(

        $this->db,

        "SELECT * FROM user

        WHERE username='$username'

        AND password='$password'"

    );



    if(mysqli_num_rows($data) > 0){


        return mysqli_fetch_assoc($data);


    }else{


        return false;


    }



}



}

?>