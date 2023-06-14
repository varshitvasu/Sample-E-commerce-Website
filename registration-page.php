<?php 
include('header.php');
?>
<div class="reg-page">
        <div class="reg-login-heading">
            <h2> Register</h2> 
        </div>
        <div class="registration-form">
            <p>
                <label>*Username</label><br>
                <span>
                    <input type="username" id="reg-username" name="username" placeholder="Enter Your username" onfocus="document.getElementById('reg-username').style.border = ''"><br>
                </span>
            </p>
            <p>
                <label for="userid">*Email </label><br>
                <span>
                    <input type="email" id="reg-emailid" name="email" placeholder="Enter your Email" onfocus="document.getElementById('reg-emailid').style.border = ''"><br>
                </span>
            </p>
            <p> 
                <label for="password">*Password</label><br>
                <span>
                    <input type="password" id="reg-password" name="password" placeholder="Enter Your Password" onfocus="document.getElementById('reg-password').style.border = ''"><br>
                </span>
            </p>
            <p> 
                <label for="password">*Password</label><br>
                <span>
                    <input type="password" id="reg-confirm-password" name="confirm-password" placeholder="Confirm Password" onfocus="document.getElementById('reg-confirm-password').style.border = ''"><br>
                </span>
            </p>
            <p class="reg-error"></p>
            <p>
                <input type="submit" value="Register" class="register">
            </p>
            <div class="regpage-login">
                <p>Already have an account? <a href="login-page.php">Login</a></p>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php');?>