<?php
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version 	1.0.6
 * 
 * Content Composer Attributes Filters
 * Created by CMSMasters
 * 
 */


/* Register Admin Panel JS Scripts */
function register_admin_js_scripts() {
	global $pagenow;
	
	
	if ( 
		$pagenow == 'post-new.php' || 
		($pagenow == 'post.php' && isset($_GET['post']) && get_post_type($_GET['post']) != 'attachment') 
	) {
		wp_enqueue_script('composer-shortcodes-extend', get_template_directory_uri() . '/cmsmasters-c-c/js/cmsmasters-c-c-shortcodes-extend.js', array('cmsmasters_composer_shortcodes_js'), '1.0.0', true);
		
		wp_localize_script('composer-shortcodes-extend', 'composer_shortcodes_extend', array( 
			'blog_field_layout_mode_puzzle' => 						esc_attr__('Puzzle', 'travel-time'), 
			
			'portfolio_title' => 									esc_attr__('Tours', 'travel-time'), 
			'portfolio_field_orderby_descr' => 						esc_attr__('Choose your tours order by parameter', 'travel-time'), 			
			'portfolio_field_pj_number_title' =>					esc_attr__('Tours Number', 'travel-time'),
			'portfolio_field_pj_number_descr' =>					esc_attr__('Enter the number of tours for showing per page', 'travel-time'),
			'portfolio_field_pj_number_descr_note' =>				esc_attr__('number, if empty - show all tours', 'travel-time'), 
			'portfolio_field_categories_descr' =>					esc_attr__('Show tours associated with certain categories.', 'travel-time'),
			'portfolio_field_categories_descr_note' =>				esc_attr__("If you don't choose any tour categories, all your tours will be shown", 'travel-time'),			
			'portfolio_field_layout_descr' =>						esc_attr__('Choose layout type for your tours', 'travel-time'),
			'portfolio_field_layout_choice_grid' =>					esc_attr__('Tours Grid', 'travel-time'),
			'portfolio_field_layout_mode_descr' =>					esc_attr__('Choose grid layout mode for your tours', 'travel-time'),			
			'portfolio_field_col_count_descr' =>					esc_attr__('Choose number of tours per row', 'travel-time'),
			'portfolio_field_col_count_descr_note' =>				esc_attr__('4 and 5 columns will be shown for pages with a fullwidth layout only. For pages with a sidebar enabled, maximum columns amount is 3.', 'travel-time'),
			'portfolio_field_col_count_descr_note_custom' =>		esc_attr__('And 5 columns will be shown only if custom content width is set and when content area width is 1350px or more.', 'travel-time'),
			'portfolio_field_metadata_descr' =>						esc_attr__('Choose tours metadata that you want to show', 'travel-time'),
			'portfolio_field_gap_descr' =>							esc_attr__('Choose the gap between tours', 'travel-time'),
			'portfolio_field_filter_descr' =>						esc_attr__('If checked, enable tours category filter', 'travel-time'),
			'portfolio_field_sorting_descr' =>						esc_attr__('If checked, enable tours date & name sorting', 'travel-time'), 

			'portfolio_field_metadata_choises_icon' =>				esc_attr__('Icon', 'travel-time'), 
			'portfolio_field_metadata_choises_duration' =>			esc_attr__('Duration', 'travel-time'), 
			'portfolio_field_metadata_choises_participants' =>		esc_attr__('Participants', 'travel-time'), 
			'portfolio_field_metadata_choises_price' =>				esc_attr__('Price', 'travel-time'), 
			'portfolio_field_metadata_choises_rating' =>			esc_attr__('Rating', 'travel-time'), 
			
			'posts_slider_field_poststype_choice_project' =>		esc_attr__('Tours', 'travel-time'),
			'posts_slider_field_pjcateg_title' =>					esc_attr__('Tours Categories', 'travel-time'),
			'posts_slider_field_pjcateg_descr' =>					esc_attr__('Show tours associated with certain categories.', 'travel-time'),
			'posts_slider_field_pjcateg_descr_note' =>				esc_attr__("If you don't choose any tours categories, all your tours will be shown", 'travel-time'),			
			'posts_slider_field_col_count_descr' =>					esc_attr__('Choose number of tours per row', 'travel-time'),			
			'posts_slider_field_pjmeta_title' =>					esc_attr__('Tours Metadata', 'travel-time'),
			'posts_slider_field_pjmeta_descr' =>					esc_attr__('Choose tours metadata you want to be shown', 'travel-time'),
			'tour_search_title' => 									esc_attr__('Tour Search', 'travel-time'), 
			'tour_search_keywords_title' => 						esc_attr__('Tour Search Keywords Label Text', 'travel-time'), 
			'tour_search_keywords_descr' => 						esc_attr__('Enter tour search keywords label text', 'travel-time'), 
			'tour_search_keywords' => 								esc_attr__('Destination:', 'travel-time'), 
			'tour_search_category_title' => 						esc_attr__('Tour Search Category Label Text', 'travel-time'), 
			'tour_search_category_descr' => 						esc_attr__('Enter tour search category label text', 'travel-time'), 
			'tour_search_category' => 								esc_attr__('Adventure type:', 'travel-time'), 
			'tour_search_min_title' => 								esc_attr__('Tour Search Min Label Text', 'travel-time'), 
			'tour_search_min_descr' => 								esc_attr__('Enter tour search min label text', 'travel-time'), 
			'tour_search_min' => 									esc_attr__('Min ($):', 'travel-time'), 
			'tour_search_max_title' => 								esc_attr__('Tour Search Max Label Text', 'travel-time'), 
			'tour_search_max_descr' => 								esc_attr__('Enter tour search max label text', 'travel-time'), 
			'tour_search_max' => 									esc_attr__('Max ($):', 'travel-time'), 
			'tour_search_button_title' => 							esc_attr__('Tour Search Button Text', 'travel-time'), 
			'tour_search_button_descr' => 							esc_attr__('Enter tour search button text', 'travel-time'), 
			'tour_search_button' => 								esc_attr__('Search Adventure', 'travel-time'), 
			'posts_slider_field_slider_nav_arrow' => 				esc_attr__('Navigation Control', 'travel-time'), 
			'heading_tablet_check' => 								esc_attr__('Font size for small tablet', 'travel-time'), 
			'heading_tablet_font_size' => 							esc_attr__('Tablet font size', 'travel-time'), 
			'heading_tablet_line_height' => 						esc_attr__('Tablet line height', 'travel-time')
		));
	}
}

