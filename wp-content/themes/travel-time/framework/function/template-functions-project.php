<?php 
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version		1.0.6
 * 
 * Template Functions for Tours & Single Tour
 * Created by CMSMasters
 * 
 */


/* Get Tours Heading Function */
function travel_time_project_heading($cmsmasters_id, $tag = 'h1', $link_redirect = false, $link_url = false, $link_target = false, $show = true) { 
	$out = '<header class="cmsmasters_project_header entry-header">' . 
		'<' . esc_html($tag) . ' class="cmsmasters_project_title entry-title">' . 
			'<a href="' . (($link_redirect == 'true' && $link_url != '') ? esc_url($link_url) : esc_url(get_permalink())) . '"' . (($link_redirect == 'true' && $link_target == 'true') ? ' target="_blank"' : '') . '>' . cmsmasters_title($cmsmasters_id, false) . '</a>' . 
		'</' . esc_html($tag) . '>' . 
	'</header>';
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}



/* Get Tours Heading Without Link Function */
function travel_time_project_title_nolink($cmsmasters_id, $tag = 'h1', $show = true) { 
	$out = '<' . esc_html($tag) . ' class="cmsmasters_project_title entry-title">' . 
		cmsmasters_title($cmsmasters_id, false) . 
	'</' . esc_html($tag) . '>';
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}


/* Get Tours Content/Excerpt Function */
function travel_time_project_exc_cont($show = true) {
	$out = cmsmasters_divpdel('<div class="cmsmasters_project_content entry-content">' . "\n" . 
		wpautop(theme_excerpt(20, false)) . 
	'</div>' . "\n");
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}



/* Check Tours Content/Excerpt Not Empty Function */
function travel_time_project_check_exc_cont() {
	$exc = travel_time_project_exc_cont(false);
	
	$no_tags_exc = strip_tags($exc);
	
	$trim_exc = trim($no_tags_exc);
	
	
	if ($trim_exc != '') {
		return true;
	} else {
		return false;
	}
}


/* Get Tours Type Function */
function travel_time_project_type($text, $icon) {
	$cmsmasters_option = travel_time_get_global_options();
	$out = '';
	
	if ( 
		$cmsmasters_option['travel-time' . '_portfolio_project_type'] && $text != '' || 
		$cmsmasters_option['travel-time' . '_portfolio_project_icon'] && $icon != ''
	) {
		$out = '<div class="project_details_item">' . 
			'<div class="project_details_item_title">' . esc_html__('Tour Type', 'travel-time') . ':' . '</div>' . 
			'<div class="project_details_item_desc">' . 			
				'<span class="project_details_item_type ' . ($cmsmasters_option['travel-time' . '_portfolio_project_icon'] && $icon != '' ? esc_attr($icon) : '') . '">' . ($cmsmasters_option['travel-time' . '_portfolio_project_type'] && $text != '' ? esc_html($text) : '') . '</span>' . 
			'</div>' . 
		'</div>';
	}
	
	echo $out;
}

/* Get Tours Icon Function */
function travel_time_project_icon($icon, $show = true) {
	$cmsmasters_option = travel_time_get_global_options();
	$out = '';
	
	if ( 
		$cmsmasters_option['travel-time' . '_portfolio_project_icon'] && $icon != ''
	) {
		$out = '<span class="cmsmasters_portfolio_project_icon ' . ($cmsmasters_option['travel-time' . '_portfolio_project_icon'] && $icon != '' ? esc_attr($icon) : '') . '"></span>';
	}
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}


/* Get Tours Duration Function */
function travel_time_project_duration($text, $template_type = 'page', $show = true) {
	$cmsmasters_option = travel_time_get_global_options();
	$out = '';
	
	if ($template_type == 'page') {
		if ( 
			$cmsmasters_option['travel-time' . '_portfolio_project_duration'] && $text != ''
		) {
			$out = '<span class="cmsmasters_portfolio_project_duration">' . esc_html($text) . '</span>';
		}
	} else if ($template_type == 'post') {
		if ( 
			$cmsmasters_option['travel-time' . '_portfolio_project_duration'] && 
			$text != ''
		) {
			$out = '<div class="project_details_item">' . 
				'<div class="project_details_item_title">' . esc_html__('Duration', 'travel-time') . ':' . '</div>' . 
				'<div class="project_details_item_desc">' . 
					'<span>' . esc_html($text) . '</span>' . 
				'</div>' . 
			'</div>';
		}
	}
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}


