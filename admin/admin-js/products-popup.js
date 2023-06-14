//Upload Product image functionality//
async function uploadFile() {
let formData = new FormData(); 
formData.append("file", fileupload.files[0]);
$("#prdct-img").val(fileupload.files[0]['name']);
$(".prdct-error").html("Image uploaded successfully");
$(".prdct-error").fadeOut(3000);
await fetch('upload.php', {
    method: "POST", 
    body: formData
}); 
}   

// ADD PRODUCT BUTTON FUNCTION AND VALIDATION

$(document).ready(function(){
    $(".add-product-bttn").click(function(){
        $(".add-prdct-popup").toggle();
        // $(".dashboard-footer").fadeOut();
        $(".prdct-table").fadeOut();
        $(".add-product-bttn").fadeOut();
        $(".prdct-filter-container").fadeOut();
        $("#prdct-dashboard-msg").fadeOut();
        
        
    
    });
    $(".prdct-cancel").click(function(){
        $("#prdct-name").val('');
        $("#prdct-price").val('');
        $("#prdct-quantity").val('');
        $("#prdct-status").val('1');
        $("#prdct-ctg").val('1');
        $("#prdct-img").val('');
        location.reload();
        $(".prdct-error").fadeOut();
        $(".add-product-bttn").fadeIn();
        $(".prdct-table").fadeIn();
        $(".dashboard-footer").fadeIn();
        $(".add-prdct-popup").fadeOut();
        
    });
    $('#prdct-quantity').bind('input', function() {
        var data = $(this).val();
        $(this).val(data.replace(/[^0-9]/gi, ''));
    });
    
    $(".prdct-submit").click(function(){
        var productName = $("#prdct-name").val();
        var productPrice = $("#prdct-price").val();
        var productQuantity = $("#prdct-quantity").val();
        var status = $("#prdct-status").val();
         var productCtg = $("#prdct-ctg").find(":selected").val();
        var productImg = $("#prdct-img").val();
        if ($.trim(productName) == '' || $.trim(productPrice) == '' || $(productQuantity) == '' || (!$('#prdct-img').val())){
            if ($.trim(productName) == '') {
                $(".prdct-error").html('Product Name is required.');
                $("#prdct-name").css({'border': '1px solid red'});
            } else if ($.trim(productPrice) == ''){
                $(".prdct-error").html('Product Price is required.');
                $("#prdct-price").css({'border': '1px solid red'});
            } else if ($.trim(productQuantity) == '') {
                $(".prdct-error").html('Product Quantity is required.');
                $("#prdct-quantity").css({'border': '1px solid red'});
            } else if (!$('#prdct-img').val()) {
                $(".prdct-error").html('Product Image is required.');
                $("#fileupload").css({'border': '1px solid red'});
            }
        } else {
            $.ajax({
                type: "POST",
                url: "add-product.php",
                data: {productName: productName, productPrice: productPrice, productQuantity: productQuantity, status: status, productCtg: productCtg, productImg: productImg},
                success: function(response) {
                    if (response == '1') {
                        $("#prdct-dashboard-msg").html('Product added successfully.');
                        $("#prdct-dashboard-msg").css({'color': 'Blue'});
                        $("#prdct-dashboard-msg").fadeIn();
                        $("#prdct-dashboard-msg").fadeOut(3000);
                        $("#prdct-name").val('');
                        $("#prdct-price").val('');
                        $("#prdct-quantity").val('');
                        $("#prdct-status").val('1');
                        $("#prdct-ctg").val('1');
                        $("#prdct-img").val('');
                        $("#prdct-reload").load(location.href + " #prdct-reload");
                        $(".add-product-bttn").fadeIn();
                        $(".prdct-table").fadeIn();
                        $(".dashboard-footer").fadeIn();
                        $(".add-prdct-popup").fadeOut();
                    } else {
                        console.log(response);    
                    }
                }   
            });
        }   
    });
});


//EDIT button FUNCTION  AND VALIDATION

function edFunction(id){
    var ed_form = 'edit';
    $.ajax({
        type: "POST",   
        url: 'prdct-edit.php',
        data: {id: id, ed_form:ed_form},
        success: function(response) {
            var sample = jQuery.parseJSON(response);
            $("#edit-prdct-name").val(sample.productName);
            $("#edit-prdct-price").val(sample.productPrice);
            $("#edit-prdct-quantity").val(sample.productQuantity);
            $("#edit-prdct-status").val(sample.status);
            $("#edit-prdct-ctg").val(sample.ctg_id).find("option[value=" + sample.ctg_id +"]").attr('selected');
            $("#edit-prdct-img").val(sample.productImage);
            $("#update-prdct").val(sample.id);
        }
    });
}

// // EDIT button FUNCTION AND VALIDATION

// function edFunction(id) {
//     $(".edit-product-popup").show();
//     $(".dashboard-footer").fadeOut();
//     $(".prdct-table").fadeOut();
//     $(".add-product-bttn").fadeOut();
//     $("#prdct-dashboard-msg").fadeOut();

