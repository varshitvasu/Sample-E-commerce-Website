<?php 
    session_start();
    if(!$_SESSION['email_id']){
        header("Location: ../login-page.php");
    }
    include('connection.php');
    include('dashboard-header.php');
    $sql = "SELECT * FROM orders ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
?>
<script>
    
</script>

<div class="content-wrapper">
    <div class="orders-page">
        <div style="width: 200px;">
            <p id="order-dashboard-msg"></p>
        </div>
        <div id="orders-reload">
            <table class="orders-table">
                <thead class="orders-head">
                    <tr>
                        <th class="order-id">Id</th>
                        <th class="order-productName">Product name</th>
                        <th class="order-quantity">Quantity</th>
                        <th class="total-amount">Total Amount</th>
                        <th class="order-status">
                            <div class="dropdown-status">
                            <button class="order-status-filter-btn" onclick="toggleDropdown()">Status <i class="fa fa-caret-down"></i></button>
                            <?php //$row = mysqli_fetch_assoc($result); ?>
                                <div class="order-status-dropdown-content">
                                    <a onclick="filterByStatus(1)">Pending</a>
                                    <a onclick="filterByStatus(2)">Processing</a>
                                    <a onclick="filterByStatus(3)">Shipped</a>
                                    <a onclick="filterByStatus(4)">Delivered</a>
                                    <a onclick="filterByStatus(0)">Cancelled</a>
                                </div>
                            </div>
                        </th>
                            <!-- <button class="order-status-filter-btn" onclick="filterByStatus()">Status <i class="fa fa-caret-down"></i></button>
                            <div class="order-status-flter-content">
                            </div> -->
                        </th>
                        <th class="order-date">Order Date</th>
                        <th class="order-action">Action</th>
                    </tr>
                </thead>
                <tbody class="orders-body" id="orders-body">
                    <?php 
                    // if (mysqli_num_rows($result) > 0) {
                        $id = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $newDate = date("j M, Y", strtotime($row['reg_date']));?>
                        <tr>
                            <td><?php echo $id++; ?></td>
                            <td><?php echo $row['productName']; ?> </td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td>$<?php echo $row['total']; ?></td>
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
                            <td><?php echo $newDate; ?></td>
                            <td><button class="order-view-bttn" onclick="viewOrder(<?php echo $row['id']; ?>)">View</button></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tbody class="orders-body" id="orders-filter-body">
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include ('footer.php'); ?>