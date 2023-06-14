<?php 
include('header.php'); 
include('admin/connection.php');
$product_data = "SELECT * FROM products WHERE status !=2 ORDER BY id DESC";
$productRes = mysqli_query($conn, $product_data);
?>
<div class="content-wrapper">
    <!-- Your page content goes here -->

    <!-- HOME IMAGE-->
    <div class="container-home-img">
        <div class="mission-img">
            <img src="images/home-img.webp" alt="home-img" class="home-img" width="100%" height="100%" usemap="#workmap">
        </div>
        <map name="workmap">
            <area shape="poly" coords="483, 380, 483, 334, 643, 334, 643, 380" alt="home-img" href="products-page.php">
        </map>
    </div>
    
    <!-- OUR MISSION-->
    <div class="container-mission">
        <div class="door2door-img">
            <img src="images/door2door-img.jpg" alt="door2door-delivery" width="600px" height="400px">
        </div>
        <div class="mission-data">
            <h2 class="mission-heading"><em>Our Mission</em></h2>
            <p class="mission"><q>Our mission is to promote and sell natural products for the benifits of consumer and industry. Our Research and education
                related to natural products has helped us taking our first step towards promoting healthier lifestyle and 
                supporting sustainable practices. Natural products are often healthier and safer alternatives to synthetic products. 
                By selling natural products, we can promote healthier lifestyles for our consumers and contribute to their overall well-being.
                Many natural products are produced using sustainable practices like natural farming, etc that help to protect the environment.
                By promoting and selling these products, we can support sustainable practices and reduce your impact on the environment.
                So lets start consuming chemical-free food and make our society healthier.
            </q></p>
        </div>
    </div>

    <!-- PRODUCTS -->
    <div class="container-product-gallery">
        <div>
            <h3 class="product-head-home"><em>Our Products</em></h3>
        </div>
        <div id="product-list-main">
            <?php 
            $i=0;
            while($row = mysqli_fetch_assoc($productRes)){
                if ($i<4){
                    $i++;?>
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
            <?php } }?>
        </div>
        <div class="view-more-bttn">
            <a href="products-page.php" class="view-more">
                <div>View More</div>
            </a>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>
    
 
