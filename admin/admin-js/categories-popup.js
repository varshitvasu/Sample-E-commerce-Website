// ADD CATEGORY BUTTON FUNCTION AND VALIDATION
$(document).ready(function(){
    $(".add-category-bttn").click(function(){
        $(".add-category-popup").toggle();
        $(".dashboard-footer").fadeOut();
        $(".ctg-table").fadeOut();
        $(".add-category-bttn").fadeOut();
        $("#ctg-dashboard-msg").fadeOut();
    });
    $(".ctg-cancel").click(function(){
        $("#ctgory-name").val('');
        $("#ctgory-products").val('');
        $("#ctgory-status").val('1');
        location.reload();
        $(".ctgory-error").fadeOut();
        $(".add-category-bttn").fadeIn();
        $(".ctg-table").fadeIn();
        $(".dashboard-footer").fadeIn();
        $(".add-category-popup").fadeOut();
    });
    $('#ctgory-products').bind('input', function() {
        var data = $(this).val();
        $(this).val(data.replace(/[^0-9]/gi, ''));
      });
    $(".ctg-submit").click(function(){
        var categoryName = $("#ctgory-name").val();
        var productLength = $("#ctgory-products").val();
        var status = $("#ctgory-status").val();
        if ($.trim(categoryName) == '' || $.trim(productLength) == '') {
            if ($.trim(categoryName) == '') {
                $("#ctgory-name").css({'border': '1px solid red'});
                $(".ctgory-error").html('Category Name is required');
            } else if ($.trim(productLength) == ''){
                $("#ctgory-products").css({'border': '1px solid red'});
                $(".ctgory-error").html('Product Length is required');
            }
        } else {
            $(".ctgory-error").html('');
            $.ajax({
                type: 'POST',
                url: 'add-category.php', 
                data: {categoryName: categoryName, productLength: productLength, status: status},
                success: function(response){
                    if (response == 1) {
                        $("#ctg-dashboard-msg").html('Category added successfully.');
                        $("#ctg-dashboard-msg").css({'color': 'Blue'});
                        $("#ctg-dashboard-msg").fadeIn();
                        $("#ctg-dashboard-msg").fadeOut(2000);
                        $("#ctgory-name").val('');
                        $("#ctgory-products").val('');
                        $("#ctgory-status").val('1');
                        $("#ctg-reload").load(location.href + " #ctg-reload");
                        $(".add-category-popup").fadeOut();
                        $(".ctg-table").fadeIn();
                        $(".dashboard-footer").fadeIn();
                        $(".add-category-bttn").fadeIn();
                    } else {
                        console.log(response);   
                    }   
                }
            })
        }
    });
}); 

//EDIT BUTTON FUNCTION AND VALIDATION

function editFunction(id){
    var edit_form = 'edit';
    $.ajax({
        type: "POST",   
        url: 'ctg-edit.php',
        data: {id: id, edit_form:edit_form},
        success: function(response) {
            var sample = jQuery.parseJSON(response);
            $("#edit-ctgory-name").val(sample.category_name);
            $("#edit-ctgory-products").val(sample.No_of_products);
            $("#edit-ctgory-status").val(sample.status);
            $("#update-ctg").val(sample.id);
        }
    })
}

$(document).ready(function(){
    $(".ctg-edit").click(function(){
        $(".edit-category-popup").fadeIn();
        $(".dashboard-footer").fadeOut();
        $("#ctg-dashboard-msg").fadeOut();
        $(".ctg-table").fadeOut();
        $(".add-category-bttn").fadeOut();
    });
    $(".edit-ctg-cancel").click(function(){
        $(".add-category-bttn").fadeIn();
        $(".ctg-table").fadeIn();
        $(".dashboard-footer").fadeIn();
        $(".edit-category-popup").fadeOut();
        location.reload();
    });
    $('#edit-ctgory-products').bind('input', function() {
        var data = $(this).val();
        $(this).val(data.replace(/[^0-9]/gi, ''));
      });
    $(".edit-ctg-submit").click(function(){
        var id = $(".ctg-edit").val();
        var categoryName = $("#edit-ctgory-name").val();
        var productLength = $("#edit-ctgory-products").val();
        var status = $("#edit-ctgory-status").val();
        if ($.trim(categoryName) == '' || $.trim(productLength) == '') {
            if ($.trim(categoryName) == '') {
                $("#edit-ctgory-name").css({'border': '1px solid red'});
                $(".edit-ctgory-error").html('Category Name is required');
            } else if ($.trim(productLength) == ''){
                $("#edit-ctgory-products").css({'border': '1px solid red'});
                $(".edit-ctgory-error").html('Product Length is required');
            }
        } else {
            $(".edit-ctgory-error").html('');    
        }
    });
});
$(document).ready(function(){
    $(".edit-ctg-submit").on('click', function(){
        var id = $("#update-ctg").val();
        var update_form = 'update';
        var categoryName = $("#edit-ctgory-name").val();
        var productLength = $("#edit-ctgory-products").val();
        var status = $("#edit-ctgory-status").val();
        $.ajax({
            type: "POST",
            url: 'ctg-edit.php',
            data: {id: id, update_form:update_form, categoryName:categoryName, productLength:productLength, status:status},
            success: function(response) {
                if (response == 1) {
                    $(".edit-category-popup").fadeOut();
                    $(".ctg-table").fadeIn();
                    $(".dashboard-footer").fadeIn();
                    $(".add-category-bttn").fadeIn();
                    $("#ctg-reload").load(location.href + " #ctg-reload");
                }
            }
        })
    
    });
});

//DELETE BUTTON FUNCTION

function deleteFunction(id){
    if (confirm("Are you sure, You want to delete the Category?")) {
    $.ajax({
        type: 'POST',
        url: 'ctg-delete.php',
        data: {id: id},
        success: function(response){
            if (response==2){                
                $("#ctgory-row_".id).fadeOut();
                $("#ctg-dashboard-msg").html('Category Deleted successfully.');
                $("#ctg-dashboard-msg").css({'color': 'red'});
                $("#ctg-dashboard-msg").fadeIn();
                $("#ctg-dashboard-msg").fadeOut(3000);
                $("#ctg-reload").load(location.href + " #ctg-reload");
                }
            }
        })
    }
}
