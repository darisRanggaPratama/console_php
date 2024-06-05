<?php
// Konfigurasi database
$host = 'localhost';
$dbname = 'java_database';
$username = 'rangga';
$password = 'rangga';

try {
    // Buat koneksi PDO
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    $pdo = new PDO($dsn, $username, $password, $options);

    echo "Koneksi ke database berhasil!";
} catch (PDOException $e) {
    // Tangani kesalahan koneksi
    echo "Koneksi gagal: " . $e->getMessage();
    // Anda bisa mencatat kesalahan ke log jika diperlukan
}
?>

