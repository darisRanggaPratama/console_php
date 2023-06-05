<?php include('connect.php');
$id = $_POST['kode'];
$sql = "SELECT * FROM dummy WHERE id='$kode' LIMIT 1";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);

