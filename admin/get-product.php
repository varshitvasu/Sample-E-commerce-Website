<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $productId = $_POST['id'];

    $sql = "SELECT pr.id AS productID, ca.id AS categoryID, pr.reg_date AS pr_Reg_Date, pr.status AS pr_Status, ca.category_name AS category_name, pr.productQuantity AS pr_productQuantity, pr.productImage AS pr_productImage, pr.productName AS pr_productName, pr.productPrice AS pr_productPrice FROM products AS pr INNER JOIN categories AS ca ON ca.id=pr.ctg_id WHERE pr.id = $productId";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        echo json_encode($row);
    }
}
?>
