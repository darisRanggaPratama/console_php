<?php include('connect.php');

$output= array();
$sql = "SELECT * FROM dummy ";

$totalQuery = mysqli_query($con, $sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'KODE',
	1 => 'BULAN',
	2 => 'GAJI',
	3 => 'LEMBUR',
	4 => 'TJ_LAIN',
	5 => 'BRUTO',
	6 => 'POTONGAN',
	7 => 'TRANSFER',
	8 => 'HUMAN',
);

if (isset($_POST['search']['value'])) {
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE KODE like '%".$search_value."%'";
	$sql .= " OR BULAN like '%".$search_value."%'";
}

if (isset($_POST['order'])) {
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
} else {
	$sql .= " ORDER BY KODE desc";
}

if ($_POST['length'] != -1) {
	$start = $_POST['start'];
	$length = $_POST['length'];
	$sql .= " LIMIT  ".$start.", ".$length;
}

$query = mysqli_query($con, $sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while ($row = mysqli_fetch_assoc($query)) {
	$sub_array = array();
	$sub_array[] = $row['KODE'];
	$sub_array[] = $row['BULAN'];
	$sub_array[] = $row['GAJI'];
	$sub_array[] = $row['LEMBUR'];
	$sub_array[] = $row['TJ_LAIN'];
	$sub_array[] = $row['BRUTO'];
	$sub_array[] = $row['POTONGAN'];
	$sub_array[] = $row['TRANSFER'];
	$sub_array[] = $row['HUMAN'];
	$sub_array[] = '<a href="javascript:void();" data-id="'.$row['kode'].'"  class="btn btn-info btn-sm editbtn" >Edit</a>  <a href="javascript:void();" data-id="'.$row['kode'].'"  class="btn btn-danger btn-sm deleteBtn" >Delete</a>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);