/* Get Tours Participants Function */
function travel_time_project_participants($text, $template_type = 'page', $show = true) {
	$cmsmasters_option = travel_time_get_global_options();
	$out = '';
	
	if ($template_type == 'page') {
		if ( 
			$cmsmasters_option['travel-time' . '_portfolio_project_participants'] && $text != ''
		) {
			$out = '<span class="cmsmasters_portfolio_project_participants">' . esc_html($text) . '</span>';
		}
	} else if ($template_type == 'post') {
		if ( 
			$cmsmasters_option['travel-time' . '_portfolio_project_participants'] && $text != ''
		) {
			$out = '<div class="project_details_item">' . 
				'<div class="project_details_item_title">' . esc_html__('Participants', 'travel-time') . ':' . '</div>' . 
				'<div class="project_details_item_desc">' . 
					'<span>' . esc_html($text) . '</span>' . 
				'</div>' . 
			'</div>';
		}
	}
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}


/* Get Tours Price Function */
function travel_time_project_price($text, $template_type = 'page', $show = true) {
	$cmsmasters_option = travel_time_get_global_options();
	$out = '';
	
	$cmsmasters_global_portfolio_project_price_null = (isset($cmsmasters_option['travel-time' . '_portfolio_project_price_null']) && $cmsmasters_option['travel-time' . '_portfolio_project_price_null'] !== '') ? $cmsmasters_option['travel-time' . '_portfolio_project_price_null'] : 1;
	
	if ($cmsmasters_global_portfolio_project_price_null == 0 && $cmsmasters_option['travel-time' . '_portfolio_project_price'] && $text == 0) {
		$out = '';	
	} else {
		if ($template_type == 'page') {
			if ( 
				$cmsmasters_option['travel-time' . '_portfolio_project_price'] && $text != ''
			) {
				$portfolio_project_price_currency = $cmsmasters_option['travel-time' . '_portfolio_project_price_currency'];
				
				$portfolio_project_price_currency_pos = (isset($cmsmasters_option['travel-time' . '_portfolio_project_price_currency_pos'])) ? $cmsmasters_option['travel-time' . '_portfolio_project_price_currency_pos'] : 'before';
				
				$out = '<span class="cmsmasters_portfolio_project_price">' . ($portfolio_project_price_currency_pos == 'after' ? esc_html($text) . esc_html($portfolio_project_price_currency) : esc_html($portfolio_project_price_currency) . esc_html($text)) . '</span>';
			}
		} else {	
			if ( 
				$cmsmasters_option['travel-time' . '_portfolio_project_price'] && $text != ''
			) {
				$portfolio_project_price_currency = $cmsmasters_option['travel-time' . '_portfolio_project_price_currency'];
				
				$portfolio_project_price_currency_pos = (isset($cmsmasters_option['travel-time' . '_portfolio_project_price_currency_pos'])) ? $cmsmasters_option['travel-time' . '_portfolio_project_price_currency_pos'] : 'before';
				
				$out = '<div class="project_details_item">' . 
					'<div class="project_details_item_title">' . esc_html__('Price', 'travel-time') . ':' . '</div>' . 
					'<div class="project_details_item_desc">' . 
						'<span>' . ($portfolio_project_price_currency_pos == 'after' ? esc_html($text) . esc_html($portfolio_project_price_currency) : esc_html($portfolio_project_price_currency) . esc_html($text)) . '</span>' . 
					'</div>' . 
				'</div>';
			}
		}
	}
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}


