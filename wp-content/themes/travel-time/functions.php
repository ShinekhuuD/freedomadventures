<?php
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version		1.0.8
 * 
 * Main Theme Functions File
 * Created by CMSMasters
 * 
 */


/*** START EDIT THEME PARAMETERS HERE ***/

// Theme Settings System Fonts List
if (!function_exists('travel_time_system_fonts_list')) {
	function travel_time_system_fonts_list() {
		$fonts = array( 
			"Arial, Helvetica, 'Nimbus Sans L', sans-serif" => 'Arial', 
			"Calibri, 'AppleGothic', 'MgOpen Modata', sans-serif" => 'Calibri', 
			"'Trebuchet MS', Helvetica, Garuda, sans-serif" => 'Trebuchet MS', 
			"'Comic Sans MS', Monaco, 'TSCu_Comic', cursive" => 'Comic Sans MS', 
			"Georgia, Times, 'Century Schoolbook L', serif" => 'Georgia', 
			"Verdana, Geneva, 'DejaVu Sans', sans-serif" => 'Verdana', 
			"Tahoma, Geneva, Kalimati, sans-serif" => 'Tahoma', 
			"'Lucida Sans Unicode', 'Lucida Grande', Garuda, sans-serif" => 'Lucida Sans', 
			"'Times New Roman', Times, 'Nimbus Roman No9 L', serif" => 'Times New Roman', 
			"'Courier New', Courier, 'Nimbus Mono L', monospace" => 'Courier New', 
		);
		
		
		return $fonts;
	}
}



// Theme Settings Google Fonts List
if (!function_exists('travel_time_get_google_fonts_list')) {
	function travel_time_get_google_fonts_list() {
		$fonts = array( 
			'' => esc_html__('None', 'travel-time'), 
			'Titillium+Web:300,300italic,400,400italic,600,600italic,700,700italic' => 'Titillium Web', 
			'Roboto:300,300italic,400,400italic,500,500italic,700,700italic' => 'Roboto', 
			'Roboto+Condensed:400,400italic,700,700italic' => 'Roboto Condensed', 
			'Open+Sans:300,300italic,400,400italic,700,700italic' => 'Open Sans', 
			'Open+Sans+Condensed:300,300italic,700' => 'Open Sans Condensed', 
			'Droid+Sans:400,700' => 'Droid Sans', 
			'Droid+Serif:400,400italic,700,700italic' => 'Droid Serif', 
			'PT+Sans:400,400italic,700,700italic' => 'PT Sans', 
			'PT+Sans+Caption:400,700' => 'PT Sans Caption', 
			'PT+Sans+Narrow:400,700' => 'PT Sans Narrow', 
			'PT+Serif:400,400italic,700,700italic' => 'PT Serif', 
			'Ubuntu:400,400italic,700,700italic' => 'Ubuntu', 
			'Ubuntu+Condensed' => 'Ubuntu Condensed', 
			'Headland+One' => 'Headland One', 
			'Source+Sans+Pro:300,300italic,400,400italic,700,700italic' => 'Source Sans Pro', 
			'Lato:400,400italic,700,700italic' => 'Lato', 
			'Cuprum:400,400italic,700,700italic' => 'Cuprum', 
			'Oswald:300,400,700' => 'Oswald', 
			'Yanone+Kaffeesatz:300,400,700' => 'Yanone Kaffeesatz', 
			'Lobster' => 'Lobster', 
			'Lobster+Two:400,400italic,700,700italic' => 'Lobster Two', 
			'Questrial' => 'Questrial', 
			'Raleway:300,400,500,600,700' => 'Raleway', 
			'Dosis:300,400,500,700' => 'Dosis', 
			'Cutive+Mono' => 'Cutive Mono', 
			'Quicksand:300,400,700' => 'Quicksand', 
			'Montserrat:400,700' => 'Montserrat', 
			'Cookie' => 'Cookie', 
			'Muli:400,300italic,400italic,300' => 'Muli', 
		);
		
		
		return $fonts;
	}
}


// Theme Settings Text Transforms List
if (!function_exists('travel_time_text_transform_list')) {
	function travel_time_text_transform_list() {
		$list = array( 
			'none' => esc_html__('none', 'travel-time'), 
			'uppercase' => esc_html__('uppercase', 'travel-time'), 
			'lowercase' => esc_html__('lowercase', 'travel-time'), 
			'capitalize' => esc_html__('capitalize', 'travel-time'), 
		);
		
		
		return $list;
	}
}



