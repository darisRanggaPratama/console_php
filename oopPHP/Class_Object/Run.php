<?php
include_once 'Class.php';

// Membuat objek baru dari kelas 'Mobil' dengan mengisi parameter constructor
// dengan nilai 'Toyota', 'Merah', dan 100000000
$toyota = new Mobil("Toyota", "Merah");
$honda = new Mobil("Honda", "Hitam", 300000000);

var_dump($toyota);
var_dump($honda);

// Menampilkan nilai property '$merk' dari objek '$mobil1'
echo "$toyota->merk\r\n"; // Output: Toyota

// Menampilkan nilai property '$warna' dari objek '$mobil1'
echo "$toyota->warna\r\n"; // Output: Merah

// Menampilkan nilai property '$harga' dari objek '$mobil1'
echo "$honda->harga\r\n"; // Output: 100000000

$toyota->move();


