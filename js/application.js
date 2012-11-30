(function($) {
    $('#spinner').ajaxStart(function() {
            $(this).fadeIn();
    }).ajaxStop(function() {
            $(this).fadeOut();
    });
    $.ajax({
        type: "POST",
        data: {
            service: "getAllVendors"
        },
        beforeSend: function(jqXHR, settings) {},
        success: function(response, textStatus, jqXHR) {
            alert(JSON.stringify(response));
            
        },
        complete: function(jqXHR, textStatus) {
            
        }
    });


})(jQuery);
