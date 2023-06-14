function deFunction(id){
    if (confirm("Are you sure, You want to delete the Query?")) {

    $.ajax({
        type: "POST",
        url: "query-delete.php",
        data: {id:id},
        success: function(response){
            if(response == 2){
                $("#query-row_".id).fadeOut();
                $("#query-dashboard-msg").html('Query Deleted successfully.');
                $("#query-dashboard-msg").css({'color': 'red'});
                $("#query-dashboard-msg").fadeIn();
                $("#query-dashboard-msg").fadeOut(3000);
                $("#query-reload").load(location.href + " #query-reload");
            }
        }
    });
}}

$(document).ready(function () {
    $('.read-more-btn').click(function () {
        var message = $(this).data('message');
        $('.read-more-content').text(message);
        $('.read-more-popup').fadeIn();
    });
    $('.query-message-close').click(function(){
        $('.read-more-popup').fadeOut();
    });
});


