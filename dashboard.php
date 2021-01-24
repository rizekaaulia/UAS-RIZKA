

<?php
//koneksi database
$server ="localhost";
$user ="root";
$pass ="";
$database="jual";

$koneksi=mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | toko</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body >
  <!--header-->
  <header>
    <div class="container">
      <h1><a href="dashboard.php">Elhusna Official</a></h1>
      <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="profile.php">Profil</a></li>
        <li><a href="data-kategori.php">Data Kategori</a></li>
        <li><a href="data-promosi.php">Data Produk</a></li>
        <li><a href="keluar.php">Keluar</a></li>

      </ul>
    </div>
  </header>

  <!--content-->
  <div class="section">
    <div class="container">
      <h3>Dashboard</h3>
      <div class="box">
        <h4>Selamat Datang Di Elhusna Official</h4>
        <h5>Elhusna : brand fashion untuk muslim yg terinspirasi nama Al-Husna yaitu kebaikkan, diharapkan kedepannya banyak kebaikkan yg terlaksana dari elhusna, memberikan pemahanan bahwa berbusana bukan hanya sekedar memakai pakain, namun juga mengandung nilai keanggunan, kesopanan dan kerapian dengan style terbaru sesuai syariat.</h5>
        
        <a href="utama.php" class="btn-primary" > Koleksi</a>
      </div>
    </div>
  </div>

  <!-- footer -->
  <footer>
    <div class="container">
      <small>Copyright &copy; 2021 - Elhusna Official</small>
    </div>
  </footer>
</body>
</html>
