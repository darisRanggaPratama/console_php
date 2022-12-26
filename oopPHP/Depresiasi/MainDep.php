<?php
require_once 'DepresiasiAktiva.php';
use DeprAngkaTahun\AngkaTahun;

$dep = new AngkaTahun("mesin", "Angka_Tahun");
echo $dep->depresiasi();
