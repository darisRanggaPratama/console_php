<?php
namespace Human;

class Person
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
        echo "Object was created with name '$name'.\n";
    }

    public function __destruct()
    {
        echo "Object with name '$this->name' is being destroyed.\n";
    }
}







/*
* Pada contoh di atas,
* kita membuat kelas Person yang memiliki sebuah properti bernama name dan dua method: __construct() dan __destruct().
* Method __construct() akan dijalankan setiap kali kita menciptakan objek baru dari kelas Person,
* sedangkan method __destruct() akan dijalankan setiap kali objek tersebut dihapus dari memori.

* Pada baris ke-14,
* kita menciptakan objek baru dengan nama $person dengan menggunakan keyword new
* dan mengirimkan argumen "John" ke method __construct().
* Ini akan menampilkan output "Object was created with name 'John'.".

* Pada baris ke-17,
* kita menggunakan keyword unset() untuk menghapus objek $person dari memori.
* Ini akan menyebabkan method_destruct() dijalankan,
* yang akan menampilkan output "Object with name 'John' is being destroyed.".

* Destructor berguna untuk membersihkan setiap resource yang mungkin masih terbuka
* atau terpakai oleh objek tersebut sebelum dihapus dari memori.
* Sebagai contoh, jika objek kita membuka sebuah file atau menyambung ke database,
* kita dapat menggunakan destructor untuk menutup file tersebut
* atau mengakhiri koneksi ke database sebelum objek dihapus dari memori.
*/
