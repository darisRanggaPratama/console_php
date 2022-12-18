<?php
 require_once 'Class.php';
use data\Mobil;

// Membuat objek baru dari kelas 'Mobil' dengan mengisi parameter constructor
// dengan nilai 'Toyota', 'Merah', dan 100000000
$toyota = new Mobil("Toyota", "Merah");
$honda = new Mobil("Honda", "Hitam", 300000000);

var_dump($toyota);
var_dump($honda);

// Menampilkan nilai property '$merk' dari objek '$mobil1'
echo "$toyota->merk\r\n";

// Menampilkan nilai property '$warna' dari objek '$mobil1'
echo "$toyota->warna\r\n";

// Menampilkan nilai property '$harga' dari objek '$mobil1'
echo "$honda->harga\r\n";

$toyota->move();


