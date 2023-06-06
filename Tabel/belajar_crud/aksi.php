<?php

include "koneksi.php";
include "fungsi_antiinjection.php";
include "fungsi_waktu.php";

$id = antiinjection($_POST['id_user']);
$nama = antiinjection($_POST['nama']);
$alamat = antiinjection($_POST['alamat']);
$email = antiinjection($_POST['email']);
$agama = antiinjection($_POST['agama']);
$jk = antiinjection($_POST['jk']);
$status = antiinjection($_POST['status']);

if ($_GET['mod'] == 'tambah') {
	$sql = $db->query("INSERT INTO t_user (nama, alamat, email, agama, jk, status, created_date) VALUES ('$nama', '$alamat', '$email', '$agama', '$jk', '$status', '$datetime') ");
	header('location:index.php?code=1');
} elseif ($_GET['mod'] == 'edit') {
	$sql = $db->query("UPDATE t_user SET nama='$nama', alamat='$alamat', email='$email', agama='$agama', jk='$jk', status='$status', modified_date='$datetime' 
			WHERE id_user ='$id' ");
	header('location:index.php?code=2');
}

$id = $_GET['id'];
if ($_GET['mod'] == 'delete') {
	$sql1 = $db->query("DELETE FROM t_user WHERE id_user ='$id' ");
	header('location:index.php?code=3');
}
