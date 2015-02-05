function showOffer() {
jQuery('#addtocart').show();
jQuery('#checkout-products input:radio').eq(0).click();
}

jQuery(function($) {
/* button timing & clicking */
var addbtn = $('#addtocart');
addbtn.click(function(e) {
e.preventDefault();
$(this).hide();
$('#theformhere').show();
});
setTimeout(showOffer, 60000);
/* form cleanup */
var bd = $('#customer_details');
bd.children(':first').next().hide().prev().find('h3:first').html('Contact Information');
// all wide
bd.find('.form-row-first, .form-row-last').removeClass('form-row-first').removeClass('form-row-last').addClass('form-row-wide');
// no 2 col forms
setTimeout(function() { bd.removeClass('col2-set').children('.col-1').removeClass('col-1'); }, 100);
$('#order_review_heading').html('Total Amount You Pay Right Now');
$("#opc-product-selection").insertBefore('#order_review_heading').prepend('<h3>Product Purchase Plan</h3>');
$('#billing_phone').parent().next().after('<h3>Billing Address</h3>');
bd.parents('form').find('h3').addClass('sale-header');
});