(function ($) {
    jQuery('#woocommerce-product-data').find('.product_data .hidden').each(function(){jQuery(this).removeClass('hidden');});
    jQuery('#product-type').trigger('change');
})(jQuery);
