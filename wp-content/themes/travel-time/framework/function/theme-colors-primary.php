<?php
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version 	1.0.2
 * 
 * Theme Primary Color Schemes Rules
 * Created by CMSMasters
 * 
 */


function travel_time_theme_colors_primary() {
	$cmsmasters_option = travel_time_get_global_options();
	
	
	$cmsmasters_color_schemes = cmsmasters_color_schemes_list();
	
	
	$custom_css = "/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version 	1.0.2
 * 
 * Theme Primary Color Schemes Rules
 * Created by CMSMasters
 * 
 */

";
	
	
	foreach ($cmsmasters_color_schemes as $scheme => $title) {
		$rule = (($scheme != 'default') ? "html .cmsmasters_color_scheme_{$scheme} " : '');
		
		
		$custom_css .= "
/***************** Start {$title} Color Scheme Rules ******************/

	/* Start Main Content Font Color */
	" . (($scheme == 'default') ? "body," : '') . "
	" . (($scheme != 'default') ? ".cmsmasters_color_scheme_{$scheme}," : '') . "
	{$rule}.sticky:before, 
	{$rule}.widget_custom_posts_tabs_entries .tab_comments li span, 
	{$rule}.cmsmasters_post_masonry .cmsmasters_post_top_wrap .entry-meta a, 
	{$rule}.cmsmasters_post_timeline .cmsmasters_post_top_wrap .entry-meta a, 
	{$rule}.subpage_nav > span, 
	{$rule}.cmsmasters_wrap_pagination .page-numbers.current, 
	{$rule}.cmsmasters_post_default .cmsmasters_post_info a, 
	{$rule}.cmsmasters_post_cont_info_top a, 
	{$rule}.cmsmasters_pricing_table .feature_list .feature_link, 
	{$rule}input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	{$rule}textarea,
	{$rule}select,
	{$rule}option, 
	{$rule}#page .cmsmasters_social_icon {
		" . cmsmasters_color_css('color', $cmsmasters_option['travel-time' . '_' . $scheme . '_color']) . "
	}
	
	{$rule}textarea::-webkit-input-placeholder, 
	{$rule}input::-webkit-input-placeholder {
		" . cmsmasters_color_css('color', $cmsmasters_option['travel-time' . '_' . $scheme . '_color']) . "
	}

	{$rule}textarea:-moz-placeholder, 
	{$rule}input:-moz-placeholder {
		" . cmsmasters_color_css('color', $cmsmasters_option['travel-time' . '_' . $scheme . '_color']) . "
	}
	
	{$rule}#page #footer .cmsmasters_social_icon, 
	{$rule}#page #header .cmsmasters_social_icon {
		background-color:transparent;
	}
	/* Finish Main Content Font Color */
	
	
	/* Start Primary Color */
	{$rule}.widget_rss ul li .rsswidget:hover, 
	{$rule}.widget_pages ul li a:hover, 
	{$rule}.widget_categories ul li a:hover, 
	{$rule}.widget_archive ul li a:hover, 
	{$rule}.widget_meta ul li a:hover, 
	{$rule}.widget_recent_comments ul li a:hover, 
	{$rule}.widget_recent_entries ul li a:hover, 
	{$rule}.widget_nav_menu ul li a:hover, 
	{$rule}.widget_custom_contact_info_entries div:before, 
	{$rule}.widget_custom_contact_info_entries span:before, 
	{$rule}.widget_custom_twitter_entries .tweet_time:before, 
	{$rule}.widget_custom_posts_tabs_entries .tab_comments li a:hover, 
	{$rule}.widget_custom_posts_tabs_entries .cmsmasters_lpr_tabs_cont > a:hover, 
	{$rule}.widget_categories ul li a:hover, 
	{$rule}.cmsmasters_open_project .project_details_item_desc .project_details_item_type[class*='cmsmasters-icon-']:before, 
	{$rule}.subpage_nav > a, 
	{$rule}.cmsmasters_wrap_pagination .page-numbers, 
	{$rule}.cmsmasters_comment_item_cont_info > a,  
	{$rule}.cmsmasters_comment_item_cont_info > a:hover,  
	{$rule}.cmsmasters_post_read_more, 
	{$rule}.cmsmasters_post_read_more:hover, 
	{$rule}.cmsmasters_slider_post_read_more, 
	{$rule}.cmsmasters_slider_post_read_more:hover, 
	{$rule}.share_posts a, 
	{$rule}.share_posts a:hover, 
	{$rule}.post_nav a:hover, 
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item.pricing_best .cmsmasters_period, 
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item.pricing_best .cmsmasters_price_wrap, 
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item.pricing_best .feature_list .feature_icon:before, 
	{$rule}.cmsmasters_pricing_table .feature_list li:hover a, 
	{$rule}.cmsmasters_pricing_table .feature_list li:hover .feature_icon:before, 
	{$rule}.cmsmasters_notice .notice_close:hover, 
	{$rule}.cmsmasters_twitter_wrap .twr_icon, 
	{$rule}.cmsmasters_toggles .current_toggle .cmsmasters_toggle_title .cmsmasters_toggle_arrow:after, 
	{$rule}.cmsmasters_toggles .cmsmasters_toggle_title:hover .cmsmasters_toggle_arrow:after, 
	{$rule}.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner:before,
	{$rule}#page .search_bar_wrap .search_button button, 
	{$rule}a,
	{$rule}h1 a:hover,
	{$rule}h2 a:hover,
	{$rule}h3 a:hover,
	{$rule}h4 a:hover,
	{$rule}h5 a:hover,
	{$rule}h6 a:hover,
	{$rule}.color_2,
	{$rule}.cmsmasters_dropcap.type1,
	{$rule}.cmsmasters_wrap_more_items.cmsmasters_loading:before,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_top:before,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_heading_left .icon_box_heading:before,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_icon .cmsmasters_icon_list_icon:before,
	{$rule}.cmsmasters_stats.stats_mode_bars.stats_type_horizontal .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner:before, 
	{$rule}.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner:before, 
	{$rule}.bypostauthor > .comment-body .alignleft:before, 
	{$rule}.cmsmasters_attach_img .cmsmasters_attach_img_edit a, 
	{$rule}.cmsmasters_attach_img .cmsmasters_attach_img_meta a, 
	{$rule}.cmsmasters_toggles .cmsmasters_toggle_title:hover a	{
		" . cmsmasters_color_css('color', $cmsmasters_option['travel-time' . '_' . $scheme . '_link']) . "
	}
	
	" . (($scheme == 'default') ? "#slide_top," : '') . "
	" . (($scheme == 'default') ? "mark," : '') . "
	" . (($scheme != 'default') ? ".cmsmasters_color_scheme_{$scheme} mark," : '') . "
	" . (($scheme == 'default') ? ".headline_outer," : '') . "
	{$rule}.widget_tag_cloud a, 
	{$rule}#wp-calendar caption, 
	{$rule}#page .cmsmasters_button_inverse, 
	{$rule}.cmsmasters_archive_type .cmsmasters_archive_item_type, 
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li.current a, 
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li a:hover, 
	{$rule}a.cmsmasters_post_filter_but:hover,
	{$rule}a.cmsmasters_post_filter_but.current,
	{$rule}.cmsmasters_project_filter a:hover,
	{$rule}.cmsmasters_project_filter a.current, 
	{$rule}.cmsmasters_img_rollover_wrap .img_placeholder, 
	{$rule}.cmsmasters_img_wrap .img_placeholder, 
	{$rule}.cmsmasters_post_timeline .cmsmasters_post_date .cmsmasters_mon, 
	{$rule}.cmsmasters_wrap_pagination .page-numbers:before, 
	{$rule}.cmsmasters_wrap_pagination .page-numbers.prev, 
	{$rule}.cmsmasters_wrap_pagination .page-numbers.next, 
	{$rule}.cmsmasters_comment_item_cont_info > a:before,  
	{$rule}.share_posts a:before, 
	{$rule}.cmsmasters_slider_post_read_more:before, 
	{$rule}.cmsmasters_post_read_more:before, 
	{$rule}#page .cmsmasters_social_icon:hover, 
	{$rule}.cmsmasters_table thead tr, 
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item.pricing_best .cmsmasters_button, 
	{$rule}.cmsmasters_tabs .cmsmasters_tabs_list_item.current_tab a,  
	{$rule}.cmsmasters_tabs .cmsmasters_tabs_list_item a:hover, 
	{$rule}.cmsmasters_toggles .current_toggle .cmsmasters_toggle_title .cmsmasters_toggle_arrow, 
	{$rule}.cmsmasters_toggles .cmsmasters_toggle_title:hover .cmsmasters_toggle_arrow, 
	{$rule}.cmsmasters_content_slider .owl-pagination .owl-page.active,
	{$rule}.owl-pagination .owl-page.active, 
	{$rule}.owl-pagination .owl-page:hover, 
	{$rule}.cmsmasters_button:hover, 
	{$rule}.button:hover, 
	{$rule}input[type=submit]:hover, 
	{$rule}input[type=button]:hover, 
	{$rule}button:hover, 
	{$rule}.cmsmasters_prev_arrow:hover, 
	{$rule}.cmsmasters_next_arrow:hover, 
	{$rule}.post_nav > span a:hover + span, 
	{$rule}.cmsmasters_dropcap.type2,
	{$rule}.cmsmasters_icon_list_items .cmsmasters_icon_list_item .cmsmasters_icon_list_icon,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_bg .cmsmasters_icon_list_item .cmsmasters_icon_list_icon,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_icon .cmsmasters_icon_list_item:hover .cmsmasters_icon_list_icon,
	{$rule}.cmsmasters_stats.stats_mode_bars .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner,  
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=checkbox] + span.wpcf7-list-item-label:after, 
	{$rule}.cmsmasters-form-builder .check_parent input[type=checkbox] + label:after, 
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=radio] + span.wpcf7-list-item-label:after, 
	{$rule}.cmsmasters-form-builder .check_parent input[type=radio] + label:after, 
	{$rule}.cmsmasters_post_tags > a {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_border .cmsmasters_icon_list_item .cmsmasters_icon_list_icon:after,  
	{$rule}input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]):focus,
	{$rule}textarea:focus {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_link']) . "
	}
	/* Finish Primary Color */
	
	
	/* Start Highlight Color */
	" . (($scheme == 'default') ? ".headline_outer a:hover," : '') . "
	{$rule}.cmsmasters_slider_project .cmsmasters_slider_project_inner .cmsmasters_slider_project_category a:hover, 
	{$rule}#wp-calendar tbody td#today, 
	{$rule}#page .cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > a:hover, 
	{$rule}#page .cmsmasters_sitemap_wrap a:hover, 
	{$rule}.cmsmasters_single_slider_item_tour .cmsmasters_single_slider_item_title a:hover, 
	{$rule}.cmsmasters_post_cont_info_top a:hover, 
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item.pricing_best .feature_list li:hover a, 
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item.pricing_best .feature_list li:hover .feature_icon:before, 
	{$rule}.cmsmasters_pricing_table .feature_list .feature_icon:before, 
	{$rule}.cmsmasters_pricing_table .cmsmasters_price_wrap, 
	{$rule}.cmsmasters_pricing_table .cmsmasters_period, 
	{$rule}.cmsmasters_post_default .cmsmasters_post_info a:hover, 
	{$rule}#page .search_bar_wrap .search_button button:hover, 
	{$rule}a:hover,
	{$rule}a.cmsmasters_cat_color:hover,
	{$rule}.cmsmasters_attach_img .cmsmasters_attach_img_edit a:hover, 
	{$rule}.cmsmasters_attach_img .cmsmasters_attach_img_meta a:hover, 
	{$rule}#page .cmsmasters_social_icon:hover, 
	{$rule}#page #footer .cmsmasters_social_icon:hover {
		" . cmsmasters_color_css('color', $cmsmasters_option['travel-time' . '_' . $scheme . '_hover']) . "
	}
	
	" . (($scheme == 'default') ? "#slide_top:hover, " : '') . " 
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_bg .cmsmasters_icon_list_item:hover .cmsmasters_icon_list_icon,
	{$rule}.cmsmasters_icon_list_items .cmsmasters_icon_list_item:hover .cmsmasters_icon_list_icon,
	{$rule}.widget_tag_cloud a:hover, 
	{$rule}#page .cmsmasters_button_inverse:hover, 
	{$rule}.cmsmasters_archive_type .cmsmasters_archive_item_tour_price, 
	{$rule}.cmsmasters_portfolio_project_price, 
	{$rule}.cmsmasters_single_slider_item_tour_price, 
	{$rule}a.cmsmasters_post_filter_but, 
	{$rule}.cmsmasters_project_filter a, 
	{$rule}.cmsmasters_table tfoot tr, 
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item.pricing_best .cmsmasters_button:hover, 
	{$rule}.cmsmasters_button, 
	{$rule}.button, 
	{$rule}input[type=submit], 
	{$rule}input[type=button], 
	{$rule}button, 
	{$rule}.cmsmasters_post_tags > a:hover {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_hover']) . "
	}
	
	{$rule}#page .search_bar_wrap .search_button button, 
	{$rule}#page .search_bar_wrap .search_button button:hover {
		background-color:transparent;
	}
	/* Finish Highlight Color */
	
	
	/* Start Headings Color */
	" . (($scheme == 'default') ? ".headline_outer," : '') . "
	{$rule}label, 
	{$rule}.widget_rss ul li cite, 
	{$rule}.widget_rss ul li .rsswidget, 
	{$rule}.widget_pages ul li a, 
	{$rule}.widget_categories ul li a, 
	{$rule}.widget_archive ul li a, 
	{$rule}.widget_meta ul li a, 
	{$rule}.widget_recent_comments ul li a, 
	{$rule}.widget_recent_entries ul li a, 
	{$rule}.widget_nav_menu ul li a, 
	{$rule}.widget_custom_contact_info_entries span, 
	{$rule}.widget_custom_posts_tabs_entries .tab_comments li a, 
	{$rule}.widget_custom_posts_tabs_entries .cmsmasters_lpr_tabs_cont > a, 
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_archive > li, 
	{$rule}.cmsmasters_sitemap_wrap a, 
	{$rule}.cmsmasters_portfolio_project_duration,
	{$rule}.cmsmasters_portfolio_project_participants, 
	{$rule}.cmsmasters_single_slider_item_tour .cmsmasters_single_slider_item_inner_meta span, 
	{$rule}.cmsmasters_post_timeline .cmsmasters_post_date .cmsmasters_day, 
	{$rule}.cmsmasters_open_project .project_details_item_title, 
	{$rule}.cmsmasters_open_project .project_features_item_title, 
	{$rule}.cmsmasters_open_profile .profile_details_item_title, 
	{$rule}.cmsmasters_open_profile .profile_features_item_title, 
	{$rule}.post_nav a, 
	{$rule}.post_nav > span > span, 
	{$rule}h1,
	{$rule}h2,
	{$rule}h3,
	{$rule}h4,
	{$rule}h5,
	{$rule}h6,
	{$rule}h1 a,
	{$rule}h2 a,
	{$rule}h3 a,
	{$rule}h4 a,
	{$rule}h5 a,
	{$rule}h6 a,
	{$rule}fieldset legend,
	{$rule}blockquote footer,
	{$rule}table caption,
	{$rule}.img_placeholder_small, 
	{$rule}.cmsmasters_stats.stats_mode_bars.stats_type_horizontal .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner,
	{$rule}.cmsmasters_stats.stats_mode_bars.stats_type_vertical .cmsmasters_stat_wrap .cmsmasters_stat_title,
	{$rule}.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter_wrap,
	{$rule}.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat_title, 
	{$rule}.cmsmasters_stats.stats_mode_bars.stats_type_vertical .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_title_counter_wrap, 
	{$rule}.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_counter_wrap, 
	{$rule}.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_title, 
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > a,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > ul > li > a,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > ul > li > ul li a:before,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_category > li > a,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_category > li > ul li a:before,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_archive > li a:before, 
	{$rule}.cmsmasters_toggles .cmsmasters_toggle_title a, 
	{$rule}.cmsmasters_quote_content * , 
	{$rule}.cmsmasters_twitter_wrap .published {
		" . cmsmasters_color_css('color', $cmsmasters_option['travel-time' . '_' . $scheme . '_heading']) . "
	}
	
	{$rule}form .formError .formErrorContent {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_heading']) . "
	}
	
	/* Finish Headings Color */
	
	
	/* Start Main Background Color */
	{$rule}mark,
	{$rule}form .formError .formErrorContent,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_left_top:before,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_left:before,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_top:before,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_border .cmsmasters_icon_list_item .cmsmasters_icon_list_icon:before,
	{$rule}.cmsmasters_stats.stats_mode_bars.stats_type_vertical .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner, 
	{$rule}.portfolio.grid .cmsmasters_project_category	a:hover {
		" . cmsmasters_color_css('color', $cmsmasters_option['travel-time' . '_' . $scheme . '_bg']) . "
	}
	
	" . (($scheme == 'default') ? "body," : '') . "
	" . (($scheme != 'default') ? ".cmsmasters_color_scheme_{$scheme}," : '') . "
	" . (($scheme == 'default') ? ".middle_inner," : '') . "
	{$rule}input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	{$rule}textarea,
	{$rule}option {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_bg']) . "
	}
	/* Finish Main Background Color */
	
	
	/* Start Alternate Background Color */
	{$rule}.cmsmasters_notice .notice_close, 
	{$rule}.cmsmasters_toggles .cmsmasters_toggle_title .cmsmasters_toggle_arrow:after, 
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_icon .cmsmasters_icon_list_icon_wrap,  
	{$rule}#page .cmsmasters_social_icon {
		" . cmsmasters_color_css('color', $cmsmasters_option['travel-time' . '_' . $scheme . '_alternate']) . "
	}

	{$rule}#wp-calendar thead, 
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li a, 
	{$rule}.cmsmasters_wrap_pagination .page-numbers.prev:hover, 
	{$rule}.cmsmasters_wrap_pagination .page-numbers.next:hover, 
	{$rule}#page .cmsmasters_social_icon, 
	{$rule}.cmsmasters_stats.stats_mode_bars.stats_type_horizontal .cmsmasters_stat_wrap:before, 
	{$rule}.cmsmasters_tabs .cmsmasters_tabs_list_item a, 
	{$rule}.cmsmasters_toggles .cmsmasters_toggle_title .cmsmasters_toggle_arrow, 
	{$rule}.owl-pagination .owl-page, 
	{$rule}.cmsmasters_prev_arrow, 
	{$rule}.cmsmasters_next_arrow, 
	{$rule}select,
	{$rule}fieldset,
	{$rule}fieldset legend,
	{$rule}.img_placeholder_small, 
	{$rule}.cmsmasters_featured_block,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_top,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_left,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_icon .cmsmasters_icon_list_icon,
	{$rule}.gallery-item .gallery-icon,
	{$rule}.gallery-item .gallery-caption,
	{$rule}.cmsmasters_img.with_caption {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_alternate']) . "
	}
	/* Finish Alternate Background Color */
	
	
	/* Start Borders Color */
	{$rule}.cmsmasters_icon_list_items.cmsmasters_icon_list_type_block .cmsmasters_icon_list_item:before, 
	{$rule}.sticky:before,  
	{$rule}.blog.timeline:before, 
	{$rule}.blog.timeline .post:before, 
	{$rule}.quote_two.cmsmasters_quotes_grid .cmsmasters_quotes_vert span, 
	{$rule}.cmsmasters_quotes_grid .cmsmasters_quotes_list:before, 
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li:before {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_border']) . "
	}
	
	" . (($scheme == 'default') ? ".headline_outer," : '') . "
	{$rule}.widget_rss ul li, 
	{$rule}.widget_pages ul li, 
	{$rule}.widget_categories ul li, 
	{$rule}.widget_archive ul li, 
	{$rule}.widget_meta ul li, 
	{$rule}.widget_recent_comments ul li, 
	{$rule}.widget_recent_entries ul li, 
	{$rule}.widget_nav_menu ul li a, 
	{$rule}.widget_custom_contact_info_entries div, 
	{$rule}.widget_custom_contact_info_entries span, 
	{$rule}.widget_custom_twitter_entries ul li, 
	{$rule}.widget_custom_posts_tabs_entries .tab_comments li, 
	{$rule}.widget_categories ul li, 
	{$rule}.cmsmasters_post_footer, 
	{$rule}.cmsmasters_post_cont_wrap > div, 
	{$rule}.cmsmasters_open_project .project_details_item, 
	{$rule}.cmsmasters_open_project .project_features_item, 
	{$rule}.cmsmasters_open_profile .profile_details_item, 
	{$rule}.cmsmasters_open_profile .profile_features_item, 
	{$rule}.post_nav > span, 
	{$rule}.post_nav, 
	{$rule}select, 
	{$rule}.cmsmasters_table tr, 
	{$rule}.cmsmasters_table, 
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item_inner, 
	{$rule}.cmsmasters_toggles .cmsmasters_toggle_wrap, 
	{$rule}.cmsmasters_attach_img .cmsmasters_attach_img_info, 
	{$rule}input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	{$rule}textarea,
	{$rule}option,
	{$rule}hr,
	{$rule}.cmsmasters_divider,
	{$rule}.cmsmasters_widget_divider,
	{$rule}.cmsmasters_icon_wrap .cmsmasters_simple_icon, 
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_top,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_left,
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=checkbox] + span.wpcf7-list-item-label:before, 
	{$rule}.cmsmasters-form-builder .check_parent input[type=checkbox] + label:before, 
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=radio] + span.wpcf7-list-item-label:before, 
	{$rule}.cmsmasters-form-builder .check_parent input[type=radio] + label:before {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_border']) . "
	}
	/* Finish Borders Color */
	
	
	/* Start Additional Color */
	" . (($scheme == 'default') ? "#slide_top," : '') . "
	{$rule}.cmsmasters_icon_list_items .cmsmasters_icon_list_item .cmsmasters_icon_list_icon,
	{$rule}.cmsmasters_post_puzzle .cmsmasters_post_cont .puzzle_post_content_wrapper:before, 
	{$rule}.widget_tag_cloud a, 
	{$rule}.cmsmasters_slider_project .cmsmasters_slider_project_inner .cmsmasters_slider_project_category a, 
	{$rule}.cmsmasters_slider_project .cmsmasters_slider_project_inner .cmsmasters_slider_project_category, 
	{$rule}.cmsmasters_slider_project .cmsmasters_slider_project_title a, 
	{$rule}#wp-calendar thead, 
	{$rule}#wp-calendar caption, 
	{$rule}.cmsmasters_tabs .cmsmasters_lpr_tabs_img, 
	{$rule}#page .cmsmasters_button_inverse, 
	{$rule}.button:hover, 
	{$rule}.error .error_inner .error_title, 
	{$rule}.error .error_inner .error_subtitle, 
	{$rule}.cmsmasters_archive_type .cmsmasters_archive_item_tour_price, 
	{$rule}.cmsmasters_archive_type .cmsmasters_archive_item_type, 
	{$rule}.portfolio.puzzle .cmsmasters_project_header .cmsmasters_project_title a, 
	{$rule}.portfolio.grid .cmsmasters_project_header .cmsmasters_project_title a, 
	{$rule}.cmsmasters_slider_project .cmsmasters_slider_project_header .cmsmasters_project_title a, 
	{$rule}.cmsmasters_portfolio_project_price, 
	{$rule}.cmsmasters_portfolio_project_icon, 
	{$rule}.portfolio.grid .cmsmasters_project_category, 
	{$rule}.portfolio.grid .cmsmasters_project_category a, 
	{$rule}.portfolio.grid .cmsmasters_project_comments a, 
	{$rule}.portfolio.grid .cmsmasters_project_likes a, 
	{$rule}.cmsmasters_slider_project .cmsmasters_slider_project_category, 
	{$rule}.cmsmasters_slider_project .cmsmasters_slider_project_category a, 
	{$rule}.cmsmasters_slider_project .cmsmasters_slider_project_comments a, 
	{$rule}.cmsmasters_slider_project .cmsmasters_slider_project_likes a, 	
	{$rule}.portfolio.puzzle .cmsmasters_project_category, 
	{$rule}.portfolio.puzzle .cmsmasters_project_category a, 
	{$rule}.portfolio.puzzle .cmsmasters_project_comments a, 
	{$rule}.portfolio.puzzle .cmsmasters_project_likes a, 
	{$rule}.cmsmasters_single_slider_item_tour_icon, 
	{$rule}.cmsmasters_single_slider_item_tour_price, 
	{$rule}.cmsmasters_single_slider_item_tour .cmsmasters_single_slider_item_title a, 
	{$rule}.cmsmasters_post_puzzle .cmsmasters_post_cont .cmsmasters_post_top_wrap .entry-meta, 
	{$rule}.cmsmasters_post_puzzle .cmsmasters_post_cont .cmsmasters_post_top_wrap .entry-meta a, 
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li a, 
	{$rule}a.cmsmasters_post_filter_but, 
	{$rule}.cmsmasters_project_filter a, 
	{$rule}.cmsmasters_img_rollover_wrap .img_placeholder, 
	{$rule}.cmsmasters_img_wrap .img_placeholder, 
	{$rule}.cmsmasters_slider_post .cmsmasters_post_top_wrap .entry-meta * , 
	{$rule}.cmsmasters_post_masonry .cmsmasters_post_top_wrap .entry-meta.cmsmasters_with_image .cmsmasters_post_date, 
	{$rule}.cmsmasters_post_timeline .cmsmasters_post_top_wrap .entry-meta.cmsmasters_with_image a, 
	{$rule}.cmsmasters_post_masonry .cmsmasters_post_top_wrap .entry-meta.cmsmasters_with_image a, 
	{$rule}.cmsmasters_post_timeline .cmsmasters_post_date .cmsmasters_mon, 
	{$rule}.cmsmasters_wrap_pagination .page-numbers.prev, 
	{$rule}.cmsmasters_wrap_pagination .page-numbers.next, 
	{$rule}.cmsmasters_post_tags > a, 
	{$rule}.headline_outer .headline_inner .headline_icon, 
	{$rule}.cmsmasters_dropcap.type2, 
	{$rule}#page .cmsmasters_social_icon:hover,  
	{$rule}#page .cmsmasters_social_icon,  
	{$rule}.cmsmasters_table thead tr, 
	{$rule}.cmsmasters_table tfoot tr, 
	{$rule}.cmsmasters_tabs .cmsmasters_tabs_list_item a, 
	{$rule}.cmsmasters_toggles .cmsmasters_toggle_arrow:before,
	{$rule}.cmsmasters_button, 
	{$rule}.cmsmasters_button:hover, 
	{$rule}.button, 
	{$rule}input[type=submit], 
	{$rule}input[type=button], 
	{$rule}button, 
	{$rule}.headline_text .entry-subtitle, 
	{$rule}.cmsmasters_breadcrumbs span,
	{$rule}.cmsmasters_breadcrumbs a,
	{$rule}.headline_text .entry-title, 
	{$rule}.cmsmasters_prev_arrow, 
	{$rule}.cmsmasters_next_arrow {
		" . cmsmasters_color_css('color', $cmsmasters_option['travel-time' . '_' . $scheme . '_additional']) . "
	}

	{$rule}.cmsmasters_slider_project .cmsmasters_slider_project_outer, 
	{$rule}#wp-calendar, 
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=checkbox] + span.wpcf7-list-item-label:before, 
	{$rule}.cmsmasters-form-builder .check_parent input[type=checkbox] + label:before, 
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=radio] + span.wpcf7-list-item-label:before, 
	{$rule}.cmsmasters-form-builder .check_parent input[type=radio] + label:before, 
	{$rule}.cmsmasters_archive_type .cmsmasters_archive_item_inner, 
	{$rule}.portfolio .project_outer, 
	{$rule}.blog.columns.puzzle, 
	{$rule}.cmsmasters_post_puzzle, 
	{$rule}.cmsmasters_slider_post .cmsmasters_slider_post_outer, 
	{$rule}.cmsmasters_post_masonry .cmsmasters_post_cont, 
	{$rule}.cmsmasters_post_timeline .cmsmasters_post_cont, 
	{$rule}.cmsmasters_post_timeline .cmsmasters_post_date .cmsmasters_day, 
	{$rule}.cmsmasters_post_default .cmsmasters_post_default_inner, 
	{$rule}.cmsmasters_single_slider .cmsmasters_single_slider_item_inner, 
	{$rule}.cmsmasters_open_post .cmsmasters_post_cont_wrap, 
	{$rule}.wp-caption, 
	{$rule}.gallery-item .wp-caption-text, 
	{$rule}.gallery-item .gallery-icon, 
	{$rule}.cmsmasters_img.with_caption, 
	{$rule}.cmsmasters_open_profile .profile_content, 
	{$rule}.cmsmasters_open_project .project_content, 
	{$rule}.cmsmasters_table tbody tr, 
	{$rule}.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_inner, 
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item_inner,
	{$rule}.cmsmasters_notice, 
	{$rule}.cmsmasters_toggles.toggles_mode_accordion .cmsmasters_toggle_wrap, 
	{$rule}.cmsmasters_content_slider .owl-pagination .owl-page, 
	{$rule}input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	{$rule}textarea,
	{$rule}select,
	{$rule}option, 
	{$rule}#middle .search_bar_wrap .search_field input, 
	{$rule}#bottom .search_bar_wrap .search_field input {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_additional']) . "
	}
	
	{$rule}.cmsmasters_icon_list_items.cmsmasters_icon_list_type_block .cmsmasters_icon_list_item,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_bg .cmsmasters_icon_list_icon:after,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_icon .cmsmasters_icon_list_icon:after, 
	{$rule}.about_author_avatar, 
	{$rule}.cmsmasters_comment_item_avatar, 
	{$rule}.cmsmasters_profile .cmsmasters_img_wrap, 
	{$rule}.cmsmasters_quote_image img {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_additional']) . "
	}
	/* Finish Additional Color */
	
	
	/* Start Custom Rules */
	{$rule}::selection {
		" . cmsmasters_color_css('background', $cmsmasters_option['travel-time' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['travel-time' . '_' . $scheme . '_bg']) . ";
	}
	
	{$rule}::-moz-selection {
		" . cmsmasters_color_css('background', $cmsmasters_option['travel-time' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['travel-time' . '_' . $scheme . '_bg']) . "
	}
	";
	
	
	$custom_css .= "
	/* Finish Custom Rules */

