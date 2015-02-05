<?php
/*
Plugin Name: SMN Woo Cleanup
Plugin URI: https://github.com/ninthlink/nlk-plugins/tree/master/smn-woo-cleanup
Description: Hooks to some Woo Commerce filters and actions to re-arrange and clean up some things?
Author: alex chousmith
Version: 0.1
Author URI: http://www.ninthlink.com
*/

add_filter( 'woocommerce_checkout_fields', 'smn_woo_cleanup_check_fields' );

function smn_woo_cleanup_check_fields( $fields ) {
  // and then?
  echo '<div title="alex dbg here" style="display:none"><pre>'. print_r($fields,true) .'</pre></div>';

  // reorder billing fields
  $order = array(
        "billing_first_name" => "First Name", 
        "billing_last_name" => "Last Name", 
        "billing_email" => "Email", 
        "billing_phone" => "Phone",
        "billing_address_1" => "Street Address 1", 
        "billing_address_2" => "Street Address 2", 
        "billing_city" => "City", 
        "billing_state" => "State", 
        "billing_postcode" => "Postal Code", 
        "billing_country" => "Country"
    );
    foreach ($order as $field => $label) {
        $ordered_fields[$field] = $fields["billing"][$field];
        $ordered_fields[$field]['label'] = $label;
    }
    $fields["billing"] = $ordered_fields;

  // unset 'shipping' & 'order notes' ?
  unset( $fields['shipping'] );
  unset( $fields['order'] );
  return $fields;
}

function smn_woo_cleanup_scripts() {
	if ( is_page('strongmarriagevideo-tw') ) {
		wp_enqueue_script(
			'smnvlanding',
			plugins_url( '/vlanding.js', __FILE__ ),
			array( 'jquery' ),
			'0.1',
			true
		);
		wp_enqueue_style(
			'smnvlanding',
			plugins_url( '/vlanding.css', __FILE__ )
		);
	}
}

add_action( 'wp_enqueue_scripts', 'smn_woo_cleanup_scripts' );
 
function smn_woo_cleanup_order_redirect() {
	global $wp;
	
	if ( is_checkout() && ! empty( $wp->query_vars['order-received'] ) ) {
/*
$wp->query_vars['order-received'] = the order ID, like 18457
http://dev.strongmarriagenow.com/wp-admin/post.php?post=18457&action=edit has meta fields
infusionsoft_invoice_id = 21739
infusionsoft_order_id = 21737
infusionsoft_view_order = https://haveasweetlife.infusionsoft.com/Job/manageJob.jsp?view=edit&ID=21737
...
*/
		$wcorderid = $wp->query_vars['order-received'];
		$infusionsoft_order_id = get_post_meta( $wcorderid, 'infusionsoft_order_id', true );
		wp_redirect( home_url('/') . 'specialoffer-platinumpackage.php?orderId='. $infusionsoft_order_id );
		//wp_die('<pre>'. print_r($wp,true) .'</pre>');
		exit;
	}
}

add_action( 'template_redirect', 'smn_woo_cleanup_order_redirect' );