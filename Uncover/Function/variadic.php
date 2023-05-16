<?php
function arrArgument()
{
    $arrayArgumen = func_get_args();
    $jumlahArgumen = func_num_args();
    $nilaiArgumenKe2 = func_get_arg(1);

    echo "Array Argumen: ";
    print_r($arrayArgumen);
    echo "\nJumlah argumen: $jumlahArgumen\n";
    echo "Nilai argumen ke2: $nilaiArgumenKe2\n";
}

arrArgument(11, 13);
arrArgument(5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15);
arrArgument(2, 4, 6, 8, 10);

function pangkat()
{
    $arrVar = func_get_args();
    $result = 1;

    foreach ($arrVar as $value) {
        $result = $result * $value;
    }
    return $result;
}

echo pangkat(5)."\n";
echo pangkat(5, 5)."\n";
echo pangkat(5, 5, 5)."\n";

// Splat Operator
function dipangkat(...$arrVar)
{
    $result = 1;

    foreach ($arrVar as $value) {
        $result = $result * $value;
    }
    return $result;
}

echo dipangkat(5)."\n";
echo dipangkat(5, 5)."\n";
echo dipangkat(5, 5, 5)."\n";





?>
