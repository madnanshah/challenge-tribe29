$( document ).ready(function() {
    console.log("ok");
    $.ajax({
        url: "all-subscribers",
        type: 'GET',
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError);            
        },
        dataType: 'json',
        success: function(response) {
            $.each(response, function(i, item) {
                var $tr = $('<tr>').append(
                    $('<td>').text(item[0]),
                    $('<td>').text(item[1].replaceAll('"','')),
                    $('<td>').text(item[2])
                ).appendTo('#subscribers_table');
            });
        }
    });
});