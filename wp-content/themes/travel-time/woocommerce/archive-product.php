<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 * 
 * @cmsmasters_package 	Travel Time
 * @cmsmasters_version 	1.0.0
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();


remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

do_action( 'woocommerce_before_main_content' );
	
	
	do_action('woocommerce_archive_description');
	
	
	if (have_posts()) : 
		
		/**
		 * woocommerce_before_shop_loop hook
		 *
		 * @hooked woocommerce_result_count - 20
		 * @hooked woocommerce_catalog_ordering - 30
		 */
		echo '<div class="cmsmasters_woo_wrap_result">';
			do_action('woocommerce_before_shop_loop');
		echo '</div>';
		
		
		woocommerce_product_loop_start();
			
			woocommerce_product_subcategories();
			
			while ( have_posts() ) : the_post();
				
				wc_get_template_part( 'content', 'product' );
			
			endwhile; // end of the loop.
		
		woocommerce_product_loop_end();

		
		/**
		 * woocommerce_after_shop_loop hook
		 *
		 * @hooked woocommerce_pagination - 10
		 */
		do_action('woocommerce_after_shop_loop');

	elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : 

		wc_get_template( 'loop/no-products-found.php' );

	endif;


do_action( 'woocommerce_after_main_content' );


do_action('woocommerce_sidebar');


get_footer();

