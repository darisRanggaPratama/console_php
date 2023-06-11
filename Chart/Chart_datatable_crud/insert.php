<?php
$message = ""; // initial message 
if( isset($_POST['submit_data']) ){

	// Include database connection
	include "connect.php";

	// Gets the data from post
	$kode = $_POST['kode'];
	$bln = $_POST['bulan'];
	$gaji = $_POST['gaji'];
	$lembur = $_POST['lembur'];
	$tj_lain = $_POST['tj_lain'];
	$bruto = $_POST['bruto'];
	$potong = $_POST['potong'];
	$transfer = $_POST['transfer'];
	$hmn = $_POST['human'];

	// Makes query with post data
	$query = "INSERT INTO dummy
	(KODE, BULAN, GAJI, LEMBUR, TJ_LAIN, BRUTO, POTONGAN, TRANSFER, HUMAN)
	VALUES
	('$kode', '$bln', '$gaji', '$lembur', '$tj_lain', '$bruto', '$potong', '$transfer', '$hmn')";
	
	// Executes the query
	// If data inserted then set success message otherwise set error message
	// Here $database comes from "connect.php"
	if( mysqli_query($connect, $query) ){
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
	<h1 style="text-align:center">INPUT DATA</h1>

		<!-- showing the message here-->
		<div><?php echo $message;?></div>

		<table class="table table-bordered" width="100%" cellpadding="5" cellspacing="1" border="1">
			<form action="insert.php" method="POST">
			<tr>
				<td>Kode</td>
				<td><input name="kode" type="text" class="form-control" required></td>
			</tr>
			<tr>
				<td>Bulan</td>
				<td><input name="bulan" type="text" class="form-control" required></td>
			</tr>
			<tr>
				<td>Gaji</td>
				<td><input name="gaji" type="text" class="form-control" required></td>
			</tr>
			<tr>
				<td>Lembur</td>
				<td><input name="lembur" type="text" class="form-control" required></td>
			</tr>
			<tr>
				<td>Tj. Lain</td>
				<td><input name="tj_lain" type="text" class="form-control" required></td>
			</tr>
			<tr>
				<td>Bruto:</td>
				<td><input name="bruto" type="text" class="form-control" required></td>
			</tr>
			<tr>
				<td>Potongan</td>
				<td><input name="potong" type="text" class="form-control" required></td>
			</tr>
			<tr>
				<td>Transfer</td>
				<td><input name="transfer" type="text" class="form-control" required></td>
			</tr>
			<tr>
				<td>Employee</td>
				<td><input name="human" type="text" class="form-control" required></td>
			</tr>
			<tr>
				<td><a href="table.php" class="btn btn-sm btn-primary">View Data</a></td>
				<td style="text-align:right"><input name="submit_data" type="submit" class="btn btn-sm btn-primary" value="Insert Data"></td>
			</tr>
			</form>
		</table>
	</div>

	
</body>
</html>