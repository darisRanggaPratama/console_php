<?php
function sayHello()
{
    echo "\nHello Universe\n";
}

// Memanggil fungsi
sayHello();

// Fungsi berargumen
function namaDepan($namaDepan)
{
    echo "\nKucing saya bernama $namaDepan\n";
}

namaDepan("Orenz");

// Fungsi berargumen lebih dari 1
function mobil($merk, $harga)
{
    echo "\nMobil: $merk Harga: $harga\n";
}

mobil("Suzuki", 5000000);

// Fungsi dengan return
// Tanpa return
function kali($a, $b)
{
    $c = $a * $b;
    echo "\n$a x $b = $c\n";
}

kali(5, 6);

// Memiliki return
function bagi($a, $b)
{
    echo "\n$a / $b = ";
    return $a / $b;
    
}

$z = bagi(100, 99);
echo $z."\n";

// Scope variable
// local variable
$local = 1000;
function ubah()
{
    $local = 9999;
    echo $local."\n";
}

echo $local."\n";
ubah();
echo $local."\n";

// Global variable
$interLocal = 555;
function change()
{
    global $interLocal;
    $interLocal = 88888;
    echo $interLocal."\n";
}

echo $interLocal."\n";
change();
echo $interLocal."\n";










?>
