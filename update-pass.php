<?php 
include('config.php');
$currentPass = $_POST['oldPassword'];
$newPass = $_POST['newPassword'];
$userId = $_SESSION['user_id'];
$sql = "SELECT password FROM users_db WHERE id=$userId";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$dbPass = $row['password'];
if($currentPass == $dbPass){
    $sql = "UPDATE users_db SET password='$newPass' WHERE id=$userId";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo 1;
    } else {
        echo 0;
    }
}
?>