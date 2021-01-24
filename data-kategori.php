<?php
//koneksi database
$server ="localhost";
$user ="root";
$pass ="";
$database="jual";

$koneksi=mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));

//jika tombol simpan di klik 
if (isset($_POST['buttonsimpan'])) 
{
   //pengujian apakah data akan di edit atau simpan baru
  if ($_GET['hal']=="edit") {
    //data akan di edit
    $edit =mysqli_query($koneksi, "UPDATE tb_categoty set 
      category_id='$_POST[txt_id]',
      category_name='$_POST[txt_name]',

      WHERE category_id ='$_GET[id]'
      ");

    if($edit)// jika edit data sukses
    {
      echo "<script>
      alert('edit data sukses!');
      document.location='ubahcategory.php';
      </script>";

    }else{
      echo "<script>
      alert('edit data gagal!');
      document.location='ubahcategory.php';
      </script>";

    }



  }else{
    //data akan di simpan baru

    $simpan =mysqli_query($koneksi, "INSERT INTO tb_categoty (category_id,category_name)
      VALUES ('$_POST[txt_id]',
      '$_POST[txt_name]',

      ");

    if($simpan)// jika simpan suskses
    {
      echo "<script>
      alert('simpan data sukses!');
      document.location='ubahbcategory.php';
      </script>";

    }else{
      echo "<script>
      alert('simpan data gagal!');
      document.location='ubahcategory.php';
      </script>";

    }
  }

  
}
// pengujian edit dan hapus

if (isset($_GET['hal'])) {
  //pengujian jika edit data
  if ($_GET['hal']=="edit") {
    //tampilkan data yang akan di edit
    $tampil=mysqli_query($koneksi, "SELECT * FROM tb_categoty WHERE id='$_GET[id]'");
    $data=mysqli_fetch_array($tampil);
    if ($data) {
      //jika data ditemukan , maka data di tampung ke dalam variabel
      $vkb=$data['category_id'];
      $vkp=$data['category_name'];
    }
  }
  elseif($_GET['hal']=="hapus"){
    //persiapan hapus data
    $hapus=mysqli_query($koneksi, "DELETE FROM tb_categoty WHERE category_id='$_GET[id]'");
    if ($hapus) {
      echo "<script>
      alert('hapus data berhasil!');
      document.location='ubahcategory.php';
      </script>";
    }

  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Profile</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="icon"  href="./img/1.jpg">
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
  <!--ini akhir card form-->

  <!--ini awal card tabel-->
  <div class="card mt-3">
    <div class="card-heade bg-success text-white text-center">
      <b> Daftar Category</b>
    </div>
    <div class="card-body">

      <table class="table table-bordered table-striped"> <!--tabel strip = membuat tabel menjadi abu di header-->
        <tr>
          <th class="text">Category Id</th>
          <th class="text">Categry Name</th>

        </tr>

        <?php
        $no=1;
        $tampil=mysqli_query($koneksi, "SELECT * FROM tb_categoty order by category_id ");
        while ($data=mysqli_fetch_array($tampil)) :
          ?>
          <tr>

            <td><?=$data['category_id']?></td>
            <td><?=$data['category_name']?></td>


          </tr>
        <?php endwhile; //penutup perulangan while?>

      </table>
      <a href="tambahcategory.php ?hal=tambah&id=<?=$data['id']?>" class="btn" > TAMBAH</a>
      <a href="ubahcategory.php ?hal=edit&id=<?=$data['id']?>" class="btn" > EDIT</a>
      <a href="dashboard.php" class="btn" > KEMBALI</a>
    </div>
    <!--ini akhir card tabel-->
  </div>
  <!-- footer -->

  <footer class="text-center p-4">
    <h4 class="text-dark">Desain By Rizka Aulia</h4>
    <small>Copyright &copy; 2021 - Elhusna Official</small>
  </div>



</body>
</html>
