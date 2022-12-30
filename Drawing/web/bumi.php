<?php
// Membuat gambar baru dengan ukuran 400x400 px
$image = imagecreatetruecolor(400, 400);

// Menentukan warna-warna yang akan digunakan
$red = imagecolorallocate($image, 255, 0, 0);
$yellow = imagecolorallocate($image, 255, 255, 0);
$blue = imagecolorallocate($image, 0, 0, 255);

// Menggambar lingkaran merah sebagai matahari
imagefilledellipse($image, 200, 200, 150, 150, $red);

// Menggambar lingkaran biru sebagai bumi
imagefilledellipse($image, 300, 200, 50, 50, $blue);

// Menggambar lingkaran kuning sebagai bulan
imagefilledellipse($image, 350, 150, 25, 25, $yellow);

// Menampilkan gambar
header('Content-Type: image/png');
imagepng($image);

// Menghapus gambar dari memori
imagedestroy($image);
?>

