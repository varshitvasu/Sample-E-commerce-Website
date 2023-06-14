function trackmyorder(id){
    window.location = ("/intern-project/track-my-order.php?id="+btoa(id));
}
$(document).ready(function(){
    $('.track-order-cancel-bttn').on('click', function(){
        alert('Are you sure you want to cancel this order?');
        $('.cancel-order-popup').fadeIn();
        $('.track-order-body').fadeOut();
        $('.track-order-header').fadeOut();
        $('.track-order-cancel-bttn').fadeOut();
        $('.close-cancel-order-bttn').on('click', function(){
            $('.cancel-order-popup').fadeOut();
            $('.track-order-body').fadeIn();
            $('.track-order-header').fadeIn();
            $('.track-order-cancel-bttn').fadeIn();
        });
        $('.cancel-order-bttn').on('click', function(){
            var order_cancel = 'cancel_form';   
            var id = $('#cancel-order-status').val();
            var reason = $('#cancel-order-reason').val();
            if(reason == ''){
                $('.cancel-order-error').html('Please enter a reason for cancellation.');
                $('#cancel-order-reason').css({'border':'5px solid red;'});
            }else{
                $.ajax({
                    type: 'POST',
                    url: 'cancel-order.php',
                    data: {order_cancel: order_cancel, id: id, reason: reason},
                    success: function(response){
                        if(response == '1'){
                            alert('Order Status cancelled Successfully');
                            window.location = ("/intern-project/myorders-page.php");
                        }  
                    }
                });
            }
        });   
    });
});
