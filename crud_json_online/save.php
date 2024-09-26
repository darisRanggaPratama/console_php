<?php
// Menghubungkan ke database
require_once('connect.php');

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data POST
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '-';
    $jk = isset($_POST['jk']) ? $_POST['jk'] : '-';
    $telp = isset($_POST['telp']) ? $_POST['telp'] : '-';

    // Mengecek apakah semua field diisi
    if (!empty($nama) && !empty($jk) && !empty($telp)) {
        // Menggunakan prepared statement untuk menghindari SQL Injection
        $stmt = $conn->prepare("INSERT INTO tb_warga (nama, jk, telp) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nama, $jk, $telp);

        if ($stmt->execute()) {
            // Data berhasil disimpan
            $response['value'] = 1;
            $response['pesan'] = 'Data berhasil disimpan!';
            
            // Membuat respons JSON yang lebih terstruktur
            $response['result'] = array(
                'id' => $conn->insert_id, // Mengambil ID yang baru saja diinput
                'nama' => $nama,
                'jk' => $jk,
                'telp' => $telp
            );
        } else {
            // Terjadi kesalahan saat menyimpan data
            $response['value'] = 0;
            $response['pesan'] = 'Terjadi kesalahan saat menyimpan data.';
        }

        $stmt->close(); // Tutup statement
    } else {
        // Jika ada field yang kosong
        $response['value'] = 0;
        $response['pesan'] = 'Semua field harus diisi.';
    }

    // Tutup koneksi database
    mysqli_close($conn);

    // Menampilkan respons JSON
    echo json_encode($response);
} else {
    // Jika bukan metode POST
    $response['value'] = 0;
    $response['pesan'] = 'Oops! Hanya menerima permintaan POST.';
    echo json_encode($response);
}
?>
