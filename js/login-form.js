$(document).ready(function(){
    $(".login").click(function(){
        var emailid = $("#emailid").val();
        var password = $("#password").val();                                                                                                                       
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if ($.trim(emailid) == '' || $.trim(password) == '' || !regex.test(emailid)) {
            if($.trim(emailid) == ''){
                $('#emailid').css({'border':'1px solid red'});
                $(".login-error").html('Please Enter Your Email');
            } else
            if (!regex.test(emailid)){
                $('.login-error').html("Invalid email id");    
                $('#emailid').css({'border':'1px solid red'});
                return regex.test(emailid); 
            } else
            if($.trim(password) == ''){
                $('#password').css({'border':'1px solid red'});
                $(".login-error").html('Please Enter Your Password');
            }
        } else {    
            $(".login-error").html('');
            $.ajax({
                type: 'POST',
                url: 'login.php',
                data: {emailid1: emailid, password1: password},
                success:function(response) {
                    var msg = "";
                    if (response==1){
                        window.location ="admin/orders.php";
                    } else if (response==2){
                        window.location = "/intern-project/myorders-page.php";
                    } else {
                        msg = "Invalid User Id or Password";
                        $('#emailid').css({'border':'1px solid red'});
                        $('#password').css({'border':'1px solid red'});
                    }
                    $(".login-error").html(msg);
                }
            });
        }
    })
});

$(document).ready(function(){
    $(".register").click(function(){
        var username =$("#reg-username").val();
        var emailid = $("#reg-emailid").val();
        var password = $("#reg-password").val();
        var cpassword = $("#reg-confirm-password").val();
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if($.trim(emailid) == '' || $.trim(username) == '' || $.trim(password) == '' || $.trim(cpassword) == '' || password != cpassword || !regex.test(emailid)){
            if($.trim(username) == ''){
                $('#reg-username').css({'border':'1px solid red'});
                $(".reg-error").html('Please Enter Your Username');
            } else if (!regex.test(emailid)) {
                $('.reg-error').html("Invalid email id");
                $('#reg-emailid').css({'border':'1px solid red'});
            } else if($.trim(emailid) == ''){
                $('#reg-emailid').css({'border':'1px solid red'});
                $(".reg-error").html('Please Enter Your Email');
            } else if($.trim(password) == ''){
                $('#reg-password').css({'border':'1px solid red'});
                $(".reg-error").html('Please Enter Your Password');
            } else if($.trim(cpassword) == ''){ 
                $('#reg-confirm-password').css({'border':'1px solid red'});
                $(".reg-error").html('Please Enter Your Confirm Password');
            } else if(password!= cpassword){
                $('#reg-confirm-password').css({'border':'1px solid red'});
                $(".reg-error").html('Password and Confirm Password does not match');
            } 
        } else {
            $(".reg-error").html(' ');
            $.ajax({
                type: "POST",
                url: "registration.php",
                data: {username: username, emailid: emailid, password: password},
                success: function(response){
                    if(response == 2){
                        $(".reg-error").html('Email already exists');
                        $('#reg-emailid').css({'border':'1px solid red'});
                    } else if(response == 1){
                        alert('Registered Successfully');
                        window.location = "/intern-project/index.php"
                    }
                }
            });
        }
    });
});

$(document).ready(function(){
    $('.reset-password-bttn').click(function(){
        var emailid = $("#forgot-password-email").val();
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if($.trim(emailid) == '' || !regex.test(emailid)){
            if($.trim(emailid) == ''){
                $('#forgot-password-email').css({'border':'1px solid red'});
                $(".forgot-password-error").html('Please Enter Your Email');
            } else if (!regex.test(emailid)) {
                $('.forgot-password-error').html("Invalid email id");
                $('#forgot-password-email').css({'border':'1px solid red'});
            }
        } else {
            $(".forgot-password-error").html(' ');
            $.ajax({
                type: "POST",
                url: "resetpass.php",
                data: {emailid: emailid},
                success: function(response){
                    if(response != 0){
                        (function() {
                            https://dashboard.emailjs.com/admin/account
                            emailjs.init('0aSpinbnT87HaedAe');
                        })();
                        emailjs.send("service_l4zpa08","template_6kxj88o",{ 
                            message: response,
                            reply_to: emailid,
                            to_email: emailid,
                            })
                            .then(function(response) {
                                alert('Password reset link sent to your email');
                                window.location = "/intern-project/index.php"
                            })
                            
                    } else{
                        $(".forgot-password-error").html('Email does not exists');
                        $('#forgot-password-email').css({'border':'1px solid red'});
                    }   
                }
            });
        }
    });
});

