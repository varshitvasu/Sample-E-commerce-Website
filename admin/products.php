<?php 
    session_start();
    if(!$_SESSION['email_id']){
        header("Location: ../login-page.php");
    }   
    include('connection.php');
    $sql = "SELECT pr.id AS productID, ca.id AS categoryID, pr.reg_date AS pr_Reg_Date, pr.status AS pr_Status, ca.category_name AS category_name, pr.productQuantity AS pr_productQuantity, pr.productImage AS pr_productImage, pr.productName AS pr_productName, pr.productPrice AS pr_productPrice FROM products AS pr INNER JOIN categories AS ca ON ca.id=pr.ctg_id WHERE pr.status != 2 ORDER BY pr.id DESC;";
    $result = mysqli_query($conn, $sql);
    include('dashboard-header.php');
    $sql1 = "SELECT id, category_name From categories WHERE status !=2 ORDER BY id ASC";
    $r_set = mysqli_query($conn, $sql1);
    $r_set1 = mysqli_query($conn, $sql1);
    $r_set2 = mysqli_query($conn, $sql1);
?>
<div class="content-wrapper">
    <div class="prdct-page">
        <div class="add-product-bttn">
            <button id="add-prdct-button" type="button" style="cursor: pointer;">Add Product</button>
        </div>
        <div style="width: 200px;">
            <p id="prdct-dashboard-msg"></p>
        </div>
        <div class="add-prdct-popup" id="popup">
            <div class="add-prdct-popup-heading">
                <h3> Add Product</h3>
            </div>
            <div class="prdct-popup-form">
                <p>
                    <label for="prdct-name"> Product Name: </label><br>
                    <span>
                        <input type="text" name="prdct-name" id="prdct-name" placeholder="Enter Product Name" style="width: 300px;" onfocus="document.getElementById('prdct-name').style.border = ''" ><br>
                    </span>
                </p>
                <p>
                    <label for="prdct-price"> Price (per Item): </label><br>
                    <span>
                        <input type="number" name="prdct-price" id="prdct-price" placeholder="Enter Price" style="width: 300px;" onfocus="document.getElementById('prdct-price').style.border = ''" ><br>
                    </span>
                </p>
                <p>
                    <label for="prdct-quantity"> Quantity: </label><br>
                    <span>
                        <input type="number" name="prdct-quantity" id="prdct-quantity" placeholder="Enter Quantity" style="width: 300px;" onfocus="document.getElementById('prdct-quantity').style.border = ''" ><br>
                    </span> 
                </p>
                <p>
                    <label for="prdct-status"> Status: </label><br>
                    <span>
                        <select id="prdct-status" style="width: 300px;" onfocus="document.getElementById('prdct-status').style.border = ''" >
                            <option value='1'> Active</option>
                            <option value='0'> Deactive</option>
                        </select>
                    </span>
                </p>
                <p>
                    <label for="prdct-ctg"> Category: </label><br>
                    <span>
                        <select id="prdct-ctg" name="prdct-ctg" style="width: 300px;" onfocus="document.getElementById('prdct-ctg').style.border = ''" >
                            <?php 
                            while($row1 = mysqli_fetch_assoc($r_set)){?>
                                <option value="<?php echo $row1['id'];?>"><?php echo $row1['category_name'];?></option>
                            <?php } ?>
                        </select> 
                    </span>
                </p>
                <p> 
                    <label for="prdct-img"> Product Image: </label><br>
                    <span>
                        <input id="fileupload" type="file" name="fileupload" onfocus="document.getElementById('fileupload').style.border = ''"/>
                        <input id="prdct-img" type="hidden" value=""/>
                        <button id="upload-button" onclick="uploadFile()"> Upload </button>
                    </span>
                </p>
                <p class="prdct-error" style="padding: 10px;"></p>
                <p class="prdct-submit-bttn">
                    <input type="submit" value="Add Data" class="prdct-submit">
                </p>
                <p class="prdct-cancel-bttn">
                    <input type="button" value="Cancel" class="prdct-cancel">
                </p>
            </div>
        </div>
        <div class="edit-product-popup">
            <div class="edit-product-popup-heading">
                <h3> Edit Product</h3>
            </div>
            <div class="edit-product-popup-form">
                <p>
                    <label for="prdct-name"> Product Name: </label><br>
                    <span>
                        <input type="text" name="prdct-name" id="edit-prdct-name" style="width: 300px;" onfocus="document.getElementById('prdct-name').style.border = ''" ><br>
                    </span>
                </p>
                <p>
                    <label for="prdct-price"> Price (per Item): </label><br>
                    <span>
                        <input type="number" name="prdct-price" id="edit-prdct-price" placeholder="Enter Price" style="width: 300px;" onfocus="document.getElementById('prdct-price').style.border = ''" ><br>
                    </span>
                </p>
                <p>
                    <label for="prdct-quantity"> Quantity: </label><br>
                    <span>
                        <input type="number" name="prdct-quantity" id="edit-prdct-quantity" placeholder="Enter Quantity" style="width: 300px;" onfocus="document.getElementById('prdct-quantity').style.border = ''" ><br>
                    </span>
                </p>
                <p>
                    <label for="prdct-status"> Status: </label><br>
                    <span>
                        <select id="edit-prdct-status" style="width: 300px;" onfocus="document.getElementById('prdct-status').style.border = ''" >
                            <option value='1'> Active</option>
                            <option value='0'> Deactive</option>
                        </select>
                    </span>
                </p>
                <p>
                    <label for="prdct-ctg"> Category: </label><br>
                    <span>
                        <select id="edit-prdct-ctg" name="prdct-ctg" style="width: 300px;" onfocus="document.getElementById('prdct-ctg').style.border = ''" >
                            <?php 
                            while($row2 = mysqli_fetch_assoc($r_set1)){?>
                                <option value="<?php echo $row2['id']; ?>" class="edit-prdct-ctg-option" >
                                <?php echo $row2['category_name'];?></option>
                            <?php } ?>
                        </select>
                    </span>
                </p>
                <p>
                    <label for="prdct-img"> Product Image: </label><br>
                    <span>
                        <input id="edit-fileupload" type="file" name="fileupload" onfocus="document.getElementById('fileupload').style.border = ''"/>
                        <input id="edit-prdct-img" type="hidden" value=""/>
                        <button id="edit-upload-button" onclick="uploadFile()"> Upload </button>
                    </span>    
                </p>
                <p class="edit-prdct-error" style="padding: 10px;"></p>
                <p class="prdct-edit-bttn">
                    <input type="submit" value="Update Data" class="edit-prdct-submit">
                    <input type="hidden" value=""  id="update-prdct"/>
                </p>
                <p class="edit-prdct-cancel-bttn">
                    <input type="button" value="Cancel" class="edit-prdct-cancel">
                </p>
            </div>
        </div>  

        <div id="prdct-reload">
            <div class="prdct-filter-container">
                <label for="category-filter">Filter by Category:</label>
                <select id="category-filter">
                    <option onclick="window.location.reload();">All categories</option>
                    <?php    
                    while($row1 = mysqli_fetch_assoc($r_set2)){?>
                        <option onclick="catFilter(<?php echo $row1['id'];?>)"><?php echo $row1['category_name'];?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <table class="prdct-table">
                    <thead class="prdct-head">
                        <tr>
                            <th class="prdct-id">Id</th>
                            <th class="prdct-img">Product Image</th>
                            <th class="prdct-name">Product Name</th>
                            <th class="prdct-price">Price (/Item)</th>
                            <th class="prdct-quantity">Quantity</th>
                            <th class="prdct-status">Status</th>
                            <th class="prdct-ctgory">Category</th>
                            <th class="prdct-date">Created Date</th>
                            <th class="prdct-action">Action</th>
                        </tr>
                    </thead>
                    <tbody class="prdct-body" id="prdct-body">
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            $id = 1;
                            while($row = mysqli_fetch_assoc($result)) {
                                $newDate = date("j M, Y", strtotime($row['pr_Reg_Date']));
                                ?>
                            <tr id="prdct-row_<?php echo $row['productID'];?>">
                                <td><?php echo $id++; ?></td>
                                <td><img src="product-images/<?=$row['pr_productImage']; ?>" alt="Product Image" style="width: 50px; height: 50px;"></td>
                                <td><?php echo $row['pr_productName']; ?></td>
                                <td><?php echo $row['pr_productPrice']; ?></td>
                                <td><?php echo $row['pr_productQuantity']; ?></td>
                                <td><?php if($row['pr_Status'] == 1){
                                        echo "Active"; 
                                    } else{
                                        echo "Deactive";
                                        }?></td>
                                <td><?php echo $row['category_name']; ?></td>
                                <td><?php echo $newDate; ?></td>
                                <td><button class="prdct-edit" style="cursor: pointer;" onclick="edFunction(<?php echo $row['productID'];?>)">Edit</button> | <button class="prdct-delete" style="cursor: pointer;" onclick="delFunction(<?php echo $row    ['productID'];?>)">Delete</button></td>
                            </tr>
                        <?php }}?>
                    </tbody>
                    <tbody class="prdct-body" id="prdct-filter-body"> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
