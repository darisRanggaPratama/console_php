<?php
$response = array(
    'status' => 0,
    'msg' => 'Some problems occurred, please try again.'
);
if(!empty($_REQUEST['first_name']) && !empty($_REQUEST['last_name']) && !empty( $_REQUEST['email']) && !empty($_REQUEST['phone'])){
    $first_name = $_REQUEST['first_name'];
    $last_name = $_REQUEST['last_name'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];

    if(!empty($_REQUEST['id'])){
        $id = intval($_REQUEST['id']);

        // Include the database config file
        require_once 'dbConnect.php';

        $sql = "UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email', phone='$phone' WHERE id = $id";
        $update = $db->query($sql);

        if($update){
            $response['status'] = 1;
            $response['msg'] = 'User data has been updated successfully!';
        }
    }
}else{
    $response['msg'] = 'Please fill all the mandatory fields.';
}

echo json_encode($response);
?>
