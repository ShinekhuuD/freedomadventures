<?php 
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version		1.0.4
 * 
 * Admin Panel Post, Tour, Profile & Donations Campaign Settings
 * Created by CMSMasters
 * 
 */


function travel_time_options_single_tabs() {
	$tabs = array();
	
	
	$tabs['post'] = esc_attr__('Post', 'travel-time');
	
	if (CMSMASTERS_PROJECT_COMPATIBLE && class_exists('Cmsmasters_Projects')) {
		$tabs['project'] = esc_attr__('Tour', 'travel-time');
	}
	
	if (CMSMASTERS_PROFILE_COMPATIBLE && class_exists('Cmsmasters_Profiles')) {
		$tabs['profile'] = esc_attr__('Profile', 'travel-time');
	}
	
	if (CMSMASTERS_DONATIONS) {
		$tabs['campaign'] = esc_attr__('Campaign', 'travel-time');
	}
	
	
	return $tabs;
}


function travel_time_options_single_sections() {
	$tab = travel_time_get_the_tab();
	
	
	switch ($tab) {
	case 'post':
		$sections = array();
		
		$sections['post_section'] = esc_attr__('Blog Post Options', 'travel-time');
		
		
		break;
	case 'project':
		$sections = array();
		
		$sections['project_section'] = esc_attr__('Tours Single Tour Options', 'travel-time');
		
		
		break;
	case 'profile':
		$sections = array();
		
		$sections['profile_section'] = esc_attr__('Person Block Profile Options', 'travel-time');
		
		
		break;
	case 'campaign':
		$sections = array();
		
		$sections['campaign_section'] = esc_attr__('Donations Campaign Options', 'travel-time');
		
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	
	return $sections;
} 


function travel_time_options_single_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = travel_time_get_the_tab();
	}
	
	
	$options = array();
	
	
	switch ($tab) {
	case 'post':
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'travel-time' . '_blog_post_layout', 
			'title' => esc_html__('Layout Type', 'travel-time'), 
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
			'section' => 'post_section', 
			'id' => 'travel-time' . '_blog_post_title', 
			'title' => esc_html__('Post Title', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'travel-time' . '_blog_post_date', 
			'title' => esc_html__('Post Date', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'travel-time' . '_blog_post_cat', 
			'title' => esc_html__('Post Categories', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'travel-time' . '_blog_post_author', 
			'title' => esc_html__('Post Author', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'travel-time' . '_blog_post_comment', 
			'title' => esc_html__('Post Comments', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'travel-time' . '_blog_post_tag', 
			'title' => esc_html__('Post Tags', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'travel-time' . '_blog_post_like', 
			'title' => esc_html__('Post Likes', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'travel-time' . '_blog_post_nav_box', 
			'title' => esc_html__('Posts Navigation Box', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'travel-time' . '_blog_post_share_box', 
			'title' => esc_html__('Sharing Box', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'travel-time' . '_blog_post_author_box', 
			'title' => esc_html__('About Author Box', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'travel-time' . '_blog_more_posts_box', 
			'title' => esc_html__('More Posts Box', 'travel-time'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'popular', 
			'choices' => array( 
				esc_html__('Show Related Posts', 'travel-time') . '|related', 
				esc_html__('Show Popular Posts', 'travel-time') . '|popular', 
				esc_html__('Show Recent Posts', 'travel-time') . '|recent', 
				esc_html__('Hide More Posts Box', 'travel-time') . '|hide' 
			) 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'travel-time' . '_blog_more_posts_count', 
			'title' => esc_html__('More Posts Box Items Number', 'travel-time'), 
			'desc' => esc_html__('posts', 'travel-time'), 
			'type' => 'number', 
			'std' => '3', 
			'min' => '2', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'travel-time' . '_blog_more_posts_pause', 
			'title' => esc_html__('More Posts Slider Pause Time', 'travel-time'), 
			'desc' => esc_html__("in seconds, if '0' - autoslide disabled", 'travel-time'), 
			'type' => 'number', 
			'std' => '1', 
			'min' => '0', 
			'max' => '20' 
		);
		
		
		break;
	case 'project':
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'travel-time' . '_portfolio_project_featured', 
			'title' => esc_html__('Featured Image', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
	
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'travel-time' . '_portfolio_project_title', 
			'title' => esc_html__('Tour Title', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'travel-time' . '_portfolio_project_details_title', 
			'title' => esc_html__('Tour Details Title', 'travel-time'), 
			'desc' => esc_html__('Enter a tour details block title', 'travel-time'), 
			'type' => 'text', 
			'std' => 'Tour details', 
			'class' => '' 
		);

		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'travel-time' . '_portfolio_project_type', 
			'title' => esc_html__('Tour Type', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'travel-time' . '_portfolio_project_icon', 
			'title' => esc_html__('Tour Icon', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'travel-time' . '_portfolio_project_duration', 
			'title' => esc_html__('Tour Duration', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'travel-time' . '_portfolio_project_participants', 
			'title' => esc_html__('Tour Participants', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'travel-time' . '_portfolio_project_price', 
			'title' => esc_html__('Tour Price', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'travel-time' . '_portfolio_project_price_null', 
			'title' => esc_html__('Show Tour Price if value is 0', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'travel-time' . '_portfolio_project_price_currency', 
			'title' => esc_html__('Tour Currency', 'travel-time'), 
			'desc' => esc_html__('Enter a tour currency', 'travel-time'), 
			'type' => 'text', 
			'std' => '$', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'travel-time' . '_portfolio_project_price_currency_pos', 
			'title' => esc_html__('Tour Currency Position', 'travel-time'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'before', 
			'choices' => array( 
				esc_html__('Before Price', 'travel-time') . '|before', 
				esc_html__('After Price', 'travel-time') . '|after'
			) 
		);
		
		if (CMSMASTERS_RATING) {
			$options[] = array( 
				'section' => 'project_section', 
				'id' => 'travel-time' . '_portfolio_project_rating', 
				'title' => esc_html__('Tour Rating', 'travel-time'), 
				'desc' => esc_html__('show', 'travel-time'), 
				'type' => 'checkbox', 
				'std' => 0 
			);
		}
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'travel-time' . '_portfolio_project_date', 
			'title' => esc_html__('Tour Date', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'travel-time' . '_portfolio_project_cat', 
			'title' => esc_html__('Tour Categories', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'travel-time' . '_portfolio_project_author', 
			'title' => esc_html__('Tour Author', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'travel-time' . '_portfolio_project_comment', 
			'title' => esc_html__('Tour Comments', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'travel-time' . '_portfolio_project_tag', 
			'title' => esc_html__('Tour Tags', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'travel-time' . '_portfolio_project_like', 
			'title' => esc_html__('Tour Likes', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'travel-time' . '_portfolio_project_link', 
			'title' => esc_html__('Tour Link', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'travel-time' . '_portfolio_project_share_box', 
			'title' => esc_html__('Sharing Box', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'travel-time' . '_portfolio_project_nav_box', 
			'title' => esc_html__('Tours Navigation Box', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'travel-time' . '_portfolio_project_author_box', 
			'title' => esc_html__('About Author Box', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'travel-time' . '_portfolio_more_projects_box', 
			'title' => esc_html__('More Tours Box', 'travel-time'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'popular', 
			'choices' => array( 
				esc_html__('Show Related Tours', 'travel-time') . '|related', 
				esc_html__('Show Popular Tours', 'travel-time') . '|popular', 
				esc_html__('Show Recent Tours', 'travel-time') . '|recent', 
				esc_html__('Hide More Tours Box', 'travel-time') . '|hide' 
			) 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'travel-time' . '_portfolio_more_projects_count', 
			'title' => esc_html__('More Tours Box Items Number', 'travel-time'), 
			'desc' => esc_html__('tours', 'travel-time'), 
			'type' => 'number', 
			'std' => '4', 
			'min' => '2', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'travel-time' . '_portfolio_more_projects_pause', 
			'title' => esc_html__('More Tours Slider Pause Time', 'travel-time'), 
			'desc' => esc_html__("in seconds, if '0' - autoslide disabled", 'travel-time'), 
			'type' => 'number', 
			'std' => '1', 
			'min' => '0', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'travel-time' . '_portfolio_project_slug', 
			'title' => esc_html__('Tour Slug', 'travel-time'), 
			'desc' => esc_html__('Enter a page slug that should be used for your tours single item', 'travel-time'), 
			'type' => 'text', 
			'std' => 'tour', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'travel-time' . '_portfolio_pj_categs_slug', 
			'title' => esc_html__('Tour Categories Slug', 'travel-time'), 
			'desc' => esc_html__('Enter page slug that should be used on tours categories archive page', 'travel-time'), 
			'type' => 'text', 
			'std' => 'pj-categs', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'travel-time' . '_portfolio_pj_tags_slug', 
			'title' => esc_html__('Tour Tags Slug', 'travel-time'), 
			'desc' => esc_html__('Enter page slug that should be used on tours tags archive page', 'travel-time'), 
			'type' => 'text', 
			'std' => 'pj-tags', 
			'class' => '' 
		);
		
		
		break;
	case 'profile':
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'travel-time' . '_profile_post_title', 
			'title' => esc_html__('Profile Title', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'travel-time' . '_profile_post_details_title', 
			'title' => esc_html__('Profile Details Title', 'travel-time'), 
			'desc' => esc_html__('Enter a profile details block title', 'travel-time'), 
			'type' => 'text', 
			'std' => 'Profile details', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'travel-time' . '_profile_post_cat', 
			'title' => esc_html__('Profile Categories', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'travel-time' . '_profile_post_comment', 
			'title' => esc_html__('Profile Comments', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'travel-time' . '_profile_post_like', 
			'title' => esc_html__('Profile Likes', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'travel-time' . '_profile_post_nav_box', 
			'title' => esc_html__('Profiles Navigation Box', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'travel-time' . '_profile_post_share_box', 
			'title' => esc_html__('Sharing Box', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'travel-time' . '_profile_post_slug', 
			'title' => esc_html__('Profile Slug', 'travel-time'), 
			'desc' => esc_html__('Enter a page slug that should be used for your profiles single item', 'travel-time'), 
			'type' => 'text', 
			'std' => 'profile', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'travel-time' . '_profile_pl_categs_slug', 
			'title' => esc_html__('Profile Categories Slug', 'travel-time'), 
			'desc' => esc_html__('Enter page slug that should be used on profiles categories archive page', 'travel-time'), 
			'type' => 'text', 
			'std' => 'pl-categs', 
			'class' => '' 
		);
		
		
		break;
	case 'campaign':
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'travel-time' . '_donations_campaign_layout', 
			'title' => esc_html__('Layout Type', 'travel-time'), 
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
			'section' => 'campaign_section', 
			'id' => 'travel-time' . '_donations_campaign_title', 
			'title' => esc_html__('Campaign Title', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'travel-time' . '_donations_campaign_date', 
			'title' => esc_html__('Campaign Date', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'travel-time' . '_donations_campaign_cat', 
			'title' => esc_html__('Campaign Categories', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'travel-time' . '_donations_campaign_author', 
			'title' => esc_html__('Campaign Author', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'travel-time' . '_donations_campaign_comment', 
			'title' => esc_html__('Campaign Comments', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'travel-time' . '_donations_campaign_tag', 
			'title' => esc_html__('Campaign Tags', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'travel-time' . '_donations_campaign_like', 
			'title' => esc_html__('Campaign Likes', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'travel-time' . '_donations_campaign_nav_box', 
			'title' => esc_html__('Campaign Navigation Box', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'travel-time' . '_donations_campaign_share_box', 
			'title' => esc_html__('Sharing Box', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'travel-time' . '_donations_campaign_author_box', 
			'title' => esc_html__('About Author Box', 'travel-time'), 
			'desc' => esc_html__('show', 'travel-time'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'travel-time' . '_donations_more_campaigns_box', 
			'title' => esc_html__('More Campaigns Box', 'travel-time'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'related', 
			'choices' => array( 
				esc_html__('Show Related Campaigns', 'travel-time') . '|related', 
				esc_html__('Show Popular Campaigns', 'travel-time') . '|popular', 
				esc_html__('Show Recent Campaigns', 'travel-time') . '|recent', 
				esc_html__('Hide More Campaigns Box', 'travel-time') . '|hide' 
			) 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'travel-time' . '_donations_more_campaigns_count', 
			'title' => esc_html__('More Campaigns Box Items Number', 'travel-time'), 
			'desc' => esc_html__('campaigns', 'travel-time'), 
			'type' => 'number', 
			'std' => '3', 
			'min' => '2', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'travel-time' . '_donations_more_campaigns_pause', 
			'title' => esc_html__('More Campaigns Slider Pause Time', 'travel-time'), 
			'desc' => esc_html__("in seconds, if '0' - autoslide disabled", 'travel-time'), 
			'type' => 'number', 
			'std' => '0', 
			'min' => '0', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'travel-time' . '_donations_campaign_slug', 
			'title' => esc_html__('Campaign Slug', 'travel-time'), 
			'desc' => esc_html__('Enter a page slug that should be used for your donations campaign single item', 'travel-time'), 
			'type' => 'text', 
			'std' => 'campaign', 
			'class' => '' 
		);
		
		
		break;
	}
	
	
	return $options;
}

