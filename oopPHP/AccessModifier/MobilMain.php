<?php
require_once 'Mobil.php';
use Vehicle\Mobil;
use Vehicle\MobilSport;

// Menciptakan objek dari kelas Mobil
$mobil = new Mobil("Honda", "Merah", 200000000);

var_dump($mobil);

// Mencetak info mobil
echo $mobil->cetakInfo();

// Menciptakan objek dari kelas MobilSport
$mobilSport = new MobilSport("Lamborghini", "Hitam", 300000000, "Ya");

var_dump($mobilSport);
// Mencetak info mobil sport
echo $mobilSport->cetakInfoSport();
