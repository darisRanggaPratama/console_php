<?php
// Konfigurasi database
$servername = "localhost";
$username = "rangga";
$password = "rangga";
$dbname = "java_database";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}
?>