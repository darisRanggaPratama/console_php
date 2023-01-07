<?php
// Koneksi ke database MySQL
$conn = mysqli_connect('localhost', 'rangga', 'rangga', 'test');

// Query untuk mengambil data dari tabel
$query = "SELECT * FROM `gaji22` ORDER BY `id`";
$result = mysqli_query($conn, $query);
?>
