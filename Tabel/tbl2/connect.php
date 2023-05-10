<?php
// Konfigurasi Koneksi ke Database
$host = 'localhost';
$user = 'rangga';
$password = 'rangga';
$database = 'test';

// Koneiksi ke database
$connect = mysqli_connect($host, $user, $password, $database);

// Mengecek apakah terdapat gagal koneksi
if (!$connect) {
    die('Koneksi terputus: '.mysqli_connect_error());
}

// Query untuk mengambil data dari tabel
$query = "SELECT * FROM `gaji22` ORDER BY `id`";
$result = mysqli_query($connect, $query);
?>
