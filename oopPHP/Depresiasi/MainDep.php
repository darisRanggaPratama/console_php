<?php
// Fungsi untuk autoload setiap class
// class & nama file harus sama
spl_autoload_register(function ($class)
{
    require_once __DIR__ . '/library/' . $class . '.php';
}
);

$dep = new AngkaTahun("mesin", "Angka_Tahun");
echo $dep->depresiasi();


$dep = new GarisLurus("mesin", "Garis Lurus");
echo $dep->depresiasi();

