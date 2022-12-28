<?php

if (extension_loaded('curl')) {
    echo "cURL extension is loaded";
} else {
    echo "cURL extension is not loaded";
}

/*Sebagai alternatif, Anda juga bisa menggunakan fungsi
* extension_loaded() untuk mengecek apakah cURL extension telah diaktifkan atau tidak.
*/

/*
 * Untuk mengaktifkan cURL extension di PHP, Anda perlu melakukan beberapa langkah:

 * 1. Buka file php.ini yang terletak di direktori instalasi PHP.
 * Anda bisa menemukan file ini dengan menjalankan perintah php --ini di command prompt atau terminal.

 * 2. Cari baris yang berkomentar ;extension=curl.
 * Baris ini merupakan pengaturan untuk mengaktifkan atau menonaktifkan cURL extension.

 * 3. Hapus tanda komentar ; di depan baris tersebut sehingga menjadi extension=curl.
 * Ini akan mengaktifkan cURL extension.

 * 4. Simpan perubahan yang telah Anda buat di file php.ini dan restart server web Anda untuk mengaktifkan perubahan.
 * */
