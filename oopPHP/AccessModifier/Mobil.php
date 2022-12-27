<?php

namespace Vehicle;

// Kelas dasar
class Mobil
{
    // Property dengan akses modifier public
    public string $merk;

    // Property dengan akses modifier private
    private string $warna;

    // Property dengan akses modifier protected
    protected float $harga;

    // Getter
   final public function getWarna(): string
    {
        return $this->warna;
    }

    // Konstruktor
    public function __construct(string $merk, string $warna, int $harga)
    {
        $this->merk = $merk;
        $this->warna = $warna;
        $this->harga = $harga;
    }

    // Method dengan akses modifier public
    final public function cetakInfo(): string
    {
        return "\r\nMerk mobil: " . $this->merk . "\r\nWarna mobil: " . $this->getWarna() .
            "\r\nHarga mobil: " . $this->harga . "\r\n"
            . $this->hitungDiskon() . "\r\n" . $this->hitungOngkosKirim() . "\r\n";
    }

    // Method dengan akses modifier private
   private function hitungOngkosKirim(): string
    {
        return "Biaya kirim: " . $this->harga * 0.1;
    }

    // Method dengan akses modifier protected
   final protected function hitungDiskon(): string
    {
        return "Diskon: " . $this->harga * 0.2;
    }
}

// Kelas turunan dari kelas Mobil
class MobilSport extends Mobil
{
    // Property tambahan
    public string $turbo;

    // Konstruktor
    public function __construct(string $merk, string $warna, int $harga, bool $turbo)
    {
        // Memanggil konstruktor dari kelas parent
        parent::__construct($merk, $warna, $harga);
        $this->turbo = $turbo;
    }

    // Method yang menggunakan method protected dari kelas parent
    final  public function cetakInfoSport(): string
    {
        return $this->cetakInfo() . "\rTurbo: " . $this->turbo . "\r\n";
    }
}