/* Get Tours Category Function */
function travel_time_get_project_category($cmsmasters_id, $taxonomy, $template_type = 'page', $show = true) {
	$out = '';
	
	
	if (get_the_terms($cmsmasters_id, $taxonomy)) {
		if ($template_type == 'page') {
			$out = '<span class="cmsmasters_project_category">' . 
				travel_time_get_the_category_list($cmsmasters_id, $taxonomy, ', ') . 
			'</span>';
		} elseif ($template_type == 'post') {
			$cmsmasters_option = travel_time_get_global_options();
			
			
			if ($cmsmasters_option['travel-time' . '_portfolio_project_cat']) {
				$out .= '<div class="project_details_item">' . 
					'<div class="project_details_item_title">' . esc_html__('Categories', 'travel-time') . ':' . '</div>' . 
					'<div class="project_details_item_desc">' . 
						'<span class="cmsmasters_project_category">' . 
							travel_time_get_the_category_list($cmsmasters_id, $taxonomy, ', ') . 
						'</span>' . 
					'</div>' . 
				'</div>';
			}
		}
	}
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}



/* Get Tours Like Function */
function travel_time_get_project_likes($template_type = 'page', $show = true) {
	$out = '';
	
	
	if ($template_type == 'page') {
		$out = cmsmasters_like('cmsmasters_project_likes');
	} elseif ($template_type == 'post') {
		$cmsmasters_option = travel_time_get_global_options();
		
		if ($cmsmasters_option['travel-time' . '_portfolio_project_like']) {
			$out = '<div class="project_details_item">' . 
				'<div class="project_details_item_title">' . esc_html__('Likes', 'travel-time') . ':' . '</div>' . 
				'<div class="project_details_item_desc details_item_desc_like">' . 
					cmsmasters_like('cmsmasters_project_likes') . 
				'</div>' . 
			'</div>';
		}
	}
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}



/* Get Tours Comments Function */
function travel_time_get_project_comments($template_type = 'page', $show = true) {
	$out = '';
	
	
	if (comments_open()) {
		if ($template_type == 'page') {
			$out = travel_time_get_comments('cmsmasters_project_comments');
		} elseif ($template_type == 'post') {
			$cmsmasters_option = travel_time_get_global_options();
			
			if ($cmsmasters_option['travel-time' . '_portfolio_project_comment'] && comments_open()) {
				$out = '<div class="project_details_item">' . 
					'<div class="project_details_item_title">' . esc_html__('Comments', 'travel-time') . ':' . '</div>' . 
					'<div class="project_details_item_desc details_item_desc_comments">' . 
						travel_time_get_comments('cmsmasters_project_comments') . 
					'</div>' . 
				'</div>';
			}
		}
	}
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}



/* Get Tours Date Function */
function travel_time_get_project_date($template_type = 'page', $show = true) {
	if ($template_type == 'page') {
		$out = '<abbr class="published cmsmasters_project_date" title="' . esc_attr(get_the_date()) . '">' . 
			esc_html(get_the_date()) . 
		'</abbr>' . 
		'<abbr class="dn date updated" title="' . esc_attr(get_the_modified_date()) . '">' . 
			esc_html(get_the_modified_date()) . 
		'</abbr>';
	} elseif ($template_type == 'post') {
		$cmsmasters_option = travel_time_get_global_options();
		
		$out = '';
		
		if ($cmsmasters_option['travel-time' . '_portfolio_project_date']) {
			$out .= '<div class="project_details_item">' . 
				'<div class="project_details_item_title">' . esc_html__('Date', 'travel-time') . ':' . '</div>' . 
				'<div class="project_details_item_desc">' . 
					'<abbr class="published cmsmasters_project_date" title="' . esc_attr(get_the_date()) . '">' . 
						esc_html(get_the_date()) . 
					'</abbr>' . 
					'<abbr class="dn date updated" title="' . esc_attr(get_the_modified_date()) . '">' . 
						esc_html(get_the_modified_date()) . 
					'</abbr>' . 
				'</div>' . 
			'</div>';
		}
	}
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}