add_action('admin_enqueue_scripts', 'register_admin_js_scripts');


/**
* Heading
*/
add_filter('cmsmasters_custom_heading_atts_filter', 'cmsmasters_custom_heading_atts');

function cmsmasters_custom_heading_atts() {
	return array( 
		'type' => 					'h1', 
		'font_family' => 			'', 
		'font_size' => 				'', 
		'line_height' => 			'', 
		'tablet_check' =>  			'', 
		'tablet_font_size' => 		'', 
		'tablet_line_height' => 	'', 
		'font_weight' => 			'400', 
		'font_style' => 			'normal', 
		'icon' => 					'', 
		'text_align' => 			'left', 
		'color' => 					'', 
		'bg_color' => 				'', 
		'link' => 					'', 
		'target' => 				'', 
		'margin_top' => 			'0', 
		'margin_bottom' => 			'0', 
		'border_radius' => 			'', 
		'divider' => 				'', 
		'divider_type' => 			'short', 
		'divider_height' => 		'1', 
		'divider_style' => 			'solid', 
		'divider_color' => 			'', 
		'animation' => 				'', 
		'animation_delay' => 		'', 
		'classes' => 				'' 
	);
}


// Icon List Items Shortcode Attributes Filter
add_filter('cmsmasters_icon_list_items_atts_filter', 'cmsmasters_icon_list_items_atts');

function cmsmasters_icon_list_items_atts() {
	return array( 
		'type' => 				'block', 
		'icon_type' => 			'icon', 
		'icon' => 				'cmsmasters-icon-thumbs-up-5', 
		'icon_size' => 			'0', 
		'heading' => 			'h2', 
		'items_color_type' => 	'border', 
		'border_width' => 		'10', 
		'border_radius' => 		'4px', 
		'unifier_width' => 		'0', 
		'position' => 			'left', 
		'icon_space' => 		'80', 
		'item_height' => 		'', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
	);
}


// Posts Slider Shortcode Attributes Filter
add_filter('cmsmasters_posts_slider_atts_filter', 'cmsmasters_posts_slider_atts');

function cmsmasters_posts_slider_atts() {
	return array( 
		'orderby' => 				'', 
		'order' => 					'', 
		'post_type' => 				'', 
		'slider_nav_arrow' => 		'', 
		'blog_categories' => 		'', 
		'portfolio_categories' => 	'', 
		'columns' => 				'', 
		'amount' => 				'', 
		'count' => 					'1000', 
		'pause' => 					'', 
		'speed' => 					'', 
		'blog_metadata' => 			'', 
		'portfolio_metadata' => 	'', 
		'animation' => 				'', 
		'animation_delay' => 		'', 
		'classes' => 				''
	);
}
