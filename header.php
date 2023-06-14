<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JAI BHEESHMA NATURALS</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/sample-styles.css">
    <link rel="stylesheet" href="css/products-page.css">
    <link rel="icon" type="image/x-icon" href="images/logo.jpg">
    <link rel="About" type="html" href="aboutus.php">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="js/contact-form.js"></script>
    <script src="js/login-form.js"></script>
    <script src="js/products-page.js"></script>
    <script src="js/checkout-form.js"></script>
    <script src="js/myorders-page.js"></script>
    <script src="js/profile.js"></script>
    <script type="text/javascript"
  src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
</head>
<body class="ody">
<div class="content-wrapper">
    <!-- Your page content goes here -->

    <!--HEADER-->

    <div class="head">
        <div class="logo123">
            <img src="images/logo.jpg" alt="Jai Bheeshma Naturals" style="width: 120px; height: 100px;" >
        </div>
        <div class="name">
            <h1 class="jbn" style="text-align: center;"> Jai Bheeshma Naturals</h1>
        </div>
        <div class="subtitle">
            <p class="sub"><em>...Good for Nature...Good for you..</em></p>
        </div>
        <div class="getintouch">
            <a href="contact.php" class="intouch">
                <div>GET IN TOUCH</div>
            </a> 
        </div>
        <div class="login-bttn">
            <a href="login-page.php" class="login-header">
                <div>LOGIN</div>
            </a>    
        </div>
        <?php if(isset($_SESSION['email_id'])){ ?>
            <div class="login-bttn">
            <a href="logout.php" class="login-header">
                <div>LOG OUT</div>
            </a>    
        </div>
        <?php } ?>
        <div class="call">
            <h4 class="phone-numb">+1234567890</h4>
        </div>
        <div class="icon"> 
            <img src="images/phone-icon.png" alt="phone-icon" class="phone-icon" width="30px" height="30px">
            <img src="images/email-icon.png" alt="email-icon" class="email-icon" width="33px" height="33px">
        </div>
        <div class="email"><h4 class="email-id">Example@gmail.com</h4></div>
    </div>

    <!-- MENU -->
    <div class="menu" >
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="products-page.php">Products</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li>
                    <a href="https://www.facebook.com" class="fa fa-facebook" target="_blank">
                        <img src="images/fb-icon.png" alt="fb" width="20px" height="20px">
                    </a>
                    <a href="https://www.instagram.com" class="fa fa-instagram" target="_blank">
                        <img src="images/insta-icon.jpg" alt="insta" width="20px" height="20px">
                    </a>
                    <a href="https://www.linkedin.com" class="fa fa-linkedin-in" target="_blank">
                        <img src="images/linkedin-icon.png" target="_blank" width="20px" height="20px">
                    </a>
                </li>
                <?php if(isset($_SESSION['email_id'])){ ?>
                <li><a href="myorders-page.php">My Orders</a></li> 
                <li><a href="my-profile.php">My Profile</a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</div>
</body>
</html>