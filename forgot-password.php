<?php 
include('header.php'); 
?>
<div class="forgot-password-page">
    <div class="forgot-password-heading">
        <h2>Forgot Password</h2>
    </div>
    <div class="forgot-password-form">
        <p>
            <p class="forgot-password-heading-2">Enter your email address below and we will send you a link to reset your password.</p>
            <label for="email">Enter Your Email: </label><br>
            <input type="email" name="email" id="forgot-password-email" placeholder="Enter Your Email" onfocus="document.getElementById('forgot-password-email').style.border = ''"><br>
        </p>
        <p class="forgot-password-error" style="color:red;"></p>
        <p>
            <input type="submit" value="Forgot Password" class="reset-password-bttn">
        </p>
        <div class="loginpage-signup">
            <p>Don't have an account? <a href="registration-page.php">Sign Up</a></p>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>