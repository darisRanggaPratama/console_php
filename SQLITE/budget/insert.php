<?php
$message = ""; // initial message 
if( isset($_POST['submit_data']) ){

	// Include database connection
	include "connect.php";

	// Gets the data from post
	$kode = $_POST['kode'];
	$bln = $_POST['bulan'];
	$bruto = $_POST['bruto'];

	// Makes query with post data
	$query = "INSERT INTO sample (KODE, BLN, BRUTO) VALUES ('$kode', '$bln', '$bruto')";
	
	// Executes the query
	// If data inserted then set success message otherwise set error message
	// Here $db comes from "connect.php"
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
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">

	
</head>
<body>
	<div style="width: 500px; margin: 20px auto;">

		<!-- showing the message here-->
		<div><?php echo $message;?></div>

		<table class="table table-bordered" width="100%" cellpadding="5" cellspacing="1" border="1">
			<form action="insert.php" method="POST">
			<tr>
				<td>Kode:</td>
				<td><input name="kode" type="text" class="form-control" required></td>
			</tr>
			<tr>
				<td>Bulan:</td>
				<td><input name="bulan" type="text" class="form-control" required></td>
			</tr>
			<tr>
				<td>Bruto:</td>
				<td><input name="bruto" type="text" class="form-control" required></td>
			</tr>
			<tr>
				<td><a href="index.php" class="btn btn-sm btn-primary">View Data</a></td>
				<td style="text-align:right"><input name="submit_data" type="submit" class="btn btn-sm btn-primary" value="Insert Data"></td>
			</tr>
			</form>
		</table>
	</div>

	
</body>
</html>