<?php
$message = ""; // initial message 

// Includs database connection
include "db_connect.php";

// Updating the table row with submited data according to rowid once form is submited 
if( isset($_POST['submit_data']) ){

	// Gets the data from post
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];

	// Makes query with post data
	$query = "UPDATE students set name='$name', email='$email' WHERE rowid=$id";
	
	// Executes the query
	// If data inserted then set success message otherwise set error message
	// Here $db comes from "db_connection.php"
	if( $db->exec($query) ){
		$message = "Data is updated successfully.";
	}else{
		$message = "Sorry, Data is not updated.";
	}
}

$id = $_GET['id']; // rowid from url
// Prepar the query to get the row data with rowid
$query = "SELECT rowid, * FROM students WHERE rowid=$id";
$result = $db->query($query);
$data = $result->fetchArray(); // set the row in $data
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Data</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div style="width: 500px; margin: 20px auto;">

		<!-- showing the message here-->
		<div><?php echo $message;?></div>

		<table class="table table-bordered" width="100%" cellpadding="5" cellspacing="1" border="1">
			<form action="" method="post">
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<tr>
				<td>Name:</td>
				<td><input name="name" type="text" class="form-control" value="<?php echo $data['name'];?>" required></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input name="email" type="text" class="form-control" value="<?php echo $data['email'];?>" required></td>
			</tr>
			<tr>
				<td><a href="index.php" class="btn btn-sm btn-default">Back</a></td>
				<td><input name="submit_data" type="submit"class="btn btn-sm btn-primary" value="Update Data"></td>
			</tr>
			</form>
		</table>
	</div>
</body>
</html>