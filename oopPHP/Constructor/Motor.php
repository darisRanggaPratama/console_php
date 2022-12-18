<?php

namespace Vehicle;

class Motor
{
    public string $name = "";
    public string $color = "";
    public int $speed = 0;

    final public function getName(): string
    {
        return "\r\nNama: " . $this->name;
    }

    final public function getColor(): string
    {
        return "\r\nWarna: " . $this->color;
    }

    final public function getSpeed(): int
    {
        echo "\r\nKecepatan: ";
        return 0;
    }

    public function __construct(string $name, string $color, int $speed)
    {
        if (empty($name) || empty($color) || empty($speed) || $speed < 0) {
            echo "\r\nConstructor: Fail\r\n";
        } else {
            $this->name = $name;
            $this->color = $color;
            $this->speed = $speed;
        }
    }

    final public function showMotor(): void
    {
        echo "Tampilkan semua data: ";
        echo $this->getName();
        echo $this->getSpeed();
        echo $this->getColor();
    }
}
