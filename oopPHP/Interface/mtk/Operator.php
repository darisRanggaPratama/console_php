<?php
namespace Matematika;

/*
 * Berikut adalah contoh kode lengkap PHP untuk menjelaskan metode overloading
 * yang mengimplementasikan Interface dengan rincian langkah demi langkah dalam Bahasa Indonesia:

 * 1. Buat interface yang menentukan metode yang harus diimplementasikan oleh kelas
 * yang mengimplementasikannya. Misalnya, buat interface "Operasi" dengan metode "hitung()":
 * */

interface Operasi
{
    public function hitung(): float;
}

/*
 * 2. Buat kelas yang mengimplementasikan interface tersebut.
 * Misalnya, buat kelas "Penjumlahan" yang mengimplementasikan interface "Operasi": *
 * */

/*
 * 3. Untuk mengimplementasikan metode overloading, kita dapat menggunakan fungsi __call().
 * Fungsi ini akan dipanggil setiap kali kita mencoba memanggil metode yang tidak terdefinisi dalam kelas.
 * Kita dapat menggunakan fungsi __call() untuk mengecek apakah metode yang diminta memiliki jumlah parameter
 * yang sesuai dengan yang kita harapkan, dan mengeksekusi kode yang sesuai.

* 4. Untuk menggunakan fungsi __call(),
 * tambahkan fungsi tersebut ke dalam kelas "Penjumlahan" dan tambahkan parameter yang diperlukan,
 * yaitu $nama_metode dan $parameter:
 * */

class Penjumlahan implements Operasi
{
    // implementasi metode hitung()
    public function hitung(): float{
        return 0;
    }

        // kode untuk menjumlahkan dua bilangan


    public function __call($namaMetode, $parameter)
    {
        if ($namaMetode == 'hitung') {
            // cek jumlah parameter yang diberikan
            if (count($parameter) == 2) {
                // jumlah parameter sesuai dengan yang kita harapkan, lakukan operasi penjumlahan
                echo "\r\nHasil1: ";
                return $parameter[0] + $parameter[1];

            } elseif (count($parameter) == 3) {
                echo "\r\nHasil2: ";
                // jumlah parameter sesuai dengan yang kita harapkan, lakukan operasi penjumlahan tiga bilangan
                return $parameter[0] + $parameter[1] + $parameter[2];

            } else {
                // metode atau jumlah parameter tidak sesuai dengan yang kita harapkan
                echo "Error: metode atau jumlah parameter tidak sesuai";
                return 0;
            }
        }
    }
}

/*
 * 5. Dalam fungsi __call(), kita dapat mengecek apakah metode yang diminta
 * sesuai dengan metode yang kita harapkan. Misalnya, jika kita ingin mengimplementasikan
 *  overloading untuk metode "hitung()" dengan jumlah parameter yang berbeda,
 * kita dapat mengecek jumlah parameter yang diberikan.
 * */

/*
 * 6. Setelah kita mengecek jumlah parameter yang diberikan,
 * kita dapat mengeksekusi kode yang sesuai.
 * Misalnya, jika kita ingin menjumlahkan tiga bilangan,
 * kita dapat menambahkan kode untuk menjumlahkan tiga bilangan di dalam blok else if yang sesuai:
 * */

/*
* 7. Jika metode yang diminta tidak sesuai dengan apa yang kita harapkan,
 * kita dapat menampilkan pesan error atau mengembalikan nilai default.
 * Misalnya, jika metode yang diminta bukan "hitung" atau jumlah parameter tidak sesuai dengan yang kita harapkan,
 * kita dapat menampilkan pesan error:
*/

/*
 * 8. Selesai. Sekarang kita dapat menggunakan kelas "Penjumlahan"
 * untuk menjumlahkan dua atau tiga bilangan dengan menggunakan metode overloading. Misalnya:
 * */

$penjumlahan = new Penjumlahan;

// menjumlahkan dua bilangan
echo $penjumlahan->hitung(1, 2);


// menjumlahkan tiga bilangan
echo $penjumlahan->hitung(1, 2, 3);


