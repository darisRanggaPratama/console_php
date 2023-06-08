<?php
$message = ""; // initial message 

// Includs database connection
include "connect.php";

// Updating the table row with submited data according to rowid once form is submited 
if( isset($_POST['submit_data']) ){

	// Gets the data from post
	$id = $_POST['id'];
	$kode = $_POST['kode'];
	$bln = $_POST['bulan'];
	$bruto = $_POST['bruto'];

	// Makes query with post data
	$query = "UPDATE sample set KODE='$kode', BLN='$bln', BRUTO='$bruto' WHERE ID=$id";
	
	// Executes the query
	// If data inserted then set success message otherwise set error message
	// Here $db comes from "connect.php"
	if( $db->exec($query) ){
		$message = "Data is updated successfully.";
	}else{
		$message = "Sorry, Data is not updated.";
	}
}

$id = $_GET['id']; // rowid from url
// Prepar the query to get the row data with rowid
$query = "SELECT * FROM sample WHERE ID=$id";
$result = $db->query($query);
$data = $result->fetchArray(); // set the row in $data
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Data</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
		
</head>
<body>
	<div style="width: 500px; margin: 20px auto;">

		<!-- showing the message here-->
		<div><?php echo $message;?></div>

		<table class="table table-bordered" width="100%" cellpadding="5" cellspacing="1" border="1">
			<form action="" method="POST">
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<tr>
				<td>Kode:</td>
				<td><input name="kode" type="text" class="form-control" value="<?php echo $data['KODE'];?>" required></td>
			</tr>
			<tr>
				<td>Bulan:</td>
				<td><input name="bulan" type="text" class="form-control" value="<?php echo $data['BLN'];?>" required></td>
			</tr>
			<tr>
				<td>Bruto:</td>
				<td><input name="bruto" type="text" class="form-control" value="<?php echo $data['BRUTO'];?>" required></td>
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