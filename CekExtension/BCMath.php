<?php

if (extension_loaded('bcmath')) {
    echo 'BCMath extension is loaded';
} else {
    echo 'BCMath extension is not loaded';
}

/*
 * Untuk mengaktifkan BCMath di file php.ini,
 * Anda perlu mencari bagian yang berkaitan dengan ekstensi BCMath.
 * Pada kebanyakan sistem, Anda dapat menemukannya dengan mencari baris yang mengandung teks ;extension=bcmath.

* Untuk mengaktifkan BCMath, hapus tanda semicolon (;) di awal baris tersebut.
 * Setelah Anda menghapus tanda semicolon,
 * file php.ini akan terlihat seperti ini: extension=bcmath
 * */

