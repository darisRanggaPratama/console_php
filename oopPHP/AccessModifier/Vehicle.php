<?php

// Akses Modifiers adalah fitur dari bahasa pemrograman yang memungkinkan kita untuk mengontrol
// akses ke properti dan metode dari kelas yang kita buat. Ada 4 jenis akses modifier di PHP:
// 1. public: memberikan akses kepada semua orang
// 2. protected: memberikan akses kepada kelas itu sendiri dan kelas turunannya
// 3. private: memberikan akses hanya kepada kelas itu sendiri
// 4. final: memberikan akses seperti protected, namun tidak bisa diubah oleh kelas turunannya

namespace Vehicle;
class Vehicle {
  // property dengan akses modifier public
  public $merk;
  public $tipe;
  public $warna;
  
  // property dengan akses modifier protected
  protected $harga;
  
  // property dengan akses modifier private
  private $jumlahRoda;
  
  // property dengan akses modifier final
  public $bahanBakar;
  
  public function __construct($merk, $tipe, $warna, $harga, $jumlahRoda, $bahanBakar)
  {
    $this->merk = $merk;
    $this->tipe = $tipe;
    $this->warna = $warna;
    $this->harga = $harga;
    $this->jumlahRoda = $jumlahRoda;
    $this->bahanBakar = $bahanBakar;
  }
  
  // method dengan akses modifier public
  public function cetakInfoMobil()
  {
    return "\r\nMerk kendaraan: $this->merk, Tipe: $this->tipe,Warna: $this->warna,
    \rHarga: $this->harga, Jumlah Roda: $this->jumlahRoda, Bahan Bakar: $this->bahanBakar\r\n";
  }
  
  // method dengan akses modifier protected
  protected function cetakHargaMobil()
  {
    return "\r\nHarga harga: $this->harga";
  }
  
  // method dengan akses modifier private
  private function cetakJumlahRodaMobil()
  {
    return "\r\nJumlah roda kendaraan: $this->jumlahRoda";
  }
  
  // method dengan akses modifier final
  final public function cetakBahanBakarMobil() {
    return "\r\nBahan bakar kendaraan: $this->bahanBakar";
  }
}


