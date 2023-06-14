<?php 
    include('connection.php'); 
    if(@$_POST['edit_form'] == 'edit'){
        $id = $_POST['id'];
        $sql = "SELECT * FROM categories WHERE id=$id";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    }
    if(@$_POST['update_form'] == 'update'){
        $id = $_POST['id'];
        $category_name = $_POST['categoryName'];
        $no_of_products = $_POST['productLength'];
        $status = $_POST['status'];
        $sql = "UPDATE categories SET category_name='$category_name', No_of_products='$no_of_products', status='$status' WHERE id=$id";
        $result = mysqli_query($conn,$sql);
        echo 1;
    }
?>