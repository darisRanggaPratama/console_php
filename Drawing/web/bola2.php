<?php

// Menentukan ukuran gambar
$lebar = 500;
$tinggi = 500;

// Membuat gambar dengan latar putih
$gambar = imagecreatetruecolor($lebar, $tinggi);
imagefilledrectangle($gambar, 0, 0, $lebar-1, $tinggi-1, imagecolorallocate($gambar, 255, 255, 255));

// Menentukan jumlah bola yang akan ditampilkan
$jumlah_bola = 10;

// Menentukan warna bola yang akan ditampilkan secara acak
$warna = array(
    imagecolorallocate($gambar, 128, 128, 128), // Abu-abu
    imagecolorallocate($gambar, 255, 165, 0), // Jingga
    imagecolorallocate($gambar, 255, 0, 0), // Merah
    imagecolorallocate($gambar, 0, 128, 0), // Hijau
    imagecolorallocate($gambar, 0, 0, 255), // Biru
    imagecolorallocate($gambar, 255, 255, 0), // Kuning
    imagecolorallocate($gambar, 0, 0, 255), // Nila
    imagecolorallocate($gambar, 128, 0, 128), // Ungu
    imagecolorallocate($gambar, 210, 105, 30), // Coklat
);

// Menentukan posisi bola secara acak
for ($i = 0; $i < $jumlah_bola; $i++) {
    $x = rand(0, $lebar-1);
    $y = rand(0, $tinggi-1);
    $w = rand(20, 50);

    // Menggambar bola dengan warna acak
    imagefilledellipse($gambar, $x, $y, $w, $w, $warna[array_rand($warna)]);
}

// Menyimpan gambar ke dalam file
imagegif($gambar, 'gambar.gif');

// Menutup gambar
imagedestroy($gambar);

?>

