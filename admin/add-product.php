<?php 
include('connection.php');

$productName = $_POST['productName'];
$productPrice = $_POST['productPrice'];
$productQuantity = $_POST['productQuantity'];
$status = $_POST['status'];
$ctg_id = $_POST['productCtg']; 
$productImg = $_POST['productImg'];
$sql = "INSERT INTO products (productName, productPrice, productQuantity, status, ctg_id, productImage) 
        VALUES ('$productName', '$productPrice', '$productQuantity', '$status', '$ctg_id', '$productImg')";  
if (mysqli_query($conn, $sql)) {
    echo 1;
} else {
    echo "Error: " .  $sql. "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>