/* Get Tours Author Function */
function travel_time_get_project_author($template_type = 'page', $show = true) {
	if ($template_type == 'page') {
		$out = '<span class="cmsmasters_project_author">' . 
			esc_html__('By', 'travel-time') . ' ' . 
			'<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" title="' . esc_attr__('Tours by', 'travel-time') . ' ' . esc_attr(get_the_author_meta('display_name')) . '" class="vcard author"><span class="fn" rel="author">' . esc_html(get_the_author_meta('display_name')) . '</span></a>' . 
		'</span>';
	} elseif ($template_type == 'post') {
		$cmsmasters_option = travel_time_get_global_options();
		
		$out = '';
		
		if ($cmsmasters_option['travel-time' . '_portfolio_project_author']) {
			$out .= '<div class="project_details_item">' . 
				'<div class="project_details_item_title">' . esc_html__('Author', 'travel-time') . ':' . '</div>' . 
				'<div class="project_details_item_desc">' . 
					'<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" title="' . esc_attr__('Tours by', 'travel-time') . ' ' . esc_attr(get_the_author_meta('display_name')) . '" class="vcard author"><span class="fn" rel="author">' . esc_html(get_the_author_meta('display_name')) . '</span></a>' . 
				'</div>' . 
			'</div>';
		}
	}
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}



/* Get Tours Tags Function */
function travel_time_get_project_tags($cmsmasters_id, $taxonomy, $show = true) {
	if (get_the_terms($cmsmasters_id, $taxonomy)) {
		$cmsmasters_option = travel_time_get_global_options();
		$out = '';
		
		if ($cmsmasters_option['travel-time' . '_portfolio_project_tag']) {
			$out = '<div class="project_details_item">' . 
				'<div class="project_details_item_title">' . esc_html__('Tags', 'travel-time') . ':' . '</div>' . 
				'<div class="project_details_item_desc">' . 
					'<span class="cmsmasters_project_tags">' . 
						get_the_term_list($cmsmasters_id, $taxonomy, '', ', ', '') . 
					'</span>' . 
				'</div>' . 
			'</div>';
		}
		
		
		if ($show) {
			echo $out;
		} else {
			return $out;
		}
	}
}



/* Get Tours Features Function */
function travel_time_get_project_features($features_position = 'features', $features = '', $features_title = false, $tag = 'h2', $show = true) {
	if (
		(
			!empty($features[0][0]) && 
			!empty($features[0][1])
		) || (
			!empty($features[1][0]) && 
			!empty($features[1][1])
		)
	) {
		$out = '';
		
		if ($features_position == 'features') {
			$out .= '<div class="project_features entry-meta">' . 
				($features_title ? '<' . esc_html($tag) . ' class="project_features_title">' . esc_html($features_title) . '</' . esc_html($tag) . '>' : '');
		}
		
		
		foreach ($features as $feature) {
			if ($feature[0] != '' && $feature[1] != '') {
				$feature_lists = explode("\n", $feature[1]);
				
				$out .= '<div class="project_' . esc_attr($features_position) . '_item">' . 
					'<div class="project_' . esc_attr($features_position) . '_item_title">' . esc_html($feature[0]) . '</div>' . 
					'<div class="project_' . esc_attr($features_position) . '_item_desc">';
				
						foreach ($feature_lists as $feature_list) {
							$out .= trim($feature_list);
						}
				
					$out .= '</div>' . 
				'</div>';
			}
		}
		
		
		if ($features_position == 'features') {
			$out .= '</div>';
		}
		
		if ($show) {
			echo $out;
		} else {
			return $out;
		}
	}
}



/* Get Tours Link Function */
function travel_time_project_link($link_text, $link_url, $link_target, $show = true) {
	$cmsmasters_option = travel_time_get_global_options();
	$out = '';
	
	if ( 
		$cmsmasters_option['travel-time' . '_portfolio_project_link'] && 
		$link_text != '' && 
		$link_url != '' 
	) {
		$out = '<div class="project_details_item">' . 
			'<div class="project_details_item_title">' . esc_html__('Tour Link', 'travel-time') . ':' . '</div>' . 
			'<div class="project_details_item_desc">' . 
				'<a href="' . esc_url($link_url) . '" title="' . esc_attr($link_text) . '"' . (($link_target == 'true') ? ' target="_blank"' : '') . '>' . esc_html($link_text) . '</a>' . 
			'</div>' . 
		'</div>';
	}
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}