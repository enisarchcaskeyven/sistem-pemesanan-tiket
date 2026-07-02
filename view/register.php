<!DOCTYPE html>


<html lang="id">


<head>


<meta charset="UTF-8">


<title>Register</title>


<link rel="stylesheet" href="../assets/css/style.css">


</head>




<body class="login-page">






<div class="login-card">





<div class="login-logo">

👤

</div>





<h2>

Register

</h2>


<p>

Buat akun baru

</p>






<form action="../controller/register.php" method="POST">






<div class="form-group">


<label>

Username

</label>


<input

type="text"

name="username"

class="form-control"

placeholder="Username"

required>


</div>







<div class="form-group">


<label>

Nama Lengkap

</label>


<input

type="text"

name="nama"

class="form-control"

placeholder="Nama lengkap"

required>


</div>







<div class="form-group">


<label>

Password

</label>


<input

type="password"

name="password"

class="form-control"

placeholder="Password"

required>


</div>







<button name="register">


Daftar


</button>






<p style="margin-top:20px;">


Sudah punya akun?


<a href="login.php">

Login

</a>


</p>







</form>





</div>






</body>


</html>