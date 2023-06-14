<?php include('header.php'); ?>
<div class="content-wrapper">
    <!-- Your page content goes here -->

    <!--HEADING-->
    <div class="container-contact-heading"> 
        <div class="contact-us-heading">
            <h2>Contact Us For Enquiry</h2>
            <p>Fill the details to get in touch</p>
        </div>
    </div>

    <!-- CONTACT FORM-->
    <div class="container-form-address">
        <div class="container-address-information">
            <div class="your-inquiry">
                <h2>
                    Your Inquiry
                </h2>
                <p>
                    To constantly enhance & maintain customer satisfaction through our quality, flexibility, innovation, and commitments.
                </p>
            </div>
            
            <div class="address-heading">
                <h2>Address Information</h2>
            </div>
            <div class="address-information">
                <p><address>Aditya Drier Tech Pvt Ltd, Flat No. 301, Sindhuja Apartment, 
                    Opp Vuda Park, East Point Colony, Visakhapatnam – 530017, 
                    Andhra Pradesh, India.</address>
                </p>
            </div>
            <div class="email-address-heading">
                <h4>Email Adddress</h4>
            </div>
            <div class="email-address">
                <p>abc@gmail.com</p>
            </div>
            <div class="phone-number-heading">
                <h4>Phone Number</h4>
            </div>
            <div class="phone-number-address">
                <p>+91 9876543210</p>
            </div>
        </div>
        <div class="contact-form-heading">
            <h2>Get In Touch</h2>
        </div>
        <div class="container-contact-form">          
                
                <p>
                    <label for="name">*Name: </label><br>
                    <span>
                        <input type="text" id="name" name="name" placeholder="Enter your Name" onfocus="document.getElementById('name').style.border = ''"><br>
                    </span>
                </p>
                <p>
                    <label for="email">*Email:</label><br>
                    <span>
                        <input type="email" id="email" name="email" placeholder="Enter your Email Address" onfocus="document.getElementById('email').style.border = ''" ><br>
                    </span>

                </p>
                <p>
                    <label for="phone-number">*Phone No:</label><br>
                    <span>
                        <input type="text" id="phone-number" name="phone-number" minlength="10" maxlength="10" placeholder="Enter your Phone Number" onfocus="document.getElementById('phone-number').style.border = ''"><br>
                    </span>

                </p>
                <p>
                    <label for="message">Message: </label><br>
                    <span>
                        <textarea name="your-message" id="message" placeholder="Your Message"></textarea><br>
                    </span>
                </p>
                <p class="return-msg" style="color:red;"></p>  
                <p>
                    <input type="submit" value="Send" class="submit-bttn">
                </p>
                   
        </div>
    </div>
</div>
<?php include('footer.php'); ?>


