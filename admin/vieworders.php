<?php 
session_start();

if(!$_SESSION['email_id']){
    header("Location: ../login-page.php");
}
include('dashboard-header.php');
include('connection.php');
$id = urldecode(base64_decode($_GET['id']));
$sql = "SELECT * FROM orders WHERE id=$id;";
$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql);
?>
<div class="content-wrapper">
    <div class="view-order">
        <div class="view-order-content">  
            <div class="view-order-header">
                <h2>Order Details</h2>
                <a class="close-view-order-bttn" href="/intern-project/admin/orders.php">Go Back</a>
            </div>
            <div>
                <?php $row1 = mysqli_fetch_assoc($result1);?>
                <button class="view-order-update-bttn">Update</button>
                <input type="hidden" value="<?php echo $row1['id']; ?>"  id="update-order-status"/>
            </div>
            <div class="view-order-body">
            <?php $row = mysqli_fetch_assoc($result);
            $newDate = date("j M, Y", strtotime($row['reg_date']));?>
                <div class="view-order-body-content">
                    <div class="view-order-body-content-left">
                        <table class="view-order-body-content-left-table">
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
                            <!-- <td><?php //echo $row['status'];?></td> -->
                                <td>
                                    <select id="view-order-status">
                                        <option value=0 <?php echo $row['status'] == '0' ? ' selected ' : '';?>>Cancelled</option>
                                        <option value=1 <?php echo $row['status'] == '1' ? ' selected ' : '';?>>Pending</option>
                                        <option value=2 <?php echo $row['status'] == '2' ? ' selected ' : '';?>>Processing</option>
                                        <option value=3 <?php echo $row['status'] == '3' ? ' selected ' : '';?>>Shipped</option>
                                        <option value=4 <?php echo $row['status'] == '4' ? ' selected ' : '';?>>Delivered</option>
                                    </select>
                                </td>
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
                    <div class="view-order-body-content-right-table">
                        <table class="view-order-body-content-right-table">
                            <tr>
                                <td>Customer Name:</td>
                                <td><?php echo $row['fullName'];?></td>
                            </tr>
                            <tr>
                                <td>Customer Email:</td>
                                <td><?php echo $row['email']; ?></td>
                            </tr>
                            <tr>
                                <td>Customer Phone No:</td>
                                <td><?php echo $row['phoneNo']; ?></td>
                            </tr>
                            <tr>
                                <td>Customer Address:</td>
                                <td><?php echo $row['address']; ?></td>
                            </tr>
                            <tr>
                                <td>Customer City:</td>
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
</div>
<?php include('footer.php'); ?>