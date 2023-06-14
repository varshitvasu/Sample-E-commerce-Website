$(document).ready(function() {
    $('#phone-number').bind('input', function() {
      var data = $(this).val();
      $(this).val(data.replace(/[^0-9]/gi, ''));
    });
  
    $(".submit-bttn").click(function() {
      var name = $("#name").val();
      var email = $("#email").val();
      var message = $("#message").val();
      var contact = $("#phone-number").val();
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  
      if ($.trim(email) == '' || $.trim(contact) == '' || $.trim(name) == '' || contact.length != 10 || !regex.test(email)){
        if ($.trim(name) == '') {
          $("#name").css({'border': '1px solid red'});
          $(".return-msg").html('Please Enter Your Name');
        } else if ($.trim(email) == '') {
          $('#email').css({'border': '1px solid red'});
          $(".return-msg").html('Please Enter Your Email');
        } else if (!regex.test(email)) {
          $('.return-msg').html("Invalid Email id");
          $('#email').css({'border': '1px solid red'});
        } else if ($.trim(contact) == '') {
          $('#phone-number').css({'border': '1px solid red'});
          $(".return-msg").html('Please Enter Phone Number');
        } else if (contact.length != 10) {
          $('#phone-number').css({'border': '1px solid red'});
          $(".return-msg").html('Please Enter 10 digit Phone Number');
        }
      } else {
        $(".return-msg").html('');
        $.ajax({
          type: 'POST',
          url: 'contact-form-submit.php',
          data: $.param({name1: name, email1: email, contact1: contact, message1: message}),
          success: function(response) {
            if (response==1){
              (function() {
                https://dashboard.emailjs.com/admin/account
                emailjs.init('3jtuqrPEOAMinvZCW');
              })();
              emailjs.send("service_k3pt8ze","template_3ro2z1m",{ 
                  from_name: name,
                  message: message,
                  })
                  .then(function(response) {
                      window.location = "/intern-project/thank-you.php"
                  })
              
            } else {
              $(".return-msg").html('Something went wrong. Please try again.');
            }
          }
        });
      }
    });
});
  