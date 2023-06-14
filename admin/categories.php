<?php 
session_start();

if(!$_SESSION['email_id']){
    header("Location: ../login-page.php");
}
    include('connection.php');
    $sql1 = "SELECT * FROM categories WHERE status != 2 ORDER BY id DESC";
    $result = mysqli_query($conn, $sql1);
    include('dashboard-header.php'); 
    $row = mysqli_fetch_assoc($result);
?>
<div class="content-wrapper">
    <div class="ctg-page" id="pg-reload">
        <div class="add-category-bttn">
            <button id="add-ctg-button" type="button" style="cursor: pointer;">Add Category</button>
        </div>
        <div style="width: 200px;">
            <p id="ctg-dashboard-msg"></p>
        </div>
    
        <div class="add-category-popup" id="popup">
            <div class="add-category-popup-heading">
                <h3> Add Categories</h3>
            </div>
            <div class="add-category-popup-form">
                <p>
                    <label for="ctg-name"> Category Name: </label><br>
                    <span>
                        <input type="text" name="ctg-name" id="ctgory-name" placeholder="Enter Category Name" style="width: 300px;" onfocus="document.getElementById('ctgory-name').style.border = ''" ><br>
                    </span>
                </p>
                <p>
                    <label for="No-of-Products"> No of Products: </label><br>
                    <span>
                        <input type="number" name="ctg-products" id="ctgory-products" maxlength="2" placeholder="Enter no of Products" style="width: 300px;" onfocus="document.getElementById('ctgory-products').style.border = ''" ><br>
                    </span>
                </p>
                <p>
                    <label for="ctg-status"> Status: </label><br>
                    <span>
                        <select id="ctgory-status" style="width: 300px;" onfocus="document.getElementById('ctgory-status').style.border = ''" >
                            <option value='1'> Active</option>
                            <option value='0'> Deactive</option>
                        </select>
                    </span>
                </p>
                <p class="ctgory-error" style="padding: 10px;"></p>
                <p class="ctg-submit-bttn">
                    <input type="submit" value="Add Data" class="ctg-submit">
                </p>
                <p class="ctg-cancel-bttn">
                    <input type="button" value="Cancel" class="ctg-cancel">
                </p>
            
            </div>
        </div>
        <div class="edit-category-popup">
            <div class="edit-category-popup-heading">
                <h3> Edit Category</h3>
            </div>
            <div class="edit-category-popup-form">
                <p>
                    <label for="ctg-name"> Category Name: </label><br>
                    <span>
                        <input type="text" name="ctg-name" id="edit-ctgory-name" style="width: 300px;" onfocus="document.getElementById('ctgory-name').style.border = ''" ><br>
                    </span>
                </p>
                <p>
                    <label for="No-of-Products"> No of Products: </label><br>
                    <span>
                        <input type="number" name="ctg-products" id="edit-ctgory-products" style="width: 300px;" onfocus="document.getElementById('ctgory-products').style.border = ''" ><br>
                    </span>
                </p>
                <p>
                    <label for="ctg-status"> Status: </label><br>
                    <span>
                        <select id="edit-ctgory-status" style="width: 300px;" onfocus="document.getElementById('ctgory-status').style.border = ''" >
                            <option value='1' > Active</option>
                            <option value='0' > Deactive</option>
                        </select>
                    </span>
                </p>

                <p class="edit-ctgory-error" style="padding: 10px;"></p>
                <p class="ctg-edit-bttn">
                    <input type="submit" value="Update Data" class="edit-ctg-submit">
                    <input type="hidden" value=""  id="update-ctg"/>
                </p>
                <p class="edit-ctg-cancel-bttn">
                    <input type="button" value="Cancel" class="edit-ctg-cancel">
                </p>
            </div>
        </div> 
        <div id="ctg-reload">
            <table class="ctg-table"  >
                <thead class="ctg-head">
                    <tr>
                        <th class="ctg-id">Id</th>
                        <th class="ctg-name">Category Name</th>
                        <th class="ctg-products">No of Products</th>
                        <th class="ctg-status">Status</th>
                        <th class="ctg-date">Created Date</th>
                        <th class="ctg-action">Action</th>
                    </tr>
                </thead>
                <tbody class="ctg-body">
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        $id = 1;
                        while($row = mysqli_fetch_assoc($result)) {  
                        $newDate = date("j M, Y", strtotime($row['reg_date']));      
                    ?>
                        <tr id="ctgory-row_<?php echo $row['id'];?>">
                            <td><?php echo $id++; ?></td>
                            <td><?php echo $row['category_name']; ?></td>
                            <td><?php echo $row['No_of_products']; ?></td>                    
                            <td><?php if($row['status'] == 1){
                                echo "Active"; 
                            } else{
                                echo "Deactive";
                            } ?></td>
                            <td><?php echo $newDate; ?></td>
                            <td><button class="ctg-edit" style="cursor: pointer;" onclick="editFunction(<?php echo $row['id'];?>)">Edit</button> | <button class="ctg-delete" style="cursor: pointer;" onclick="deleteFunction(<?php echo $row['id'];?>)">Delete</button></td>
                        </tr>   
                    <?php }} ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<?php include('footer.php'); ?>