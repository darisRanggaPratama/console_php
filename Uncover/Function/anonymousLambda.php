<?php
// Lambda
$hai = function ()
{
    echo "\nHello Universe\n";
};

$hai();

// Cara lain: Arrow
$hay = fn () => "Hello Galaxy\n";
echo $hay();

// Lambda + return + parameter
$target = function (string $object) {
    return "\nShot Object: $object\n";
};

echo $target("Plane");

// Cara lain + parameter
$luas = fn (int $lebar, int $panjang) => "\nLuas. $lebar x $panjang = ".$lebar * $panjang."\n";
echo $luas(8, 9);

// Callback: array_walk()
// Associative array
$produsen = [
    "korea" => "Samsung",
    "china" => "Vivo",
    "USA" => "Apple",
];

function pabrikan(string $negara, string $merk)
{
    echo "Negara: $negara Merk: $merk\n";
}

array_walk($produsen, "pabrikan");

// Cara lain
array_walk($produsen, function (string $negara, string $merk)
{
    echo "Negara: $negara Merk: $merk\n";
});

// Closure
$planet = 'mars';

$tujuan = function () use ($planet)
{
    echo "Tujuan pesawat $planet\n";
    $planet = 'venus';
    echo "Tujuan pesawat $planet\n";
};

$tujuan();
echo "Tujuan pesawat $planet\n";

// Arrow Functions


?>
