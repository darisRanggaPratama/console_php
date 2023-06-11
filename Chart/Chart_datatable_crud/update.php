<?php
$message = ""; // initial message 

// Include database connection
include "connect.php";

// Updating the table row with submited data according to rowid once form is submited 
if (isset($_POST['submit_data'])) {

	// Gets the data from post
	$id = $_POST['id'];
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
	$query = "UPDATE dummy set
	KODE='$kode', BULAN='$bln', GAJI='$gaji', LEMBUR='$lembur', TJ_LAIN='$tj_lain',
	BRUTO='$bruto', POTONGAN='$potong', TRANSFER='$transfer', HUMAN='$hmn'
	WHERE NMR=$id";

	// Executes the query
	// If data inserted then set success message otherwise set error message
	// Here $database comes from "connect.php"
	if (mysqli_query($connect, $query)) {
		$message = "Data is updated successfully.";
	} else {
		$message = "Sorry, Data is not updated.";
	}
}

$id = $_GET['id']; // id from url
// Prepare the query to get the row data with rowid
$query = "SELECT * FROM dummy WHERE NMR=$id";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result);// set the row in $data
?>

<!DOCTYPE html>
<html>

<head>
	<title>Update Data</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">

</head>

<body>
	<div style="width: 500px; margin: 20px auto;">
		<h1 style="text-align:center">UPDATE DATA</h1>

		<!-- showing the message here-->
		<div><?php echo $message; ?></div>

		<table class="table table-bordered" width="100%" cellpadding="5" cellspacing="1" border="1">
			<form action="" method="POST">
				<input type="hidden" name="id" value="<?php echo $data['NMR']; ?>">
				<tr>
					<td>Kode</td>
					<td><input name="kode" type="text" class="form-control" value="<?php echo $data['KODE']; ?>" required></td>
				</tr>
				<tr>
					<td>Bulan</td>
					<td><input name="bulan" type="text" class="form-control" value="<?php echo $data['BULAN']; ?>" required></td>
				</tr>
				<tr>
					<td>Gaji</td>
					<td><input name="gaji" type="text" class="form-control" value="<?php echo $data['GAJI']; ?>" required></td>
				</tr>
				<tr>
					<td>Lembur</td>
					<td><input name="lembur" type="text" class="form-control" value="<?php echo $data['LEMBUR']; ?>" required></td>
				</tr>
				<tr>
					<td>Tj Lain</td>
					<td><input name="tj_lain" type="text" class="form-control" value="<?php echo $data['TJ_LAIN']; ?>" required></td>
				</tr>
				<tr>
					<td>Bruto</td>
					<td><input name="bruto" type="text" class="form-control" value="<?php echo $data['BRUTO']; ?>" required></td>
				</tr>
				<tr>
					<td>Potongan</td>
					<td><input name="potong" type="text" class="form-control" value="<?php echo $data['POTONGAN']; ?>" required></td>
				</tr>
				<tr>
					<td>Transfer</td>
					<td><input name="transfer" type="text" class="form-control" value="<?php echo $data['TRANSFER']; ?>" required></td>
				</tr>
				<tr>
					<td>Employee</td>
					<td><input name="human" type="text" class="form-control" value="<?php echo $data['HUMAN']; ?>" required></td>
				</tr>
				<tr>
					<td><a href="table.php" class="btn btn-sm btn-primary">View Data</a></td>
					<td style="text-align:right"><input name="submit_data" type="submit" class="btn btn-sm btn-primary" value="Update Data"></td>
				</tr>
			</form>
		</table>
	</div>

</body>

</html>