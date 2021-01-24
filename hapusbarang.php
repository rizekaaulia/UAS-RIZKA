<?php 
include_once('koneksi.php');

$id = $_GET['id'];
$sql= "DELETE FROM tb_categoty where category_id=$id";
$result = mysqli_query($conn,$sql);
if ($result) {
		#jika berhasil
	header('Location: ubahcategory.php');
}else{
		#jika gagal
	echo "SIMPAN DATA GAGAL : ".mysqli_error($conn); 
}
?>
<br><br>
<a href="ubahcategory.php">KEMBALI</a>