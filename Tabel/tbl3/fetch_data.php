<?php

include('connection.php');

$output = array();

$sql = "SELECT * FROM users";

$totalQuery = mysqli_query($con, $sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
    0 => 'id',
    1 => 'username',
    2 => 'email',
    3 => 'mobile',
    4 => 'city',
);

if (isset($_POST['search']['value'])) {
    $search_value = $_POST['search']['value'];
    $sql .= " WHERE username LIKE '%".$search_value."%'";
    $sql .= " OR email LIKE '%".$search_value."%'";
    $sql .= " OR mobile LIKE '%".$search_value."%'";
    $sql .= " OR city LIKE '%".$search_value."%'";
}

if (isset($_POST['order'])) {
    $column_name = $_POST['order'][0]['column'];
    $order = $_POST['order'][0]['dir'];
    $sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
} else {
    $sql .= " ORDER BY id ASC";
}

if ($_POST['length'] != -1) {
    $start = $_POST['start'];
    $length = $_POST['length'];
    $sql .= " LIMIT ".$start.", ".$length;
}

$data = array();

$query = mysqli_query($con, $sql);
$count_rows = mysqli_num_rows($query);
while ($row = mysqli_fetch_assoc($query)) {
    $sub_array = array();
    $sub_array[] = $row['id'];
    $sub_array[] = $row['username'];
    $sub_array[] = $row['email'];
    $sub_array[] = $row['mobile'];
    $sub_array[] = $row['city'];
    $sub_array[] = '
    <a href="javascript:void();" data-id="'.$row['id'].'" class="btn btn-sm btn-info edition">Edit</a>
    <a href="javascript:void();" data-id="'.$row['id'].'" class="btn btn-sm btn-danger deleteBtn">Delete</a>
    ';
    $data[] = $sub_array;
}

$output = array(
    'data' => $data,
    'draw' => intval($_POST['draw']),
    'recordsTotal' =>$count_rows,
    'recordsFilterred' => $total_all_rows,
);

echo json_encode($output);