/***************** Finish {$title} Color Scheme Rules ******************/


/***************** Start {$title} Button Color Scheme Rules ******************/
	
	{$rule}.cmsmasters_button.cmsmasters_but_bg_hover {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['travel-time' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_bg_hover:hover, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_hover {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['travel-time' . '_' . $scheme . '_bg']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_left, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_right, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_top, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_bottom, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_vert, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_hor, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_diag {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['travel-time' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_left:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_right:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_top:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_bottom:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_vert:hover, 
	{$rule}.cmsmasters_button.cm.sms_but_bg_expand_hor:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_diag:hover, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_slide_left, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_slide_right, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_slide_top, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_slide_bottom, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_expand_vert, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_expand_hor, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_expand_diag {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['travel-time' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_left:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_right:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_top:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_bottom:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_vert:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_hor:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_diag:after {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_link']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_shadow {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['travel-time' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_shadow:hover, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_shadow {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['travel-time' . '_' . $scheme . '_bg']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_dark_bg, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_light_bg, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_divider {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['travel-time' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_dark_bg:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_light_bg:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_divider:hover, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_dark_bg, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_light_bg, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_divider {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['travel-time' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_divider:after {
		" . cmsmasters_color_css('border-right-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['travel-time' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse:before {
		" . cmsmasters_color_css('color', $cmsmasters_option['travel-time' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse:after {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse:hover, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_inverse {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['travel-time' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse:hover:before, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_inverse:before {
		" . cmsmasters_color_css('color', $cmsmasters_option['travel-time' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse:hover:after, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_inverse:after {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_link']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_slide_left, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_slide_right {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['travel-time' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_slide_left:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_slide_right:hover, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_slide_left, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_slide_right {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['travel-time' . '_' . $scheme . '_bg']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_left, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_right, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_top, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_bottom {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['travel-time' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_left:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_right:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_top:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_bottom:hover, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_hover_slide_left, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_hover_slide_right, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_hover_slide_top, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_hover_slide_bottom {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['travel-time' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['travel-time' . '_' . $scheme . '_bg']) . "
	}

/***************** Finish {$title} Button Color Scheme Rules ******************/


";
	}
	
	
	return apply_filters('travel_time_theme_colors_primary_filter', $custom_css);
}

