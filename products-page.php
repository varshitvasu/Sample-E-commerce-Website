<?php 
    include('admin/connection.php');
    include('header.php'); 
    $category_name = "SELECT id, category_name FROM categories WHERE status !=2 ORDER BY id ASC";
    $categoryRes = mysqli_query($conn, $category_name);
    $product_data = "SELECT * FROM products WHERE status !=2 ORDER BY id DESC";
    $productRes = mysqli_query($conn, $product_data);
?>
<div class="content-wrapper">
    <!-- Your page content goes here -->
    <!-- <div class="container" style="width:100%"> -->
        <div class="row">
            <div class="products-navbar">
                <div class="products-navbar-heading">
                    <p>Categories</p>
                </div>
                <div class="products-navbar-categories">
                    <ul type="none">
                        <li class="products-navbar-items"><button class="products-navbar-links" onclick="window.location.reload();">All Products</button></li>
                        <?php 
                        while ($row = mysqli_fetch_assoc($categoryRes)){
                        ?>
                        <li class="products-navbar-items"><button class="products-navbar-links" onclick="catSection(<?php echo $row['id'] ?>)"><?php echo $row['category_name'];?></button> </li>
                        <?php }?>
                    </ul>
                </div>
            </div>
        <!-- OUR PRODUCTS -->
            <div class ="container-product">
                <div class="product-head-div">
                    <h3 class="product-head"><em>Our Products</em></h3>
                </div> 
                <div id="product-list-main">
                    <?php 
                    while($row = mysqli_fetch_assoc($productRes)){?>
                        <div class="product-list" >
                            <div class="product">
                                <img src="admin/product-images/<?=$row['productImage'];?>" alt="<?=$row['productName'];?>" width="250px" height="250px">
                                <div class="product-name"><?=$row['productName'];?></div>     
                                <div class="product-price">$ <?=$row['productPrice'];?></div>
                                <div class="product-buy">
                                <?php if(isset($_SESSION['email_id'])){ ?>
                                    <button class="buy-now" onclick="checkoutID(<?php echo $row['id'];?>)">
                                        <div>Buy Now</div>
                                    </button>  
                                <?php }else{?>
                                    <a class="buy-now" href="login-page.php" >
                                        <div>Buy Now</div>
                                    </a> 
                                <?php } ?>   
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div id="product-list-filter">
                    <div class="product-list">
                    </div>
                </div>     
            </div>
        </div>
    <!-- </div> -->
</div>


    
           
 <?php // include('footer.php'); ?> 

