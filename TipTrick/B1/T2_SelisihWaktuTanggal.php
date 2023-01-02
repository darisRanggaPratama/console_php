<?php
echo "\r\n";
// Trik 2
$connect = mysqli_connect("localhost", "rangga", "rangga", "test");
// $db = mysqli_select_db($connect, "test");

$sql = "SELECT tglA, tglB, datediff(tglA, tglB) AS selisihTgl FROM test.tanggal";

$hasil = mysqli_query($connect, $sql);
$data = mysqli_fetch_array($hasil);

echo "Selish hari antar tanggal\r\n
$data[tglA] s/d $data[tglB] adalah $data[selisihTgl] hari\r\n";
echo "Selish hari antar tanggal <br>
$data[tglA] s/d $data[tglB] adalah $data[selisihTgl] hari";

echo "\r\n\r\n";