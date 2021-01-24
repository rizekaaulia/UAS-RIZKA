<?php 

$servername = 'localhost'; // 127.0.0.1
$username = 'root';
$pass = '';
$database = 'jual';
$conn = mysqli_connect($servername, $username, $pass, $database);


if (!$conn) {
	die("Koneksi gagal: " . mysqli_connect_error());
}

?>