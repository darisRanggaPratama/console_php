<!DOCTYPE html>
<html lang="en">

<head>
	<title>Latihan CRUD</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="Author" content="edi sutanto">
	<link rel="shortcut icon" href="">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
	<style type="text/css">
		.content {
			max-width: 1500px;
			margin: 0 auto;
		}
	</style>

	<!-- Latest compiled and minified CSS -->
	<!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
	<!-- <link rel="stylesheet" href="bootstrap-3.3.6/dist/css/bootstrap.min.css"> -->

	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->

	<!-- Latest compiled and minified JavaScript -->
	<!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
	<!-- <script type='javascript' src="bootstrap-3.3.6/dist/js/bootstrap.min.js"></script> -->


</head>

<body class="content">
	<div class="container-fluid">
		<?php
		include "koneksi.php";

		switch (@$_GET['mod']) {
			default: ?>

				<div class="blog-header">
					<h1 class="blog-title">CRUD Data</h1>
					
				</div>

				<p><a href='?mod=add'><button type='button' class='btn btn-primary'><span class='glyphicon glyphicon-plus-sign'></span> Add User</button></a></p>

				<div class="row">

					<div class="col-md-8">

						<?php include "alert.php"; ?>

						<table id="example" class="table table-striped" style="width:100%">
							<thead>
								<tr>
									<th>No.</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>Email</th>
									<th>Agama</th>
									<th>J_Kelamin</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								$sql = $db->query("SELECT * FROM t_user ");
								while ($data = $sql->fetch_array()) {
									echo " 
			              <tr>
			                <td>$no</td>
			                <td>$data[nama]</td>
			                <td>$data[alamat]</td>
			                <td>$data[email]</td>
			                <td>$data[agama]</td>
			                <td>$data[jk]</td>
			                <td>$data[status]</td>
			                <td><a href='?mod=edit&id=$data[id_user]'><button type='button' class='btn btn-success'><span class='glyphicon glyphicon-edit'></span> Edit</button></a> "; ?>
									<a href='aksi.php?mod=delete&id=<?php echo $data['id_user']; ?>' onClick="return confirm('Yakin akan menghapus Data?')"><button type='button' class='btn btn-danger'><span class='glyphicon glyphicon-remove-sign'>Delete</button></a></td>
									</tr>
								<?php $no++;
								} ?>
							</tbody>
						</table>
					</div>
				<?php
				break;


			case 'add': ?>
					<form method='POST' action='aksi.php?mod=tambah' class='form-horizontal'>
						<h2>Tambah User</h2>
						<div class="form-group">
							<label class="col-sm-1 control-label">Nama</label>
							<div class="col-sm-4">
								<input type="text" name='nama' class="form-control" placeholder="Text input">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-1 control-label">Alamat</label>
							<div class="col-sm-4">
								<textarea class="form-control" name='alamat' rows="3" placeholder="Alamat"></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-1 control-label">Email</label>
							<div class="col-sm-4">
								<input type="email" name='email' class="form-control" placeholder="Email">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-1 control-label">Agama</label>
							<div class="col-sm-4">
								<select class="form-control" name='agama'>
									<option value=''>-Pilih Agama-</option>
									<option value='Islam'>Islam</option>
									<option value='Kristen'>Kristen</option>
									<option value='Katolik'>Katolik</option>
									<option value='Hindu'>Hindu</option>
									<option value='Budha'>Budha</option>
									<option value='Konghuchu'>Konghuchu</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-1 control-label">Jenis Kelamin</label>
							<div class="col-sm-4">
								<input type="radio" name="jk" id="jk" value="L">Laki-laki &nbsp;
								<input type="radio" name="jk" id="jk" value="P">Perempuan
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-1 control-label">Status</label>
							<div class="col-sm-4">
								<input type="radio" name="status" id="status" value="A">Aktif &nbsp;
								<input type="radio" name="status" id="status" value="T">Tidak Aktif
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-1 col-sm-4">
								<button type='submit' name='submit' class='btn btn-primary' onClick="return confirm('Yakin akan Tambah Data?')">Tambah</button>
							</div>
						</div>
					</form>
				<?php
				break;

			case 'edit':
				$sql = $db->query("SELECT * FROM t_user WHERE id_user ='$_GET[id]' ");
				$data = $sql->fetch_array();

				?>
					<form method='POST' action='aksi.php?mod=edit' class='form-horizontal'>
						<h2>Edit User</h2>
						<!-- post kan id user type hidden-->
						<input type='hidden' name='id_user' value='<?php echo $data['id_user']; ?>'>
						<div class="form-group">
							<label class="col-sm-1 control-label">Nama</label>
							<div class="col-sm-4">
								<input type="text" name='nama' class="form-control" placeholder="Nama" value="<?php echo $data['nama']; ?> ">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-1 control-label">Alamat</label>
							<div class="col-sm-4">
								<textarea class="form-control" name='alamat' rows="3" placeholder="Alamat"><?php echo $data['alamat']; ?></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-1 control-label">Email</label>
							<div class="col-sm-4">
								<input type="email" name='email' class="form-control" placeholder="Email" value="<?php echo $data['email']; ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-1 control-label">Agama</label>
							<div class="col-sm-4">
								<select class="form-control" name='agama'>
									<option value=''>-Pilih Agama-</option>
									<option value='Islam' <?php if ($data['agama'] == 'Islam') {
																echo "SELECTED";
															} ?>>Islam</option>
									<option value='Kristen' <?php if ($data['agama'] == 'Kristen') {
																echo "SELECTED";
															} ?>>Kristen</option>
									<option value='Katolik' <?php if ($data['agama'] == 'Katolik') {
																echo "SELECTED";
															} ?>>Katolik</option>
									<option value='Hindu' <?php if ($data['agama'] == 'Hindu') {
																echo "SELECTED";
															} ?>>Hindu</option>
									<option value='Budha' <?php if ($data['agama'] == 'Budha') {
																echo "SELECTED";
															} ?>>Budha</option>
									<option value='Konghuchu' <?php if ($data['agama'] == 'Konghuchu') {
																	echo "SELECTED";
																} ?>>Konghuchu</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-1 control-label">Jenis Kelamin</label>
							<div class="col-sm-4">
								<input type="radio" name="jk" id="jk" value="L" <?php if ($data['jk'] == 'L') {
																					echo "CHECKED";
																				} ?>>Laki-laki &nbsp;
								<input type="radio" name="jk" id="jk" value="P" <?php if ($data['jk'] == 'P') {
																					echo "CHECKED";
																				} ?>>Perempuan
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-1 control-label">Status</label>
							<div class="col-sm-4">
								<input type="radio" name="status" id="status" value="A" <?php if ($data['status'] == 'A') {
																							echo "CHECKED";
																						} ?>>Aktif &nbsp;
								<input type="radio" name="status" id="status" value="T" <?php if ($data['status'] == 'T') {
																							echo "CHECKED";
																						} ?>>Tidak Aktif
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-1 col-sm-4">
								<button type='submit' name='submit' class='btn btn-primary' onClick="return confirm('Yakin akan Edit Data?')">Save</button>
								<button type='reset' name='reset' class='btn btn-primary'>Reset</button>
							</div>
						</div>
					</form>
			<?php
				break;
		} ?>

				</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		});
	</script>
</body>

</html>