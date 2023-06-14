
// CHECKOUT PAGE //

function checkoutID(id){
    window.location = ("checkout.php?id="+btoa(id));
}

function catSection(id){
    $.ajax({
        type: "POST",
        url: "prdct-cat-section.php",
        data: {id: id},
        success: function(response) {
            var filter = jQuery.parseJSON(response);
            if (filter.length > 0){
                $("#product-list-main").hide();
                $("#product-list-filter").show();
                $("#product-list-filter").html('');
                $.each(filter, function(index, filter){
                    $("#product-list-filter").append('<div class="product-list" data-id="'+filter.productID+'">'+
                    '<div class="product">'+
                    '<img src="admin/product-images/'+filter.pr_productImage+'" alt="'+filter.pr_productImage+'" width="250px" height="250px">'+
                    '<div class="product-name">'+filter.pr_productName+'</div>'+
                    '<div class="product-price">$ '+filter.pr_productPrice+'</div>'+
                    '<div class="product-buy"><button class="buy-now" onclick="checkoutID('+filter.productID+')">'+
                    '<div>Buy Now</div>'+
                    '</button></div>'+
                    '</div>');
                });
            } else{
                $("#product-list-filter").html('No products found for the selected category.');
            }
        }
    });
}
