function viewOrder(id){
    window.location = ("/intern-project/admin/vieworders.php?id="+btoa(id));
}
$(document).ready(function(){
    $('.view-order-update-bttn').on('click', function(){
        var order_update = 'update_form';
        var id = $('#update-order-status').val();
        var status = $('#view-order-status').val();
        $.ajax({
            type: 'POST',
            url: 'order-update.php',
            data: {order_update: order_update, id: id, status: status},
            success: function(response){
                if(response == '1'){
                    alert('Order Status Updated Successfully');
                    window.location = ("/intern-project/admin/orders.php");
                }  
            }
        });
    });
});

function filterByStatus(status){
    $.ajax({
        type: "POST",
        url: "status-filter.php",
        data: {status:status},
        success: function(response){
            var filter = JSON.parse(response);
            if (filter.length > 0){
                $('#orders-body').hide();
                $('#orders-filter-body').show();
                $('#orders-filter-body').html('');
                $.each(filter, function (index, filter) {
                    var date = new Date(filter.reg_date);
                    var formattedDate = (date.getDate() + " " + date.toLocaleString('default', { month: 'short' }) + ", " + date.getFullYear());
                    var newRow = `
                        <tr>
                            <td>${index+1}</td>
                            <td>${filter.productName}</td>
                            <td>${filter.quantity}</td>
                            <td>$${filter.total}</td>
                            <td>${getStatusText(filter.status)}</td>
                            <td>${formattedDate}</td>
                            <td><button class="order-view-bttn" onclick="viewOrder(${filter.id})">View</button></td>
                        </tr>`;
                    $("#orders-filter-body").append(newRow);
                });
            } else {
                $("#orders-filter-body").html('<tr><td colspan="9">No products found for the selected category.</td></tr>');
            }
        }
    });
}

function toggleDropdown() {
    var dropdown = document.querySelector(".order-status-dropdown-content");
    dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
}

function getStatusText(status) {
    if (status ==1) {
        return 'Pending';
    } else if (status ==2){
        return 'Processing';
    } else if ( status == 3){
        return 'Shipped';
    } else if (status == 4){
        return 'Delivered';
    } else if (status == 0 ){
        return 'Cancelled';
    }
}