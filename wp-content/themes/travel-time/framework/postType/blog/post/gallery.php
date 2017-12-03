<?php
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version		1.0.6
 * 
 * Blog Post Gallery Post Format Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = travel_time_get_global_options();


$cmsmasters_post_title = get_post_meta(get_the_ID(), 'cmsmasters_post_title', true);

$cmsmasters_post_images = explode(',', str_replace(' ', '', str_replace('img_', '', get_post_meta(get_the_ID(), 'cmsmasters_post_images', true))));


list($cmsmasters_layout) = travel_time_theme_page_layout_scheme();

if ($cmsmasters_layout == 'fullwidth') {
	$cmsmasters_image_thumb_size = 'cmsmasters-full-thumb';
} else {
	$cmsmasters_image_thumb_size = 'post-thumbnail';
}


$uniqid = uniqid();

?>

<!--_________________________ Start Gallery Article _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_open_post'); ?>>
	<?php 	
	if ($cmsmasters_post_title == 'true') {
		travel_time_post_title_nolink(get_the_ID(), 'h1');
	}
	
	echo '<div class="cmsmasters_post_cont_wrap">';
		
		if (
			$cmsmasters_option['travel-time' . '_blog_post_date'] || 
			$cmsmasters_option['travel-time' . '_blog_post_like'] || 
			$cmsmasters_option['travel-time' . '_blog_post_comment'] 
		) {
			echo '<div class="cmsmasters_post_cont_info_top entry-meta">';
			
				travel_time_get_post_date('post');
								
				travel_time_get_post_likes('post');
					
				travel_time_get_post_comments('post');
							
			echo '</div>';
		}	
		
		if (
			$cmsmasters_option['travel-time' . '_blog_post_author'] || 
			$cmsmasters_option['travel-time' . '_blog_post_cat'] 
		) {
			echo '<div class="cmsmasters_post_cont_info entry-meta">';
				
				travel_time_get_post_author('post');
				
				travel_time_get_post_category(get_the_ID(), 'category', 'post');
				
			echo '</div>';
		}
	
		if (
			sizeof($cmsmasters_post_images) > 1 || 
			get_the_content() != ''
		){

			echo '<div class="cmsmasters_post_content entry-content">';

				if (!post_password_required()) {
					if (sizeof($cmsmasters_post_images) > 1) {
				?>
						<script type="text/javascript">
							jQuery(document).ready(function () {
								jQuery('.cmsmasters_slider_<?php echo esc_attr($uniqid); ?>').owlCarousel( { 
									singleItem : 		true, 
									transitionStyle : 	false, 
									rewindNav : 		true, 
									slideSpeed : 		200, 
									paginationSpeed : 	800, 
									rewindSpeed : 		1000, 
									autoPlay : 			false, 
									stopOnHover : 		false, 
									pagination : 		true, 
									navigation : 		false, 
									navigationText : 	[ 
										'<span></span>', 
										'<span></span>' 
									] 
								} );
							} );
						</script>
						<div id="cmsmasters_owl_carousel_<?php the_ID(); ?>" class="cmsmasters_slider_<?php echo esc_attr($uniqid); ?> cmsmasters_owl_slider">
						<?php 
							foreach ($cmsmasters_post_images as $cmsmasters_post_image) {
								$image_atts = wp_prepare_attachment_for_js(strstr($cmsmasters_post_image, '|', true));
								
								
								echo '<div>' . 
									'<figure>' . 
										wp_get_attachment_image(strstr($cmsmasters_post_image, '|', true), $cmsmasters_image_thumb_size, false, array( 
											'class' => 	'full-width', 
											'alt' => ($image_atts['alt'] != '') ? esc_attr($image_atts['alt']) : cmsmasters_title(get_the_ID(), false), 
											'title' => ($image_atts['title'] != '') ? esc_attr($image_atts['title']) : cmsmasters_title(get_the_ID(), false) 
										)) . 
									'</figure>' . 
								'</div>';
							}
						?>
						</div>
					<?php 
					} elseif (sizeof($cmsmasters_post_images) == 1 && $cmsmasters_post_images[0] != '') {
						travel_time_thumb(get_the_ID(), $cmsmasters_image_thumb_size, false, 'img_' . get_the_ID(), true, true, true, true, $cmsmasters_post_images[0]);
					} elseif (has_post_thumbnail()) {
						travel_time_thumb(get_the_ID(), $cmsmasters_image_thumb_size, false, 'img_' . get_the_ID(), true, true, true, true, false);
					}
				}
					
				if (get_the_content() != '') {
					the_content();
					
					wp_link_pages(array( 
						'before' => '<div class="subpage_nav">' . '<strong>' . esc_html__('Pages', 'travel-time') . ':</strong>', 
						'after' => '</div>', 
						'link_before' => '<span>', 
						'link_after' => '</span>' 
					));
				}
					
			echo '</div>';
		}
		
		
		if (
			$cmsmasters_option['travel-time' . '_blog_post_tag']
		) {
			echo '<footer class="cmsmasters_post_footer entry-meta">';
				
				travel_time_get_post_tags();
				
			echo '</footer>';
		}
			
		if ($cmsmasters_option['travel-time' . '_blog_post_nav_box']) {
			travel_time_prev_next_posts();
		}

	echo '</div>';	
	
	?>	
</article>
<!--_________________________ Finish Gallery Article _________________________ -->

