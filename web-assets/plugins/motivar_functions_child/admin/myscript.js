(function($) {
    "use strict";
    $(document).ready(function() {
        $(window).resize(function() {
            myresize();
        });

        /* Disable editing functionality on contacts title*/
        $('.post-type-mr_contacts #title').attr("disabled", "disabled");

        /*Enable only one taxonomy selection*/
        var taxonomies = ['mr_industry', 'mr_contact_type'];
        if (taxonomies.length > 0) {
            $.each(taxonomies, function(index, value) {
                if ($('#' + value + 'div').length > 0) {
                    $('#' + value + '-all input[type=checkbox]').on('change', function() {
                        $('#' + value + '-all input[type=checkbox]').not(this).prop('checked', false);
                    });
                }
            });
        }


    });

    function myresize() {

    }

})(jQuery);
