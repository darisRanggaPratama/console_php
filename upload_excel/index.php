<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPLOAD</title>
      <!-- Load library Bootstrap 5 & datatable-->
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
</head>

<body>
    <tr>
        <td>
            <a href="form.php">Import Data</a>
        </td>
        <td>
            <a href="process.php">Export ke Excel</a>
        </td>
    </tr>
    <h3>
        Data Siswa Hasil Import
    </h3>

    <br>
    <br>
    <table id="data" class="table table-bordered" width="100%" cellpadding="5" cellspacing="1" border="1">
        <caption></caption>
        <thead>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Gender</th>
            <th>Telepon</th>
            <th>Alamat</th>
        </thead>
        <tbody>
        <?php
        include 'connect.php';

        $query = "SELECT * FROM siswa";

        $sql = mysqli_query($connect, $query);

        $no = 1;

        while ($data = mysqli_fetch_array($sql)) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . $data['nis'] . "</td>";
            echo "<td>" . $data['nama'] . "</td>";
            echo "<td>" . $data['gender'] . "</td>";
            echo "<td>" . $data['telp'] . "</td>";
            echo "<td>" . $data['alamat'] . "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#data').DataTable();
		});
	</script>
</body>

</html>