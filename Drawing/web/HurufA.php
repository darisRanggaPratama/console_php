<?php
// Menyimpan gambar di memori
$im = imagecreate(200, 50);

// Menentukan warna merah
$red = imagecolorallocate($im, 255, 0, 0);

// Menuliskan teks Tesseract dengan warna merah
imagestring($im, 5, 10, 10, "Tesseract", $red);

// Menampilkan gambar
header("Content-type: image/png");
imagepng($im);

// Menghapus gambar dari memori
imagedestroy($im);
?>
