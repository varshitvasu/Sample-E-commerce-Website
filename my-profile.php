<?php 
include('header.php');
include('admin/connection.php');
$user_id = $_SESSION['user_id'];
$query = "SELECT username, email_id FROM users_db WHERE id=$user_id;";
$result2 = mysqli_query($conn, $query);
?>
<div class="profile-page">
    <div class="profile-heading-main">
        <div class="profile-heading">
            <h2>Profile Settings</h2>
        </div>
    </div>
    
    <div class="user-profile">
        <p>
            <label for="name">Full Name:</label><br>
            <?php $row2=mysqli_fetch_assoc($result2); ?>
            <span>
                <input type="text" id="profile-name" name="name" value="<?php echo $row2['username']; ?>" onfocus="document.getElementById('profile-name').style.border = ''"><br>
            </span>
        </p>
        <p>
            <label for="email">Email:</label><br>
            <span>
                <input type="email" id="profile-email" name="email" value="<?php echo $row2['email_id']; ?>" onfocus="document.getElementById('profile-email').style.border = ''" disabled="disabled"><br>
            </span>
        </p>
        <p>
            <label for="phone-number">Phone No:</label><br>
            <span>
                <input type="text" id="profile-phone-number" name="phone-number" minlength="10" maxlength="10" onfocus="document.getElementById('profile-phone-number').style.border = ''"><br>
            </span>
        </p>
        <p>
            <label for="address">Address:</label><br>
            <span>
                <input type="text" id="profile-address" name="address" minlength="10" maxlength="10" onfocus="document.getElementById('profile-address').style.border = ''"><br>
            </span>
        </p>
        <p>
            <label for="city">City:</label><br>
            <span>
                <input type="text" id="profile-city" name="city" onfocus="document.getElementById('profile-city').style.border = ''"><br>
            </span>
        </p>
        <p>
            <label for="pincode">Pincode: </label><br>
            <span>
                <input type="pincode" id="profile-pincode" name="pincode" onfocus="document.getElementById('profile-pincode').style.border = ''"><br>
            </span>
        </p>
        <p class="profile-error" style="color:red;"></p>  
        <p>
            <input type="submit" value="Save Changes" class="save-changes-bttn">
        </p>
    </div>
    <div class="change-password">
        <p>
            <label for="current-password">Current Password: </label><br>
            <span>
                <input type="password" id="current-password" name="current-password" onfocus="document.getElementById('current-password').style.border = ''"><br>
            </span>
        </p>
        <p>
            <label for="new-password">New Password: </label><br>
            <span>
                <input type="password" id="new-password" name="new-password" onfocus="document.getElementById('new-password').style.border = ''"><br>
            </span>
        </p>
        <p>
            <label for="confirm-new-password">Confirm New Password: </label><br>
            <span>
                <input type="password" id="confirm-new-password" name="confirm-new-password" onfocus="document.getElementById('confirm- new-password').style.border = ''"><br>
            </span>
        </p>
        <p class="change-password-error" style="color:red;"></p>  
        <p>
            <input type="submit" value="Save Changes" class="change-password-bttn">
        </p>
    </div>
</div>
<?php include('footer.php'); ?>