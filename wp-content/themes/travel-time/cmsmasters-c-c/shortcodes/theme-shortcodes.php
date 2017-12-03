<?php
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version 	1.0.6
 * 
 * Content Composer Theme Shortcodes
 * Created by CMSMasters
 * 
 */


function travel_time_tour_search_shortcodes($shortcodes) {
	$shortcodes[] = 'cmsmasters_tour_search';
	
	
	return $shortcodes;
}

add_filter('cmsmasters_custom_shortcodes_filter', 'travel_time_tour_search_shortcodes');


/**
 * Custom Tour Search
 */
function cmsmasters_tour_search($atts, $content = null) { 
    $new_atts = apply_filters('cmsmasters_tour_search_atts_filter', array( 
		'keywords_text' => 			'', 
		'category_text' => 			'', 
		'min_text' => 				'', 
		'max_text' => 				'', 
		'button_text' => 			'', 
		'animation' => 				'', 
		'animation_delay' => 		'', 
		'classes' => 				'' 
    ) );
	
	
	$shortcode_name = 'tour-search';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();	
	
    $args = array( 
		'keywords_text' => 			$keywords_text, 
		'category_text' => 			$category_text, 
		'min_text' => 				$min_text, 
		'max_text' => 				$max_text, 
		'button_text' => 			$button_text
	);

	$out = '';
	
	$out .= '<div class="search_bar_wrap cmsmasters_tour_search' . 
		(($classes != '') ? ' ' . $classes : '') . 
		'"' . 
		(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
		(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
		'>' . 
		'<form method="get" action="' . esc_url(home_url()) . '" class="cmsmasters_row_margin">' . 
			'<p class="search_field cmsmasters_column one_fourth">' . 				
				'<label for="s">' . ($keywords_text != '' ? $keywords_text : '') . '</label>' . 
				'<input name="s" placeholder="' . esc_attr__('Enter keywords', 'travel-time') . '" value="" type="search" />' . 
			'</p>' . 
			'<p class="search_field cmsmasters_column one_fourth">' . 
				'<label for="category">' . ($category_text != '' ? $category_text : '') . '</label>' . 
				'<select name="category">' . 
					'<option value="">' . esc_html__('All categories', 'travel-time') . '</option>';
				
					$categories = get_terms('pj-categs');
					
					
					if (!empty($categories) && !is_wp_error($categories)) {
						foreach ($categories as $category) {
							$out .= '<option value="' . $category->slug . '">' . $category->name . '</option>';
						}
					}
				
				$out .= '</select>' . 
			'</p>' . 
			'<p class="search_field cmsmasters_tour_search_min cmsmasters_column one_fourth">' .
				'<label class="cmsmasters_tour_search_min_price_max" for="price_max">' . ($max_text != '' ? $max_text : '') . '</label>' .
				'<input name="price_max" value="" type="number" min="0" placeholder="10000" />' . 
				'<label for="price_min">' . ($min_text != '' ? $min_text : '') . '</label>' .
				'<input name="price_min" value="" type="number" min="0" placeholder="0" />' . 				
			'</p>' . 
			'<input name="post_type" value="project" type="hidden" />' . 
			'<p class="cmsmasters_column one_fourth">' . 
				'<button type="submit">' . ($button_text != '' ? $button_text : '') . '</button>' . 
			'</p>' . 
		'</form>' . 
	'</div>';
	
	
	return $out;
}

