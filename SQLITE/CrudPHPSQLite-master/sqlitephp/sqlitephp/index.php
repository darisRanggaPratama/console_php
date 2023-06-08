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
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/bootstrap.min.js"></script>
</head>
<body>

	<div style="width: 500px; margin: 20px auto;">
	<?php
if(isset($_GET['aksi']) == 'del'){
$id = $_GET['id']; // rowid from url

// Prepar the deleting query according to rowid
$query = "DELETE FROM students WHERE rowid=$id";

// Run the query to delete record
if( $db->query($query) ){
	$message = "Record is deleted successfully.";
}else {
	$message = "Sorry, Record is not deleted.";
}

echo $message;
echo "<br/>";
}
?>
		<a href="insert.php">Add New</a>
		<table class="table table-bordered" width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr>
				<td>Name</td>
				<td>Email</td>
				<td>Action</td>
			</tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?php echo $row['name'];?></td>
				<td><?php echo $row['email'];?></td>
				<td>
					<a href="update.php?id=<?php echo $row['rowid'];?>" class="btn btn-sm btn-primary">Update</a>
					<a href="index.php?aksi=del&id=<?php echo $row['rowid'];?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
</body> 
</html>