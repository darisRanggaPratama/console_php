<?php
require_once 'Vehicle.php';
use Vehicle\Vehicle;

// Kita dapat mengakses semua properti dan metode dengan akses modifier public
$mobil = new Vehicle("Toyota", "Avanza", "Merah", 2000000000, 4, "Bensin");
var_dump($mobil);

echo $mobil->cetakInfoMobil();
echo $mobil->cetakBahanBakarMobil();


