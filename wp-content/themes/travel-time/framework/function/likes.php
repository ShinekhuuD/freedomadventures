<?php
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version		1.0.8
 * 
 * Likes Functions
 * Changed by CMSMasters
 * 
 */


function cmsmasters_like($class = false, $show = false) {
	if (CMSMASTERS_CONTENT_COMPOSER) {
		$post_ID = get_the_ID();
		
		
		$ip = $_SERVER['REMOTE_ADDR'];
		
		$ip_name = str_replace('.', '-', $ip);
		
		
		$likes = (get_post_meta($post_ID, 'cmsmasters_likes', true) != '') ? get_post_meta($post_ID, 'cmsmasters_likes', true) : '0';
		
		
		$ipPost = new WP_Query(array( 
			'post_type' => 		'cmsmasters_like', 
			'post_status' => 	'draft', 
			'post_parent' => 	$post_ID, 
			'name' => 			$ip_name 
		));
		
		
		$ipCheck = $ipPost->posts;
		
		
		if (isset($_COOKIE['like-' . $post_ID]) || count($ipCheck) != 0) {
			$counter = '<span class="cmsmasters_likes' . ($class ? ' ' . $class : '') . '">' . 
				'<a href="#" onclick="return false;" id="cmsmastersLike-' . esc_attr($post_ID) . '" class="cmsmastersLike active cmsmasters_theme_icon_like">' . 
					'<span>' . esc_html($likes) . '</span> ' . 
					esc_html__('Likes', 'travel-time') . 
				'</a>' . 
			'</span>';
		} else {
			$counter = '<span class="cmsmasters_likes' . ($class ? ' ' . $class : '') . '">' . 
				'<a href="#" onclick="cmsmasters_like(' . esc_attr($post_ID) . '); return false;" id="cmsmastersLike-' . esc_attr($post_ID) . '" class="cmsmastersLike cmsmasters_theme_icon_like">' . 
					'<span>' . esc_html($likes) . '</span> ' . 
					esc_html__('Likes', 'travel-time') . 
				'</a>' . 
			'</span>';
		}
	} else {
		$counter = '';
	}
	
	
	if ($show) {
		echo $counter;
	} else {
		return $counter;
	}
}

