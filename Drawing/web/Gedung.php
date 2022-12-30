<?php
// Buat canvas
$image = imagecreatetruecolor(400, 400);

// Persiapkan data yang diperlukan
$building1_x = 50;
$building1_y = 50;
$building1_width = 100;
$building1_height = 200;
$building1_color = imagecolorallocate($image, 128, 128, 128);

$building2_x = 200;
$building2_y = 50;
$building2_width = 150;
$building2_height = 250;
$building2_color = imagecolorallocate($image, 192, 192, 192);

// Gambar gedung 1
imagefilledrectangle($image, $building1_x, $building1_y, $building1_x + $building1_width,
    $building1_y + $building1_height, $building1_color);
imageline($image, $building1_x + 20, $building1_y + 50, $building1_x + 30, $building1_y + 50, $building1_color);
imageline($image, $building1_x + 40, $building1_y + 50, $building1_x + 50, $building1_y + 50, $building1_color);
// Gambar gedung 2
imagefilledrectangle($image, $building2_x, $building2_y, $building2_x + $building2_width,
    $building2_y + $building2_height, $building2_color);
imageline($image, $building2_x + 20, $building2_y + 50, $building2_x + 30, $building2_y + 50, $building2_color);
imageline($image, $building2_x + 40, $building2_y + 50, $building2_x + 50, $building2_y + 50, $building2_color);
imageline($image, $building2_x + 60, $building2_y + 50, $building2_x + 70, $building2_y + 50, $building2_color);
imageline($image, $building2_x + 80, $building2_y + 50, $building2_x + 90, $building2_y + 50, $building2_color);

// Gambar teks label
imagettftext($image, 12, 0, $building1_x, $building1_y - 10, $building1_color, 'font.ttf', 'Gedung 1');
imagettftext($image, 12, 0, $building2_x, $building2_y - 10, $building2_color, 'font.ttf', 'Gedung 2');

// Tampilkan gambar
header('Content-Type: image/png');
imagepng($image);

// Hapus memori yang digunakan oleh canvas
imagedestroy($image);
?>
