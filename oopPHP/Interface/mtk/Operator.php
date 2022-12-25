<?php

namespace Matematika;

/*
 * Berikut adalah contoh kode lengkap PHP untuk menjelaskan metode overloading & overriding
 * yang mengimplementasikan Interface dengan rincian langkah demi langkah dalam Bahasa Indonesia:

 * 1. Buat interface yang menentukan metode yang harus diimplementasikan oleh kelas
 * yang mengimplementasikannya. Misalnya, buat interface "Operator" dengan metode "pangkatEmpat()":
 * */

interface Operator
{
    public function pangkatEmpat(array $parameter): float;
}

/*
 * 2. Buat kelas yang mengimplementasikan interface tersebut.
 * Misalnya, buat kelas "Pemangkatan" yang mengimplementasikan interface "pangkatEmpat()": *
 * */

/*
 * 3. Untuk mengimplementasikan metode overloading, kita dapat menggunakan fungsi __call().
 * Fungsi ini akan dipanggil setiap kali kita mencoba memanggil metode yang tidak terdefinisi dalam kelas.
 * Kita dapat menggunakan fungsi __call() untuk mengecek apakah metode yang diminta memiliki jumlah parameter
 * yang sesuai dengan yang kita harapkan, dan mengeksekusi kode yang sesuai.

* 4. Untuk menggunakan fungsi __call(),
 * tambahkan fungsi tersebut ke dalam kelas "Pemangkatan" dan tambahkan parameter yang diperlukan,
 * yaitu $nama_metode dan $parameter:
 * */

class Pemangkatan implements Operator
{
    // Overriding: implementasi metode pangkatEmpat()
    final public function pangkatEmpat(array $parameter): float
    {
        echo "\r\n$parameter[0] pangkat 4: ";
        return $parameter[0] * $parameter[1] * $parameter[2] * $parameter[3];
    }

// Overloading
    public function __call(string $pangkat, array $parameter): float
    {
        if ($pangkat == 'pangkat') {
            // cek jumlah parameter yang diberikan
            if (count($parameter) == 1) {
                echo "\r\n$parameter[0] Pangkat 1: ";
                return $parameter[0];
            } elseif (count($parameter) == 2) {
                // Jika parameter sesuai. Lakukan pangkat 2
                echo "\r\n$parameter[0] Pangkat 2: ";
                return $parameter[0] * $parameter[1];
            } elseif (count($parameter) == 3) {
                echo "\r\n$parameter[0] Pangkat 3: ";
                // Jika parameter sesuai. Lakukan pangkat 3
                return $parameter[0] * $parameter[1] * $parameter[2];
            } else {
                // metode atau jumlah parameter tidak sesuai dengan yang kita harapkan
                echo "\r\nError: Maksimal Pangkat 3: ";
                return 0;
            }
        }
        return $parameter[0];
    }
}

/*
 * 5. Dalam fungsi __call(), kita dapat mengecek apakah metode yang diminta
 * sesuai dengan metode yang kita harapkan. Misalnya, jika kita ingin mengimplementasikan
 *  overloading untuk metode "pangkat()" dengan jumlah parameter yang berbeda,
 * kita dapat mengecek jumlah parameter yang diberikan.
 * */

/*
 * 6. Setelah kita mengecek jumlah parameter yang diberikan,
 * kita dapat mengeksekusi kode yang sesuai.
 * Misalnya, jika kita ingin memangkat tiga bilangan,
 * kita dapat menambahkan kode untuk mengalikan tiga bilangan di dalam blok else if yang sesuai:
 * */

/*
* 7. Jika metode yang diminta tidak sesuai dengan apa yang kita harapkan,
 * kita dapat menampilkan pesan error atau mengembalikan nilai default.
 * Misalnya, jika metode yang diminta bukan "hitung" atau jumlah parameter tidak sesuai dengan yang kita harapkan,
 * kita dapat menampilkan pesan error:
*/