// Theme Settings Text Decorations List
if (!function_exists('travel_time_text_decoration_list')) {
	function travel_time_text_decoration_list() {
		$list = array( 
			'none' => esc_html__('none', 'travel-time'), 
			'underline' => esc_html__('underline', 'travel-time'), 
			'overline' => esc_html__('overline', 'travel-time'), 
			'line-through' => esc_html__('line-through', 'travel-time'), 
		);
		
		
		return $list;
	}
}



// Theme Settings Custom Color Schemes
if (!function_exists('travel_time_custom_color_schemes_list')) {
	function travel_time_custom_color_schemes_list() {
		$list = array( 
			'first' => esc_html__('Custom 1', 'travel-time'), 
			'second' => esc_html__('Custom 2', 'travel-time'), 
			'third' => esc_html__('Custom 3', 'travel-time') 
		);
		
		
		return $list;
	}
}

/*** STOP EDIT THEME PARAMETERS HERE ***/



// Theme Plugin Support Constants
if (class_exists('Cmsmasters_Content_Composer')) {
	define('CMSMASTERS_CONTENT_COMPOSER', true);
} else {
	define('CMSMASTERS_CONTENT_COMPOSER', false);
}

if (class_exists('woocommerce')) {
	define('CMSMASTERS_WOOCOMMERCE', true);
} else {
	define('CMSMASTERS_WOOCOMMERCE', false);
}

if (class_exists('Tribe__Events__Main')) {
	define('CMSMASTERS_EVENTS_CALENDAR', true);
} else {
	define('CMSMASTERS_EVENTS_CALENDAR', false);
}

if (class_exists('PayPalDonations')) {
	define('CMSMASTERS_PAYPALDONATIONS', true);
} else {
	define('CMSMASTERS_PAYPALDONATIONS', false);
}

if (class_exists('Cmsmasters_Donations')) {
	define('CMSMASTERS_DONATIONS', false);
} else {
	define('CMSMASTERS_DONATIONS', false);
}

if (function_exists('timetable_events_init')) {
	define('CMSMASTERS_TIMETABLE', false);
} else {
	define('CMSMASTERS_TIMETABLE', false);
}

if (class_exists('TC')) {
	define('CMSMASTERS_TC_EVENTS', true);
} else {
	define('CMSMASTERS_TC_EVENTS', false);
}

if (function_exists('the_ratings')) {
	define('CMSMASTERS_RATING', true);
} else {
	define('CMSMASTERS_RATING', false);
}


// Theme Colored Categories Constant
define('CMSMASTERS_COLORED_CATEGORIES', true);

// Theme Projects Compatible
define('CMSMASTERS_PROJECT_COMPATIBLE', true);

// Theme Profiles Compatible
define('CMSMASTERS_PROFILE_COMPATIBLE', true);
 
// Developer Mode Constant
define('CMSMASTERS_DEVELOPER_MODE', false);
 
// Change FS Method
if (!defined('FS_METHOD')) {
	define('FS_METHOD', 'direct');
}


// Theme Image Thumbnails Size
if (!function_exists('travel_time_get_image_thumbnail_list')) {
	function travel_time_get_image_thumbnail_list() {
		$list = array( 
			'cmsmasters-small-thumb' => array( 
				'width' => 		100, 
				'height' => 	100, 
				'crop' => 		true 
			), 
			'cmsmasters-square-thumb' => array( 
				'width' => 		300, 
				'height' => 	300, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Square', 'travel-time') 
			), 
			'cmsmasters-blog-masonry-thumb' => array( 
				'width' => 		580, 
				'height' => 	386, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Masonry Blog', 'travel-time') 
			), 
			'cmsmasters-tour-thumb' => array( 
				'width' => 		580, 
				'height' => 	378, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Tour', 'travel-time') 
			), 
			'cmsmasters-tour-masonry-thumb' => array( 
				'width' => 		580, 
				'height' => 	9999, 
				'title' => 		esc_attr__('Masonry Tour', 'travel-time') 
			), 
			'post-thumbnail' => array( 
				'width' => 		860, 
				'height' => 	496, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Featured', 'travel-time') 
			), 
			'cmsmasters-masonry-thumb' => array( 
				'width' => 		860, 
				'height' => 	9999, 
				'title' => 		esc_attr__('Masonry', 'travel-time') 
			), 
			'cmsmasters-full-thumb' => array( 
				'width' => 		1160, 
				'height' => 	610, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Full', 'travel-time') 
			), 
			'cmsmasters-tour-full-thumb' => array( 
				'width' => 		1160, 
				'height' => 	610, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Tour Full', 'travel-time') 
			), 
			'cmsmasters-full-masonry-thumb' => array( 
				'width' => 		1160, 
				'height' => 	9999, 
				'title' => 		esc_attr__('Masonry Full', 'travel-time') 
			) 
		);
		
		
		if (CMSMASTERS_EVENTS_CALENDAR) {
			$list['cmsmasters-event-thumb'] = array( 
				'width' => 		580, 
				'height' => 	378, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Event', 'travel-time') 
			);
		}
		
		
		return $list;
	}
}



