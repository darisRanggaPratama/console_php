<?php
// Mencegah tipe data bila tidak sesuai kriteria
declare(strict_types=1);

// Fungsi ini mengizinkan tipe data int atau float
function pangkat(int|float ...$number)
{
    $result = 1;

    foreach ($number as $value) {
        $result = $result * $value;
    }
    return $result;
}

echo pangkat(5.1)."\n";
echo pangkat(5.1, 5.1)."\n";
echo pangkat(5.1, 5.1, 5.1)."\n";

// Fungsi dengan return yang ditentukan
function dipangkat(float $number, $pangkat): float
{
    $result = 1;

    for ($i = 1; $i <= $pangkat; $i++) {
        $result = $result * $number;
    }
    return $result;
}

echo dipangkat(5.1, 1)."\n";
echo dipangkat(5.1, 2)."\n";
echo dipangkat(5.1, 3)."\n";

// Fungsi: Named Arguments
function dipangkatkan(int $pangkat, float $angka): float
{
    $result = 1;

    for ($i = 1; $i <= $pangkat; $i++) {
        $result = $result * $angka;
    }
    return $result;
}

echo dipangkatkan(angka:5.1, pangkat:1)."\n";
echo dipangkatkan(pangkat:2, angka:5.1)."\n";
echo dipangkatkan(angka:5.1, pangkat:3)."\n";

?>
