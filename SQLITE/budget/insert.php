<?php
$message = ""; // initial message 
if( isset($_POST['submit_data']) ){

	// Includs database connection
	include "connect.php";

	// Gets the data from post
	$bln = $_POST['bulan'];
	$bruto = $_POST['bruto'];

	// Makes query with post data
	$query = "INSERT INTO sample (BLN, BRUTO) VALUES ('$bln', '$bruto')";
	
	// Executes the query
	// If data inserted then set success message otherwise set error message
	// Here $db comes from "db_connection.php"
	if( $db->exec($query) ){
		$message = "Data is inserted successfully.";
	}else{
		$message = "Sorry, Data is not inserted.";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert Data</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div style="width: 500px; margin: 20px auto;">

		<!-- showing the message here-->
		<div><?php echo $message;?></div>

		<table class="table table-bordered" width="100%" cellpadding="5" cellspacing="1" border="1">
			<form action="insert.php" method="post">
			<tr>
				<td>Bulan:</td>
				<td><input name="bulan" type="text" class="form-control" required></td>
			</tr>
			<tr>
				<td>Bruto:</td>
				<td><input name="bruto" type="text" class="form-control" required></td>
			</tr>
			<tr>
				<td><a href="index.php" class="btn btn-sm btn-default">See Data</a></td>
				<td><input name="submit_data" type="submit" class="btn btn-sm btn-primary" value="Insert Data"></td>
			</tr>
			</form>
		</table>
	</div>
</body>
</html>