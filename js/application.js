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
            $.each(response.vendors,function(index,vendor) {
                $('<option />').html(vendor.VendorName).val(vendor.VendorNo).appendTo($('select#vendors'));
            });
        },
        complete: function(jqXHR, textStatus) {
            
        }
    });


})(jQuery);