// Theme Settings All Color Schemes List
if (!function_exists('travel_time__all_color_schemes_list')) {
	function travel_time_all_color_schemes_list() {
		$list = array( 
			'default' => 		esc_html__('Default', 'travel-time'), 
			'header' => 		esc_html__('Header', 'travel-time'), 
			'navigation' => 	esc_html__('Navigation', 'travel-time'), 
			'header_top' => 	esc_html__('Header Top', 'travel-time'), 
			'footer' => 		esc_html__('Footer', 'travel-time') 
		);
		
		
		$out = array_merge($list, travel_time_custom_color_schemes_list());
		
		
		return $out;
	}
}



// Theme Settings Color Schemes List
if (!function_exists('cmsmasters_color_schemes_list')) {
	function cmsmasters_color_schemes_list() {
		$list = travel_time_all_color_schemes_list();
		
		
		unset($list['header']);
		
		unset($list['navigation']);
		
		unset($list['header_top']);
		
		
		$out = array_merge($list, travel_time_custom_color_schemes_list());
		
		
		return $out;
	}
}



// Theme Settings Color Schemes Default Colors
if (!function_exists('travel_time_color_schemes_defaults')) {
	function travel_time_color_schemes_defaults() {
		$list = array( 
			'default' => array( // content default color scheme
				'color' => 		'#75706b', 
				'link' => 		'#1196dd', 
				'hover' => 		'#24c358', 
				'heading' => 	'#000000', 
				'bg' => 		'#f7f7f7', 
				'alternate' => 	'#d1d5d8', 
				'border' => 	'#dfdfdf', 
				'additional' => '#ffffff'
			), 
			'header' => array( // Header color scheme
				'mid_color' => 		'#9c9c9c', 
				'mid_link' => 		'#000000', 
				'mid_hover' => 		'#0086cd', 
				'mid_bg' => 		'#ffffff', 
				'mid_bg_scroll' => 	'rgba(255,255,255,1)', 
				'mid_border' => 	'#e5e5e5', 
				'bot_color' => 		'#9c9c9c', 
				'bot_link' => 		'#000000', 
				'bot_hover' => 		'#0086cd', 
				'bot_bg' => 		'#ffffff', 
				'bot_bg_scroll' => 	'rgba(255,255,255,1)', 
				'bot_border' => 	'#e5e5e5' 
			), 
			'navigation' => array( // Navigation color scheme
				'title_link' => 			'#000000', 
				'title_link_hover' => 		'#0086cd', 
				'title_link_current' => 	'#0086cd', 
				'title_link_subtitle' => 	'#828282', 
				'title_link_bg' => 			'rgba(255,255,255,1)', 
				'title_link_bg_hover' => 	'rgba(255,255,255,1)', 
				'title_link_bg_current' => 	'#ffffff', 
				'title_link_border' => 		'rgba(255,255,255,1)', 
				'dropdown_text' => 			'#000000', 
				'dropdown_bg' => 			'#ffffff', 
				'dropdown_border' => 		'rgba(232,232,232,1)', 
				'dropdown_link' => 			'#777777', 
				'dropdown_link_hover' => 	'#0086cd', 
				'dropdown_link_subtitle' => '#aeaeae', 
				'dropdown_link_highlight' => 'rgba(0,134,205,1)', 
				'dropdown_link_border' => 	'rgba(232,232,232,1)'
			), 
			'header_top' => array( // Header Top color scheme
				'color' => 					'#ffffff', 
				'link' => 					'#ffffff', 
				'hover' => 					'rgba(255,255,255,0.75)', 
				'bg' => 					'#0086cd', 
				'border' => 				'#0086cd', 
				'title_link' => 			'#ffffff', 
				'title_link_hover' => 		'rgba(255,255,255,0.75)', 
				'title_link_bg' => 			'#0086cd', 
				'title_link_bg_hover' => 	'rgba(0,134,205,1)', 
				'title_link_border' => 		'rgba(0,134,205,1)', 
				'dropdown_bg' => 			'#19a3ed', 
				'dropdown_border' => 		'rgba(25,163,237,1)', 
				'dropdown_link' => 			'#ffffff', 
				'dropdown_link_hover' => 	'#282828', 
				'dropdown_link_highlight' => 'rgba(40,40,40,1)', 
				'dropdown_link_border' => 	'rgba(25,163,237,1)'
			), 
			'footer' => array( // Footer color scheme
				'color' => 		'#ffffff', 
				'link' => 		'#ffffff', 
				'hover' => 		'#24c358', 
				'heading' => 	'#ffffff', 
				'bg' => 		'#131420', 
				'alternate' => 	'rgba(32,33,45,1)', 
				'border' => 	'rgba(36,195,88,1)', 
				'additional' => '#ffffff'
			), 
			'first' => array( // custom color scheme 1
				'color' => 		'#ffffff', 
				'link' => 		'#24c358', 
				'hover' => 		'#19a3ed', 
				'heading' => 	'#ffffff', 
				'bg' => 		'#20212d', 
				'alternate' => 	'#20212d', 
				'border' => 	'#20212d', 
				'additional' => '#ffffff'
			), 
			'second' => array( // custom color scheme 2
				'color' => 		'#ffffff', 
				'link' => 		'#1196dd', 
				'hover' => 		'#3b3b3b', 
				'heading' => 	'#ffffff', 
				'bg' => 		'#fbfbfb', 
				'alternate' => 	'#ffffff', 
				'border' => 	'#e4e4e4', 
				'additional' => '#e4e4e4'
			), 
			'third' => array( // custom color scheme 3
				'color' => 		'#ffffff', 
				'link' => 		'#1196dd', 
				'hover' => 		'#24c358', 
				'heading' => 	'#292929', 
				'bg' => 		'#f7f7f7', 
				'alternate' => 	'#d1d5d8', 
				'border' => 	'#dfdfdf', 
				'additional' => '#ffffff'
			) 
		);
		
		
		return $list;
	}
}



