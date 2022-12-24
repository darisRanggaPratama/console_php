<?php

namespace TwoDimension;

/*
 * Polymorphisme adalah konsep di mana sebuah objek dapat memiliki beberapa bentuk
 * atau comportement yang berbeda tergantung pada konteksnya.
 * Dalam PHP, kita dapat menggunakan interface untuk mengimplementasikan polymorphisme.
 * Berikut ini adalah contoh lengkap mengenai bagaimana cara mengimplementasikan interface
 * dengan polymorphisme menggunakan PHP:

* 1. Buat interface yang menetapkan metode yang harus diimplementasikan
* oleh kelas yang menggunakannya.
* Sebagai contoh, kita akan membuat interface bernama "Shape"
* yang memiliki satu metode bernama "calculateArea":
 * */

interface Shapes
{
    public function calculateArea(): float;
}

/*
 * 2. Buat kelas yang mengimplementasikan interface yang telah dibuat.
 * Sebagai contoh, kita akan membuat kelas bernama "Circle" yang mengimplementasikan
 * interface "Shapes" dan memiliki metode "calculateArea" yang diimplementasikan:
 * */

class Circle implements Shapes
{
    private float $radius;

    public function __construct(float $radius)
    {
        if ($radius < 0) {
            $radius = abs($radius);
        }
        $this->radius = $radius;
        echo "\r\nLingkaran. Jari-jari: $radius";
    }

    final public function calculateArea(): float
    {
        echo "\r\nLuas Lingkaran: ";
        return 3.14 * $this->radius * $this->radius;
    }
}

/*
 * 3. Buat kelas lain yang juga mengimplementasikan interface yang sama.
 * Sebagai contoh, kita akan membuat kelas bernama "Rectangle" yang juga
 * mengimplementasikan interface "Shape" dan memiliki metode "calculateArea" yang diimplementasikan:
 * */

class Rectangle implements Shapes
{
    private float $width;
    private float $height;

    public function __construct(float $width, float $height)
    {
        $this->width = $width;
        $this->height = $height;
        echo "\r\nPersegi. Panjang: $height. Lebar: $width";
    }

    final public function calculateArea(): float
    {
        echo "\r\nLuas Persegi: ";
        return $this->width * $this->height;
    }
}



