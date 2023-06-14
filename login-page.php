<?php 
    include('header.php');
?>
    <div class="login-page">
        <div class="jnb-heading"> 
            <h1>Jai Bheeshma Naturals</h1>
        </div>
        <div class="login-heading">
            <h2> LOGIN</h2> 
        </div>
        <div class="login-form">
            <p>
                <label for="emailid">*Email </label><br>
                <span>
                    <input type="email" id="emailid" name="email" placeholder="Enter your Email" onfocus="document.getElementById('emailid').style.border = ''"><br>
                </span>
            </p>
            <p> 
                <label for="password">*Password</label><br>
                <span>
                    <input type="password" id="password" name="password" placeholder="Enter Your Password" onfocus="document.getElementById('password').style.border = ''"><br>
                </span>
            </p>    
            <p class="login-error" style="color:red;"></p>
            <p>
                <input type="submit" value="Login" class="login">
            </p>
            <div class="forgot-password">
                <p><a href="forgot-password.php">Forgot Password?</a></p>
            </div>
            <div class="loginpage-signup">
                <p>Don't have an account? <a href="registration-page.php">Sign Up</a></p>
            </div>
        </div>
        
    </div>
<?php include('footer.php');?>



























