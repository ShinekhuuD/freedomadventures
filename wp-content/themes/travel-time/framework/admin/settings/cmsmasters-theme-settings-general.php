<?php 
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version 	1.0.7
 * 
 * Admin Panel General Options
 * Created by CMSMasters
 * 
 */


function travel_time_options_general_tabs() {
	$cmsmasters_option = travel_time_get_global_options();
	
	$tabs = array();
	
	$tabs['general'] = esc_attr__('General', 'travel-time');
	
	if ($cmsmasters_option['travel-time' . '_theme_layout'] === 'boxed') {
		$tabs['bg'] = esc_attr__('Background', 'travel-time');
	}
	
	$tabs['header'] = esc_attr__('Header', 'travel-time');
	$tabs['content'] = esc_attr__('Content', 'travel-time');
	$tabs['footer'] = esc_attr__('Footer', 'travel-time');
	
	return $tabs;
}


function travel_time_options_general_sections() {
	$tab = travel_time_get_the_tab();
	
	switch ($tab) {
	case 'general':
		$sections = array();
		
		$sections['general_section'] = esc_attr__('General Options', 'travel-time');
		
		break;
	case 'bg':
		$sections = array();
		
		$sections['bg_section'] = esc_attr__('Background Options', 'travel-time');
		
		break;
	case 'header':
		$sections = array();
		
		$sections['header_section'] = esc_attr__('Header Options', 'travel-time');
		
		break;
	case 'content':
		$sections = array();
		
		$sections['content_section'] = esc_attr__('Content Options', 'travel-time');
		
		break;
	case 'footer':
		$sections = array();
		
		$sections['footer_section'] = esc_attr__('Footer Options', 'travel-time');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return $sections;
} 


function travel_time_options_general_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = travel_time_get_the_tab();
	}
	
	$options = array();
	
	switch ($tab) {
	case 'general':
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'travel-time' . '_theme_layout', 
			'title' => esc_html__('Theme Layout', 'travel-time'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'liquid', 
			'choices' => array( 
				esc_html__('Liquid', 'travel-time') . '|liquid', 
				esc_html__('Boxed', 'travel-time') . '|boxed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'travel-time' . '_logo_type', 
			'title' => esc_html__('Logo Type', 'travel-time'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'image', 
			'choices' => array( 
				esc_html__('Image', 'travel-time') . '|image', 
				esc_html__('Text', 'travel-time') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'travel-time' . '_logo_url', 
			'title' => esc_html__('Logo Image', 'travel-time'), 
			'desc' => esc_html__('Choose your website logo image.', 'travel-time'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'travel-time' . '_logo_url_retina', 
			'title' => esc_html__('Retina Logo Image', 'travel-time'), 
			'desc' => esc_html__('Choose logo image for retina displays.', 'travel-time'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo_retina.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'travel-time' . '_logo_title', 
			'title' => esc_html__('Logo Title', 'travel-time'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => ((get_bloginfo('name')) ? get_bloginfo('name') : 'Travel Time'), 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'travel-time' . '_logo_subtitle', 
			'title' => esc_html__('Logo Subtitle', 'travel-time'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'travel-time' . '_logo_custom_color', 
			'title' => esc_html__('Custom Text Colors', 'travel-time'), 
			'desc' => esc_html__('enable', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'travel-time' . '_logo_title_color', 
			'title' => esc_html__('Logo Title Color', 'travel-time'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'travel-time' . '_logo_subtitle_color', 
			'title' => esc_html__('Logo Subtitle Color', 'travel-time'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '' 
		);
		
		break;
	case 'bg':
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'travel-time' . '_bg_col', 
			'title' => esc_html__('Background Color', 'travel-time'), 
			'desc' => '', 
			'type' => 'color', 
			'std' => '#f7f7f7' 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'travel-time' . '_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'travel-time' . '_bg_img', 
			'title' => esc_html__('Background Image', 'travel-time'), 
			'desc' => esc_html__('Choose your custom website background image url.', 'travel-time'), 
			'type' => 'upload', 
			'std' => '', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'travel-time' . '_bg_rep', 
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
			'section' => 'bg_section', 
			'id' => 'travel-time' . '_bg_pos', 
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
			'section' => 'bg_section', 
			'id' => 'travel-time' . '_bg_att', 
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
			'section' => 'bg_section', 
			'id' => 'travel-time' . '_bg_size', 
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
		
		break;
	case 'header':
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'travel-time' . '_fixed_header', 
			'title' => esc_html__('Fixed Header', 'travel-time'), 
			'desc' => esc_html__('enable', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'travel-time' . '_header_overlaps', 
			'title' => esc_html__('Header Overlaps Content', 'travel-time'), 
			'desc' => esc_html__('enable', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'travel-time' . '_header_top_line', 
			'title' => esc_html__('Top Line', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'travel-time' . '_header_top_height', 
			'title' => esc_html__('Top Height', 'travel-time'), 
			'desc' => esc_html__('pixels', 'travel-time'), 
			'type' => 'number', 
			'std' => '32', 
			'min' => '30' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'travel-time' . '_header_top_line_short_info', 
			'title' => esc_html__('Top Short Info', 'travel-time'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'travel-time') . '</strong>', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
	if (CMSMASTERS_DONATIONS) {
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'travel-time' . '_header_top_line_donations_but', 
			'title' => esc_html__('Top Donations Button', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'travel-time' . '_header_top_line_donations_but_text', 
			'title' => esc_html__('Top Donations Button Text', 'travel-time'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => esc_html__('Donate Now!', 'travel-time'), 
			'class' => 'nohtml' 
		);
	}
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'travel-time' . '_header_top_line_add_cont', 
			'title' => esc_html__('Top Additional Content', 'travel-time'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'social', 
			'choices' => array( 
				esc_html__('None', 'travel-time') . '|none', 
				esc_html__('Top Line Social Icons', 'travel-time') . '|social', 
				esc_html__('Top Line Navigation', 'travel-time') . '|nav' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'travel-time' . '_header_styles', 
			'title' => esc_html__('Header Styles', 'travel-time'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'default', 
			'choices' => array( 
				esc_html__('Default Style', 'travel-time') . '|default', 
				esc_html__('Compact Style Left Navigation', 'travel-time') . '|l_nav', 
				esc_html__('Compact Style Right Navigation', 'travel-time') . '|r_nav', 
				esc_html__('Compact Style Center Navigation', 'travel-time') . '|c_nav'
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'travel-time' . '_header_mid_height', 
			'title' => esc_html__('Header Middle Height', 'travel-time'), 
			'desc' => esc_html__('pixels', 'travel-time'), 
			'type' => 'number', 
			'std' => '80', 
			'min' => '80' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'travel-time' . '_header_bot_height', 
			'title' => esc_html__('Header Bottom Height', 'travel-time'), 
			'desc' => esc_html__('pixels', 'travel-time'), 
			'type' => 'number', 
			'std' => '50', 
			'min' => '40' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'travel-time' . '_header_search', 
			'title' => esc_html__('Header Search', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
	if (CMSMASTERS_DONATIONS) {
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'travel-time' . '_header_donations_but', 
			'title' => esc_html__('Header Donations Button', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'travel-time' . '_header_donations_but_text', 
			'title' => esc_html__('Header Donations Button Text', 'travel-time'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => esc_html__('Donate Now!', 'travel-time'), 
			'class' => 'nohtml' 
		);
	}
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'travel-time' . '_header_add_cont', 
			'title' => esc_html__('Header Additional Content', 'travel-time'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'social', 
			'choices' => array( 
				esc_html__('None', 'travel-time') . '|none', 
				esc_html__('Header Social Icons', 'travel-time') . '|social', 
				esc_html__('Header Custom HTML', 'travel-time') . '|cust_html' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'travel-time' . '_header_add_cont_cust_html', 
			'title' => esc_html__('Header Custom HTML', 'travel-time'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'travel-time') . '</strong>', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	case 'content':
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'travel-time' . '_layout', 
			'title' => esc_html__('Layout Type by Default', 'travel-time'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'r_sidebar', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'travel-time') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'travel-time') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'travel-time') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'travel-time' . '_archives_layout', 
			'title' => esc_html__('Archives Layout Type', 'travel-time'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'r_sidebar', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'travel-time') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'travel-time') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'travel-time') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'travel-time' . '_search_layout', 
			'title' => esc_html__('Search Layout Type', 'travel-time'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'r_sidebar', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'travel-time') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'travel-time') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'travel-time') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
	if (CMSMASTERS_EVENTS_CALENDAR) {
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'travel-time' . '_events_layout', 
			'title' => esc_html__('Events Calendar Layout Type', 'travel-time'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'fullwidth', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'travel-time') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'travel-time') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'travel-time') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
	}
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'travel-time' . '_other_layout', 
			'title' => esc_html__('Other Layout Type', 'travel-time'), 
			'desc' => 'Layout for pages of non-listed types', 
			'type' => 'radio_img', 
			'std' => 'r_sidebar', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'travel-time') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'travel-time') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'travel-time') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'travel-time' . '_heading_alignment', 
			'title' => esc_html__('Heading Alignment by Default', 'travel-time'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'left', 
			'choices' => array( 
				esc_html__('Left', 'travel-time') . '|left', 
				esc_html__('Right', 'travel-time') . '|right', 
				esc_html__('Center', 'travel-time') . '|center' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'travel-time' . '_heading_scheme', 
			'title' => esc_html__('Heading Custom Color Scheme by Default', 'travel-time'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'default', 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'travel-time' . '_heading_bg_image_enable', 
			'title' => esc_html__('Heading Background Image Visibility by Default', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'travel-time' . '_heading_bg_image', 
			'title' => esc_html__('Heading Background Image by Default', 'travel-time'), 
			'desc' => esc_html__('Choose your custom heading background image by default.', 'travel-time'), 
			'type' => 'upload', 
			'std' => '', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'travel-time' . '_heading_bg_repeat', 
			'title' => esc_html__('Heading Background Repeat by Default', 'travel-time'), 
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
			'section' => 'content_section', 
			'id' => 'travel-time' . '_heading_bg_attachment', 
			'title' => esc_html__('Heading Background Attachment by Default', 'travel-time'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'scroll', 
			'choices' => array( 
				esc_html__('Scroll', 'travel-time') . '|scroll', 
				esc_html__('Fixed', 'travel-time') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'travel-time' . '_heading_bg_size', 
			'title' => esc_html__('Heading Background Size by Default', 'travel-time'), 
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
			'section' => 'content_section', 
			'id' => 'travel-time' . '_heading_bg_color', 
			'title' => esc_html__('Heading Background Color Overlay by Default', 'travel-time'), 
			'desc' => '',  
			'type' => 'rgba', 
			'std' => '' 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'travel-time' . '_heading_height', 
			'title' => esc_html__('Heading Height by Default', 'travel-time'), 
			'desc' => esc_html__('pixels', 'travel-time'), 
			'type' => 'number', 
			'std' => '330', 
			'min' => '0' 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'travel-time' . '_breadcrumbs', 
			'title' => esc_html__('Breadcrumbs Visibility by Default', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'travel-time' . '_bottom_scheme', 
			'title' => esc_html__('Bottom Custom Color Scheme', 'travel-time'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'first', 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'travel-time' . '_bottom_sidebar', 
			'title' => esc_html__('Bottom Sidebar Visibility by Default', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'travel-time' . '_bottom_sidebar_layout', 
			'title' => esc_html__('Bottom Sidebar Layout by Default', 'travel-time'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => '14141414', 
			'choices' => array( 
				'1/1|11', 
				'1/2 + 1/2|1212', 
				'1/3 + 2/3|1323', 
				'2/3 + 1/3|2313', 
				'1/4 + 3/4|1434', 
				'3/4 + 1/4|3414', 
				'1/3 + 1/3 + 1/3|131313', 
				'1/2 + 1/4 + 1/4|121414', 
				'1/4 + 1/2 + 1/4|141214', 
				'1/4 + 1/4 + 1/2|141412', 
				'1/4 + 1/4 + 1/4 + 1/4|14141414' 
			) 
		);
		
		break;
	case 'footer':
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'travel-time' . '_footer_scheme', 
			'title' => esc_html__('Footer Custom Color Scheme', 'travel-time'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'footer', 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'travel-time' . '_footer_type', 
			'title' => esc_html__('Footer Type', 'travel-time'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'small', 
			'choices' => array( 
				esc_html__('Default', 'travel-time') . '|default', 
				esc_html__('Small', 'travel-time') . '|small' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'travel-time' . '_footer_additional_content', 
			'title' => esc_html__('Footer Additional Content', 'travel-time'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'nav', 
			'choices' => array( 
				esc_html__('None', 'travel-time') . '|none', 
				esc_html__('Footer Navigation', 'travel-time') . '|nav', 
				esc_html__('Social Icons', 'travel-time') . '|social', 
				esc_html__('Custom HTML', 'travel-time') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'travel-time' . '_footer_logo', 
			'title' => esc_html__('Footer Logo', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'travel-time' . '_footer_logo_url', 
			'title' => esc_html__('Footer Logo', 'travel-time'), 
			'desc' => esc_html__('Choose your website footer logo image.', 'travel-time'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo_footer.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'travel-time' . '_footer_logo_url_retina', 
			'title' => esc_html__('Footer Logo for Retina', 'travel-time'), 
			'desc' => esc_html__('Choose your website footer logo image for retina.', 'travel-time'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo_footer_retina.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'travel-time' . '_footer_nav', 
			'title' => esc_html__('Footer Navigation', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'travel-time' . '_footer_social', 
			'title' => esc_html__('Footer Social Icons', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'travel-time' . '_footer_html', 
			'title' => esc_html__('Footer Custom HTML', 'travel-time'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'travel-time') . '</strong>', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'travel-time' . '_footer_copyright', 
			'title' => esc_html__('Copyright Text', 'travel-time'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => 'Travel Time' . ' &copy; 2017 / ' . esc_html__('All Rights Reserved', 'travel-time'), 
			'class' => '' 
		);
		
		break;
	}
	
	return $options;	
}

