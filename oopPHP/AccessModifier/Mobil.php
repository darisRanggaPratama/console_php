<?php
namespace Vehicle;

// Kelas dasar
class Mobil
{
  // Property dengan akses modifier public
  public $merk;
  
  // Property dengan akses modifier private
  private $warna;
  
  // Property dengan akses modifier protected
  protected $harga;
  
  // Konstruktor
  public function __construct($merk, $warna, $harga)
  {
    $this->merk = $merk;
    $this->warna = $warna;
    $this->harga = $harga;
  }
  
  // Method dengan akses modifier public
  public function cetakInfo()
  {
    return "Merk mobil: " . $this->merk . "<br>Warna mobil: " . $this->warna . "<br>Harga mobil: " . $this->harga;
  }
  
  // Method dengan akses modifier private
  private function hitungOngkosKirim()
  {
    return $this->harga * 0.1;
  }
  
  // Method dengan akses modifier protected
  protected function hitungDiskon()
  {
    return $this->harga * 0.2;
  }
}

// Kelas turunan dari kelas Mobil
class MobilSport extends Mobil
{
  // Property tambahan
  public $turbo;
  
  // Konstruktor
  public function __construct($merk, $warna, $harga, $turbo)
  {
    // Memanggil konstruktor dari kelas parent
    parent::__construct($merk, $warna, $harga);
    $this->turbo = $turbo;
  }
  
  // Method yang menggunakan method protected dari kelas parent
  public function cetakInfoSport()
  {
    return "Merk mobil: " . $this->merk . "\rWarna mobil: " . $this->warna . "\rHarga mobil: " . $this->harga
     . "\rDiskon: " . $this->hitungDiskon() . "\rTurbo: " . $this->turbo;
  }
}


