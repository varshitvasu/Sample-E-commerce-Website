<?php 
include('header.php');
include('admin/connection.php');
$id=$_SESSION['user_id'];
$sql = "SELECT id, reg_date, status, total, quantity FROM orders WHERE user_id=$id ";
$result = mysqli_query($conn, $sql);

?>
<div class="myorders">
    <div class="myorders-heading">
        <h2>My Orders</h2>
    </div>
    <div class="myorders-content">
        <table class="myorders-table table-bordered">
            <thead>
                <tr>
                    <th class="myorders-id">Order ID</th>
                    <th class="myorders-date">Order Date</th> 
                    <th class="myorders-status">Order Status</th>   
                    <th class="myorders-total">Order Total</th>
                    <th class="myorders-delivery-date">Expected Delivery</th>
                    <th class="myorders-quantity">Total Quantity</th>
                    <th class="myorders-action">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if (mysqli_num_rows($result) > 0) {
                    $id = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $newDate = date("j M, Y", strtotime($row['reg_date']));
                        $deliveryDate = date("j M, Y", strtotime($row['reg_date']. ' + 3 days'));?>
                        <tr>
                            <td><?php echo $id++; ?></td>
                            <td><?php echo $newDate; ?></td>
                            <td><?php if($row['status'] == 1){
                                            echo "Pending"; 
                                        } else if ($row['status']==2){
                                            echo "Processing";
                                        } else if ($row['status']==3){
                                            echo "Shipped";
                                        } else if ($row['status']==4){
                                            echo "Delivered";
                                        } else if ($row['status']==0){
                                            echo "Cancelled";   
                                        }
                                    ?></td>
                            <td><?php echo $row['total']; ?></td>   
                            <td><?php if($row['status'] == 0){
                                echo "Cancelled";
                            } else{
                                echo $deliveryDate; }?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><button class="track-my-order-bttn" onclick="trackmyorder(<?php echo $row['id']; ?>)">View Order Details</button></td>
                            </tr>
                    <?php }} ?>
            </tbody>
        </table>
    </div>
</div>
<?php //include('footer.php');?>