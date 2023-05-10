<?php
function balok($panjang, $lebar, $tinggi=1)
{
if ($tinggi>1) {
    $result = $panjang * $lebar * $tinggi;
    echo "$panjang x $lebar x $tinggi = ";
} else {
    $result = $panjang * $lebar;
    echo "$panjang x $lebar = ";
}
return $result;
}

$a = balok(2, 3);
echo "$a\n";

$b = balok(2, 3, 4);
echo "$b\n";
?>


