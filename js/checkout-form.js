$(document).ready(function(){
    $('#checkout-phone-number').bind('input', function() {
        var data = $(this).val();
        $(this).val(data.replace(/[^0-9]/gi, ''));
    });
    $('#checkout-pincode').bind('input', function() {
        var data = $(this).val();
        $(this).val(data.replace(/[^0-9]/gi, ''));
    });
    $('#checkout-quantity').bind('input', function() {
        var data = $(this).val();
        $(this).val(data.replace(/[^0-9]/gi, ''));
    });
    $('#checkout-quantity').on("change", function() {
        calculatePrice();
    });
    $(".checkout-submit-bttn").click(function(){
        // var user_id = $("#checkout-user-id").val();
        var fullName = $("#checkout-name").val();
        var email = $("#checkout-email").val();
        var phoneNo = $("#checkout-phone-number").val();
        var address = $("#checkout-address").val();
        var city = $("#checkout-city").val();
        var pincode = $("#checkout-pincode").val();
        var productID = $("#checkout-product-id").val();
        var productName = $("#checkout-product").val();
        var quantity = $("#checkout-quantity").val();
        var price = $('#checkout-product-price').val();
        var total = quantity * price;
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if ($.trim(email) == '' || $.trim(phoneNo) == '' || phoneNo.length != 10 || $.trim(fullName) == '' || $.trim(address) == '' || $.trim(city) == '' || $.trim(pincode) == '' || $.trim(quantity) == '' || !regex.test(email)){
            if ($.trim(fullName) == ''){
                $("#checkout-name").css({'border': '1px solid red'});
                $(".checkout-error").html('Please enter your Full Name.');
            } else if ($.trim(email) == '') {
                $("#checkout-email").css({'border': '1px solid red'});
                $(".checkout-error").html('Please enter your Email.');
            } else if (!regex.test(email)){
                $("#checkout-email").css({'border': '1px solid red'});
                $(".checkout-error").html('Invalid Email.');
            } else if ($.trim(phoneNo) == '') {
                $("#checkout-phone-number").css({'border': '1px solid red'});
                $(".checkout-error").html('Please Enter Phone Number');
            } else if (phoneNo.length != 10) {
                $("#checkout-phone-number").css({'border': '1px solid red'});
                $(".checkout-error").html('Please Enter 10 Digit Phone Number');
            } else if ($.trim(address) == '') {
                $("#checkout-address").css({'border': '1px solid red'});
                $(".checkout-error").html('Please Enter your Address');
            } else if ($.trim(city) == ''){
                $("#checkout-city").css({'border': '1px solid red'});
                $(".checkout-error").html('Please Enter your City');
            } else if ($.trim(pincode) == '') {
                $("#checkout-pincode").css({'border': '1px solid red'});
                $(".checkout-error").html('Please Enter your Pincode');
            } else if($.trim(quantity) == ''){
                $("#checkout-quantity").css({'border': '1px solid red'});
                $(".checkout-error").html('Please Enter Quantity');
            } 
        } else {
            $(".checkout-error").html('');
            $.ajax({
                type: "POST",
                url: "checkout-form.php",
                data: {fullName: fullName, email: email, phoneNo: phoneNo, address: address, city: city, pincode: pincode, productID: productID, productName: productName, quantity: quantity, total: total},
                success: function(response){
                    var orderUrl = "http://localhost/intern-project/admin/vieworders.php?id=" + btoa(response);
                    if (response != 0){
                        (function() {
                            https://dashboard.emailjs.com/admin/account
                            emailjs.init('0aSpinbnT87HaedAe');
                            emailjs.init('3jtuqrPEOAMinvZCW');
                        })();
                        emailjs.send("service_l4zpa08","template_4dsbdgn",{ 
                            to_name: fullName,
                            message: productName,
                            message2: quantity,
                            message3: total,
                            reply_to: email,
                            to_email: email,
                        })
                        emailjs.send("service_k3pt8ze","template_wd1bqc4", {
                            from_name: fullName,
                            message: productName,
                            message1: quantity,
                            message2: total,
                            to_email: email,
                            order_link: orderUrl,
                        })
                        .then(function(response) {  
                            window.location = "/intern-project/confirmed-order.php"
                        })
                    }
                }
            });
        }
    }); 
});

function calculatePrice(){
    var quantity = $('#checkout-quantity').val();
    var price = $('#checkout-product-price').val();
    var total = quantity * price;
    $('.checkout-total-price').text('$ ' + total.toFixed(2));
    $('#invoice-quantity').text(quantity);
}

