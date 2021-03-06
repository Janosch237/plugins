(function($){

    'use strict'

    /****
     * Grab guest user info
     */

    if( yith_ywrac_frontend.is_guest == '1' ){

        var inp_email = $('#billing_email'),
            first_name = $('#billing_first_name'),
            last_name = $('#billing_last_name'),
            phone = $('#billing_phone'),
            is_valid_email = function (email) {
                var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
                return pattern.test(email);
            };

        inp_email.on('change', function(){
            var $t = $(this);
            if( is_valid_email( $t.val() ) === true ){
                $.post(yith_ywrac_frontend.ajaxurl, {
                    action    : 'ywrac_grab_guest',
                    email     : $t.val(),
                    first_name: first_name.val(),
                    last_name : last_name.val(),
                    currency  : yith_ywrac_frontend.currency,
                    language  : yith_ywrac_frontend.language,
                    context   : 'frontend',
                    phone     : phone.val(),
                    security  : yith_ywrac_frontend.grab_guest_nonce
                }, function ( resp ) {

                });
            }
        });

        phone.on( 'change,click', function(){

            var mail = inp_email.val();

            if( mail && is_valid_email( mail ) === true ) {

                $.post(yith_ywrac_frontend.ajaxurl, {
                    action    : 'ywrac_grab_guest_phone',
                    first_name: first_name.val(),
                    last_name : last_name.val(),
					language  : yith_ywrac_frontend.language,
                    email     : inp_email.val(),
                    context   : 'frontend',
                    phone     : phone.val(),
                    currency  : yith_ywrac_frontend.currency,
                    security  : yith_ywrac_frontend.grab_guest_phone_nonce
                }, function (resp) {

                });
            }
        });
    }

})(jQuery);