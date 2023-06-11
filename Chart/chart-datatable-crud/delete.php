<?php

// Includs database connection
include "connect.php";

$id = $_GET['id']; // rowid from url

// Prepar the deleting query according to rowid
$query = "DELETE FROM dummy WHERE NMR=$id";

// Run the query to delete record
if (mysqli_query($connect, $query)) {
	$message = "Record is deleted successfully.";
}else {
	$message = "Sorry, Record is not deleted.";
}

echo $message;
?>

