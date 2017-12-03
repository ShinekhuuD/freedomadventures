<?php
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version		1.0.6
 * 
 * Blog Post Audio Post Format Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = travel_time_get_global_options();


$cmsmasters_post_title = get_post_meta(get_the_ID(), 'cmsmasters_post_title', true);

$cmsmasters_post_audio_links = get_post_meta(get_the_ID(), 'cmsmasters_post_audio_links', true);

?>

<!--_________________________ Start Audio Article _________________________ -->

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
			sizeof($cmsmasters_post_audio_links) > 0 || 
			get_the_content() != ''
		){

			echo '<div class="cmsmasters_post_content entry-content">';
					
				if (!post_password_required() && !empty($cmsmasters_post_audio_links) && sizeof($cmsmasters_post_audio_links) > 0) {
					$attrs = array(
						'preload' => 'none'
					);
					
					
					foreach ($cmsmasters_post_audio_links as $cmsmasters_post_audio_link_url) {
						$attrs[substr(strrchr($cmsmasters_post_audio_link_url, '.'), 1)] = $cmsmasters_post_audio_link_url;
					}
					
					
					echo '<div class="cmsmasters_audio">' . 
						wp_audio_shortcode($attrs) . 
					'</div>';
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
<!--_________________________ Finish Audio Article _________________________ -->

