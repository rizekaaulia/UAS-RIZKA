<?php
//koneksi database
$server ="localhost";
$user ="root";
$pass ="";
$database="jual";

$koneksi=mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));
//

?>

<!DOCTYPE html>
<html>
<head>
  <title>Menu Login</title>
  <link rel="stylesheet" type="text/css" href="login.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="icon"  href="./img/10.jpg">


</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Elhusna Official</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="index.php">Beranda</a>
          </li>        
        </div>
      </div>
    </nav>

    <div class="panel_login">
      <h2>Masuk Akun</h2>
      <form action="login_2.php" method="POST">
       <label>Username</label>
       <input type="text" name="username" class="form_login" placeholder="Username" required="required">

       <label>Password</label>
       <input type="password" name="password" class="form_login" placeholder="Password" required="required">

       <input type="submit" class="tombol_login" value="LOGIN">
       <a href="utama.php"></a>
       <br/>
       <br/>

     </form>
   </div>
 </body>
 </html>


