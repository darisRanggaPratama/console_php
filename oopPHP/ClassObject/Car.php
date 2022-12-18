<?php

class Car
{
    // Properties/ variable
    public $merk;
    public $warna;
    public $kecepatan;

    // Methods
   public function setMerk(string $merk)
    {
        if (empty($merk)) {
            echo "Salah";
        } else {
        $this->merk = $merk;
        }
    }

   public function getMerk(): string
    {
        return sprintf("$this->merk \r\n");
        
    }

    public function setWarna(string $warna)
    {
        if (empty($warna)) {
            echo "Salah";
        } else {
        $this->warna = $warna;
        }
    }

   public function getWarna(): string
    {
        return sprintf("$this->warna \r\n");
    }

    public function setCepat(int $kecepatan)
    {
        if ($kecepatan < 0) {
            echo "0 \r\n";
        } else {
        $this->kecepatan = $kecepatan;
        }
    }

   public function getCepat(): string
    {
        return sprintf("$this->kecepatan \r\n");
    }
}
