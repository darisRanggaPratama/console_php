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
    <style type="text/css">
        table {
            border-collapse: collapse;
            border: 2px solid #9c27b0;
            width: 100%;
        }

        th,
        td {
            text-align: center;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th {
            background-color: #9c27b0;
            color: white;
        }

        td {
            border-bottom: 1px solid #e0e0e0;
        }

        tr:hover {
            background-color: #5e5e5e;
            color: red;
        }
    </style>
    <title>Payroll</title>
</head>

<body>
    <h1>Budget Gaji</h1>
    <table id="example" class="table table-striped" style="width:100%">
        <thead class="center">
            <tr bgcolor="gray">
                <th style="text-align:center">#</th>
                <th style="text-align:center">Kode</th>
                <th style="text-align:center">Bulan</th>
                <th style="text-align:center">Gaji</th>
                <th style="text-align:center">Lembur</th>
                <th style="text-align:center">Tj Lain</th>
                <th style="text-align:center">Bruto</th>              
                <th style="text-align:center">Transfer</th>
                <th style="text-align:center">Qty</th>

            </tr>

        </thead>
        <hr>
        <tbody>
            <?php
            $query = "SELECT * FROM sampledb ORDER BY KODE ASC";
            $tampil = mysqli_query($connect, $query);
            $no = 1;
            while ($result = mysqli_fetch_array($tampil)) {
                $kode = $result['KODE'];
                $bulan = $result['BLN'];
                $gaji = $result['GAJI'];
                $lembur = $result['LEMBUR'];
                $tjLain = $result['TJ_LAIN'];
                $bruto = $result['BRUTO'];
                $transfer = $result['TRF'];
                $human = $result['HMN'];

                echo $kode." ".$bulan;
            ?>
                <tr style="text-align:center">
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $kode; ?></td>
                    <td><?php echo $bulan; ?></td>
                    <td><?php echo number_format($gaji, 0, ",", "."); ?></td>
                    <td><?php echo number_format($lembur, 0, ",", "."); ?></td>
                    <td><?php echo number_format($tjLain, 0, ",", "."); ?></td>
                    <td><?php echo number_format($bruto, 0, ",", "."); ?></td>                    
                    <td><?php echo number_format($transfer, 0, ",", "."); ?></td>
                    <td><?php echo number_format($human, 0, ",", "."); ?></td>

                </tr>
            <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr bgcolor="gray" style="text-align:center">
                <th style="text-align:center">#</th>
                <th style="text-align:center">Kode</th>
                <th style="text-align:center">Bulan</th>
                <th style="text-align:center">Gaji</th>
                <th style="text-align:center">Lembur</th>
                <th style="text-align:center">Tj Lain</th>
                <th style="text-align:center">Bruto</th>                
                <th style="text-align:center">Transfer</th>
                <th style="text-align:center">Qty</th>
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