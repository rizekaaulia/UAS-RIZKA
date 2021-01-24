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
    $edit =mysqli_query($koneksi, "UPDATE tb_product set 
      product_id='$_POST[txt_id]',
      category_id='$_POST[txt_cid]',
      product_name='$_POST[txt_username]',
      product_description='$_POST[txt_deskipri]',
      product_image='$_POST[txt_image]',
      data_created='$_POST[txt_data]'

      WHERE product_id ='$_GET[id]'
      ");

    if($edit)// jika edit data sukses
    {
      echo "<script>
      alert('edit data sukses!');
      document.location='ubahproduct.php';
      </script>";

    }else{
      echo "<script>
      alert('edit data gagal!');
      document.location='ubahproduct.php';
      </script>";

    }



  }else{
    //data akan di simpan baru

    $simpan =mysqli_query($koneksi, "INSERT INTO tb_product (product_id,category_id,product_name,product_description,product_image,data_created)
      VALUES
      ('$_POST[txt_id]',
      '$_POST[txt_cid]',
      '$_POST[txt_username]',
      '$_POST[txt_deskipri]',
      '$_POST[txt_image]',
      '$_POST[txt_data]')
      ");

    if($simpan)// jika simpan suskses
    {
      echo "<script>
      alert('simpan data sukses!');
      document.location='ubahproduct.php';
      </script>";

    }else{
      echo "<script>
      alert('simpan data gagal!');
      document.location='ubahproduct.php';
      </script>";

    }
  }

  
}
// pengujian edit dan hapus

if (isset($_GET['hal'])) {
  //pengujian jika edit data
  if ($_GET['hal']=="edit") {
    //tampilkan data yang akan di edit
    $tampil=mysqli_query($koneksi, "SELECT * FROM tb_product WHERE product_id='$_GET[id]'");
    $data=mysqli_fetch_array($tampil);
    if ($data) {
      //jika data ditemukan , maka data di tampung ke dalam variabel
      $vkb=$data['product_id'];
      $vkp=$data['category_id'];
      $vkp=$data['product_name'];
      $vkp=$data['product_description'];
      $vkp=$data['product_image'];
      $vkp=$data['data_created'];
    }
  }
  elseif($_GET['hal']=="hapus"){
    //persiapan hapus data
    $hapus=mysqli_query($koneksi, "DELETE FROM tb_product WHERE product_id='$_GET[id]'");
    if ($hapus) {
      echo "<script>
      alert('hapus data berhasil!');
      document.location='ubahproduct.php';
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
  <!--search-->
  <div class="card mt-3">
    <div class="card-heade bg-success text-white text-center">
      <b> Daftar Category</b>
    </div>
    <div class="card-body">

      <table class="table table-bordered table-striped"> <!--tabel strip = membuat tabel menjadi abu di header-->
        <tr>
          <th class="text-center">ID PRODUCT</th>
          <th class="text-center">KATEGORI ID</th>
          <th class="text-center">NAMA PRODUK</th>
          <th class="text-center">PRODUK DESKRIPSI</th>
          <th class="text-center">FOTO PRODUK</th>
          <th class="text-center">LAST MODIFY</th>


        </tr>

        <?php
        $no=1;
        $tampil=mysqli_query($koneksi, "SELECT * FROM tb_product order by product_id ");
        while ($data=mysqli_fetch_array($tampil)) :
          ?>
          <tr>
            <td><?=$data['product_id']?></td>
            <td><?=$data['category_id']?></td>
            <td><?=$data['product_name']?></td>
            <td><?=$data['product_description']?></td>
            <td>
              <ul class="photos sortable ui-sortable">
                <li class="" style=""><img src="../img/1.jpg">
                  <div class="links">

                  </div></li>
                </ul></td>
                <td class="text-center"><?=$data['data_created']?></td>



              </tr>
            <?php endwhile; //penutup perulangan while?>


          </table>
          <a href="tambahproduk.php ?hal=tambah&id=<?=$data['id']?>" class="btn" > TAMBAH</a>
          <a href="ubahproduk.php ?hal=edit&id=<?=$data['id']?>" class="btn" > EDIT</a>
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
