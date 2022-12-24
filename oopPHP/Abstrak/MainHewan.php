<?php
require_once 'Hewan.php';

use binatang\Anjing;
use binatang\Kucing;

// Instansiasi objek dari kelas anak
$kucing = new Kucing();
$kucing->nama = "Muffin";
$kucing->warna = "Merah";

$anjing = new Anjing();
$anjing->nama = "Buddy";
$anjing->warna = "Hitam";

// Mencetak hasil pemanggilan method bicara dari masing-masing objek
echo $kucing->nama . " berkata: " . $kucing->bicara() . "\n";
echo $anjing->nama . " berkata: " . $anjing->bicara() . "\n";

/*
 * Kemudian, kita mendefinisikan dua kelas anak,
 * yaitu Kucing dan Anjing, yang masing-masing menurunkan dari kelas abstrak
 * Hewan.
 * Kelas anak ini harus mengimplementasikan method abstrak bicara() yang diwariskan dari kelas abstrak.

 * Setelah itu, kita instansiasi dua objek dari kelas anak,
 * yaitu $kucing dan $anjing, kemudian kita atur nilai propertinya sesuai dengan yang kita inginkan.
 *
 * */
