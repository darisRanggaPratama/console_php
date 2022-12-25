<?php
require_once 'DepresiasiAktiva.php';
use DeprAngkaTahun\AngkaTahun;

$dep = new AngkaTahun("mesin", "Angka Tahun");
echo $dep->depresiasi();
