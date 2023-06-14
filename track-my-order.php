<?php 
include('header.php');
include('admin/connection.php');
$id = urldecode(base64_decode($_GET['id']));
$sql = "SELECT * FROM orders WHERE id=$id;";
$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql);
?>

<div class="track-order">
    <div class="track-order-content">  
        <div class="track-order-header">
            <h2>Order Details</h2>
            <a class="close-track-order-bttn" href="/intern-project/myorders-page.php">Go Back</a>
        </div>
        <div>
            <?php $row1 = mysqli_fetch_assoc($result1);?>
            <button class="track-order-cancel-bttn">Cancel Order</button>
            <input type="hidden" value="<?php echo $row1['id']; ?>" id="cancel-order-status"/>
        </div>
        <div class="cancel-order-popup">
            <div class="cancel-order-popup-content">
                <div class="cancel-order-popup-header">
                    <h2>Cancel Order</h2>
                    <button class="close-cancel-order-bttn">X</button>
                    </div>
                    <div class="cancel-order-popup-body">
                        <div class="cancel-order-popup-body-reason">
                            <label for="cancel-order-reason">Please Enter the Reason</label>
                            <textarea name="cancel-order-reason" id="cancel-order-reason" onfocus="document.getElementById('cancel-order-reason').style.border = ''"></textarea>
                            <p class="cancel-order-error"></p>
                        </div>
                        <div class="cancel-order-popup-bttn">
                            <button class="cancel-order-bttn">Cancel Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="track-order-body">
        <?php $row = mysqli_fetch_assoc($result);
        $newDate = date("j M, Y", strtotime($row['reg_date']));?>
            <div class="track-order-body-content">
                <div class="track-order-body-content-left">
                    <table class="track-order-body-content-left-table">
                        <tr>
                            <td>Order ID:</td>
                            <td><?php echo $row['id'];?></td>
                        </tr>
                        <tr>
                            <td>Order Date:</td>
                            <td><?php echo $newDate; ?></td>   
                        </tr>
                        <tr>
                            <td>Order Status:</td>
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
                        </tr>
                        <tr>
                            <td>Order Total:</td>
                            <td><?php echo $row['total'];?></td>
                        </tr>
                        <tr>
                            <td>Ordered Product:</td>
                            <td><?php echo $row['productName'];?></td>
                        </tr>
                        <tr>
                            <td>Ordered Quantity:</td>
                            <td><?php echo $row['quantity'];?></td>
                        </tr>
                        <tr>
                            <td> Product Id</td>
                            <td><?php echo $row['product_id'];?></td>
                        </tr>
                        
                    </table>
                </div>
                <div class="track-order-body-content-right-table">
                    <table class="track-order-body-content-right-table">
                        <tr>
                            <td>Name:</td>
                            <td><?php echo $row['fullName'];?></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><?php echo $row['email']; ?></td>
                        </tr>
                        <tr>
                            <td>Phone No:</td>
                            <td><?php echo $row['phoneNo']; ?></td>
                        </tr>
                        <tr>
                            <td>Address:</td>
                            <td><?php echo $row['address']; ?></td>
                        </tr>
                        <tr>
                            <td>City:</td>
                            <td><?php echo $row['city']; ?></td>
                        </tr>
                        <tr>
                            <td>Pincode:</td>
                            <td><?php echo $row['pincode'] ?></td>
                        </tr>
                        <?php if($row['status'] == 0){?>
                            <tr>
                            <td>Reason For Cancellation:</td>
                            <td><?php echo $row['reason'];?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
