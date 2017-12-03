<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/review.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 * 
 * @cmsmasters_package 	Travel Time
 * @cmsmasters_version 	1.0.0
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<li itemprop="review" itemscope itemtype="http://schema.org/Review" <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	<div id="comment-<?php comment_ID(); ?>" class="comment_container cmsmasters_comment_item">

		<?php
		
		/**
		 * The woocommerce_review_before hook
		 *
		 * @hooked woocommerce_review_display_gravatar - 10
		 */
		 
		remove_action( 'woocommerce_review_before', 'woocommerce_review_display_gravatar', 10 );
		
		do_action( 'woocommerce_review_before', $comment );
		
		?>
		<figure class="cmsmasters_comment_item_avatar">
			<?php echo get_avatar( $comment, apply_filters( 'woocommerce_review_gravatar_size', '70' ), '' ); ?>
		</figure>
		<div class="comment-text cmsmasters_comment_item_cont">
			<div class="cmsmasters_comment_item_cont_info">
				<h4 class="cmsmasters_comment_item_title" itemprop="author"><?php 
					comment_author(); 
					
					if ( get_option( 'woocommerce_review_rating_verification_label' ) === 'yes' )
						if ( wc_customer_bought_product( $comment->comment_author_email, $comment->user_id, $comment->comment_post_ID ) )
							echo '<em class="verified">(' . esc_html__( 'verified owner', 'woocommerce' ) . ')</em> ';
				?></h4>
				<?php travel_time_woocommerce_rating('cmsmasters_theme_icon_star_empty', 'cmsmasters_theme_icon_star_full', true, $comment->comment_ID); ?>
			</div>
			<time class="cmsmasters_comment_item_date" itemprop="datePublished" datetime="<?php echo get_comment_date(); ?>"><?php echo get_comment_date(); ?></time>
			<div itemprop="description" class="description cmsmasters_comment_item_content">
				<?php 
				
					do_action( 'woocommerce_review_before_comment_text', $comment );

					/**
					 * The woocommerce_review_comment_text hook
					 *
					 * @hooked woocommerce_review_display_comment_text - 10
					 */
					
					remove_action( 'woocommerce_review_comment_text', 'woocommerce_review_display_comment_text', 10 );
					 
					do_action( 'woocommerce_review_comment_text', $comment );

					comment_text();
					
					do_action( 'woocommerce_review_after_comment_text', $comment );
				
				/**
				 * The woocommerce_review_before_comment_meta hook.
				 *
				 * @hooked woocommerce_review_display_rating - 10
				 */
				remove_action( 'woocommerce_review_before_comment_meta', 'woocommerce_review_display_rating', 10 );
				
				do_action( 'woocommerce_review_before_comment_meta', $comment );
				
				if ($comment->comment_approved == '0') {
					echo '<p class="meta">' . 
						'<em>' . esc_html__( 'Your comment is awaiting approval', 'woocommerce' ) . '</em>' . 
					'</p>';
				}
				
				/**
				 * The woocommerce_review_meta hook.
				 *
				 * @hooked woocommerce_review_display_meta - 10
				 */
				remove_action( 'woocommerce_review_meta', 'woocommerce_review_display_meta', 10 );
				 
				do_action( 'woocommerce_review_meta', $comment );
				?>
			</div>
		</div>
	</div>
