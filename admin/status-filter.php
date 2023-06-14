<?php 
include('connection.php');
$status = $_POST['status'];
$sql = "SELECT * FROM orders WHERE status=$status;";
$result = mysqli_query($conn, $sql);
$orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo json_encode($orders);
?>