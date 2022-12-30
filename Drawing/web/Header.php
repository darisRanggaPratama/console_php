<?php
header("Content-Type: image/jpeg");

// Create Gambar
$gb = imagecreate(200, 100);

// Warna merah & biru
$merah = imagecolorallocate($gb, 255, 0, 0);
$biru = imagecolorallocate($gb, 0, 0, 255);

// Kotak Merah
imagefilledrectangle($gb, 0, 0, 200, 49, $merah);

// Kotak biru
imagefilledrectangle($gb, 0, 49, 200, 99, $biru);

// Tampilkan gambar (JPEG)
imagejpeg($gb);

// Membebaskan memori
imagedestroy($gb);

?>


