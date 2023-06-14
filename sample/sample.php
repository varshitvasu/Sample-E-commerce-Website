<?php include('header.php'); ?>
<?php include('sample-form-validation.php'); ?>


<div class="sample-form">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form">
        <p>
            <label for="name"> Name:</label><br>
            <input type="name" class="sample-input" name="name" placeholder="Enter your name" onfocus="document.getElementById('email').style.border = ''"><br>
            <p style="color:red;"><?php if ($nameErr!=1) { echo $nameErr; } ?> </p>
        </p>
        <p>
            <label for="email"> Email: </label><br>
            <input type="text" class="sample-input" name="email" placeholder="Enter your Email" onfocus="document.getElementById('email').style.border = ''"><br>
            <p style="color:red;"><?php if ($emailErr!=1) { echo $emailErr; } ?></p>
        </p>
        <P>
            <label for="phone-number"> Phone Number: </label><br>
            <input type="tel" class="sample-input" name="phonenumber" placeholder="Enter your phone Number" onfocus="document.getElementById('email').style.border = ''"><br>
            <p style="color:red;"><?php if ($phonenumberErr!=1) { echo $phonenumberErr; }?></p>  
        </P>
        <p>
            <label for="message">Message: </label><br>
            <textarea name="message" class="sample-input" placeholder="Enter Your Message" style="resize: None; height: 50px;"></textarea><br>
        </p>
        <p>
            <input type="submit" value="Send" name="submit" class="sample-button">
        </p>

    </form>
</div>

<?php
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $phonenumber;
echo "<br>";
echo $message;
?>

<?php include('footer.php'); ?> 