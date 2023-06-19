<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Phpoffice\PhpSpreadsheet\Reader\Xlsx;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Data: PhpSpreadsheet</title>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#kosong").hide();
        });
    </script>
</head>

<body>
    <h3>Form Import Data</h3>
    <form method="POST" action="form.php" enctype="multipart/form-data">
        <a href="Format.xlsx">Download Format</a>
        <a href="index.php">Kembali</a>
        <br><br>
        <input type="file" name="file">
        <button type="submit" name="preview">Preview</button>
    </form>
    <hr>
    <?php
    if (isset($_POST['preview'])) {
        $tgl_sekarang = date('YmdHis');
        $nama_file_baru = 'data' . $tgl_sekarang . '.xlsx';
        if (is_file('tmp/' . $nama_file_baru)) {
            unlink('tmp/' . $nama_file_baru);
        }

        $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $tmp_file = $_FILES['file']['tmp_name'];

        if ($ext == "xlsx") {
            move_uploaded_file($tmp_file, 'tmp/' . $nama_file_baru);

            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $spreadsheet = $reader->load('tmp/' . $nama_file_baru);

            $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

            echo "<form method='POST' action='import.php'>";
            echo "<input type='hidden' name='namafile' value='" . $nama_file_baru . "' >";
            echo "<div id='kosong' style='color: red; margin-bottom:10px'>
            Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data belum diisi.
            </div>";

            echo "<table border='1' cellpadding='5'>
            <tr>
                <th colspan='5' class='text-center'>Preview Data
                </th>
                </tr>
                <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Gender</th>
                <th>Telepon</th>
                <th>Alamat</th>            
            </tr>";

            $numrow = 1;
            $kosong = 0;
            foreach  ($sheet as $row) {
                $nis = $row['A'];
                $nama = $row['B'];
                $gender = $row['C'];
                $telp = $row['D'];
                $alamat = $row['E'];

                if ($nis == "" && $nama == "" && $gender == "" && $telp == "" && $alamat == "") {
                    continue;
                }

                    if ($numrow > 1) {
                        $nis_td = (!empty($nis)) ? "" : " style='background: #E07171;'";
                        $nama_td = (!empty($nama)) ? "" : " style='background: #E07171;'";
                        $gender_td = (!empty($gender)) ? "" : " style='background: #E07171;'";
                        $telp_td = (!empty($telp)) ? "" : " style='background: #E07171;'";
                        $alamat_td = (!empty($alamat)) ? "" : " style='background: #E07171;'";

                        if ($nis == "" || $nama == "" || $gender =="" || $telp == "" || $alamat == "") {
                            $kosong++;
                        }

                        echo "<tr>";
                        echo "<td" . $nis_td . ">" . $nis . "</td>";
                        echo "<td" . $nama_td . ">" . $nama . "</td>";
                        echo "<td" . $gender_td . ">" . $gender . "</td>";
                        echo "<td" . $telp_td . ">" . $telp . "</td>";
                        echo "<td" . $alamat_td . ">" . $alamat . "</td>";
                    }
                    $numrow++;
            }
            echo "</table>";
            if ($kosong > 0) {
                ?>

                <script type="text/javascript">
                    $(document).ready(function(){
                        $("#jumlah_kosong").html('<?php echo $kosong; ?>');
                        $("#kosong").show();
                    });
                </script>
                <?php
            } else {
                echo "<hr>";
                echo "<button type='submit' name='import'>Import</button>";
            }
            echo "</form>";
        } else {
            echo "<div style='color: red; margin-bottom: 10px;'>Hanya File Excel 2007 (.xlsx) yang diperbolehkan</div>";
        }
    }

    ?>

</body>

</html>