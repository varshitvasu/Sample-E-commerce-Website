<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="admin-css/admin-styles.css">
    <link rel="icon" type="image/x-icon" href="../images/logo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="admin-js/categories-popup.js"></script>
    <script src="admin-js/products-popup.js"></script>
    <script src="admin-js/query-form.js"></script>
    <script src="admin-js/category-filter.js"></script>
    <script src="admin-js/orders.js"></script>
</head>
<body>
<div class="content-wrapper">
    <div class="dashboard-header">
        <div class="header-left">
            <div class="dashboard-jbn-logo">
                <img src="../images/logo.jpg" alt="Jai Bheeshma Naturals" style="width: 120px; height: 100px;" >
            </div>
            <div class="dashboard-jbn-name">
                <h1>Jai Bheeshma Naturals</h1>
            </div>
            <div class="dashboard-subtitle">
                <p class="sub"><em>...Good for Nature...Good for you..</em></p>
            </div>
        </div>
        <div class="header-right">
            <div class="dashboard-sign-out">
                <a class="account-sign-out" href="../logout.php">Sign Out</a>
            </div>
        </div>
    </div>
    <div class="dashboard-menu">
        <div class="dashboard-menu">
            <nav>
                <ul type="none">
                    <!-- <li><a href="admin.php">Dashboard</a></li> -->
                    <li><a href="orders.php">Orders</a></li>
                    <li><a href="categories.php">Categories</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="contact-form-queries.php">Contact Form Queries</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
</body>
</html>