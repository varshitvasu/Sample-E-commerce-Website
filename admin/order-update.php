<?php 
    include('connection.php');
    if(@$_POST['order_update'] == 'update_form'){
        $id = $_POST['id'];
        $status = $_POST['status']; 
        $sql = "UPDATE orders SET status=$status WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo 1;
        }else{
            echo 0;
        }

    }
?>