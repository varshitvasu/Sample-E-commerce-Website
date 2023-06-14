<?php 
include('config.php');
$userId = $_SESSION['user_id'];
$fullName = $_POST['fullName'];
$phoneNo = $_POST['phoneNo'];
$address = $_POST['address'];
$city = $_POST['city'];
$pincode = $_POST['pincode'];
$sql = "UPDATE users_db SET username='$fullName', phoneNo='$phoneNo', address='$address', city='$city', pincode='$pincode' WHERE id=$userId;";
$result = mysqli_query($conn, $sql);
if($result){
    echo "1";
} else{
    echo "Error: ". $sql. "<br>". mysqli_error($conn);
}
?>

