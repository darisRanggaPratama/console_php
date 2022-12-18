<?php
// Kelas dengan nama 'Mobil'
class Mobil
{
    // Property atau variabel yang ada pada kelas 'Mobil'
    public string $merk = "";
    public string $warna = "";
    public int $harga = 0;

    // Constructor dari kelas 'Mobil'
    public function __construct(string $merk, string $warna, int $harga = 150000000)
    {
        // Mengisi property '$merk' dengan nilai dari parameter '$merk'
        $this->merk = $merk;
        // Mengisi property '$warna' dengan nilai dari parameter '$warna'
        $this->warna = $warna;
        // Mengisi property '$harga' dengan nilai dari parameter '$harga'
        $this->harga = $harga;
    }

    final public function move(): void
    {
        echo "$this->merk jalan\r\n";
    }
}

// Penjelasan kode
/*
 * Dari kode di atas, kita dapat melihat bahwa
 * constructor = sebuah fungsi yang akan dijalankan
 * saat sebuah objek dibuat dari sebuah kelas.
 * Constructor bisa didefinisikan dengan menggunakan kata kunci __construct
 *  seperti yang terlihat pada baris ke-8.
 * Pada contoh di atas, constructor menerima 3 parameter yaitu $merk, $warna, dan $harga
 * yang nantinya akan diisi dengan nilai yang diberikan saat objek dibuat.

* Constructor juga bisa digunakan untuk mengisi nilai default pada property kelas.
 * Sebagai contoh,
 * jika kita ingin mengisi property $harga dengan nilai default 100000000
 * jika tidak ada nilai yang diberikan saat objek dibuat
 * */


