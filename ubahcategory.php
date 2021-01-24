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
			category_name='$_POST[txt_username]',
			WHERE category_id ='$_GET[category_id]'
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
			'$_POST[txt_username]')
			");

		if($simpan)// jika simpan suskses
		{
			echo "<script>
			alert('simpan data sukses!');
			document.location='ubahcategory.php';
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
		$tampil=mysqli_query($koneksi, "SELECT * FROM tb_categoty WHERE category_id='$_GET[id]'");
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
	<title>Ubah User</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="icon"  href="./img/1.jpg">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body >
	<!--header-->
	<header>
		<div class="container">
			<h1><a href="dashboard.php">Gemoy</a></h1>
			<ul>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="profile.php">Profil</a></li>
				<li><a href="data-kategori.php">Data Kategori</a></li>
				<li><a href="data-produk.php">Data Produk</a></li>
				<li><a href="keluar.php">Keluar</a></li>

			</ul>
		</div>
	</header>

	<div class="card-body">
		<form method="POST" action="">
			<div class="card-heade bg-success text-white text-center">
				<b> EDIT TABLE</b>
			</div>
			<div class="card-body">
				<div class="form-group">
					<label>CATEGORY ID</label>
					<input type="text" name="txt_id" value="<?=@$vkb?>" class="form-control" placeholder="Input Category ID" required=""> <!--required fungsinya untuk menampilkan perintah agar tidak blh kosong-->
				</div>
				<div class="form-group">
					<label>CATEGORY NAME</label>
					<input type="text" name="txt_username"  value="<?=@$vkp?>" class="form-control" placeholder="Input Category Name" required=""> <!--required fungsinya untuk menampilkan perintah agar tidak blh kosong-->
				</div>


				<button type="Submit" class="btn btn-success" name="buttonsimpan"> Simpan </button>
				<button type="Reset" class="btn btn-danger" name="buttonreset"> Reset </button>

			</form>
		</div>
		<!--ini akhir card form-->

		<!--ini awal card tabel-->
		<div class="card mt-3">
			<div class="card-heade bg-success text-white text-center">
				<b> Daftar Edit User</b>
			</div>
			<div class="card-body">

				<table class="table table-bordered table-striped"> <!--tabel strip = membuat tabel menjadi abu di header-->
					<tr>
						<th class="text-center">CATEGORY ID</th>
						<th class="text-center">CATEGORY NAME</th>
						<th class="text-center">Action</th>
					</tr>

					<?php
					$no=1;
					$tampil=mysqli_query($koneksi, "SELECT * FROM tb_categoty order by category_id ");
					while ($data=mysqli_fetch_array($tampil)) :
						?>
						<tr>

							<td><?=$data['category_id']?></td>
							<td><?=$data['category_name']?></td>

							<td>

								<a href="mahasiswabck.php?hal=edit&id=<?= $data->category_id ?>" class="btn btn-outline-secondary">Edit</a>
								<a href="mahasiswabck.php?hal=hapus&id=<?= $data->category_id ?>" onclick="return confirm('Apakah yakin ingin menghapus data ini??')" class="btn btn-danger">Hapus</a>


							</td>
						</tr>
					<?php endwhile; //penutup perulangan while?>

				</table>
				<a href="data-kategori.php" class="btn" > KEMBALI</a>
			</div>
			<!--ini akhir card tabel-->
		</div>


		<footer class="text-center p-4">
			<h4 class="text-dark">Desain By rizka</h6>
				<small>Copyright &copy; 2021 - Gemoy Banget</small>
			</div>



		</body>
		</html>
