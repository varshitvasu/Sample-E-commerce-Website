<?php 
    include('connection.php');
    $id = $_POST['id'];
    $cat_filter = "SELECT pr.id AS productID, ca.id AS categoryID, pr.reg_date AS pr_Reg_Date, pr.status AS pr_Status, ca.category_name AS category_name, pr.productQuantity AS pr_productQuantity, pr.productImage AS pr_productImage, pr.productName AS pr_productName, pr.productPrice AS pr_productPrice, pr.ctg_id AS pr_ctg_id FROM products AS pr INNER JOIN categories AS ca ON ca.id=pr.ctg_id WHERE pr.status != 2 AND ca.id=$id ORDER BY pr.id DESC;";
    $catFilter_result = mysqli_query($conn, $cat_filter);
    $catFilter_items = array();
    while($catFilter_row = mysqli_fetch_assoc($catFilter_result)){
        $catFilter_items[] = $catFilter_row ; 
    };
    echo json_encode($catFilter_items);
?>
