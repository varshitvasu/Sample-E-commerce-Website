<?php 
    include('admin/connection.php');
    if(@$_POST['order_cancel'] == 'cancel_form'){
        $id = $_POST['id'];
        $reason = $_POST['reason'];
        $sql = "UPDATE orders SET status=0, reason = '$reason' WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo 1;
        }else{
            echo 0;
        }

    }
?>