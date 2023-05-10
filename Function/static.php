<?php
// Variable non Static
function nonStatic()
{
    $y = 0;
    $y = $y+1;
    return "Panggilan: $y\n";
}

for ($i=0; $i<5; $i++) {
echo nonStatic();
}

function staticVariable()
{
    static $y = 0;
    $y = $y+1;
    return "Call: $y\n";
}

for ($i=0; $i<5; $i++) {
echo staticVariable();
}

?>

