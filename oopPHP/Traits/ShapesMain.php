<?php
require_once 'Shapes.php';

use Dimension\HitungDimensi;

$dim = new HitungDimensi();

echo $dim->lingkaran(20.0);
echo $dim->luasLingkaran(20);
echo $dim->tabung(6.0);
echo $dim->tabung(6.0, 7.0);

