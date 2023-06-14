<?php 
    include('header.php');
    include('admin/connection.php');
    $id = urldecode(base64_decode($_GET['id']));
    $sql = "SELECT * FROM products WHERE id=$id;";
    $result = mysqli_query($conn, $sql);
    $result1 = mysqli_query($conn, $sql);
    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM users_db WHERE id=$user_id;";
    $result2 = mysqli_query($conn, $query);
?>
<div class="content-wrapper">
    <div class="checkout-page">
        <div class="checkout-page-back">
            <a class="checkout-page-back-bttn" type="submit" href="/intern-project/products-page.php">Go Back</a>
        </div>
        <div class="checkout-heading">
            <h2> Check Out Now </h2>
        </div>
        <div class="checkout-product-image">
            <?php $row=mysqli_fetch_assoc($result); ?>
            <img src="admin/product-images/<?=$row['productImage']; ?>" alt="Product Image" style="width: 250px; height: 250px;">
            <p><?php echo $row['productName']; ?></p>
        </div>
        <div class="checkout-page-content">
            <p>Fill the form and Confirm Your order. After we Recieve your Order We will deliver your order within 1-2 Business Days. We at JBN always prioritize our Customers Values and comfort. Please provide your feedback after placing the order. We are so happy serving you.</p>
        </div>
        <div class="checkout-form">
            <p>
                <label for="name">Full Name:</label><br>
                <?php $row2=mysqli_fetch_assoc($result2); ?>
                <span>
                    <input type="text" id="checkout-name" name="name" value="<?php echo $row2['username']; ?>" onfocus="document.getElementById('checkout-name').style.border = ''"><br>
                </span>
            </p>
            <p>
                <label for="email">Email:</label><br>
                <span>
                    <input type="email" id="checkout-email" name="email" value="<?php echo $row2['email_id']; ?>" onfocus="document.getElementById('checkout-email').style.border = ''" disabled="disabled"><br>
                </span>
            </p>
            <p>
                <label for="phone-number">Phone No:</label><br>
                <span>
                    <input type="text" id="checkout-phone-number" name="phone-number" minlength="10" maxlength="10" value="<?php echo $row2['phoneNo']; ?>" onfocus="document.getElementById('checkout-phone-number').style.border = ''"><br>
                </span>
            </p>
            <p>
                <label for="address">Address:</label><br>
                <span>
                    <input type="text" id="checkout-address" name="address" minlength="10" maxlength="10" value="<?php echo $row2['address']; ?>" onfocus="document.getElementById('checkout-address').style.border = ''"><br>
                </span>
            </p>
            <p>
                <label for="city">City:</label><br>
                <span>
                    <input type="text" id="checkout-city" name="city" value="<?php echo $row2['city']; ?>" onfocus="document.getElementById('checkout-city').style.border = ''"><br>
                </span>
            </p>
            <p>
                <label for="pincode">Pincode: </label><br>
                <span>
                    <input type="pincode" id="checkout-pincode" name="pincode" value="<?php echo $row2['pincode']; ?>" onfocus="document.getElementById('checkout-pincode').style.border = ''"><br>
                </span>
            </p>
            <p>
                <label for="product-name">Product Name:</label><br>
                <span>
                    <input type="text" id="checkout-product" name="product-name" value="<?php echo $row['productName']; ?>"  disabled="disabled">
                </span>
            </p>
            <p>
                <label for="product-price">Product Price (/Item):</label></br>
                <span>
                    <input type="hidden" id="checkout-product-price" value="<?php echo $row['productPrice']; ?>">

                    <input type="text" id="checkout-price" name="product-price" value="<?php echo $row['productPrice']; ?>" disabled="disabled">
                </span>
            </p>
            <p>
                <span>
                    <input type="hidden" id="checkout-product-id" value="<?php echo $row['id']; ?>">
                </span>
            </p>
            <p>
                <label for="quantity">Quantity:</label><br>
                <span>
                    <input type="number" id="checkout-quantity" name="quantity" min="1" max="<?php echo $row['productQuantity']; ?>" value="0" onfocus="document.getElementById('checkout-quantity').style.border = ''" >
                </span>
            </p>
            <p class="checkout-error" style="color:red;"></p>  
            <p>
                <input type="submit" value="Confirm Order" class="checkout-submit-bttn">
            </p>
        </div>
        <div class="checkout-invoice">
            <div>
                <table class="invoice-table">
                    <thead class="invoice-head">
                        <tr>
                            <th>Item Name</th>
                            <th>Price(/Item)</th>
                            <th>Quantity</th>
                        </tr>
                        </thead>
                    <tbody class="invoice-body">
                        <?php $row1=mysqli_fetch_assoc($result1); ?>
                        <tr>
                            <td><?php echo $row1['productName']; ?></td>
                            <td>$ <?php echo $row1['productPrice']; ?></td>
                            <td id="invoice-quantity"></td>
                        </tr>
                    </tbody>
                </table>
                <p class="checkout-total">Total: </p>
                <p class="checkout-total-price"></p>
            </div>
        </div>
    </div>
</div>
<?php //include('footer.php')?>
