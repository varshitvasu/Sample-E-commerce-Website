function catFilter(id){
    $.ajax({
        type: "POST",
        url: "category-filter.php",
        data: {id:id},
        success: function (response) {
            var filter = jQuery.parseJSON(response);
            if (filter.length > 0){
                $("#prdct-body").hide();
                $("#prdct-filter-body").show();
                $("#prdct-filter-body").html('');
                $.each(filter, function (index, filter) {
                    var date = new Date(filter.pr_Reg_Date);
                    var formattedDate = (date.getDate() + " " + date.toLocaleString('default', { month: 'short' }) + ", " + date.getFullYear());
                    var newRow = `               
                        <tr id="prdct-row_${filter.productID}">
                            <td>${index+1}</td>
                            <td><img src="product-images/${filter.pr_productImage}" alt="Product Image" style="width: 50px; height: 50px;"></td>
                            <td>${filter.pr_productName}</td>
                            <td>${filter.pr_productPrice}</td>
                            <td>${filter.pr_productQuantity}</td>
                            <td>${filter.pr_Status == 1 ? 'Active' : 'Deactive'}</td>
                            <td>${filter.category_name}</td>
                            <td>${formattedDate}</td>
                            <td><button class="prdct-edit" style="cursor: pointer;" onclick="edFunction(${filter.productID})">Edit</button> |  <button class="prdct-delete" style="cursor: pointer;" onclick="delFunction(${filter.productID})">Delete</button>
                            </td>
                        </tr>`;
                    $("#prdct-filter-body").append(newRow);
                });
            } else {
                $("#prdct-filter-body").html('<tr><td colspan="9">No products found for the selected category.</td></tr>');
            }
        }
    });
}
        