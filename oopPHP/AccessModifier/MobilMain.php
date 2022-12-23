<?php
require_once 'Mobil.php';
use Vehicle\Mobil;
use Vehicle\MobilSport;

// Menciptakan objek dari kelas Mobil
$mobil = new Mobil("Honda", "Merah", 200000000);

// Mencetak info mobil
echo $mobil->cetakInfo();

// Menciptakan objek dari kelas MobilSport
$mobilSport = new MobilSport("Lamborghini", "Hitam", 300000000, "Ya");

// Mencetak info mobil sport
echo "\r\n" . $mobilSport->cetakInfoSport();
