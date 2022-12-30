<?php

// Menciptakan canvas gambar baru dengan ukuran 200x200 piksel
$image = imagecreate(400, 400);

// Menentukan warna-warna yang akan digunakan
$red = imagecolorallocate($image, 255, 0, 0);
$green = imagecolorallocate($image, 0, 255, 0);
$blue = imagecolorallocate($image, 0, 0, 255);

// Menggambar kotak merah di bagian atas canvas
imagefilledrectangle($image, 0, 0, 199, 99, $red);

// Menggambar kotak hijau di tengah canvas
imagefilledrectangle($image, 0, 100, 199, 199, $green);

// Menggambar kotak biru di bagian bawah canvas
imagefilledrectangle($image, 0, 200, 199, 299, $blue);

// Menampilkan gambar ke browser
header("Content-type: image/png");
imagepng($image);

// Menghapus gambar dari memori
imagedestroy($image);

?>
/*
* Untuk membuat gambar kotak dengan tiga warna menggunakan PHP,
* Anda dapat menggunakan fungsi imagecreate() dan imagefilledrectangle().
* Fungsi imagecreate() akan menciptakan sebuah canvas gambar baru dengan ukuran yang ditentukan,
* sementara fungsi imagefilledrectangle() akan menggambar sebuah kotak dengan warna yang ditentukan di canvas tersebut.
*/

/*
* Jika Anda menjalankan kode di atas, maka akan tercipta sebuah gambar kotak
* dengan tiga warna yang terdiri dari kotak merah di bagian atas,
* kotak hijau di tengah, dan kotak biru di bagian bawah.

* Sebagai catatan, pastikan bahwa extension GD telah diaktifkan di server PHP Anda
* sebelum mencoba menggunakan fungsi-fungsi gambar di PHP.
* Jika extension GD belum diaktifkan, Anda dapat mengaktifkannya dengan menambahkan baris berikut pada file php.ini: extension=gd
*/
