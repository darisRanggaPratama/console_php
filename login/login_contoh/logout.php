<?php 
// mengaktifkan session
session_start();
 
// menghapus semua session
session_destroy();
 
// mengalihkan halaman login
header("location:login.php?pesan=anda berhasil logout.");
?>