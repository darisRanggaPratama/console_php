<?php 
//memulai session yang disimpan pada browser
session_start();

//cek apakah sesuai status sudah login? kalau belum akan kembali ke form login
if($_SESSION['status']!="sudah_login"){
//melakukan pengalihan
header("location:login.php");
} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>
	<h1>Yay! Selamat datang : <?php echo $_SESSION['nama']; ?></h1>

	<br>
	<a href="logout.php">Klik disini untuk logout.</a>
</body>
</html>