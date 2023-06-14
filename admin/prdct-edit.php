<?php 
    include('connection.php');
    if(@$_POST['ed_form'] == 'edit'){
        $id = $_POST['id'];
        $sql = "SELECT * FROM products WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    }
    if(@$_POST['upd_form'] == 'update'){
        $id = $_POST['id'];
        $productName = $_POST['productName'];
        $productPrice = $_POST['productPrice'];
        $productQuantity = $_POST['productQuantity'];
        $status = $_POST['status'];
        $productCtg = $_POST['productCtg']; 
        $productImg = $_POST['productImg'];
        $sql = "UPDATE products SET productName='$productName', productPrice='$productPrice', productQuantity='$productQuantity', status='$status', ctg_id='$productCtg', productImage='$productImg' WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        echo 1;
    }

?>
