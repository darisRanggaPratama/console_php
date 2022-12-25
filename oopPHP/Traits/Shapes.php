<?php

namespace Dimension;

// Trait pertama dengan method yang akan di-overload
trait OverloadTrait
{
    public function __call(string $tabung, array $value): float
    {
        if ($tabung == 'tabung') {
            if (count($value) == 1) {
                echo "\r\nTabung. Luas Alas: ";
                return (22.0 / 7.0) * $value[0] * $value[0];

            } elseif (count($value) == 2) {
                echo "\r\nTabung. Volume: ";
                return (22.0 / 7.0) * $value[0] * $value[0] * $value[1];
            }
        }
        return 0;
    }
}


// Trait kedua dengan method yang akan di-override
trait OverrideTrait
{
    final public function lingkaran(float $jari): float
    {
        echo "\r\nLingkaran. Jari-jari: $jari. Luas: ";
        return (22.0 / 7.0) * $jari * $jari;
    }
}

// Kelas yang menggunakan kedua trait
class HitungDimensi
{
    use OverloadTrait;
    use OverrideTrait {
        lingkaran as luas;
    }

    final public function lingkaran(float $jari): float
    {
        echo $this->luas($jari);
        echo "\r\nBola. Jari-jari: $jari. Volume: ";
        return (4.0 / 3.0) * (22.0 / 7.0) * $jari * $jari * $jari;
    }
}



