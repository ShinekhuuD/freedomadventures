<?php
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version 	1.0.8
 * 
 * Website WooCommerce Functions
 * Created by CMSMasters
 * 
 */


/* Woocommerce Dynamic Cart */
function travel_time_woocommerce_cart_dropdown() {
	global $woocommerce;
	
	$output = '<div class="cmsmasters_dynamic_cart">' .  
		'<a href="' . esc_url($woocommerce->cart->get_cart_url()) . '" class="cmsmasters_dynamic_cart_button cmsmasters_theme_icon_basket"></a>' . 
		'<div class="widget_shopping_cart_content"></div>' . 
	'</div>';
	
	
	echo $output;
}


/* Woocommerce Add to Cart Button */
function travel_time_woocommerce_add_to_cart_button() {
	global $woocommerce, 
		$product;	
	
	$travel_time_woocommerce_button_class = '';
	
	if ( 
		$product->is_purchasable() && 
		$product->is_type( 'simple' ) && 
		$product->is_in_stock() 
	) {
		$travel_time_woocommerce_button_class = 'cmsmasters_woo_multiply_btn';
		
		echo '<a href="' . esc_url($product->add_to_cart_url()) . '" data-product_id="' . esc_attr($product->get_id()) . '" data-product_sku="' . esc_attr($product->get_sku()) . '" class="button ' . $travel_time_woocommerce_button_class . ' cmsmasters-icon-basket-alt add_to_cart_button cmsmasters_add_to_cart_button product_type_simple ajax_add_to_cart" title="' . esc_attr__('Add to Cart', 'travel-time') . '">' . 
			'<span>' . esc_html__('Add to Cart', 'travel-time') . '</span>' . 
		'</a>' . 
		'<a href="' . esc_url($woocommerce->cart->get_cart_url()) . '" class="button ' . $travel_time_woocommerce_button_class . ' cmsmasters-icon-check-1 added_to_cart cmsmasters_view_cart_button wc-forward" title="' . esc_attr__('View Cart', 'travel-time') . '">' . 
			'<span>' . esc_html__('View Cart', 'travel-time') . '</span>' . 
		'</a>';
	}
	
	
	echo '<a href="' . esc_url(get_permalink($product->get_id())) . '" data-product_id="' . esc_attr($product->get_id()) . '" data-product_sku="' . esc_attr($product->get_sku()) . '" class="button ' . $travel_time_woocommerce_button_class . ' cmsmasters-icon-list-2 cmsmasters_details_button">' . 
		'<span>' . esc_html__('View Details', 'travel-time') . '</span>' . 
	'</a>';
}


/* Woocommerce Rating */
function travel_time_woocommerce_rating($icon_trans = '', $icon_color = '', $in_review = false, $comment_id = '', $show = true) {
	global $product;
	
	
	if (get_option( 'woocommerce_enable_review_rating') === 'no') {
		return;
	}
	
	
	$rating = (($in_review) ? intval(get_comment_meta($comment_id, 'rating', true)) : ($product->get_average_rating() ? $product->get_average_rating() : '0'));
	
	$itemprop = $in_review ? 'reviewRating' : 'aggregateRating';
	
	$itemtype = $in_review ? 'Rating' : 'AggregateRating';
	
	
	$out = "
<div class=\"cmsmasters_star_rating\" itemprop=\"{$itemprop}\" itemscope itemtype=\"http://schema.org/{$itemtype}\" title=\"" . sprintf(esc_html__('Rated %s out of 5', 'travel-time'), $rating) . "\">
<div class=\"cmsmasters_star_trans_wrap\">
	<span class=\"{$icon_trans} cmsmasters_star\"></span>
	<span class=\"{$icon_trans} cmsmasters_star\"></span>
	<span class=\"{$icon_trans} cmsmasters_star\"></span>
	<span class=\"{$icon_trans} cmsmasters_star\"></span>
	<span class=\"{$icon_trans} cmsmasters_star\"></span>
</div>
<div class=\"cmsmasters_star_color_wrap\" style=\"width:" . (($rating / 5) * 100) . "%\">
	<div class=\"cmsmasters_star_color_inner\">
		<span class=\"{$icon_color} cmsmasters_star\"></span>
		<span class=\"{$icon_color} cmsmasters_star\"></span>
		<span class=\"{$icon_color} cmsmasters_star\"></span>
		<span class=\"{$icon_color} cmsmasters_star\"></span>
		<span class=\"{$icon_color} cmsmasters_star\"></span>
	</div>
</div>
<span class=\"rating dn\"><strong itemprop=\"ratingValue\">" . esc_html($rating) . "</strong> " . esc_html__('out of 5', 'travel-time') . "</span>
</div>
";
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}


/* Woocommerce Price Format */
function travel_time_woocommerce_price_format($format, $currency_pos) {
	$format = '%2$s<span>%1$s</span>';

	switch ( $currency_pos ) {
		case 'left' :
			$format = '<span>%1$s</span>%2$s';
		break;
		case 'right' :
			$format = '%2$s<span>%1$s</span>';
		break;
		case 'left_space' :
			$format = '<span>%1$s&nbsp;</span>%2$s';
		break;
		case 'right_space' :
			$format = '%2$s<span>&nbsp;%1$s</span>';
		break;
	}
	
	return $format;
}
 
add_action('woocommerce_price_format', 'travel_time_woocommerce_price_format', 1, 2);


add_theme_support('woocommerce');


add_filter('woocommerce_enqueue_styles', '__return_false');

