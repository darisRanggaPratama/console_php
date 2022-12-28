<?php
if (extension_loaded('ctype')) {
    echo "Ctype extension sudah aktif";
} else {
    echo "Ctype extension belum aktif";
}

/*
 * Untuk mengaktifkan Ctype extension di PHP,
 * pertama-tama Anda perlu memastikan bahwa extension tersebut sudah terinstall
 * pada sistem Anda. Jika belum, Anda perlu menginstallnya terlebih dahulu.
 * Cara installasi tergantung pada sistem operasi yang Anda gunakan.
 * Jika Ctype extension sudah terinstall,
 * Anda dapat mengaktifkannya dengan menambahkan baris berikut ke file php.ini: extension=ctype.so
 * Setelah itu, restart webserver Anda agar perubahan pada file php.ini dapat diaktifkan.
 * Untuk mengecek apakah Ctype extension sudah aktif atau belum, Anda dapat menggunakan fungsi extension_loaded.
 * */