// CMSMasters Framework Directories Constants
define('CMSMASTERS_FRAMEWORK', 'framework');
define('CMSMASTERS_ADMIN', CMSMASTERS_FRAMEWORK . '/admin');
define('CMSMASTERS_SETTINGS', CMSMASTERS_ADMIN . '/settings');
define('CMSMASTERS_OPTIONS', CMSMASTERS_ADMIN . '/options');
define('CMSMASTERS_ADMIN_INC', CMSMASTERS_ADMIN . '/inc');
define('CMSMASTERS_CLASS', CMSMASTERS_FRAMEWORK . '/class');
define('CMSMASTERS_FUNCTION', CMSMASTERS_FRAMEWORK . '/function');
define('CMSMASTERS_COMPOSER', 'cmsmasters-c-c');



// Load Framework Parts
locate_template(CMSMASTERS_CLASS . '/Browser.php', true);

locate_template(CMSMASTERS_ADMIN_INC . '/config-functions.php', true);

locate_template(CMSMASTERS_FUNCTION . '/theme-functions.php', true);

locate_template(CMSMASTERS_SETTINGS . '/cmsmasters-theme-settings.php', true);

locate_template(CMSMASTERS_OPTIONS . '/cmsmasters-theme-options.php', true);

locate_template(CMSMASTERS_ADMIN_INC . '/admin-scripts.php', true);

locate_template(CMSMASTERS_ADMIN_INC . '/plugin-activator.php', true);

locate_template(CMSMASTERS_CLASS . '/twitteroauth.php', true);

locate_template(CMSMASTERS_CLASS . '/widgets.php', true);

locate_template(CMSMASTERS_FUNCTION . '/breadcrumbs.php', true);

locate_template(CMSMASTERS_FUNCTION . '/likes.php', true);

locate_template(CMSMASTERS_FUNCTION . '/pagination.php', true);

locate_template(CMSMASTERS_FUNCTION . '/single-comment.php', true);

locate_template(CMSMASTERS_FUNCTION . '/theme-fonts.php', true);

