<?php
// Buat canvas
$image = imagecreatetruecolor(600, 600);

// Persiapkan data yang diperlukan
$sun_x = 300;
$sun_y = 300;
$sun_size = 50;
$sun_color = imagecolorallocate($image, 255, 255, 0);

$mercury_x = 250;
$mercury_y = 300;
$mercury_size = 10;
$mercury_color = imagecolorallocate($image, 128, 128, 128);

$venus_x = 200;
$venus_y = 300;
$venus_size = 15;
$venus_color = imagecolorallocate($image, 255, 128, 128);

// Gambar matahari
imagefilledellipse($image, $sun_x, $sun_y, $sun_size, $sun_size, $sun_color);

// Gambar mercury
imagefilledellipse($image, $mercury_x, $mercury_y, $mercury_size, $mercury_size, $mercury_color);

// Gambar venus
imagefilledellipse($image, $venus_x, $venus_y, $venus_size, $venus_size, $venus_color);

// Gambar teks label
imagettftext($image, 12, 0, $sun_x - 20, $sun_y - $sun_size - 10, $sun_color, 'font.ttf', 'Matahari');
imagettftext($image, 12, 0, $mercury_x - 20, $mercury_y - $mercury_size - 10, $mercury_color, 'font.ttf', 'Merkurius');
imagettftext($image, 12, 0, $venus_x - 20, $venus_y - $venus_size - 10, $venus_color, 'font.ttf', 'Venus');

// Tampilkan gambar
header('Content-Type: image/png');
imagepng($image);

// Hapus memori yang digunakan oleh canvas
imagedestroy($image);
