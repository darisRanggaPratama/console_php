<?php

// Includs database connection
include "connect.php";

// Makes query: SELECT ALL
$query = "SELECT * FROM sample ORDER BY KODE ASC";

// Run the query and set query result in $result
// Here $db comes from "connect.php"
$result = $db->query($query);

?>
<!DOCTYPE html>
<html>

<head>
	<title>Budget</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
	<style type="text/css">
		.addbtn:link,
		.addbtn:visited {
			background-color: #FC2C00;
			color: white;
			padding: 14px 25px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
		}

		.addbtn:hover,
		.addbtn:active {
			background-color: #FF927B;
		}
	</style>
</head>

<body>

	<div style="width: 1000px; margin: 20px auto;">
		<h1>Data Payroll</h1>
		<?php
		if (isset($_GET['aksi']) == 'del') {
			$id = $_GET['id']; // id from url

			// Prepare the deleting query according to id
			$query = "DELETE FROM sample WHERE ID=$id";

			// Run the query to delete record
			if ($db->query($query)) {
				$message = "Record is deleted successfully.";
			} else {
				$message = "Sorry, Record is not deleted.";
			}

			echo $message;
			echo "<br/>";
		}
		?>
		<a href="insert.php" class="addbtn" >Add New</a>
		<table id="example" class="table table-bordered" width="100%" cellpadding="5" cellspacing="1" border="1">
			<caption>Data Payroll</caption>
			<thead>
				<th style="text-align:center">ID</th>
				<th style="text-align:center"></th>
				<th style="text-align:center">KODE</th>
				<th style="text-align:center">BLN</th>
				<th style="text-align:center">BRUTO</th>
				<th style="text-align:center">TRANSFER</th>
				<th style="text-align:center"></th>
			</thead>
			<tbody>
				<?php while ($row = $result->fetchArray()) { ?>
					<tr>
						<td style="text-align:center"><?php echo $row['ID']; ?></td>
						<td style="text-align:center">
							<a href="update.php?id=<?php echo $row['ID']; ?>" class="btn btn-sm btn-primary">
							<img src="icons8-edit.png" alt="edit" style="width:20px;height:20px;"></a>
						</td>
						<td style="text-align:center"><?php echo $row['KODE']; ?></td>
						<td style="text-align:center"><?php echo $row['BLN']; ?></td>
						<td style="text-align:right"><?php echo $row['BRUTO']; ?></td>
						<td style="text-align:right"><?php echo $row['TRF']; ?></td>
						<td style="text-align:right">
							<a href="index.php?aksi=del&id=<?php echo $row['ID']; ?>" 
							class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">
							<img src="icons8_del.png" alt="delete" style="width:20px;height:20px;"></a>
							</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

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