<?php
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version		1.0.6
 * 
 * Video Tour Format Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = travel_time_get_global_options();


$cmsmasters_project_title = get_post_meta(get_the_ID(), 'cmsmasters_project_title', true);

$cmsmasters_project_features = get_post_meta(get_the_ID(), 'cmsmasters_project_features', true);


$cmsmasters_project_link_text = get_post_meta(get_the_ID(), 'cmsmasters_project_link_text', true);
$cmsmasters_project_link_url = get_post_meta(get_the_ID(), 'cmsmasters_project_link_url', true);
$cmsmasters_project_link_target = get_post_meta(get_the_ID(), 'cmsmasters_project_link_target', true);


$cmsmasters_project_video_type = get_post_meta(get_the_ID(), 'cmsmasters_project_video_type', true);
$cmsmasters_project_video_link = get_post_meta(get_the_ID(), 'cmsmasters_project_video_link', true);
$cmsmasters_project_video_links = get_post_meta(get_the_ID(), 'cmsmasters_project_video_links', true);


$cmsmasters_project_details_title = get_post_meta(get_the_ID(), 'cmsmasters_project_details_title', true);


$cmsmasters_project_type = get_post_meta(get_the_ID(), 'cmsmasters_project_type', true);

$cmsmasters_project_icon = get_post_meta(get_the_ID(), 'cmsmasters_project_icon', true);

$cmsmasters_project_duration = get_post_meta(get_the_ID(), 'cmsmasters_project_duration', true);

$cmsmasters_project_participants = get_post_meta(get_the_ID(), 'cmsmasters_project_participants', true);

$cmsmasters_project_price = get_post_meta(get_the_ID(), 'cmsmasters_project_price', true);

$cmsmasters_project_features_one_title = get_post_meta(get_the_ID(), 'cmsmasters_project_features_one_title', true);
$cmsmasters_project_features_one = get_post_meta(get_the_ID(), 'cmsmasters_project_features_one', true);

$cmsmasters_project_features_two_title = get_post_meta(get_the_ID(), 'cmsmasters_project_features_two_title', true);
$cmsmasters_project_features_two = get_post_meta(get_the_ID(), 'cmsmasters_project_features_two', true);

$cmsmasters_project_features_three_title = get_post_meta(get_the_ID(), 'cmsmasters_project_features_three_title', true);
$cmsmasters_project_features_three = get_post_meta(get_the_ID(), 'cmsmasters_project_features_three', true);


$project_details = '';

if (
	$cmsmasters_option['travel-time' . '_portfolio_project_type'] || 
	$cmsmasters_option['travel-time' . '_portfolio_project_icon'] || 
	$cmsmasters_option['travel-time' . '_portfolio_project_duration'] || 
	$cmsmasters_option['travel-time' . '_portfolio_project_participants'] || 
	$cmsmasters_option['travel-time' . '_portfolio_project_price'] || 
	$cmsmasters_option['travel-time' . '_portfolio_project_rating'] ||
	$cmsmasters_option['travel-time' . '_portfolio_project_like'] || 
	$cmsmasters_option['travel-time' . '_portfolio_project_date'] || 
	$cmsmasters_option['travel-time' . '_portfolio_project_cat'] || 
	$cmsmasters_option['travel-time' . '_portfolio_project_comment'] || 
	$cmsmasters_option['travel-time' . '_portfolio_project_author'] || 
	$cmsmasters_option['travel-time' . '_portfolio_project_tag'] || 
	$cmsmasters_option['travel-time' . '_portfolio_project_link'] || 
	(
		!empty($cmsmasters_project_features[0][0]) && 
		!empty($cmsmasters_project_features[0][1])
	) || (
		!empty($cmsmasters_project_features[1][0]) && 
		!empty($cmsmasters_project_features[1][1])
	)
) {
	$project_details = 'true';
}


$project_sidebar = '';


if (
	$project_details == 'true' || 
	(
		!empty($cmsmasters_project_features_one[0][0]) && 
		!empty($cmsmasters_project_features_one[0][1])
	) || (
		!empty($cmsmasters_project_features_one[1][0]) && 
		!empty($cmsmasters_project_features_one[1][1])
	) || (
		!empty($cmsmasters_project_features_two[0][0]) && 
		!empty($cmsmasters_project_features_two[0][1])
	) || (
		!empty($cmsmasters_project_features_two[1][0]) && 
		!empty($cmsmasters_project_features_two[1][1])
	) || (
		!empty($cmsmasters_project_features_three[0][0]) && 
		!empty($cmsmasters_project_features_three[0][1])
	) || (
		!empty($cmsmasters_project_features_three[1][0]) && 
		!empty($cmsmasters_project_features_three[1][1])
	)
) {
	$project_sidebar = 'true';
}

