<?php
// Trik 1
$n = 10;
$nn = 11;
echo "\r\nTanggal hari ini: ";
echo date('d-m-y');
echo "\r\n $n Hari berikutnya dari tanggal hari ini: ";

// Menentukan timestamp 10 hari berikutnya dari tanggal hari ini
$nextN = mktime(0, 0, 0, date("m"), date("d") + $n, date("Y"));

// Menampilkan tanggal 10 hari berikutnya dari tanggal hari ini
// berdasarkan timestamp nya
echo date("d-m-Y", $nextN);

echo "\r\n $n Hari sebelumnya dari tanggal hari ini: ";

// Menentukan timestamp 10 hari sebelumnya dari tanggal hari ini
$prevN = mktime(0, 0, 0, date("m"), date("d") - $n, date("Y"));

// Menampilkan tanggal 10 hari sebelumnya dari tanggal hari ini
// berdasarkan timestamp nya
echo date("d-m-Y", $prevN);

echo "\r\n  $n Bulan setelahnya dari tanggal hari ini: ";

// Menentukan timestamp n bulan berikutnya dari tanggal hari ini
$nextN = mktime(0, 0, 0, date("m") + $n, date("d"), date("Y"));

// Hasil
echo date("d-m-Y", $nextN);

echo "\r\n  $n Bulan sebelumnya dari tanggal hari ini: ";

// Menentukan timestamp n bulan sebelumnya dari tanggal hari ini
$prevN = mktime(0, 0, 0, date("m") - $n, date("d"), date("Y"));

// Hasil
echo date("d-m-Y", $prevN);

echo "\r\n$n Tahun setelahnya dari tanggal hari ini: ";

// Menentukan timestamp n tahun berikutnya dari tanggal hari ini
$nextN = mktime(0, 0, 0, date("m"), date("d"), date("Y") + $n);

// Hasil
echo date("d-m-Y", $nextN);

echo "\r\n$n Tahun sebelumnya dari tanggal hari ini: ";

// Menentukan timestamp n Tahun sebelumnya dari tanggal hari ini
$prevN = mktime(0, 0, 0, date("m"), date("d"), date("Y") - $n);

// Hasil
echo date("d-m-Y", $prevN);

echo "\r\n$n Bulan setelahnya dan lebih $nn hari dari tanggal hari ini: ";

// Menentukan timestamp m bulan lebih n hari berikutnya dari tanggal hari ini
$nextN = mktime(0, 0, 0, date("m") + $n, date("d") + $nn, date("Y"));

// Hasil
echo date("d-m-Y", $nextN);



echo "\r\n\r\n";
