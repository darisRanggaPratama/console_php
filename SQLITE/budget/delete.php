<?php

// Includs database connection
include "connect.php";

$id = $_GET['ID']; // rowid from url

// Prepar the deleting query according to rowid
$query = "DELETE FROM sample WHERE ID=$id";

// Run the query to delete record
if( $db->query($query) ){
	$message = "Record is deleted successfully.";
}else {
	$message = "Sorry, Record is not deleted.";
}

echo $message;
?>

