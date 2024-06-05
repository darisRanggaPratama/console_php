<?php
$servername = "localhost"; // atau nama server database Anda
$username = "rangga"; // username database Anda
$password = "rangga"; // password database Anda
$dbname = "java_database"; // nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
