<?php
require_once 'Operator.php';

use Matematika\Pemangkatan;

/*
 * 8. Selesai. Sekarang kita dapat menggunakan kelas "Pemangkatan"
 * untuk menjumlahkan dua atau tiga bilangan dengan menggunakan metode overloading.
 * */

$pangkat = new Pemangkatan();

// Pangkat 2
echo $pangkat->pangkat(2, 2);
// Pangkat 3
echo $pangkat->pangkat(3, 3, 3);
// Pangkat 4
echo $pangkat->pangkatEmpat(array(4, 4, 4, 4));

// Tes
echo $pangkat->pangkat(3);
echo $pangkat->pangkat();
echo $pangkat->pangkat(3, 3, 3, 3);
