<?php 
include('connection.php');
$username = $_POST['username'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$city = $_POST['city'];
$id = $_POST['id'];

$sql = "UPDATE `users` SET  `username`='$username' , `email`= '$email', `mobile`='$mobile',  `city`='$city' WHERE id='$id' ";
$query= mysqli_query($con,$sql);
$lastId = mysqli_insert_id($con);
if($query ==true)
{
   
    $data = array(
        'status'=>'true',
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'false',
      
    );

    echo json_encode($data);
} 

?>