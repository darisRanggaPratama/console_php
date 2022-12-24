<?php
require_once 'Shapes.php';

use TwoDimension\Rectangle;
use TwoDimension\Circle;
use TwoDimension\Shapes;

/* 4. Buat objek dari kelas yang mengimplementasikan interface.
* Sebagai contoh, kita akan membuat objek dari kelas "Circle" dan "Rectangle":
*/
$circle = new Circle(-5);
$rectangle = new Rectangle(10, 5);

/*
 * 5. Lakukan pemanggilan metode "calculateArea" pada objek yang telah dibuat.
 * Sebagai contoh, kita akan memanggil metode "calculateArea"
 * pada objek "circle" dan "rectangle":
 * */

echo $circle->calculateArea(); // menampilkan 78.5
echo $rectangle->calculateArea(); // menampilkan 50

// CARA LAIN
/*
 * 6. Selain menggunakan objek secara langsung,
 * kita juga dapat menggunakan array yang berisi objek dari
 * kelas yang mengimplementasikan interface yang sama.
 * Sebagai contoh, kita akan membuat array yang berisi objek "circle" dan "rectangle":
 * */

echo "\r\n \r\nCARA ARRAY:";
$shapes = array($circle, $rectangle);

/*
 * 7. Kemudian, kita dapat menggunakan looping untuk menampilkan area
 * dari masing-masing objek di dalam array.
 * Sebagai contoh, kita akan menggunakan foreach loop untuk menampilkan
 * area dari masing-masing objek di dalam array "shapes":
 * */

/*
 * Dengan menggunakan looping dan interface, kita dapat menggunakan
 * objek dari kelas yang berbeda dengan cara yang sama tanpa perlu
 * memperhatikan tipe objek yang sebenarnya digunakan.
 * Ini merupakan contoh dari polymorphisme
 * */

foreach ($shapes as $shape) {
    echo $shape->calculateArea();
}

// CARA LAIN

/* 8. Selain menggunakan looping, kita juga dapat menggunakan fungsi
* yang menerima parameter bertipe interface untuk mengolah objek dari
* kelas yang mengimplementasikan interface tersebut.
* Sebagai contoh, kita akan membuat fungsi bernama "processShapes"
* yang menerima parameter bertipe "Shape" dan menampilkan area dari objek yang diterimanya: *
 * */

echo "\r\n \r\nCARA FUNGSI: ";
function processShapes(Shapes $shape)
{
    echo $shape->calculateArea();
}

/*
 * 9. Kemudian, kita dapat menggunakan fungsi tersebut untuk menampilkan
 * area dari masing-masing objek di dalam array "shapes":
 * */
foreach ($shapes as $shape) {
    processShapes($shape);
}

/*
 * Dengan menggunakan fungsi yang menerima parameter bertipe interface,
 * kita dapat memproses objek dari kelas yang mengimplementasikan interface tersebut
 * dengan cara yang sama, tanpa perlu memperhatikan tipe objek yang sebenarnya digunakan.
 * Ini merupakan contoh lain dari polymorphisme di PHP.
 * */






