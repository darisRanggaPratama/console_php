<?php

// Kelas dengan metode statis dan properti statis
class Pesawat
{
    // Properti statis
    public static string $merk = 'Boeing';

    // Metode statis
    public static function staticMethod(): string
    {
        // Menampilkan nilai properti statis
        return self::$merk;
    }
}

// Menggunakan properti statis
echo Pesawat::$merk;

// Menggunakan metode statis
echo Pesawat::staticMethod();






