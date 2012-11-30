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
        success: function(CellPhoneVerifyResponse, textStatus, jqXHR) {
            self._stateInfo.ForceCellPhoneVerify = CellPhoneVerifyResponse.forceVerify;
        },
        complete: function(jqXHR, textStatus) {
            self._buildDisplay(self.getUrlVars().display);
            $.unblockUI();
        }
    });


})(jQuery);
