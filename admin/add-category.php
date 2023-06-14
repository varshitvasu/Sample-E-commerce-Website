<?php 
include('connection.php');
$category_name = $_POST['categoryName'];
$no_of_products = $_POST['productLength'];
$status = $_POST['status'];
$sql = "INSERT INTO categories (category_name, No_of_products, status)
VALUES ('$category_name', '$no_of_products', '$status')";
if (mysqli_query($conn, $sql)){
    echo 1;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
} 
//DISCONNECT
mysqli_close($conn);


?>