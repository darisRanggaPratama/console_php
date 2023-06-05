<?php
include_once('connect.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
 
    <title>Document</title>
</head>

<body>
    <h1>Data Mahasiswa</h1>
    <table id="example" class="table table-striped" style="width:100%">
        <thead class="center">
            <tr bgcolor="gray">
                <th style="text-align:center">#</th>
                <th style="text-align:center">nim</th>
                <th style="text-align:center">nama</th>
                <th style="text-align:center">prodi</th>
                <th style="text-align:center">alamat</th>

            </tr>

        </thead>
        <hr>
        <tbody>

            <?php
            $query = "SELECT * FROM dbmhs ORDER BY nim ASC";
            $tampil = mysqli_query($connect, $query);
            $urut = 1;
            while ($result = mysqli_fetch_array($tampil)) {
                $nim = $result['nim'];
                $nama = $result['nama'];
                $prodi = $result['prodi'];
                $alamat = $result['alamat'];
            ?>

                <tr>

                    <td><?php echo $urut++; ?></td>
                    <td><?php echo $nim; ?></td>
                    <td><?php echo $nama; ?></td>
                    <td><?php echo $prodi; ?></td>
                    <td><?php echo $alamat; ?></td>

                </tr>
            <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr bgcolor="gray">
                <th style="text-align:center">#</th>
                <th style="text-align:center">nim</th>
                <th style="text-align:center">nama</th>
                <th style="text-align:center">prodi</th>
                <th style="text-align:center">alamat</th>
            </tr>
        </tfoot>
    </table>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>