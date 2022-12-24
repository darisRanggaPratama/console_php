<?php
require_once 'Shape.php';
use Dimension\Rectangle;
use Dimension\Circle;


// Membuat objek dari kelas Circle dengan radius 5
$circle = new Circle(5);

// Memanggil metode calculateArea() pada objek $circle
echo $circle->calculateArea(); // Menampilkan 78.5

// Membuat objek dari kelas Rectangle dengan width 10 dan height 5
$rectangle = new Rectangle(10, 5);

// Memanggil metode calculateArea() pada objek $rectangle
echo $rectangle->calculateArea(); // Menampilkan 50



