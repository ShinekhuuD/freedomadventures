<?php 
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version 	1.0.1
 * 
 * Admin Panel Element Options
 * Created by CMSMasters
 * 
 */


function travel_time_options_element_tabs() {
	$tabs = array();
	
	$tabs['sidebar'] = esc_attr__('Sidebars', 'travel-time');
	$tabs['icon'] = esc_attr__('Social Icons', 'travel-time');
	$tabs['lightbox'] = esc_attr__('Lightbox', 'travel-time');
	$tabs['sitemap'] = esc_attr__('Sitemap', 'travel-time');
	$tabs['error'] = esc_attr__('404', 'travel-time');
	$tabs['code'] = esc_attr__('Custom Codes', 'travel-time');
	
	if (class_exists('Cmsmasters_Form_Builder')) {
		$tabs['recaptcha'] = esc_attr__('reCAPTCHA', 'travel-time');
	}
	
	return $tabs;
}


function travel_time_options_element_sections() {
	$tab = travel_time_get_the_tab();
	
	switch ($tab) {
	case 'sidebar':
		$sections = array();
		
		$sections['sidebar_section'] = esc_attr__('Custom Sidebars', 'travel-time');
		
		break;
	case 'icon':
		$sections = array();
		
		$sections['icon_section'] = esc_attr__('Social Icons', 'travel-time');
		
		break;
	case 'lightbox':
		$sections = array();
		
		$sections['lightbox_section'] = esc_attr__('Theme Lightbox Options', 'travel-time');
		
		break;
	case 'sitemap':
		$sections = array();
		
		$sections['sitemap_section'] = esc_attr__('Sitemap Page Options', 'travel-time');
		
		break;
	case 'error':
		$sections = array();
		
		$sections['error_section'] = esc_attr__('404 Error Page Options', 'travel-time');
		
		break;
	case 'code':
		$sections = array();
		
		$sections['code_section'] = esc_attr__('Custom Codes', 'travel-time');
		
		break;
	case 'recaptcha':
		$sections = array();
		
		$sections['recaptcha_section'] = esc_attr__('Form Builder Plugin reCAPTCHA Keys', 'travel-time');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return $sections;	
} 


function travel_time_options_element_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = travel_time_get_the_tab();
	}
	
	$options = array();
	
	switch ($tab) {
	case 'sidebar':
		$options[] = array( 
			'section' => 'sidebar_section', 
			'id' => 'travel-time' . '_sidebar', 
			'title' => esc_html__('Custom Sidebars', 'travel-time'), 
			'desc' => '', 
			'type' => 'sidebar', 
			'std' => '' 
		);
		
		break;
	case 'icon':
		$options[] = array( 
			'section' => 'icon_section', 
			'id' => 'travel-time' . '_social_icons', 
			'title' => esc_html__('Social Icons', 'travel-time'), 
			'desc' => '', 
			'type' => 'social', 
			'std' => array( 
				'cmsmasters-icon-facebook-3|#|' . esc_html__('Facebook', 'travel-time') . '|true|#ffffff|#2d2d2d', 
				'cmsmasters-icon-twitter-3|#|' . esc_html__('Twitter', 'travel-time') . '|true|#ffffff|#2d2d2d',
				'cmsmasters-icon-youtube-1|#|' . esc_html__('YouTube', 'travel-time') . '|true|#ffffff|#2d2d2d',			
				'cmsmasters-icon-instagram|#|' . esc_html__('Instagram', 'travel-time') . '|true|#ffffff|#2d2d2d',
				'cmsmasters-icon-dribbble-6|#|' . esc_html__('Dribbble', 'travel-time') . '|true|#ffffff|#2d2d2d' 
			) 
		);
		
		break;
	case 'lightbox':
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'travel-time' . '_ilightbox_skin', 
			'title' => esc_html__('Skin', 'travel-time'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'dark', 
			'choices' => array( 
				esc_html__('Dark', 'travel-time') . '|dark', 
				esc_html__('Light', 'travel-time') . '|light', 
				esc_html__('Mac', 'travel-time') . '|mac', 
				esc_html__('Metro Black', 'travel-time') . '|metro-black', 
				esc_html__('Metro White', 'travel-time') . '|metro-white', 
				esc_html__('Parade', 'travel-time') . '|parade', 
				esc_html__('Smooth', 'travel-time') . '|smooth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'travel-time' . '_ilightbox_path', 
			'title' => esc_html__('Path', 'travel-time'), 
			'desc' => esc_html__('Sets path for switching windows', 'travel-time'), 
			'type' => 'radio', 
			'std' => 'vertical', 
			'choices' => array( 
				esc_html__('Vertical', 'travel-time') . '|vertical', 
				esc_html__('Horizontal', 'travel-time') . '|horizontal' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'travel-time' . '_ilightbox_infinite', 
			'title' => esc_html__('Infinite', 'travel-time'), 
			'desc' => esc_html__('Sets the ability to infinite the group', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'travel-time' . '_ilightbox_aspect_ratio', 
			'title' => esc_html__('Keep Aspect Ratio', 'travel-time'), 
			'desc' => esc_html__('Sets the resizing method used to keep aspect ratio within the viewport', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'travel-time' . '_ilightbox_mobile_optimizer', 
			'title' => esc_html__('Mobile Optimizer', 'travel-time'), 
			'desc' => esc_html__('Make lightboxes optimized for giving better experience with mobile devices', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'travel-time' . '_ilightbox_max_scale', 
			'title' => esc_html__('Max Scale', 'travel-time'), 
			'desc' => esc_html__('Sets the maximum viewport scale of the content', 'travel-time'), 
			'type' => 'number', 
			'std' => 1, 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'travel-time' . '_ilightbox_min_scale', 
			'title' => esc_html__('Min Scale', 'travel-time'), 
			'desc' => esc_html__('Sets the minimum viewport scale of the content', 'travel-time'), 
			'type' => 'number', 
			'std' => 0.2, 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'travel-time' . '_ilightbox_inner_toolbar', 
			'title' => esc_html__('Inner Toolbar', 'travel-time'), 
			'desc' => esc_html__('Bring buttons into windows, or let them be over the overlay', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'travel-time' . '_ilightbox_smart_recognition', 
			'title' => esc_html__('Smart Recognition', 'travel-time'), 
			'desc' => esc_html__('Sets content auto recognize from web pages', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'travel-time' . '_ilightbox_fullscreen_one_slide', 
			'title' => esc_html__('Fullscreen One Slide', 'travel-time'), 
			'desc' => esc_html__('Decide to fullscreen only one slide or hole gallery the fullscreen mode', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'travel-time' . '_ilightbox_fullscreen_viewport', 
			'title' => esc_html__('Fullscreen Viewport', 'travel-time'), 
			'desc' => esc_html__('Sets the resizing method used to fit content within the fullscreen mode', 'travel-time'), 
			'type' => 'select', 
			'std' => 'center', 
			'choices' => array( 
				esc_html__('Center', 'travel-time') . '|center', 
				esc_html__('Fit', 'travel-time') . '|fit', 
				esc_html__('Fill', 'travel-time') . '|fill', 
				esc_html__('Stretch', 'travel-time') . '|stretch' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'travel-time' . '_ilightbox_controls_toolbar', 
			'title' => esc_html__('Toolbar Controls', 'travel-time'), 
			'desc' => esc_html__('Sets buttons be available or not', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'travel-time' . '_ilightbox_controls_arrows', 
			'title' => esc_html__('Arrow Controls', 'travel-time'), 
			'desc' => esc_html__('Enable the arrow buttons', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'travel-time' . '_ilightbox_controls_fullscreen', 
			'title' => esc_html__('Fullscreen Controls', 'travel-time'), 
			'desc' => esc_html__('Sets the fullscreen button', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'travel-time' . '_ilightbox_controls_thumbnail', 
			'title' => esc_html__('Thumbnails Controls', 'travel-time'), 
			'desc' => esc_html__('Sets the thumbnail navigation', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'travel-time' . '_ilightbox_controls_keyboard', 
			'title' => esc_html__('Keyboard Controls', 'travel-time'), 
			'desc' => esc_html__('Sets the keyboard navigation', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'travel-time' . '_ilightbox_controls_mousewheel', 
			'title' => esc_html__('Mouse Wheel Controls', 'travel-time'), 
			'desc' => esc_html__('Sets the mousewheel navigation', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'travel-time' . '_ilightbox_controls_swipe', 
			'title' => esc_html__('Swipe Controls', 'travel-time'), 
			'desc' => esc_html__('Sets the swipe navigation', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'travel-time' . '_ilightbox_controls_slideshow', 
			'title' => esc_html__('Slideshow Controls', 'travel-time'), 
			'desc' => esc_html__('Enable the slideshow feature and button', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		break;
	case 'sitemap':
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'travel-time' . '_sitemap_nav', 
			'title' => esc_html__('Website Pages', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'travel-time' . '_sitemap_categs', 
			'title' => esc_html__('Blog Archives by Categories', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'travel-time' . '_sitemap_tags', 
			'title' => esc_html__('Blog Archives by Tags', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'travel-time' . '_sitemap_month', 
			'title' => esc_html__('Blog Archives by Month', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'travel-time' . '_sitemap_pj_categs', 
			'title' => esc_html__('Tours Archives by Categories', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'travel-time' . '_sitemap_pj_tags', 
			'title' => esc_html__('Tours Archives by Tags', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		break;
	case 'error':
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'travel-time' . '_error_color', 
			'title' => esc_html__('Text Color', 'travel-time'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '#292929' 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'travel-time' . '_error_bg_color', 
			'title' => esc_html__('Background Color', 'travel-time'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '#fbfbfb' 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'travel-time' . '_error_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'travel-time' . '_error_bg_image', 
			'title' => esc_html__('Background Image', 'travel-time'), 
			'desc' => esc_html__('Choose your custom error page background image.', 'travel-time'), 
			'type' => 'upload', 
			'std' => '', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'travel-time' . '_error_bg_rep', 
			'title' => esc_html__('Background Repeat', 'travel-time'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'no-repeat', 
			'choices' => array( 
				esc_html__('No Repeat', 'travel-time') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'travel-time') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'travel-time') . '|repeat-y', 
				esc_html__('Repeat', 'travel-time') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'travel-time' . '_error_bg_pos', 
			'title' => esc_html__('Background Position', 'travel-time'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'top center', 
			'choices' => array( 
				esc_html__('Top Left', 'travel-time') . '|top left', 
				esc_html__('Top Center', 'travel-time') . '|top center', 
				esc_html__('Top Right', 'travel-time') . '|top right', 
				esc_html__('Center Left', 'travel-time') . '|center left', 
				esc_html__('Center Center', 'travel-time') . '|center center', 
				esc_html__('Center Right', 'travel-time') . '|center right', 
				esc_html__('Bottom Left', 'travel-time') . '|bottom left', 
				esc_html__('Bottom Center', 'travel-time') . '|bottom center', 
				esc_html__('Bottom Right', 'travel-time') . '|bottom right' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'travel-time' . '_error_bg_att', 
			'title' => esc_html__('Background Attachment', 'travel-time'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'scroll', 
			'choices' => array( 
				esc_html__('Scroll', 'travel-time') . '|scroll', 
				esc_html__('Fixed', 'travel-time') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'travel-time' . '_error_bg_size', 
			'title' => esc_html__('Background Size', 'travel-time'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'cover', 
			'choices' => array( 
				esc_html__('Auto', 'travel-time') . '|auto', 
				esc_html__('Cover', 'travel-time') . '|cover', 
				esc_html__('Contain', 'travel-time') . '|contain' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'travel-time' . '_error_search', 
			'title' => esc_html__('Search Line', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'travel-time' . '_error_sitemap_button', 
			'title' => esc_html__('Sitemap Button', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'travel-time' . '_error_sitemap_link', 
			'title' => esc_html__('Sitemap Page URL', 'travel-time'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	case 'code':
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'travel-time' . '_custom_css', 
			'title' => esc_html__('Custom CSS', 'travel-time'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'travel-time' . '_custom_js', 
			'title' => esc_html__('Custom JavaScript', 'travel-time'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'travel-time' . '_gmap_api_key', 
			'title' => esc_html__('Google Maps API key', 'travel-time'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'travel-time' . '_api_key', 
			'title' => esc_html__('Twitter API key', 'travel-time'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'travel-time' . '_api_secret', 
			'title' => esc_html__('Twitter API secret', 'travel-time'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'travel-time' . '_access_token', 
			'title' => esc_html__('Twitter Access token', 'travel-time'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'travel-time' . '_access_token_secret', 
			'title' => esc_html__('Twitter Access token secret', 'travel-time'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	case 'recaptcha':
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => 'travel-time' . '_recaptcha_public_key', 
			'title' => esc_html__('reCAPTCHA Public Key', 'travel-time'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => 'travel-time' . '_recaptcha_private_key', 
			'title' => esc_html__('reCAPTCHA Private Key', 'travel-time'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	}
	
	return $options;	
}

