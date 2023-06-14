<?php 
include('admin/connection.php');
$emailid = $_POST['emailid'];
$sql = "SELECT email_id, password FROM users_db WHERE email_id = '$emailid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$email_id = $row['email_id'];

if($emailid == $email_id){
    echo $row['password'];
} else{
    echo 0;
}
?>
