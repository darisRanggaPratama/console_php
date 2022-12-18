<?php
include_once 'Produk.php';
use Product\Produk;



// Instansiasi/ Membuat object
$komik = new Produk();
$majalah = new Produk();

// Isi variable
$komik->judul = "Detective Conan";
$majalah->penulis = "Izam";

// Tambah variable baru
$majalah->tahun = 2020;



var_dump($komik);
var_dump($majalah);
