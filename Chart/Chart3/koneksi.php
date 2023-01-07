<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "rangga", "rangga", "test");

// Query untuk mengambil data dari tabel
$query = "SELECT * FROM kota";
$result = mysqli_query($conn, $query);
?>
