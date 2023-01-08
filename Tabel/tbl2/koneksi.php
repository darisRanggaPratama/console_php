<?php
// Konfigurasi koneksi ke database
$hostname = 'localhost';
$username = 'rangga';
$password = 'rangga';
$database = 'test';

// Mencoba untuk terhubung ke database
$conn = mysqli_connect($hostname, $username, $password, $database);

// Mengecek apakah terdapat kesalahan koneksi
if (mysqli_connect_errno()) {
    // Menampilkan pesan kesalahan jika terdapat kesalahan koneksi
    printf("Koneksi ke database gagal: %s\n", mysqli_connect_error());
    exit();
}

// Query untuk mengambil data dari tabel
$query = "SELECT * FROM `gaji22` ORDER BY `id`";
$result = mysqli_query($conn, $query);
?>
