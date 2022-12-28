<?php
// Fungsi untuk autoload class
spl_autoload_register(function ($class)
{
    require_once __DIR__ . '/library/' . $class . '.php';
}
);

$dep = new AngkaTahun("mesin", "Angka_Tahun");
echo $dep->depresiasi();
