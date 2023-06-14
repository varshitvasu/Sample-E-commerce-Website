$(document).ready(function(){
    $('#profile-phone-number').bind('input', function() {
        var data = $(this).val();
        $(this).val(data.replace(/[^0-9]/gi, ''));
    });
    $('#profile-pincode').bind('input', function() {
        var data = $(this).val();
        $(this).val(data.replace(/[^0-9]/gi, ''));
    });
    $('.save-changes-bttn').click(function(){
        var fullName = $("#profile-name").val();
        var phoneNo = $("#profile-phone-number").val();
        var address = $("#profile-address").val();
        var city = $("#profile-city").val();
        var pincode = $("#profile-pincode").val();
        if ($.trim(phoneNo) == '' || phoneNo.length != 10 || $.trim(fullName) == '' || $.trim(address) == '' || $.trim(city) == '' || $.trim(pincode) == ''){
            if ($.trim(fullName) == ''){
                $("#profile-name").css({'border': '1px solid red'});
                $(".profile-error").html('Please enter your Full Name.');
            } else if ($.trim(phoneNo) == '') {
                $("#profile-phone-number").css({'border': '1px solid red'});
                $(".profile-error").html('Please Enter Phone Number');
            } else if (phoneNo.length != 10) {
                $("#profile-phone-number").css({'border': '1px solid red'});
                $(".profile-error").html('Please Enter 10 Digit Phone Number');
            } else if ($.trim(address) == '') {
                $("#profile-address").css({'border': '1px solid red'});
                $(".profile-error").html('Please Enter your Address');
            } else if ($.trim(city) == ''){
                $("#profile-city").css({'border': '1px solid red'});
                $(".profile-error").html('Please Enter your City');
            } else if ($.trim(pincode) == '') {
                $("#profile-pincode").css({'border': '1px solid red'});
                $(".profile-error").html('Please Enter your Pincode');
            }
        } else {
            $(".profile-error").html('');
            $.ajax({
                type: "POST",
                url: "profile.php",
                data: {fullName: fullName, phoneNo: phoneNo, address: address, city: city, pincode: pincode},
                success: function(response){
                    if (response ==1){
                        $(".profile-error").html('Your profile has been updated successfully.');
                        $("#profile-name").css({'border': '1px solid #ccc'});
                        $("#profile-phone-number").css({'border': '1px solid #ccc'});
                        $("#profile-address").css({'border': '1px solid #ccc'});
                        $("#profile-city").css({'border': '1px solid #ccc'});
                        $("#profile-pincode").css({'border': '1px solid #ccc'});
                    } else {
                        $(".profile-error").html('Something went wrong. Please try again later.');
                    }
                }
            });
        }
    })
});

$(document).ready(function(){
    $('.change-password-bttn').click(function(){
        var oldPassword = $("#current-password").val();
        var newPassword = $("#new-password").val();
        var confirmPassword = $("#confirm-new-password").val();
        if ($.trim(oldPassword) == '' || $.trim(newPassword) == '' || $.trim(confirmPassword) == '' || newPassword != confirmPassword){
            if ($.trim(oldPassword) == ''){
                $("#current-password").css({'border': '1px solid red'});
                $(".change-password-error").html('Please enter your current password.');
            } else if ($.trim(newPassword) == ''){
                $("#new-password").css({'border': '1px solid red'});
                $(".change-password-error").html('Please enter your new password.');
            } else if ($.trim(confirmPassword) == ''){
                $("#confirm-new-password").css({'border': '1px solid red'});
                $(".change-password-error").html('Please confirm your new password.');
            } else if (newPassword != confirmPassword){
                $("#confirm-new-password").css({'border': '1px solid red'});
                $(".change-password-error").html('New password and confirm password does not match.');
            }
        } $(".change-password-error").html('');
        $.ajax({
            type: 'POST',
            url: 'update-pass.php',
            data: {oldPassword: oldPassword, newPassword: newPassword},
            success: function(response){
                if (response == 1){
                $(".change-password-error").html('Your password has been changed successfully.');
                $("#current-password").css({'border': '1px solid #ccc'});
                $("#new-password").css({'border': '1px solid #ccc'});
                $("#confirm-new-password").css({'border': '1px solid #ccc'});
                } else {
                    $(".change-password-error").html('Something went wrong. Please try again later.');
                }
            }
        })
    });
});