?>

<!--_________________________ Start Video Tour _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_open_project'); ?>>
	<?php
	if ($cmsmasters_project_title == 'true') {
		echo '<header class="cmsmasters_project_header entry-header">';
			travel_time_project_title_nolink(get_the_ID(), 'h1');
		echo '</header>';
	}
	
	
	echo '<div class="project_content' . (($project_sidebar == 'true') ? ' with_sidebar' : '') . '">';
		echo '<div class="cmsmasters_project_content entry-content">' . "\n";
		
			if (!post_password_required()) {
				if ($cmsmasters_project_video_type == 'selfhosted' && !empty($cmsmasters_project_video_links) && sizeof($cmsmasters_project_video_links) > 0) {
					$video_size = cmsmasters_image_thumbnail_list();
					
					
					$attrs = array( 
						'preload'  => 'none', 
						'height'   => $video_size['cmsmasters-tour-full-thumb']['height'], 
						'width'    => $video_size['cmsmasters-tour-full-thumb']['width'] 
					);
					
					
					if (has_post_thumbnail()) {
						$video_poster = wp_get_attachment_image_src((int) get_post_thumbnail_id(get_the_ID()), 'cmsmasters-tour-full-thumb');
						
						
						$attrs['poster'] = $video_poster[0];
					}
					
					
					foreach ($cmsmasters_project_video_links as $cmsmasters_project_video_link_url) {
						$attrs[substr(strrchr($cmsmasters_project_video_link_url, '.'), 1)] = $cmsmasters_project_video_link_url;
					}
					
					
					echo '<div class="cmsmasters_video_wrap">' . 
						wp_video_shortcode($attrs) . 
					'</div>';
				} elseif ($cmsmasters_project_video_type == 'embedded' && $cmsmasters_project_video_link != '') {
					global $wp_embed;
					
					
					$video_size = cmsmasters_image_thumbnail_list();
					
					
					echo '<div class="cmsmasters_video_wrap">' . 
						do_shortcode($wp_embed->run_shortcode('[embed width="' . $video_size['cmsmasters-tour-full-thumb']['width'] . '" height="' . $video_size['cmsmasters-tour-full-thumb']['height'] . '"]' . $cmsmasters_project_video_link . '[/embed]')) . 
					'</div>';
				} elseif (has_post_thumbnail()) {
					travel_time_thumb(get_the_ID(), 'cmsmasters-full-masonry-thumb', false, 'img_' . get_the_ID(), true, true, false, true, false);
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
		
		if ($cmsmasters_option['travel-time' . '_portfolio_project_nav_box']) {
			travel_time_prev_next_posts();
		}

	echo '</div>';
	
	
	if ($project_sidebar == 'true') {
		echo '<div class="project_sidebar">';
			
			if ($project_details == 'true') {
				echo '<div class="project_details entry-meta">' . 
					'<h6 class="project_details_title">' . esc_html($cmsmasters_project_details_title) . '</h6>';
					
					travel_time_project_type($cmsmasters_project_type, $cmsmasters_project_icon);
					
					travel_time_project_duration($cmsmasters_project_duration, 'post');
					
					travel_time_project_participants($cmsmasters_project_participants, 'post');
					
					travel_time_project_price($cmsmasters_project_price, 'post');
					
					if (CMSMASTERS_RATING) {
						travel_time_custom_rating(get_the_ID(), 'post');
					}
					
					travel_time_get_project_likes('post');
					
					travel_time_get_project_comments('post');
					
					travel_time_get_project_author('post');
					
					travel_time_get_project_date('post');
					
					travel_time_get_project_category(get_the_ID(), 'pj-categs', 'post');
					
					travel_time_get_project_tags(get_the_ID(), 'pj-tags');
					
					travel_time_get_project_features('details', $cmsmasters_project_features, false, 'h6', true);
					
					travel_time_project_link($cmsmasters_project_link_text, $cmsmasters_project_link_url, $cmsmasters_project_link_target);
					
					
					
				echo '</div>';
			}
			
			
			travel_time_get_project_features('features', $cmsmasters_project_features_one, $cmsmasters_project_features_one_title, 'h6', true);
			
			travel_time_get_project_features('features', $cmsmasters_project_features_two, $cmsmasters_project_features_two_title, 'h6', true);
			
			travel_time_get_project_features('features', $cmsmasters_project_features_three, $cmsmasters_project_features_three_title, 'h6', true);
			
		echo '</div>';
	}
	?>
</article>
<!--_________________________ Finish Video Tour _________________________ -->

