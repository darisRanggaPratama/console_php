<?php

// Includs database connection
include "db_connect.php";

// Makes query with rowid
$query = "SELECT rowid, * FROM students";

// Run the query and set query result in $result
// Here $db comes from "db_connection.php"
$result = $db->query($query);

?>
<!DOCTYPE html>
<html>

<head>
	<title>Data List</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
	<style type="text/css">
.addbtn:link, .addbtn:visited {
  background-color: #FC2C00;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

.addbtn:hover, .addbtn:active {
  background-color: #FF927B;
}
</style>
</head>

<body>

	<div style="width: 500px; margin: 20px auto;">
		<?php
		if (isset($_GET['aksi']) == 'del') {
			$id = $_GET['id']; // rowid from url

			// Prepar the deleting query according to rowid
			$query = "DELETE FROM students WHERE rowid=$id";

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
		<a href="insert.php" class="addbtn">Add New</a>
		<table id="example" class="table table-bordered" width="100%" cellpadding="5" cellspacing="1" border="1">
			<thead>
			<tr>
				<td>Name</td>
				<td>Email</td>
				<td>Action</td>
			</tr>
			</thead>
			<tbody>
			<?php while ($row = $result->fetchArray()) { ?>
				<tr>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td>
						<a href="update.php?id=<?php echo $row['rowid']; ?>" class="btn btn-sm btn-primary">Update</a>
						<a href="index.php?aksi=del&id=<?php echo $row['rowid']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
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