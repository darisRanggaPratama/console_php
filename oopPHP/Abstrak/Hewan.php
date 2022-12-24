<?php

namespace binatang;

// Mendefinisikan kelas abstrak
abstract class Hewan
{
    // Properti umum
    public string $nama;
    public string $warna;

    // Method abstrak
    abstract public function bicara(): string;
}

// Kelas anak yang menurunkan dari kelas abstrak
class Kucing extends Hewan
{
    // Menimplementasikan method bicara yang diwariskan dari kelas abstrak
   final public function bicara(): string
    {
        return "Meow";
    }
}

// Kelas anak yang menurunkan dari kelas abstrak
class Anjing extends Hewan
{
    // Menimplementasikan method bicara yang diwariskan dari kelas abstrak
   final public function bicara(): string
    {
        return "Woof";
    }
}

/*
 * Pada kode di atas, kita mendefinisikan kelas abstrak Hewan
 * dengan menggunakan keyword abstract.
 * Kelas abstrak tidak dapat diinstansiasi menjadi objek,
 * tetapi dapat diwariskan ke kelas anak.

* Kelas abstrak Hewan memiliki dua properti umum,
 * yaitu $nama dan $warna, serta satu method abstrak yang harus diimplementasikan oleh kelas anak, yaitu bicara().

Terakhir, kita cetak hasil pemanggilan method bicara() dari masing-masing objek menggunakan syntax `$

 * */