//     // Perform AJAX request to retrieve product details
//     $.ajax({
//         type: "POST",
//         url: "get-product.php",
//         data: { id: id },
//         success: function (response) {
//             var product = JSON.parse(response);

//             // Fill the edit form with the retrieved product details
//             $("#edit-prdct-name").val(product.pr_productName);
//             $("#edit-prdct-price").val(product.pr_productPrice);
//             $("#edit-prdct-quantity").val(product.pr_productQuantity);
//             $("#edit-prdct-status").val(product.pr_Status);
//             $("#edit-prdct-ctg").val(product.categoryID);
//             $("#edit-prdct-img").val(product.pr_productImage);
//             $("#update-prdct").val(product.productID);
// //         }
// //     });
// // }

// $(".edit-prdct-cancel").click(function () {
//     // Clear the edit form and hide the popup
//     $(".edit-product-popup-form input").val('');
//     $(".edit-product-popup").fadeOut();
//     $(".dashboard-footer").fadeIn();
//     $(".prdct-table").fadeIn();
//     $(".add-product-bttn").fadeIn();
//     $("#prdct-dashboard-msg").fadeIn();
// });





$(document).ready(function(){
    $(".prdct-edit").click(function(){
        $(".edit-product-popup").show();
        // $(".dashboard-footer").fadeOut();
        $("#prdct-dashboard-msg").fadeOut();
        $(".prdct-table").fadeOut();
        $(".add-product-bttn").fadeOut();
        $(".prdct-filter-container").fadeOut();
        
    });
    $(".edit-prdct-cancel").click(function(){
        $(".add-product-bttn").fadeIn();
        $(".prdct-table").fadeIn();
        $(".dashboard-footer").fadeIn();
        $(".edit-product-popup").fadeOut();
        location.reload();
    });
    $('#prdct-quantity').bind('input', function() {
        var data = $(this).val();
        $(this).val(data.replace(/[^0-9]/gi, ''));
      });
      $(".edit-prdct-submit").click(function(){
        var productName = $("#edit-prdct-name").val();
        var productPrice = $("#edit-prdct-price").val();
        var productQuantity = $("#edit-prdct-quantity").val();
        var status = $("#edit-prdct-status").val();
        var productCtg = $("#edit-prdct-ctg").find(":selected").text();
        var productImg = $("#edit-prdct-img").val();
        if ($.trim(productName) == '' || $.trim(productPrice) == '' || $(productQuantity) == '' || (!$('#prdct-img').val())){
            if ($.trim(productName) == '') {
                $(".edit-prdct-error").html('Product Name is required.');
                $("#edit-prdct-name").css({'border': '1px solid red'});
            } else if ($.trim(productPrice) == ''){
                $(".edit-prdct-error").html('Product Price is required.');
                $("#edit-prdct-price").css({'border': '1px solid red'});
            } else if ($.trim(productQuantity) == '') {
                $(".edit-prdct-error").html('Product Quantity is required.');
                $("#edit-prdct-quantity").css({'border': '1px solid red'});
            } else if (!$('#prdct-img').val()) {
                $(".edit-prdct-error").html('Product Image is required.');
                $("#edit-fileupload").css({'border': '1px solid red'});
            } 
        } else {
            $(".edit-ctgory-error").html('');
        }
    });
});

$(document).ready(function(){
    $(".edit-prdct-submit").on('click', function(){
        var id = $("#update-prdct").val();
        var upd_form = 'update';
        var productName = $("#edit-prdct-name").val();
        var productPrice = $("#edit-prdct-price").val();
        var productQuantity = $("#edit-prdct-quantity").val();
        var status = $("#edit-prdct-status").val();
        var productCtg = $("#edit-prdct-ctg").find(":selected").text();
        var productImg = $("#edit-prdct-img").val();
        $.ajax({
            type: "POST",
            url: 'prdct-edit.php',
            data: {id: id, upd_form:upd_form, productName: productName, productPrice: productPrice, productQuantity: productQuantity, status: status, productCtg: productCtg, productImg: productImg},
            success: function(response) {   
                if (response == 1) {
                    $(".edit-prdct-popup").fadeOut();
                    $(".prdct-table").fadeIn();
                    $(".dashboard-footer").fadeIn();
                    $(".add-product-bttn").fadeIn();
                    $("#prdct-reload").load(location.href + " #prdct-reload");
                }
            }
        })
    });
});

// DELETE BUTTON FUNCTION

function delFunction(id){
    if (confirm("Are you sure, You want to delete the Product?")) {
    $.ajax({
        type: 'POST',
        url: 'prdct-delete.php',
        data: {id: id},
        success: function(response){
            if (response==2){  
                $("#prdct-reload").load(location.href + " #prdct-reload");              
                $("#prdct-row_".id).fadeOut();
                $("#prdct-dashboard-msg").html('Product Deleted successfully.');
                $("#prdct-dashboard-msg").css({'color': 'red'});
                $("#prdct-dashboard-msg").fadeIn();
                $("#prdct-dashboard-msg").fadeOut(3000);
                }
            }
        });
    }
}
