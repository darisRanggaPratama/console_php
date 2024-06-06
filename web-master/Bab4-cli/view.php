<?php
// Meng-include file konfigurasi database
global $connect;
include "connect.php";

// Jalankan query untuk mengambil data dari tabel customer
$sql = "SELECT Nis, Nama, Umur, Seks FROM siswa";
$result = $connect->query($sql);

$jumlah_record = $result->num_rows;

// Gunakan mysqli_fetch_array() untuk mengambil data
if ($result->num_rows > 0) {
    $i = 1;
    echo "No\t" . "ID Siswa\t" . "Nama\t" . "Umur\t" . "Seks\t" . "\n";
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo " " . $i++ . "\t" . $row['Nis'] . "\t" . $row['Nama'] . " " . $row['Umur'] . " " . $row['Seks'] . "\n";
    }
} else {
    echo "No results found";
}
// Tutup koneksi
$connect->close();


