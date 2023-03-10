<?php
namespace library;

class ProductModel
{
    private string $id;
    private string $name;
    private int $price;
    private string $description;

    public function __construct(string $id, string $name, int $price, string $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
    }

    public function getID(): string
    {
        echo "\r\n ID: ";
        return $this->id;
    }

    public function getName(): string
    {
        echo "\r\n Nama Produk: ";
        return $this->name;
    }

    public function getPrice(): int
    {
        echo "\r\n Harga Produk: ";
        return $this->price;
    }

    public function getDescription(): string
    {
        echo "\r\n Keterangan: ";
        return $this->description;
    }
}

