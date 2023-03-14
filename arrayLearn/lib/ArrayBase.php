<?php

namespace ArrayTest;

class ArrayBase
{
    private static array $array;

    function __construct(array $array, int $size, int $start, int $end)
    {
        /* 1. Buat array dengan tipe data numerik berkapasitas 11 elemen yang diisi nilai random
berkisar antara 0 sampai dengan 21 dimana menolak elemen yang bernilai sama */
        self::$array = $array;

        while (count(self::$array) < $size) {
            $randomValue = rand($start, $end);
            if (!in_array($randomValue, self::$array)) {
                self::$array[] = $randomValue;
            }
        }
    }

    static function displayArray(array $array): void
    {
        // Tampilkan nilainya
        echo "1. Array: \n";
        $array = self::$array;
        foreach ($array as $value) {
            echo $value . "\n";
        }
    }

    static function indexValueArray(array $array): void
    {
        echo "\nArray: Index & Value: \n";
        $array = self::$array;
        for ($i = 0; $i < count($array); $i++) {
            echo "$i $array[$i] \n";
        }
    }

    static function evenArray(array $array): void
    {
        // 2. Ambil elemen yang bernilai genap lalu tampilkan secara ascending
        $evenArray = array();
        $array = self::$array;
        foreach ($array as $value) {
            if ($value % 2 == 0) {
                $evenArray[] = $value;
            }
        }

        sort($evenArray);
        echo "\n2. Elemen bernilai genap secara ascending: \n";
        foreach ($evenArray as $value) {
            echo $value . "\n";
        }
    }

    static function oddArray(array $array): void
    {
        // 3. Ambil elemen yang bernilai ganjil lalu tampilkan secara descending
        $oddArray = array();
        $array = self::$array;
        foreach ($array as $value) {
            if ($value % 2 != 0) {
                $oddArray[] = $value;
            }
        }

        rsort($oddArray);
        echo "\n3. Elemen bernilai ganjil secara descending: \n";
        foreach ($oddArray as $value) {
            echo $value . "\n";
        }
    }

    static function insertElement(array $array, int $index, int $length, int $newValue): void
    {
        //4. Sisipkan elemen bernilai 100 antara index ke-4 dan index ke-5 lalu tampilkan hasilnya.
        $array = self::$array;
        array_splice($array, $index, $length, array($newValue));
        echo "\n4. Sisipkan elemen bernilai 100 antara index ke-4 dan index ke-5: \n";

        echo "\nArray: Index & Value: \n";
        for ($i = 0; $i < count($array); $i++) {
            echo "$i $array[$i] \n";
        }
    }

    static function editElement(array $array, int $index, int $value)
    {
        //5.Ubah index ke-3 dengan nilai99lalutampilkanhasilnya.
        $array = self::$array;
        $array[$index] = $value;
        echo "\n5. Ubah index ke-$index dengan nilai $value:\n";
        echo "\nArray: Index & Value: \n";
        for ($i = 0; $i < count($array); $i++) {
            echo "$i $array[$i] \n";
        }
    }

    static function displayDescending(array $array): void
    {

        //6. Tampilkan semua elemen array dengan mengurutkan nilainya secara descending.
        $array = self::$array;
        rsort($array);
        echo "\n6. Tampilkan semua elemen array dengan mengurutkan nilainya secara descending: \n";
        echo "\nArray: Index & Value: \n";
        for ($i = 0; $i < count($array); $i++) {
            echo "$i $array[$i] \n";
        }
    }

    static function deleteElement(array $array, int $index): void
    {

        //7. Hapus index ke-2 lalu tampilkan hasilnya.
        $array = self::$array;
        unset($array[$index]);
        $array = array_values($array);
        echo "\n7. Hapus index ke-: $index\n";
        echo "\nArray: Index & Value: \n";
        for ($i = 0; $i < count($array); $i++) {
            echo "$i $array[$i] \n";
        }
    }

    static function displayAscending(array $array)
    {
        //8. Tampilkan semua elemen array dengan mengurutkan nilainya secara ascending.
        $array = self::$array;
        sort($array);
        echo "\n8. Tampilkan semua elemen array dengan mengurutkan nilainya secara ascending: \n";
        echo "\nArray: Index & Value: \n";
        for ($i = 0; $i < count($array); $i++) {
            echo "$i $array[$i] \n";
        }
    }
}
