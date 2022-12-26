<?php
require_once 'DepresiasiAktiva.php';
use DeprAngkaTahun\AngkaTahun;

$dep = new AngkaTahun("mesin", "AngkaTahun");
echo $dep->depresiasi();
