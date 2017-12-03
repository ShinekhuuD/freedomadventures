<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.1.0
 * 
 * @cmsmasters_package 	Travel Time
 * @cmsmasters_version 	1.1.0
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;
$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
$image_title       = get_post_field( 'post_excerpt', $post_thumbnail_id );


echo '<div class="images cmsmasters_product_images">';
	if (method_exists($product, 'get_available_variations')) {
		$cmsmasters_product_variable_items = $product->get_available_variations();
		
		
		echo '<div class="dn">';
		foreach ($cmsmasters_product_variable_items as $cmsmasters_product_variable_item) {
			if ($cmsmasters_product_variable_item['image']['full_src'] != '') {
				echo '<a href="' . esc_url($cmsmasters_product_variable_item['image']['full_src']) . '" itemprop="image" title="' . esc_attr($cmsmasters_product_variable_item['image']['title']) . '" rel="ilightbox[cmsmasters_product_gallery]"></a>';
			}
		}
		echo '</div>';
	}
	
	
	$attributes = array(
		'title'                   => $image_title,
		'data-src'                => $full_size_image[0],
		'data-large_image'        => $full_size_image[0],
		'data-large_image_width'  => $full_size_image[1],
		'data-large_image_height' => $full_size_image[2],
	);
	
	
	if (has_post_thumbnail()) {
		$html  = '<div data-thumb="' . get_the_post_thumbnail_url( $post->ID, 'shop_thumbnail' ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_size_image[0] ) . '" class="cmsmasters_product_image" rel="ilightbox[cmsmasters_product_gallery]">';
		$html .= get_the_post_thumbnail( $post->ID, 'shop_single', $attributes );
		$html .= '</a></div>';
	} else {
		$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
		$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
		$html .= '</div>';
	}
	
	
	echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post->ID ) );
	
	
	do_action('woocommerce_product_thumbnails');

echo '</div>';

