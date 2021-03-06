<?php
/**
 * Template to display product selection fields in a list
 *
 * @package SMN Woo Cleanup/Templates
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<table id="checkout-products">
<thead>
<tr>
<td><strong>StrongMarriageNow System: Regain Love, Rekindle Passion and Save Your Marriage</strong></td>
<td>Amt</td>
</tr>
</thead>
	<?php foreach( $products as $product ) : ?>
	<tr class="product-item <?php if ( $product->in_cart ) echo 'selected'; ?>" >
	<td>
		<?php wc_get_template( 'checkout/add-to-cart/radio.php', array( 'product' => $product ), '', PP_One_Page_Checkout::$template_path );; ?>
		<?php //echo $product->get_title(); ?>
		<?php echo $product->post->post_excerpt; ?>
		<?php if ( $product->is_type( 'variation' ) ) : ?>
			<?php $attribute_string = sprintf( '&nbsp;(%s)', wc_get_formatted_variation( $product->get_variation_attributes(), true ) ); ?>
			<span class="attributes"><?php echo esc_html( apply_filters( 'woocommerce_attribute', $attribute_string, $product->get_variation_attributes(), $product ) ); ?></span>
		<?php else : ?>
			<?php $attributes = $product->get_attributes(); ?>
			<?php foreach ( $attributes as $attribute ) : ?>
				<?php $attribute_string = sprintf( '&nbsp;(%s)', $product->get_attribute( $attribute['name'] ) ); ?>
			<span class="attributes"><?php echo esc_html( apply_filters( 'woocommerce_attribute', $attribute_string, $attribute, $product ) ); ?></span>
			<?php endforeach; ?>
		<?php endif; ?>
		<!-- span class="dash">&nbsp;&mdash;&nbsp;</span -->
		</td><td>
		<?php if ( $product->is_in_stock() ) { ?>
		<span itemprop="price" class="price"><?php echo $product->get_price_html(); ?></span>
		<?php } else {
		wc_get_template( 'checkout/add-to-cart/availability.php', array( 'product' => $product ), '', PP_One_Page_Checkout::$template_path );
		} ?>
		</td>
	</tr>
	<?php endforeach; // end of the loop. ?>
</table>
