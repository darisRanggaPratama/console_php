<?php
namespace Dimension;

// Membuat interface bernama "Shape"
interface Shape
{
    // Menentukan metode abstract yang harus diimplementasikan oleh kelas yang mengimplementasikan interface ini
    public function calculateArea(): float;
}

// Membuat kelas bernama "Circle" yang mengimplementasikan interface "Shape"
class Circle implements Shape
{
    // Menentukan atribut bernama "radius"
    private float $radius;

    // Membuat constructor untuk mengatur nilai radius
    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    // Menentukan implementasi dari metode calculateArea() dari interface Shape
    final public function calculateArea(): float
    {
        echo "\r\nLuas Lingkaran: ";
        return 3.14 * $this->radius * $this->radius;
    }
}

// Membuat kelas bernama "Rectangle" yang mengimplementasikan interface "Shape"
class Rectangle implements Shape
{
    // Menentukan atribut bernama "width" dan "height"
    private float $width;
    private float $height;

    // Membuat constructor untuk mengatur nilai width dan height
    public function __construct(float $width, float $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    // Menentukan implementasi dari metode calculateArea() dari interface Shape
  final  public function calculateArea(): float
    {
        echo "\r\nLuas Persegi: ";
        return $this->width * $this->height;
    }
}

/*
 * Pda contoh di atas, kita membuat interface bernama Shape yang menentukan metode abstract calculateArea().
 * Kemudian, kita membuat kelas Circle dan Rectangle yang masing-masing mengimplementasikan interface Shape.
 * Artinya, kelas Circle dan Rectangle harus mengimplementasikan metode calculateArea()
 * yang telah ditentukan di interface Shape.
 * Setiap kelas yang mengimplementasikan interface Shape harus menyediakan implementasi untuk metode calculateArea().
 * */