locate_template(CMSMASTERS_FUNCTION . '/theme-colors-primary.php', true);

locate_template(CMSMASTERS_FUNCTION . '/theme-colors-secondary.php', true);

locate_template(CMSMASTERS_FUNCTION . '/template-functions.php', true);

locate_template(CMSMASTERS_FUNCTION . '/template-functions-post.php', true);

locate_template(CMSMASTERS_FUNCTION . '/template-functions-project.php', true);

locate_template(CMSMASTERS_FUNCTION . '/template-functions-profile.php', true);

locate_template(CMSMASTERS_FUNCTION . '/template-functions-shortcodes.php', true);

locate_template(CMSMASTERS_FUNCTION . '/template-functions-widgets.php', true);


// Theme Colored Categories Functions
if (CMSMASTERS_COLORED_CATEGORIES) {
	locate_template(CMSMASTERS_FUNCTION . '/theme-colored-categories.php', true);
}


if (class_exists('Cmsmasters_Content_Composer')) {
	locate_template(CMSMASTERS_COMPOSER . '/filters/cmsmasters-c-c-atts-filters.php', true);
	
	locate_template(CMSMASTERS_COMPOSER . '/shortcodes/theme-shortcodes.php', true);
}


// CMSMASTERS Donations functions
if (CMSMASTERS_DONATIONS) {
	locate_template('cmsmasters-donations/function/template-functions-donation.php', true);
}

// Woocommerce functions
if (CMSMASTERS_WOOCOMMERCE) {
	locate_template('woocommerce/cmsmasters-woo-functions.php', true);
}

// Events functions
if (CMSMASTERS_EVENTS_CALENDAR) {
	locate_template('tribe-events/cmsmasters-events-functions.php', true);
}

// WP-PostRating functions
if (CMSMASTERS_RATING) {
	locate_template('cmsmasters-wp-postratings/cmsmasters-rating-functions.php', true);
}



// Load Theme Local File
if (!function_exists('travel_time_load_theme_textdomain')) {
	function travel_time_load_theme_textdomain() {
		load_theme_textdomain('travel-time', get_template_directory() . '/' . CMSMASTERS_FRAMEWORK . '/languages');
	}
}

// Load Theme Local File Action
if (!has_action('after_setup_theme', 'travel_time_load_theme_textdomain')) {
	add_action('after_setup_theme', 'travel_time_load_theme_textdomain');
}


// Framework Activation & Data Import
if (!function_exists('travel_time_theme_activation')) {
	function travel_time_theme_activation() {
		if (get_option('cmsmasters_active_theme') != 'travel-time') {
			add_option('cmsmasters_active_theme', 'travel-time', '', 'yes');
			
			
			travel_time_add_global_options();
			
			
			travel_time_add_global_icons();
			
			
			wp_redirect(esc_url(admin_url('admin.php?page=cmsmasters-settings&upgraded=true')));
		}
	}
}

add_action('after_switch_theme', 'travel_time_theme_activation');



// Framework Deactivation
if (!function_exists('travel_time_theme_deactivation')) {
	function travel_time_theme_deactivation() {
		delete_option('cmsmasters_active_theme');
	}
}

// Framework Deactivation Action
if (!has_action('switch_theme', 'travel_time_theme_deactivation')) {
	add_action('switch_theme', 'travel_time_theme_deactivation');
}



// Plugin Activation Regenerate Styles
if (!function_exists('travel_time_plugin_activation')) {
	function travel_time_plugin_activation() {
		update_option('cmsmasters_plugin_activation', 'true');
	}
}

add_action('activate_cmsmasters-donations/cmsmasters-donations.php', 'travel_time_plugin_activation');
add_action('activate_the-events-calendar/the-events-calendar.php', 'travel_time_plugin_activation');
add_action('activate_timetable/timetable.php', 'travel_time_plugin_activation');
add_action('activate_woocommerce/woocommerce.php', 'travel_time_plugin_activation');


if (!function_exists('travel_time_plugin_activation_regenerate')) {
	function travel_time_plugin_activation_regenerate() {
		if (!get_option('cmsmasters_plugin_activation')) {
			add_option('cmsmasters_plugin_activation', 'false');
		}
		
		if (get_option('cmsmasters_plugin_activation') != 'false') {
			travel_time_regenerate_styles();
			
			update_option('cmsmasters_plugin_activation', 'false');
		}
	}
}

add_action('init', 'travel_time_plugin_activation_regenerate');

