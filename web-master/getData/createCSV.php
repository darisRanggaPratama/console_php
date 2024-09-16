<?php
global $conn;
include 'config.php';

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query SQL
$sql = "SELECT * FROM customer"; // Ganti dengan nama tabel yang sesuai
$result = $conn->query($sql);

// Cek apakah ada hasil
if ($result->num_rows > 0) {
    // Membuat file CSV dan membuka file untuk menulis
    $file = fopen('output.csv', 'w');

    // Mengambil nama kolom
    $fields = $result->fetch_fields();
    $header = [];
    foreach ($fields as $field) {
        $header[] = $field->name;
    }
    // Menulis nama kolom ke file CSV
    fputcsv($file, $header, ';');

    // Menulis data ke file CSV
    while ($row = $result->fetch_assoc()) {
        fputcsv($file, $row, ';');
    }

    // Menutup file
    fclose($file);
    echo "Data telah diekspor ke file output.csv";
} else {
    echo "Tidak ada data yang ditemukan";
}

// Menutup koneksi
$conn->close();


