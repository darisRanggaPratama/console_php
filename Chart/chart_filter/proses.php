<?php
$servername = "localhost";
$username = "rangga";
$password = "rangga";
$database = "test";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = 'SELECT * FROM budget2023_dummy';

$data = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($data);
$bulan = [];
$gaji = [
    'tahun'=>2021,
    'bulan'=>[]
];
$lembur = [];
$tj_lain =[];
$bruto = [];
$potongan = [];
$transfer = [];
$human = [];
	

foreach ($data as $item) {
    if (stripos($item['KODE'], '2021') !== false) {
        array_push($gaji['bulan'], [$item['BULAN']=>$item['GAJI']]);

    }
}
 $gaji = json_encode($gaji);
?>
