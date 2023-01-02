<?php
echo "\r\n";
// Trik 2
$connect = mysqli_connect("localhost", "rangga", "rangga", "test");

// SQL Syntax
$sql = "SELECT tglA, tglB, datediff(tglA, tglB) AS selisihTgl FROM test.tanggal";

// Query Database
$hasil = mysqli_query($connect, $sql);

 // Tampilkan data dalam bentuk baris & kolom
 while ($data = mysqli_fetch_assoc($hasil)) {
    echo "\r\n$data[tglA] s/d $data[tglB] selisih $data[selisihTgl]";
}


echo "\r\n\r\n";