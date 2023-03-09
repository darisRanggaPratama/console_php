<?php
/* 1. Buat array dengan tipe data numerik berkapasitas 11 elemen yang diisi nilai random
berkisar antara 0 sampai dengan 21 dimana menolak elemen yang bernilai sama */
$array = array();
while (count($array) < 11) {
    $randomValue = rand(0, 21);
    if (!in_array($randomValue, $array)) {
        $array[] = $randomValue;
    }
}

// Tampilkan nilainya
echo "1. Array: \n";
foreach ($array as $value) {
    echo $value . "\n";
}

echo "\nArray: Index & Value: \n";
for ($i = 0; $i < count($array); $i++) {
    echo "$i $array[$i] \n";
}


// 2. Ambil elemen yang bernilai genap lalu tampilkan secara ascending
$evenArray = array();
foreach ($array as $value) {
    if ($value % 2 == 0) {
        $evenArray[] = $value;
    }
}

sort($evenArray);
echo "\n2. Elemen bernilai genap secara ascending: \n";
foreach ($evenArray as $value) {
    echo $value . "\n";
}

// 3. Ambil elemen yang bernilai ganjil lalu tampilkan secara descending
$oddArray = array();
foreach ($array as $value) {
    if ($value % 2 != 0) {
        $oddArray[] = $value;
    }
}

rsort($oddArray);
echo "\n3. Elemen bernilai ganjil secara descending: \n";
foreach ($oddArray as $value) {
    echo $value . "\n";
}

//4. Sisipkan elemen bernilai 100 antara index ke-4 dan index ke-5 lalu tampilkan hasilnya.
array_splice($array, 5, 0, array(100));
echo "\n4. Sisipkan elemen bernilai 100 antara index ke-4 dan index ke-5: \n";
echo "\nArray: Index & Value: \n";
for ($i = 0; $i < count($array); $i++) {
    echo "$i $array[$i] \n";
}

//5.Ubah index ke-3 dengan nilai99lalutampilkanhasilnya.
$array[3]=99;
echo"\n5. Ubah index ke-3 dengan nilai 99:\n";
echo "\nArray: Index & Value: \n";
for ($i = 0; $i < count($array); $i++) {
    echo "$i $array[$i] \n";
}

//6. Tampilkan semua elemen array dengan mengurutkan nilainya secara descending.
rsort($array);
echo "\n6. Tampilkan semua elemen array dengan mengurutkan nilainya secara descending: \n";
echo "\nArray: Index & Value: \n";
for ($i = 0; $i < count($array); $i++) {
    echo "$i $array[$i] \n";
}

//7. Hapus index ke-2 lalu tampilkan hasilnya.
unset($array[2]);
$array = array_values($array);
echo "\n7. Hapus index ke-2: \n";
echo "\nArray: Index & Value: \n";
for ($i = 0; $i < count($array); $i++) {
    echo "$i $array[$i] \n";
}

//8. Tampilkan semua elemen array dengan mengurutkan nilainya secara ascending.
sort($array);
echo "\n8. Tampilkan semua elemen array dengan mengurutkan nilainya secara ascending: \n";
echo "\nArray: Index & Value: \n";
for ($i = 0; $i < count($array); $i++) {
    echo "$i $array[$i] \n";
}
?>
