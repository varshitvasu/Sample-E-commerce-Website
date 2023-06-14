<?php 
    session_start();
    if(!$_SESSION['email_id']){
        header("Location: ../login-page.php");
    }
    include ('connection.php');
    $sql = "SELECT * FROM jbn_contact_details WHERE status !=2 ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    $result1 = mysqli_query($conn, $sql);
    include ('dashboard-header.php');
?>
<div class="query-page">
    <div style="width: 200px;">
        <p id="query-dashboard-msg"></p>
    </div>
    <div id="query-reload">
        <table class="query-table">
            <thead class="query-head">
                <tr>
                    <th class="query-id">Id</th>
                    <th class="query-name">Customer Name</th>
                    <th class="query-email">Customer Email</th>
                    <th class="query-phone">Customer Phone</th>
                    <th class="query-message">Customer Message</th>
                    <th class="query-date">Submitted Date</th>
                    <th class="query-action">Action</th>
                </tr>
            </thead>
            <tbody class="query-body">
                <?php 
                if (mysqli_num_rows($result) > 0) {
                    $id = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $newDate = date("j M, Y", strtotime($row['reg_date']));
                        $showReadMore = strlen($row['customer_message']) > 10;
                        $message = $row['customer_message'];
                    ?>
                <tr id="query-row_<?php echo $row['id'];?>">
                    <td><?php echo $id++; ?></td>
                    <td><?php echo $row['customer_name']; ?></td>
                    <td><?php echo $row['customer_email']; ?></td>
                    <td><?php echo $row['customer_phone']; ?></td>
                    <td id="expand-message"> <?php
                            echo $showReadMore ? substr($message, 0, 15) . '... ' : $message;
                            if ($showReadMore) {
                                echo '<button class="read-more-btn" data-message="' . $message . '">read more</button>';
                            } else if ($message == ''){
                                echo 'No Comments';
                            }
                        ?></td>
                    <td><?php echo $newDate; ?></td>
                    <td><button class="query-delete" style="cursor: pointer;" onclick="deFunction(<?php echo $row['id'];?>)">Delete</button></td>
                </tr>
                <?php }} ?>
            </tbody>
        </table>
    </div>
    <div class="read-more-popup">
        <div>
            <button class="query-message-close"><i class="fa fa-close"></i></button>
        </div>
        <div>
            <?php $row1 = mysqli_fetch_assoc($result1); ?>
            <p class="read-more-content"><?php echo $row1['customer_message']; ?></p>
        </div>
    </div>
    

</div>
<?php include('footer.php');