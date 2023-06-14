<?php 
include('config.php');
$userId = $_SESSION['user_id'];
$fullName = $_POST['fullName'];
$email = $_POST['email'];
$phoneNo = $_POST['phoneNo'];
$address = $_POST['address'];
$city = $_POST['city'];
$pincode = $_POST['pincode'];
$product_id = $_POST['productID'];
$productName = $_POST['productName'];
$quantity = $_POST['quantity'];
$total = $_POST['total'];

$sql = "INSERT INTO orders (fullName, email, phoneNo, address, city, pincode, product_id, productName, total, quantity, user_id) VALUES ('$fullName', '$email', '$phoneNo', '$address', '$city', '$pincode', $product_id, '$productName', '$total', '$quantity', '$userId')";
if (mysqli_query($conn, $sql)){
    echo mysqli_insert_id($conn);
} else{
    echo 0;
}
mysqli_close($conn);

?>