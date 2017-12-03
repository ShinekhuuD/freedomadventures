<?php 
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version		1.0.8
 * 
 * Template Functions
 * Created by CMSMasters
 * 
 */


/* Get Page Container Classes */
function travel_time_get_page_classes($cmsmasters_option, $classes = false) {
	$browser = new Browser();
	if (
		( $browser->getPlatform() != Browser::PLATFORM_IPHONE ) && 
		( $browser->getPlatform() != Browser::PLATFORM_IPOD ) && 
		( $browser->getPlatform() != Browser::PLATFORM_IPAD ) && 
		( $browser->getPlatform() != Browser::PLATFORM_BLACKBERRY ) && 
		( $browser->getPlatform() != Browser::PLATFORM_ANDROID ) && 
		( $browser->getPlatform() != Browser::PLATFORM_APPLE ) 
	) {
		echo 'csstransition ';
	}

	if ( $browser->getBrowser() == Browser::BROWSER_CHROME ) {
		echo 'chrome_only ';
	}

	if (
		( $browser->getBrowser() == Browser::BROWSER_SAFARI ) &&
		( $browser->getBrowser() != Browser::BROWSER_CHROME ) 
	) {
		echo 'safari_only ';
	}

	if ( $browser->getBrowser() == Browser::BROWSER_IE ) {
		echo 'ie_only ';
	}

	echo 'cmsmasters_' . $cmsmasters_option['travel-time' . '_theme_layout'] . ' ';

	if ($cmsmasters_option['travel-time' . '_fixed_header']) {
		echo 'fixed_header ';
	}

	if ($cmsmasters_option['travel-time' . '_header_top_line']) {
		echo 'enable_header_top ';
	}

	if ($cmsmasters_option['travel-time' . '_header_styles'] != 'default') {
		echo 'enable_header_bottom ';
	}

	if ($cmsmasters_option['travel-time' . '_header_styles'] == 'r_nav') {
		echo 'enable_header_right ';
	}

	if ($cmsmasters_option['travel-time' . '_header_styles'] == 'c_nav') {
		echo 'enable_header_centered ';
	}


	if (is_singular()) {
		$cmsmasters_page_id = get_the_ID();
	} elseif (CMSMASTERS_WOOCOMMERCE && is_shop()) {
		$cmsmasters_page_id = wc_get_page_id('shop');
	}

	$cmsmasters_header_overlaps = '';

	if (
		is_singular() || 
		(CMSMASTERS_WOOCOMMERCE && is_shop())
	) {
		$cmsmasters_header_overlaps = get_post_meta($cmsmasters_page_id, 'cmsmasters_header_overlaps', true);
	}

	if ($cmsmasters_header_overlaps == '') {
		$cmsmasters_header_overlaps = $cmsmasters_option['travel-time' . '_header_overlaps'];
	}

	if ($cmsmasters_header_overlaps != 'false') {
		echo 'cmsmasters_heading_under_header ';
	} else {
		echo 'cmsmasters_heading_after_header ';
	}
	
	
	if ($classes && $classes != '') {
		echo esc_attr($classes) . ' ';
	}
}



/* Get Header Top Function */
function travel_time_header_top($cmsmasters_option) {
	if ($cmsmasters_option['travel-time' . '_header_top_line']) {
		echo '<div class="header_top" data-height="' . esc_attr($cmsmasters_option['travel-time' . '_header_top_height']) . '">' . 
			'<div class="header_top_outer">' . 
				'<div class="header_top_inner">';
					
					if (
						$cmsmasters_option['travel-time' . '_header_top_line_add_cont'] !== 'none' || 
						(
							CMSMASTERS_DONATIONS && 
							isset($cmsmasters_option['travel-time' . '_header_top_line_donations_but']) && 
							$cmsmasters_option['travel-time' . '_header_top_line_donations_but'] &&
							isset($cmsmasters_option['travel-time' . '_header_top_line_donations_but_text']) && 
							$cmsmasters_option['travel-time' . '_header_top_line_donations_but_text'] != '' 
						)
					) {
						echo '<div class="header_top_right">';
						
						
						if (
							$cmsmasters_option['travel-time' . '_header_top_line_add_cont'] == 'social' && 
							isset($cmsmasters_option['travel-time' . '_social_icons'])
						) {
							travel_time_social_icons();
						} elseif (
							$cmsmasters_option['travel-time' . '_header_top_line_add_cont'] == 'nav' && 
							has_nav_menu('top_line')
						) {
							echo '<div class="top_nav_wrap">' . 
								'<a class="responsive_top_nav cmsmasters_theme_icon_resp_nav" href="javascript:void(0);"></a>' . 
								'<nav>';
							
							
							wp_nav_menu(array( 
								'theme_location' => 	'top_line', 
								'menu_id' => 			'top_line_nav', 
								'menu_class' => 		'top_line_nav', 
								'link_before' => 		'<span class="nav_item_wrap">', 
								'link_after' => 		'</span>' 
							));
							
							
							echo '</nav>' . 
							'</div>';
						}
						
						
						if (
							CMSMASTERS_DONATIONS && 
							isset($cmsmasters_option['travel-time' . '_header_top_line_donations_but']) && 
							$cmsmasters_option['travel-time' . '_header_top_line_donations_but'] &&
							isset($cmsmasters_option['travel-time' . '_header_top_line_donations_but_text']) && 
							$cmsmasters_option['travel-time' . '_header_top_line_donations_but_text'] != '' 
						) {
							$cmsmasters_donations_form_page = get_option('cmsmasters_donations_form_page');
							
							echo '<a href="' . esc_url(get_permalink($cmsmasters_donations_form_page)) . '" class="header_top_donation_but"><span>' . esc_html($cmsmasters_option['travel-time' . '_header_top_line_donations_but_text']) . '</span></a>';
						}
						
						
						echo '</div>';
					}
					
					
					if ($cmsmasters_option['travel-time' . '_header_top_line_short_info'] !== '') {
						echo '<div class="header_top_left">' . 
							'<div class="meta_wrap">' . 
								stripslashes($cmsmasters_option['travel-time' . '_header_top_line_short_info']) . 
							'</div>' . 
						'</div>';
					} 
					
					
				echo '</div>' . 
			'</div>' . 
			'<div class="header_top_but closed">' . 
				'<span class="cmsmasters_theme_icon_slide_bottom"></span>' . 
			'</div>' . 
		'</div>';
	}
}



/* Get Header Middle Function */
function travel_time_header_mid($cmsmasters_option) {
	echo '<div class="header_mid" data-height="' . esc_attr($cmsmasters_option['travel-time' . '_header_mid_height']) . '">';
		
		echo '<div class="header_mid_outer">' . 
			'<div class="header_mid_inner">' . 
				'<div class="logo_wrap">';

					travel_time_logo();

				echo '</div>';
			

				if (
					CMSMASTERS_DONATIONS && 
					isset($cmsmasters_option['travel-time' . '_header_donations_but']) && 
					$cmsmasters_option['travel-time' . '_header_donations_but'] && 
					isset($cmsmasters_option['travel-time' . '_header_donations_but_text']) && 
					$cmsmasters_option['travel-time' . '_header_donations_but_text'] != '' && 
					$cmsmasters_option['travel-time' . '_header_styles'] != 'default' && 
					$cmsmasters_option['travel-time' . '_header_styles'] != 'c_nav'
				) {
					$cmsmasters_donations_form_page = get_option('cmsmasters_donations_form_page');
					
					echo '<div class="header_donation_but_wrap">' . 
						'<div class="header_donation_but_wrap_inner">' . 
							'<div class="header_donation_but">' . 
								'<a href="' . esc_url(get_permalink($cmsmasters_donations_form_page)) . '" class="cmsmasters_button">' . 
									'<span>' . esc_html($cmsmasters_option['travel-time' . '_header_donations_but_text']) . '</span>' . 
								'</a>' . 
							'</div>' . 
						'</div>' . 
					'</div>';
				}
				
				
				if ($cmsmasters_option['travel-time' . '_header_styles'] == 'default') {
					echo '<div class="resp_mid_nav_wrap">' . 
						'<div class="resp_mid_nav_outer">' . 
							'<a class="responsive_nav resp_mid_nav cmsmasters_theme_icon_resp_nav" href="javascript:void(0);"></a>' . 
						'</div>' . 
					'</div>';
				}
				
				
				if (
					CMSMASTERS_WOOCOMMERCE && 
					$cmsmasters_option['travel-time' . '_header_styles'] != 'c_nav'
				) {
					echo '<div class="cmsmasters_dynamic_cart_wrap">';
						
						travel_time_woocommerce_cart_dropdown();
						
					echo '</div>';
				}
				
				
				if (
					$cmsmasters_option['travel-time' . '_header_search'] && 
					$cmsmasters_option['travel-time' . '_header_styles'] != 'c_nav'
				) {
					echo '<div class="search_wrap">' . 
						'<div class="search_wrap_inner">';
							
							get_search_form();

						echo '</div>' . 
					'</div>';
				}


				if (
					$cmsmasters_option['travel-time' . '_header_styles'] != 'default' && 
					$cmsmasters_option['travel-time' . '_header_styles'] != 'c_nav'
				) { 
					if (
						$cmsmasters_option['travel-time' . '_header_add_cont'] == 'cust_html' && 
						$cmsmasters_option['travel-time' . '_header_add_cont_cust_html'] !== ''
					) {

						echo '<div class="slogan_wrap">' . 
							'<div class="slogan_wrap_inner">' . 
								'<div class="slogan_wrap_text">' . 
									stripslashes($cmsmasters_option['travel-time' . '_header_add_cont_cust_html']) . 
								'</div>' . 
							'</div>' . 
						'</div>';

					} elseif (
						$cmsmasters_option['travel-time' . '_header_add_cont'] == 'social' && 
						isset($cmsmasters_option['travel-time' . '_social_icons'])
					) {
						travel_time_social_icons();
					}
				}
				
				if ($cmsmasters_option['travel-time' . '_header_styles'] == 'default') {
					echo '<!-- _________________________ Start Navigation _________________________ -->' . 
					'<div class="mid_nav_wrap">' . 
						'<nav>';
							
							$nav_args = array( 
								'theme_location' => 	'primary', 
								'menu_id' => 			'navigation', 
								'menu_class' => 		'mid_nav navigation', 
								'link_before' => 		'<span class="nav_item_wrap">', 
								'link_after' => 		'</span>', 
								'fallback_cb' => 		'travel_time_fallback_menu' 
							);
							
							if (class_exists('Walker_Cmsmasters_Nav_Mega_Menu')) {
								$nav_args['walker'] = new Walker_Cmsmasters_Nav_Mega_Menu();
							}
							
							wp_nav_menu($nav_args);
							
						echo '</nav>' . 
					'</div>' . 
					'<!-- _________________________ Finish Navigation _________________________ -->';
				}
				
			echo '</div>' . 
		'</div>' . 
	'</div>';
}



/* Get Header Bottom Function */
function travel_time_header_bot($cmsmasters_option) {
	if ($cmsmasters_option['travel-time' . '_header_styles'] != 'default') { 
		echo '<div class="header_bot" data-height="' . esc_attr($cmsmasters_option['travel-time' . '_header_bot_height']) . '">' . 
			'<div class="header_bot_outer">' . 
				'<div class="header_bot_inner">' . 
					'<div class="resp_bot_nav_wrap">' . 
						'<div class="resp_bot_nav_outer">' . 
							'<a class="responsive_nav resp_bot_nav cmsmasters_theme_icon_resp_nav" href="javascript:void(0);"></a>' . 
						'</div>' . 
					'</div>' . 
				
					'<!-- _________________________ Start Navigation _________________________ -->' . 
					'<div class="bot_nav_wrap">' . 
						'<nav>';

							$nav_args = array( 
								'theme_location' => 	'primary', 
								'menu_id' => 			'navigation', 
								'menu_class' => 		'bot_nav navigation', 
								'link_before' => 		'<span class="nav_item_wrap">', 
								'link_after' => 		'</span>', 
								'fallback_cb' => 		'travel_time_fallback_menu' 
							);

							if (class_exists('Walker_Cmsmasters_Nav_Mega_Menu')) {
								$nav_args['walker'] = new Walker_Cmsmasters_Nav_Mega_Menu();
							}
							
							wp_nav_menu($nav_args);
							
						echo '</nav>' . 
					'</div>' . 
					'<!-- _________________________ Finish Navigation _________________________ -->' . 
				'</div>' . 
			'</div>' . 
		'</div>';
	}
}



/* Get Logo Function */
function travel_time_logo() {
	$cmsmasters_option = travel_time_get_global_options();
	
	
	$header_mid_height = (($cmsmasters_option['travel-time' . '_header_mid_height'] !== '') ? $cmsmasters_option['travel-time' . '_header_mid_height'] : '95');
	
	
	if ($cmsmasters_option['travel-time' . '_logo_type'] == 'text') {
		if ($cmsmasters_option['travel-time' . '_logo_title'] != '') {
			$blog_title = $cmsmasters_option['travel-time' . '_logo_title'];
		} else {
			$blog_title = (get_bloginfo('name')) ? get_bloginfo('name') : 'Travel Time';
		}
		
		
		if ($cmsmasters_option['travel-time' . '_logo_subtitle'] != '') {
			$blog_descr = $cmsmasters_option['travel-time' . '_logo_subtitle'];
		} else {
			$blog_descr = (get_bloginfo('description')) ? get_bloginfo('description') : esc_html__('Default Logo Subtitle', 'travel-time');
		}
		
		
		echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr($blog_title) . '" class="logo">' . "\n\t" . 
			'<span class="logo_text_wrap">' . 
				'<span class="title">' . esc_html($blog_title) . '</span>' . "\n" . 
				($cmsmasters_option['travel-time' . '_logo_subtitle'] ? '<span class="title_text">' . esc_html($blog_descr) . '</span>' : '') . 
			'</span>' . 
		'</a>';
	} else {
		if ($cmsmasters_option['travel-time' . '_logo_url'] == '') {
			echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '" class="logo">' . "\n\t" . 
				'<img src="' . esc_url(get_template_directory_uri()) . '/img/logo.png" alt="' . esc_attr(get_bloginfo('name')) . '" />' . "\n\t" . 
				'<img class="logo_retina" src="' . esc_url(get_template_directory_uri()) . '/img/logo_retina.png" alt="' . esc_attr(get_bloginfo('name')) . '" width="172" height="70" />' . "\r" . 
			'</a>' . "\n";
			
			
			$logo_def_style_width = (int) ($header_mid_height * (172 / 70));
			
			
			echo "
<style type=\"text/css\">
	.header_mid .header_mid_inner .logo_wrap {
		width : {$logo_def_style_width}px;
	}
</style>
";
			
			
			echo "
<style type=\"text/css\">
	.header_mid_inner .logo .logo_retina {
		width : 172px;
		max-width: 172px;
	}
</style>
";
		} else {
			$logo_img = explode('|', $cmsmasters_option['travel-time' . '_logo_url']);
			
			
			if (is_numeric($logo_img[0])) {
				$logo_img_url = wp_get_attachment_image_src((int) $logo_img[0], 'full');
			}
			
			
			$logo_img_width = ((is_numeric($logo_img[0])) ? (int) $logo_img_url[1] : '172');
			
			$logo_img_height = ((is_numeric($logo_img[0])) ? (int) $logo_img_url[2] : '70');
			
			
			if ($logo_img_height >= $header_mid_height) {
				$logo_style_width = (int) ($header_mid_height * ($logo_img_width / $logo_img_height));
			} else {
				$logo_style_width = $logo_img_width;
			}
			
			
			echo "
<style type=\"text/css\">
	.header_mid .header_mid_inner .logo_wrap {
		width : {$logo_style_width}px;
	}
</style>
";
			
			
			echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '" class="logo">' . "\n\t" . 
				'<img src="' . ((is_numeric($logo_img[0])) ? esc_url($logo_img_url[0]) : esc_url($logo_img[1])) . '" alt="' . esc_attr(get_bloginfo('name')) . '" />' . "\r";
			
			
			if ($cmsmasters_option['travel-time' . '_logo_url_retina'] != '') {
				$logo_img_retina = explode('|', $cmsmasters_option['travel-time' . '_logo_url_retina']);
			
				if (is_numeric($logo_img_retina[0])) {
					$logo_img_retina_url = wp_get_attachment_image_src((int) $logo_img_retina[0], 'full');
				}
				
				$logo_img_retina_width = ((is_numeric($logo_img_retina[0])) ? ((int) $logo_img_retina_url[1] / 2) : '172');
				
				$logo_img_retina_height = ((is_numeric($logo_img_retina[0])) ? ((int) $logo_img_retina_url[2] / 2) : '70');
				
				
				echo "
<style type=\"text/css\">
	.header_mid_inner .logo .logo_retina {
		width : {$logo_img_retina_width}px;
		max-width : {$logo_img_retina_width}px;
	}
</style>
";
				
				
				echo '<img class="logo_retina" src="' . 
				((is_numeric($logo_img_retina[0])) ? esc_url($logo_img_retina_url[0]) : esc_url($logo_img_retina[1])) . 
				'" alt="' . esc_attr(get_bloginfo('name')) . 
				'" width="' . $logo_img_retina_width . 
				'" height="' . $logo_img_retina_height . 
				'" />' . "\r";
			} else {
				echo '<img class="logo_retina" src="' . ((is_numeric($logo_img[0])) ? esc_url($logo_img_url[0]) : esc_url($logo_img[1])) . '" alt="' . esc_attr(get_bloginfo('name')) . '" />' . "\r";
			}
			
			
			echo '</a>' . "\n";
		}
	}
}



/* Get Footer Logo Function */
function travel_time_footer_logo($cmsmasters_option) {
	if (
		$cmsmasters_option['travel-time' . '_footer_type'] == 'default' && 
		$cmsmasters_option['travel-time' . '_footer_logo']
	) {
		echo '<div class="footer_logo_wrap">';

	
		if ($cmsmasters_option['travel-time' . '_footer_logo_url'] == '') {
			echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '" class="footer_logo">' . "\n\t" . 
				'<img src="' . esc_url(get_template_directory_uri()) . '/img/logo_footer.png" alt="' . esc_attr(get_bloginfo('name')) . '" />' . "\n\t" . 
				'<img class="footer_logo_retina" src="' . esc_url(get_template_directory_uri()) . '/img/logo_footer_retina.png" alt="' . esc_attr(get_bloginfo('name')) . '" width="172" height="70" />' . "\r" . 
			'</a>' . "\n";
			
			
			echo "
			<style type=\"text/css\">
			.footer_inner .footer_logo .footer_logo_retina {
				width : 172px;
			}
			</style>
			";
		} else {
			$footer_logo_img = explode('|', $cmsmasters_option['travel-time' . '_footer_logo_url']);
			
			
			if (is_numeric($footer_logo_img[0])) {
				$footer_logo_img_url = wp_get_attachment_image_src((int) $footer_logo_img[0], 'full');
			}
			
			
			echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '" class="footer_logo">' . "\n\t" . 
				'<img src="' . ((is_numeric($footer_logo_img[0])) ? esc_url($footer_logo_img_url[0]) : esc_url($footer_logo_img[1])) . '" alt="' . esc_attr(get_bloginfo('name')) . '" />' . "\r";
			
			
			if ($cmsmasters_option['travel-time' . '_footer_logo_url_retina'] != '') {
				$footer_logo_img_retina = explode('|', $cmsmasters_option['travel-time' . '_footer_logo_url_retina']);
			
				if (is_numeric($footer_logo_img_retina[0])) {
					$footer_logo_img_retina_url = wp_get_attachment_image_src((int) $footer_logo_img_retina[0], 'full');
				}
				
				$footer_logo_img_retina_width = ((is_numeric($footer_logo_img_retina[0])) ? ((int) $footer_logo_img_retina_url[1] / 2) : '172');
				
				$footer_logo_img_retina_height = ((is_numeric($footer_logo_img_retina[0])) ? ((int) $footer_logo_img_retina_url[2] / 2) : '70');
				
				
				echo '<img class="footer_logo_retina" src="' . 
				((is_numeric($footer_logo_img_retina[0])) ? esc_url($footer_logo_img_retina_url[0]) : esc_url($footer_logo_img_retina[1])) . 
				'" alt="' . esc_attr(get_bloginfo('name')) . 
				'" width="' . $footer_logo_img_retina_width . 
				'" height="' . $footer_logo_img_retina_height . 
				'" />' . "\r";
			} else {
				echo '<img class="footer_logo_retina" src="' . ((is_numeric($footer_logo_img[0])) ? esc_url($footer_logo_img_url[0]) : esc_url($footer_logo_img[1])) . '" alt="' . esc_attr(get_bloginfo('name')) . '" />' . "\r";
			}
			
			
			echo '</a>' . "\n";
		}


		echo '</div>';
	}
}



/* Get Footer Custom HTML Function */
function travel_time_get_footer_custom_html($cmsmasters_option) {
	if (
		(
			$cmsmasters_option['travel-time' . '_footer_type'] == 'default' && 
			$cmsmasters_option['travel-time' . '_footer_html'] !== ''
		) || (
			$cmsmasters_option['travel-time' . '_footer_type'] == 'small' && 
			$cmsmasters_option['travel-time' . '_footer_additional_content'] == 'text' && 
			$cmsmasters_option['travel-time' . '_footer_html'] !== ''
		)
	) {
		echo '<div class="footer_custom_html_wrap">' . 
			'<div class="footer_custom_html">' . 
				do_shortcode(stripslashes($cmsmasters_option['travel-time' . '_footer_html'])) . 
			'</div>' . 
		'</div>';
	}
}



/* Get Footer Social Icons Function */
function travel_time_get_footer_social_icons($cmsmasters_option) {
	if (
		isset($cmsmasters_option['travel-time' . '_social_icons']) && 
		(
			(
				$cmsmasters_option['travel-time' . '_footer_type'] == 'default' && 
				$cmsmasters_option['travel-time' . '_footer_social']
			) || (
				$cmsmasters_option['travel-time' . '_footer_type'] == 'small' && 
				$cmsmasters_option['travel-time' . '_footer_additional_content'] == 'social'
			)
		)
	) {
		travel_time_social_icons();
	}
}



/* Get Footer Navigation Function */
function travel_time_get_footer_nav($cmsmasters_option) {
	if (
		has_nav_menu('footer') && 
		(
			(
				$cmsmasters_option['travel-time' . '_footer_type'] == 'default' && 
				$cmsmasters_option['travel-time' . '_footer_nav']
			) || (
				$cmsmasters_option['travel-time' . '_footer_type'] == 'small' && 
				$cmsmasters_option['travel-time' . '_footer_additional_content'] == 'nav'
			)
		)
	) {
		echo '<div class="footer_nav_wrap">' . 
			'<nav>';
			
			
			wp_nav_menu(array( 
				'theme_location' => 'footer', 
				'menu_id' => 'footer_nav', 
				'menu_class' => 'footer_nav' 
			));
		
		
			echo '</nav>' . 
		'</div>';
	}
}



/* Get Page Heading Function */
function travel_time_page_heading() {
	$cmsmasters_option = travel_time_get_global_options();
	
	
	if (is_singular()) {
		$cmsmasters_page_id = get_the_ID();
	} elseif (CMSMASTERS_WOOCOMMERCE && is_shop()) {
		$cmsmasters_page_id = wc_get_page_id('shop');
	}
	
	
	$cmsmasters_heading = '';
	
	if (
		is_singular() || 
		(CMSMASTERS_WOOCOMMERCE && is_shop())
	) {
		$cmsmasters_heading = get_post_meta($cmsmasters_page_id, 'cmsmasters_heading', true);
	}
	
	
	if (
		$cmsmasters_heading != '' && 
		(
			is_singular() || 
			(CMSMASTERS_WOOCOMMERCE && is_shop())
		)
	) {
		$cmsmasters_heading_block_disabled = get_post_meta($cmsmasters_page_id, 'cmsmasters_heading_block_disabled', true);
		$cmsmasters_header_overlaps = get_post_meta($cmsmasters_page_id, 'cmsmasters_header_overlaps', true);
		
		$cmsmasters_heading_height = get_post_meta($cmsmasters_page_id, 'cmsmasters_heading_height', true);
		$cmsmasters_heading_alignment = get_post_meta($cmsmasters_page_id, 'cmsmasters_heading_alignment', true);
		$cmsmasters_heading_scheme = get_post_meta($cmsmasters_page_id, 'cmsmasters_heading_scheme', true);
		$cmsmasters_heading_bg_color = get_post_meta($cmsmasters_page_id, 'cmsmasters_heading_bg_color', true);
		$cmsmasters_heading_bg_img_enable = get_post_meta($cmsmasters_page_id, 'cmsmasters_heading_bg_img_enable', true);
		$cmsmasters_heading_bg_img = get_post_meta($cmsmasters_page_id, 'cmsmasters_heading_bg_img', true);
		$cmsmasters_heading_bg_rep = get_post_meta($cmsmasters_page_id, 'cmsmasters_heading_bg_rep', true);
		$cmsmasters_heading_bg_att = get_post_meta($cmsmasters_page_id, 'cmsmasters_heading_bg_att', true);
		$cmsmasters_heading_bg_size = get_post_meta($cmsmasters_page_id, 'cmsmasters_heading_bg_size', true);
		
		$cmsmasters_heading_title = get_post_meta($cmsmasters_page_id, 'cmsmasters_heading_title', true);
		$cmsmasters_heading_subtitle = get_post_meta($cmsmasters_page_id, 'cmsmasters_heading_subtitle', true);
		$cmsmasters_heading_icon = get_post_meta($cmsmasters_page_id, 'cmsmasters_heading_icon', true);
		
		$cmsmasters_breadcrumbs = get_post_meta($cmsmasters_page_id, 'cmsmasters_breadcrumbs', true);
	} else {
		$cmsmasters_heading = 'default';
		$cmsmasters_heading_block_disabled = 'false';
		$cmsmasters_header_overlaps = $cmsmasters_option['travel-time' . '_header_overlaps'] ? 'true' : 'false';
		
		$cmsmasters_heading_height = $cmsmasters_option['travel-time' . '_heading_height'];
		$cmsmasters_heading_alignment = $cmsmasters_option['travel-time' . '_heading_alignment'];
		$cmsmasters_heading_scheme = $cmsmasters_option['travel-time' . '_heading_scheme'];
		$cmsmasters_heading_bg_color = $cmsmasters_option['travel-time' . '_heading_bg_color'];
		$cmsmasters_heading_bg_img_enable = $cmsmasters_option['travel-time' . '_heading_bg_image_enable'] ? 'true' : 'false';
		$cmsmasters_heading_bg_img = $cmsmasters_option['travel-time' . '_heading_bg_image'];
		$cmsmasters_heading_bg_rep = $cmsmasters_option['travel-time' . '_heading_bg_repeat'];
		$cmsmasters_heading_bg_att = $cmsmasters_option['travel-time' . '_heading_bg_attachment'];
		$cmsmasters_heading_bg_size = $cmsmasters_option['travel-time' . '_heading_bg_size'];
		
		$cmsmasters_breadcrumbs = $cmsmasters_option['travel-time' . '_breadcrumbs'] ? 'true' : 'false';
	}
	
	
	if (
		CMSMASTERS_EVENTS_CALENDAR && 
		tribe_is_event_query() && 
		is_archive() 
	) {
		$cmsmasters_heading = 'disabled';
	}
	
	
	list($cmsmasters_layout) = travel_time_theme_page_layout_scheme();
	
	
	if (
		$cmsmasters_heading_block_disabled == 'true' && 
		$cmsmasters_layout == 'fullwidth' && 
		$cmsmasters_header_overlaps == 'true' 
	) {
		echo "";
	} else {
		$options_img = explode('|', $cmsmasters_heading_bg_img);
		
		
		if (is_numeric($options_img[0])) {
			$options_img_url = wp_get_attachment_image_src((int) $options_img[0], 'full');
		}
		
		
		echo "<style type=\"text/css\">";
		
		
		if ($cmsmasters_heading_bg_img_enable == 'true' && $cmsmasters_heading_bg_img != '') {
			echo ".headline_outer {
				background-image:url(" . ((is_numeric($options_img[0])) ? $options_img_url[0] : $options_img[1]) . ");
				background-repeat:{$cmsmasters_heading_bg_rep};
				background-attachment:{$cmsmasters_heading_bg_att};
				background-size:{$cmsmasters_heading_bg_size};
			}";
		}
		
		
		echo ".headline_color {
				background-color:{$cmsmasters_heading_bg_color};
			}
			.headline_aligner {
				min-height:{$cmsmasters_heading_height}px;
			}
		</style>
		<div class=\"headline cmsmasters_color_scheme_{$cmsmasters_heading_scheme}\">
			<div class=\"headline_outer" . ($cmsmasters_heading == 'disabled' ? ' cmsmasters_headline_disabled' : '') . "\">
				<div class=\"headline_color\"></div>";
		
		
		if ($cmsmasters_heading != 'disabled') {
			echo "<div class=\"headline_inner align_{$cmsmasters_heading_alignment}\">
				<div class=\"headline_aligner\"></div>" . 
				"<div class=\"headline_content\">" . 
				'<div class="headline_text' . (($cmsmasters_heading == 'custom') ? (($cmsmasters_heading_icon != '') ? ' headline_icon ' . $cmsmasters_heading_icon : '') . (($cmsmasters_heading_subtitle != '') ? ' headline_subtitle' : '') : '') . '">';
			
			
			if ($cmsmasters_heading == 'custom') {
				if ($cmsmasters_heading_title != '') {
					echo '<h1 class="entry-title">' . esc_html($cmsmasters_heading_title) . '</h1>';
				}
				
				if ($cmsmasters_heading_subtitle != '') {
					echo '<h4 class="entry-subtitle">' . esc_html($cmsmasters_heading_subtitle) . '</h4>';
				}
			} elseif (CMSMASTERS_WOOCOMMERCE && is_woocommerce() && !is_singular()) {
				echo '<h1 class="entry-title">';
				
					esc_html(woocommerce_page_title());
					
				echo '</h1>';
			} elseif (is_archive() || is_search()) {
				echo '<h1 class="entry-title">';
				
				
				if (is_search()) {
					global $wp_query;
					
					
					if (!empty($wp_query->found_posts)) {
						echo sprintf(esc_html(_n('1 search result for: %2$s', '%1$d search results for: %2$s', $wp_query->found_posts, 'travel-time')), $wp_query->found_posts, get_search_query());
					} else {
						echo sprintf(esc_html__('0 search results for: %s', 'travel-time'), get_search_query());
					}
				} elseif (is_archive()) {
					if (is_author()) {
						if (get_the_author_meta('first_name') != '' || get_the_author_meta('last_name') != '') {
							echo sprintf(esc_html__('Author: %1$s (%2$s %3$s)', 'travel-time'), '<span class="vcard">' . get_the_author() . '</span>', get_the_author_meta('first_name'), get_the_author_meta('last_name'));
						} else {
							echo sprintf(esc_html__('Author: %s', 'travel-time'), '<span class="vcard">' . get_the_author() . '</span>');
						}
					} else {
						echo esc_html(get_the_archive_title());
					}
				}
				
				
				echo '</h1>';
			} elseif ($cmsmasters_heading == 'default') {
				echo the_title('<h1 class="entry-title">', '</h1>', false);
			}
			
			
			echo '</div>';
			
			
			if ( 
				!is_front_page() && 
				$cmsmasters_breadcrumbs == 'true' && 
				!(
					CMSMASTERS_EVENTS_CALENDAR && 
					(
						tribe_is_list_view() || 
						tribe_is_month() || 
						tribe_is_day() || 
						(function_exists('tribe_is_past') && tribe_is_past()) || 
						(function_exists('tribe_is_upcoming') && tribe_is_upcoming()) || 
						(function_exists('tribe_is_week') && tribe_is_week()) || 
						(function_exists('tribe_is_map') && tribe_is_map()) || 
						(function_exists('tribe_is_photo') && tribe_is_photo()) 
					)
				)
			) {
				echo '<div class="cmsmasters_breadcrumbs">' . 
					'<div class="cmsmasters_breadcrumbs_inner">';
				
				
				if (CMSMASTERS_WOOCOMMERCE && is_woocommerce()) {
					$args = array(
						'delimiter' => 	' // ', 
						'before' =>		'<span>',
						'after' =>		'</span>'
					);
					woocommerce_breadcrumb($args);
				} elseif (function_exists('yoast_breadcrumb')) {
					$yoast_enable = get_option('wpseo_internallinks');
					
					
					if ($yoast_enable['breadcrumbs-enable']) {
						yoast_breadcrumb();
					} else {
						breadcrumbs();
					}
				} else {
					breadcrumbs();
				}
				
				
				echo '</div>' . 
				'</div>';
			}
			
			
			echo "</div></div>";
		}
		
		
			echo "</div>
		</div>";
	}
}



/* Get Social Icons Function */
function travel_time_social_icons() {
	$cmsmasters_option = travel_time_get_global_options();
	
	$i = 1;
	
	
	$out = "
<div class=\"social_wrap\">
	<div class=\"social_wrap_inner\">
		<ul>";
	
	
	foreach ($cmsmasters_option['travel-time' . '_social_icons'] as $cmsmasters_social_icons) {
		$cmsmasters_social_icon = explode('|', $cmsmasters_social_icons);
		
		if (
			(isset($cmsmasters_social_icon[4]) && trim($cmsmasters_social_icon[4]) != '') ||
			(isset($cmsmasters_social_icon[5]) && trim($cmsmasters_social_icon[5]) != '')
		) {
			$social_icon_color = ' cmsmasters_social_icon_color';
		} else {
			$social_icon_color = '';
		}
		
		$out .= "
			<li>
				<a href=\"" . esc_url(trim($cmsmasters_social_icon[1])) . "\" class=\"cmsmasters_social_icon cmsmasters_social_icon_{$i} " . esc_attr(trim($cmsmasters_social_icon[0])) . "{$social_icon_color}\" title=\"" . esc_attr(trim($cmsmasters_social_icon[2])) . "\"" . ((trim($cmsmasters_social_icon[3]) == "true") ? " target=\"_blank\"" : "") . "></a>
			</li>";
		
		
		$i++;
	}
	
	
	$out .= "
		</ul>
	</div>
</div>";
	
	
	echo $out;
}



/* Get Social Icons Styles Function */
function travel_time_theme_social_icons_styles() {
	$cmsmasters_option = travel_time_get_global_options();
	
	$out = '';
	
	$i = 1;
	
	
	foreach ($cmsmasters_option['travel-time' . '_social_icons'] as $cmsmasters_social_icons) {
		$cmsmasters_social_icon = explode('|', str_replace(' ', '', $cmsmasters_social_icons));
		
		
		if (isset($cmsmasters_social_icon[4]) && $cmsmasters_social_icon[4] != '') {
			$out .= "
	
	#page .cmsmasters_social_icon_color.cmsmasters_social_icon_{$i} {
		color:{$cmsmasters_social_icon[4]};
	}
	";
		}
		
		
		if (isset($cmsmasters_social_icon[5]) && $cmsmasters_social_icon[5] != '') {
			$out .= "
	
	#page .cmsmasters_social_icon_color.cmsmasters_social_icon_{$i}:hover {
		color:{$cmsmasters_social_icon[5]};
	}";
		}
		
		
		$i++;
	}
	
	
	return $out;
}



/* Get Posts Thumbnail Function */
function travel_time_thumb($cmsmasters_id, $type = 'post-thumbnail', $link = true, $group = false, $preload = true, $highImg = false, $fullwidth = true, $show = true, $attachment = false, $unique = false, $link_icon = false, $placeholder_icon = 'cmsmasters_theme_icon_image') {
	$args = array( 
		'class' => (($fullwidth) ? 'full-width' : ''), 
		'alt' => cmsmasters_title($cmsmasters_id, false), 
		'title' => cmsmasters_title($cmsmasters_id, false) 
	);
	
	
	$link_href = ($attachment) ? wp_get_attachment_image_src(strstr($attachment, '|', true), 'full') : wp_get_attachment_image_src((int) get_post_thumbnail_id($cmsmasters_id), 'full');
	
	
	if (!$unique) {
		$unique_id = uniqid();
	} else {
		$unique_id = $unique;
	}
	
	
	$out = '<figure class="cmsmasters_img_wrap">' . 
		'<a href="' . (($link) ? esc_url(get_permalink()) : esc_url($link_href[0])) . '"' . 
		' title="' . cmsmasters_title($cmsmasters_id, false) . '"' . 
		(($group) ? ' rel="ilightbox[' . esc_attr($group) . '_' . esc_attr($unique_id) . ']"' : '') . 
		' class="cmsmasters_img_link' . 
		(($preload) ? ' preloader' . (($highImg) ? ' highImg' : '') : '') . 
		($link_icon ? ' ' . esc_attr($link_icon) : '') . 
		'">';
	
	
	if ($attachment) {
		$out .= wp_get_attachment_image(strstr($attachment, '|', true), (($type) ? $type : 'full'), false, $args);
	} elseif (has_post_thumbnail($cmsmasters_id)) {
		$out .= get_the_post_thumbnail($cmsmasters_id, (($type) ? $type : 'full'), $args);
	} else {
		$out .= '<span class="img_placeholder ' . esc_attr($placeholder_icon) . '"></span>';
	}
	
	
	$out .= '</a>' . 
	'</figure>';
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}



/* Get Posts Thumbnail with Link Rollover Function */
function travel_time_thumb_link($cmsmasters_id, $type = 'post-thumbnail', $link = true, $group = false, $preload = true, $highImg = false, $fullwidth = true, $show = true, $attachment = false, $unique = false, $link_icon = false, $placeholder_icon = 'cmsmasters_theme_icon_image') {
	$args = array( 
		'class' => (($fullwidth) ? 'full-width' : ''), 
		'alt' => cmsmasters_title($cmsmasters_id, false), 
		'title' => cmsmasters_title($cmsmasters_id, false) 
	);
	
	
	$link_href = ($attachment) ? wp_get_attachment_image_src(strstr($attachment, '|', true), 'full') : wp_get_attachment_image_src((int) get_post_thumbnail_id($cmsmasters_id), 'full');
	
	
	if (!$unique) {
		$unique_id = uniqid();
	} else {
		$unique_id = $unique;
	}
	
	
	$out = '<figure class="cmsmasters_img_wrap">' . 
		'<a href="' . (($link) ? esc_url(get_permalink()) : esc_url($link_href[0])) . '"' . 
		' title="' . cmsmasters_title($cmsmasters_id, false) . '"' . 
		(($group) ? ' rel="ilightbox[' . esc_attr($group) . '_' . esc_attr($unique_id) . ']"' : '') . 
		' class="cmsmasters_img_link' . 
		(($preload) ? ' preloader' . (($highImg) ? ' highImg' : '') : '') . 
		($link_icon ? ' ' . esc_attr($link_icon) : '') . 
		'"></a>';
	
		
	
		if ($attachment) {
			$out .= wp_get_attachment_image(strstr($attachment, '|', true), (($type) ? $type : 'full'), false, $args);
		} elseif (has_post_thumbnail($cmsmasters_id)) {
			$out .= get_the_post_thumbnail($cmsmasters_id, (($type) ? $type : 'full'), $args);
		} else {
			$out .= '<span class="img_placeholder ' . esc_attr($placeholder_icon) . '"></span>';
		}
	
	
	$out .= '</figure>';
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}




/* Get Posts Thumbnail With Rollover Function */
function travel_time_thumb_rollover($cmsmasters_id, $type = 'post-thumbnail', $rollover = true, $open_link = true, $group = false, $attachment_images = false, $attachment_video_type = false, $attachment_video_link = false, $attachment_video_links = false, $highImg = false, $show = true, $link_redirect = false, $link_url = false, $link_target = false, $placeholder_icon = 'cmsmasters_theme_icon_image') {
	$cmsmasters_title = cmsmasters_title($cmsmasters_id, false);

	$args = array( 
		'class' => 'full-width', 
		'alt' => $cmsmasters_title, 
		'title' => $cmsmasters_title 
	);
	
	$unique_id = uniqid();
	
	
	$out = '<figure class="cmsmasters_img_rollover_wrap preloader' . (($highImg) ? ' highImg' : '') . '">';
	
	
	if (has_post_thumbnail($cmsmasters_id)) {
		$out .= get_the_post_thumbnail($cmsmasters_id, (($type) ? $type : 'full'), $args);
		
		$cmsmasters_image_link = wp_get_attachment_image_src((int) get_post_thumbnail_id($cmsmasters_id), 'full');
	} elseif ($attachment_images && $attachment_images[0] != '' && sizeof($attachment_images) > 0) {
		$out .= wp_get_attachment_image(strstr($attachment_images[0], '|', true), (($type) ? $type : 'full'), false, $args);
		
		$cmsmasters_image_link = wp_get_attachment_image_src(strstr($attachment_images[0], '|', true), 'full');
	} else {
		$out .= '<span class="img_placeholder ' . esc_attr($placeholder_icon) . '"></span>';
		
		$cmsmasters_image_link = '';
	}
	
	
	$is_video_selfhosted = false;
	
	
	if (
		$attachment_video_type == 'selfhosted' && 
		!empty($attachment_video_links) && 
		sizeof($attachment_video_links) > 0
	) {
		$is_video_selfhosted = true;
		
		
		$shv_out = 'href="' . esc_url($attachment_video_links[0]) . '"';
		
		
		$shvl_out = '';
		
		
		unset($attachment_video_links[0]);
		
		
		foreach($attachment_video_links as $attachment_video_link_url) {
			$video_format = substr(strrchr($attachment_video_link_url, '.'), 1);
			
			$shvl_out .= $video_format . ":'{$attachment_video_link_url}', ";
		}
		
		
		$shv_out .= ' data-options="' . 
			'html5video: {' . 
				substr($shvl_out, 0, -2) . 
			'}' . 
		'"';
	}
	
	
	if ($rollover) {
		$out .= '<div class="cmsmasters_img_rollover">';
		
		if (
			$group && 
			(
				(
					$attachment_video_type == 'embedded' && 
					$attachment_video_link != ''
				) || 
				$is_video_selfhosted || 
				$cmsmasters_image_link != ''
			)
		) {
			$out .= '<a ' . ($is_video_selfhosted ? $shv_out : 'href="' . ((!$attachment_video_link) ? esc_url($cmsmasters_image_link[0]) : $attachment_video_link) . '"') . ' rel="ilightbox[' . esc_attr($cmsmasters_id) . '_' . esc_attr($unique_id) . ']"' . (($link_redirect == 'true' && $link_target == 'true') ? ' target="_blank"' : '') . ' title="' . esc_attr($cmsmasters_title) . '" class="cmsmasters_image_link"></a>';
		}
		
		
		if ($open_link) {
			$out .= '<a href="' . (($link_redirect == 'true' && $link_url != '') ? esc_url($link_url) : esc_url(get_permalink($cmsmasters_id))) . '"' . (($link_redirect == 'true' && $link_target == 'true') ? ' target="_blank"' : '') . ' title="' . esc_attr($cmsmasters_title) . '" class="cmsmasters_open_link"></a>';
		}
		
		$out .= '</div>';
	} elseif ($open_link) {
		$out .= '<div class="cmsmasters_img_rollover">' . 
			'<a href="' . (($link_redirect == 'true' && $link_url != '') ? esc_url($link_url) : esc_url(get_permalink($cmsmasters_id))) . '" title="' . esc_attr($cmsmasters_title) . '" class="cmsmasters_open_link"></a>' . 
		'</div>';
	} else {
		$out .= '';
	}
	
	
	$out .= '</figure>';
	
	
	if ($group && $attachment_images && sizeof($attachment_images) > 1) {
		if (!has_post_thumbnail($cmsmasters_id)) {
			unset($attachment_images[0]);
		}
		
		$out .= '<div class="dn">';
		
		foreach ($attachment_images as $attachment_image) {
			$attachment_image_link = wp_get_attachment_image_src(strstr($attachment_image, '|', true), 'full');
			
			$out .= '<figure>' . 
				'<a href="' . esc_url($attachment_image_link[0]) . '" rel="ilightbox[' . esc_attr($cmsmasters_id) . '_' . esc_attr($unique_id) . ']" title="' . esc_attr($cmsmasters_title) . '" class="preloader highImg">' . 
					wp_get_attachment_image(strstr($attachment_image, '|', true), 'full', false, $args) . 
				'</a>' . 
			'</figure>';
		}
		
		$out .= '</div>';
	}
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}



/* Get Posts Small Thumbnail Function */
function travel_time_thumb_small($cmsmasters_id, $type = 'post', $w = 100, $h = 100, $show = true) {
	$out = '<figure class="alignleft">' . 
		'<a href="' . esc_url(get_permalink()) . '"' . ' title="' . cmsmasters_title($cmsmasters_id, false) . '">';

		$args = array( 
			'alt' => cmsmasters_title($cmsmasters_id, false), 
			'title' => cmsmasters_title($cmsmasters_id, false), 
			'style' => 'width:' . $w . 'px; height:' . $h . 'px;' 
		);
		
		
		if (has_post_thumbnail()) {
			$out .= get_the_post_thumbnail($cmsmasters_id, 'cmsmasters-square-thumb', $args);
		} elseif ($type == 'post') { // Post type - post
			if (get_post_format() == 'gallery') {
				$cmsmasters_post_images = explode(',', str_replace(' ', '', str_replace('img_', '', get_post_meta($cmsmasters_id, 'cmsmasters_post_images', true))));
				
				$cmsmasters_post_image = $cmsmasters_post_images[0];
				
				if (isset($cmsmasters_post_image) && $cmsmasters_post_image != '') {
					$out .= wp_get_attachment_image(strstr($cmsmasters_post_image, '|', true), 'cmsmasters-square-thumb', false, $args);
				} else {
					$out .= '<span class="img_placeholder cmsmasters_theme_icon_image"></span>';
				}
			} elseif (get_post_format() == 'image') {
				$cmsmasters_post_image = get_post_meta($cmsmasters_id, 'cmsmasters_post_image_link', true);
				
				if (isset($cmsmasters_post_image) && $cmsmasters_post_image != '') {
					$out .= wp_get_attachment_image(strstr($cmsmasters_post_image, '|', true), 'cmsmasters-square-thumb', false, $args);
				} else {
					$out .= '<span class="img_placeholder cmsmasters_theme_icon_image"></span>';
				}
			} else {
				$out .= '<span class="img_placeholder cmsmasters_theme_icon_image"></span>';
			}
		} elseif ($type == 'project') { // Post type - project
			if (get_post_format() == 'gallery' || get_post_format() == 'standard') {
				$cmsmasters_project_images = explode(',', str_replace(' ', '', str_replace('img_', '', get_post_meta($cmsmasters_id, 'cmsmasters_project_images', true))));
				
				$cmsmasters_project_image = $cmsmasters_project_images[0];
				
				if (isset($cmsmasters_project_image) && $cmsmasters_project_image != '') {
					$out .= wp_get_attachment_image(strstr($cmsmasters_project_image, '|', true), 'cmsmasters-square-thumb', false, $args);
				} else {
					$out .= '<span class="img_placeholder cmsmasters_theme_icon_image"></span>';
				}
			} else {
				$out .= '<span class="img_placeholder cmsmasters_theme_icon_image"></span>';
			}
		} elseif ($type == 'profile') { // Post type - profile
			$out .= '<span class="img_placeholder cmsmasters_theme_icon_person"></span>';
		}
		
		$out .= '</a>' . 
	'</figure>';
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}



/* Get Title Function */
function cmsmasters_title($cmsmasters_id, $show = true) { 
	$cmsmasters_heading = get_post_meta($cmsmasters_id, 'cmsmasters_heading', true);
	
	$cmsmasters_heading_title = get_post_meta($cmsmasters_id, 'cmsmasters_heading_title', true);
	
	$out = '';
	
	if ($cmsmasters_heading == 'custom' && $cmsmasters_heading_title != '') {
		$out .= esc_attr($cmsmasters_heading_title);
	} else {
		$out .= esc_attr(strip_tags(get_the_title($cmsmasters_id) ? get_the_title($cmsmasters_id) : $cmsmasters_id));
	} 
    
	
    if ($show) {
        echo $out;
    } else {
        return $out;
    }
}



/* Get Heading Function */
function cmsmasters_heading($cmsmasters_id, $tag = 'h1', $show = true) { 
	$out = '<header class="entry-header">' . 
		'<' . esc_html($tag) . ' class="entry-title">' . 
			'<a href="' . esc_url(get_permalink()) . '">' . cmsmasters_title($cmsmasters_id, false) . '</a>' . 
		'</' . esc_html($tag) . '>' . 
	'</header>';
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}



/* Get Heading Function */
function travel_time_get_comments($class = false, $show = false) { 
	$out = '';
	
	
	if (comments_open()) {
		$out .= '<span class="cmsmasters_comments' . ($class ? ' ' . $class : '') . '">' . 
			'<a class="cmsmasters_theme_icon_comment" href="' . esc_url(get_comments_link()) . '" title="' . esc_attr__('Comment on', 'travel-time') . ' ' . esc_attr(get_the_title()) . '">' . 
				'<span>' . esc_html(get_comments_number()) . ' ' . esc_attr__('Comments', 'travel-time') . '</span>' . 
			'</a>' . 
		'</span>';
	}
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}





/****************************** Blog, Tours, Profiles Single Functions ******************************/

/* Get Previous & Next Post Links Function */
function travel_time_prev_next_posts() {
	$cmsmasters_post_type = get_post_type();

	$published_posts = wp_count_posts($cmsmasters_post_type)->publish;
	
	
	if ($published_posts > 1) {
		echo '<aside class="post_nav">';

		
		previous_post_link('<span class="cmsmasters_prev_post"><span>' . esc_html__('Previous', 'travel-time') . '</span>%link</span>');
		
		next_post_link('<span class="cmsmasters_next_post"><span>' . esc_html__('Next', 'travel-time') . '</span>%link</span>');


		echo '</aside>';
	}
}


/* Get Sharing Box Function */
function travel_time_sharing_box($title_box = false, $tag = 'h4') {
	$page_link = urlencode(get_permalink());
	
	$social_title = cmsmasters_title(get_the_ID(), false);
	
	$website_name = get_bloginfo('name');
	
	
	if (has_post_thumbnail() && get_post_format() != '' || get_post_type() != 'post' ) {
		$post_img_id = get_post_thumbnail_id();
		
		$post_img_url = wp_get_attachment_url($post_img_id);
		
		$pinterest_img = urlencode($post_img_url);
	} else {
		preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', get_the_content(), $img_matches);
		
		
		if (!empty($img_matches[1][0])) {
			$first_img = $img_matches[1][0];
		} else {
			$first_img = get_template_directory_uri() . '/img/logo.png';
		}
		
		
		$pinterest_img = urlencode($first_img);
	}
	
	echo "<aside class=\"share_posts\">
		" . ($title_box ? "<{$tag} class=\"share_posts_title\">{$title_box}</{$tag}>" : "") . "
		<div class=\"share_posts_inner\">
			<a href=\"https://www.facebook.com/sharer/sharer.php?display=popup&u={$page_link}\">" . esc_html__('Facebook', 'travel-time') . "</a>
			<a href=\"https://plus.google.com/share?url={$page_link}\">" . esc_html__('Google+', 'travel-time') . "</a>
			<a href=\"https://twitter.com/intent/tweet?text=" . urlencode(html_entity_decode(sprintf(esc_attr__("Check out '%s' on %s website", 'travel-time'), $social_title, $website_name), ENT_QUOTES, 'UTF-8')) . "&url={$page_link}\">" . esc_html__('Twitter', 'travel-time') . "</a>
			<a href=\"https://pinterest.com/pin/create/button/?url={$page_link}&media={$pinterest_img}&description={$social_title}\">" . esc_html__('Pinterest', 'travel-time') . "</a>
		</div>
	</aside>
";
}



/* Get About Author Box Function */
function travel_time_author_box($title_box = false, $tag = 'h3', $author_tag = 'h4') {
	$user_email = get_the_author_meta('user_email');
	
	
	$user_first_name = get_the_author_meta('first_name') ? get_the_author_meta('first_name') : false;
	
	$user_last_name = get_the_author_meta('last_name') ? get_the_author_meta('last_name') : false;
	
	$user_url = get_the_author_meta('url') ? get_the_author_meta('url') : false;
	
	$user_description = get_the_author_meta('description') ? get_the_author_meta('description') : false;
	
	
	if ($user_description) {
		echo '<aside class="about_author">';
		
		
		if ($title_box) {
			echo '<' . esc_html($tag) . ' class="about_author_title">' . esc_html($title_box) . '</' . esc_html($tag) . '>';
		}
		
		
		echo '<div class="about_author_inner">';
		
		
		$out = '';
		
		
		if ($user_first_name) {
			$out .= $user_first_name;
		}
		
		
		if ($user_first_name && $user_last_name) {
			$out .= ' ' . $user_last_name;
		} elseif ($user_last_name) {
			$out .= $user_last_name;
		}
		
		
		if (get_the_author() && ($user_first_name || $user_last_name)) {
			$out .= ' (';
		}
		
		
		if (get_the_author()) {
			$out .= get_the_author();
		}
		
		
		if (get_the_author() && ($user_first_name || $user_last_name)) {
			$out .= ')';
		}
		
		
		echo '<figure class="about_author_avatar">' . 
			get_avatar($user_email, 130, get_option('avatar_default')) . 
		'</figure>' . 
		'<div class="about_author_cont">';
		
		
		if ($out != '') {
			echo '<' . esc_html($author_tag) . ' class="about_author_cont_title vcard author"><span class="fn" rel="author">' . esc_html($out) . '</span></' . esc_html($author_tag) . '>';
		}
		
		
		echo '<p>' . str_replace("\n", '<br />', $user_description) . '</p>';
		
		
		if ($user_url) {
			echo '<a href="' . esc_url($user_url) . '" title="' . esc_attr(get_the_author()) . ' ' . esc_attr__('website', 'travel-time') . '" target="_blank">' . esc_html($user_url) . '</a>';
		}
		
		
		echo '</div>' . 
			'</div>' . 
		'</aside>';
	}
}



/* Get Related, Popular & Recent Posts Function */
function travel_time_related($tag = 'h4', $box_type = false, $tgsarray = null, $items_number = 5, $pause_time = 5, $type = 'post', $taxonomy = null) {
	if ( 
		($box_type == 'related' && !empty($tgsarray)) || 
		$box_type == 'popular' || 
		$box_type == 'recent' 
	) {
		$autoplay = ((int) $pause_time > 0) ? $pause_time * 1000 : 'false';
		
		
		$r_args = array( 
			'posts_per_page' => $items_number, 
			'post_status' => 'publish', 
			'ignore_sticky_posts' => 1, 
			'post__not_in' => array(get_the_ID()), 
			'post_type' => $type 
		);
		
		
		if ($box_type == 'related' && !empty($tgsarray)) {
			if ($type == 'post') {
				$r_args['tag__in'] = $tgsarray;
			} elseif ($type != 'post' && $taxonomy) {
				$r_args['tax_query'] = array( 
					array( 
						'taxonomy' => $taxonomy, 
						'field' => 'term_id', 
						'terms' => $tgsarray 
					) 
				);
			}
		} elseif ($box_type == 'popular') {
			$r_args['order'] = 'DESC';
			
			$r_args['orderby'] = 'meta_value_num';
			
			$r_args['meta_key'] = 'cmsmasters_likes';
		}
		
		
		$r_query = new WP_Query($r_args);
		
		
		echo "<aside class=\"cmsmasters_single_slider" . (($type == 'campaign') ? ' cmsmasters_single_slider_campaign' : '') . "\">
			<" . esc_html($tag) . " class=\"cmsmasters_single_slider_title\">";
			
			
			if ($type == 'post') {
				esc_html_e('More posts', 'travel-time');
			} elseif ($type == 'campaign') {
				esc_html_e('More campaigns', 'travel-time');
			} else {
				esc_html_e('More tours', 'travel-time');
			}
			
			
			echo "</" . esc_html($tag) . ">";
			
			
			if ($r_query->have_posts()) {
				echo "<div class=\"cmsmasters_single_slider_inner\">
					<script type=\"text/javascript\">
						jQuery(document).ready(function () { 
							var container = jQuery('.cmsmasters_single_slider_wrap'), 
								containerWidth = container.width(), 
								contentWrap = container.closest('.content_wrap'), 
								firstPost = container.find('.cmsmasters_single_slider_item'), 
								postMinWidth = Number(firstPost.css('minWidth').replace('px', '')), 
								postThreeColumns = (postMinWidth * 4) - 1, 
								postTwoColumns = (postMinWidth * 3) - 1, 
								postOneColumns = (postMinWidth * 2) - 1, 
								itemsNumber = 2;
							
							
							if (contentWrap.hasClass('fullwidth')) {
								itemsNumber = 3;
							} else if (contentWrap.hasClass('r_sidebar') || contentWrap.hasClass('l_sidebar')) {
								itemsNumber = 3;
							}
							
							
							jQuery('.cmsmasters_single_slider_wrap').owlCarousel( {
								items : 				itemsNumber, 
								itemsDesktop : 			false, 
								itemsDesktopSmall : 	[postThreeColumns, 3], 
								itemsTablet : 			[postTwoColumns, 2], 
								itemsMobile : 			[postOneColumns, 1], 
								transitionStyle : 		false, 
								rewindNav : 			true, 
								slideSpeed : 			200, 
								paginationSpeed : 		800, 
								rewindSpeed : 			1000, 
								autoPlay : 				{$autoplay}, 
								stopOnHover : 			true, 
								autoHeight : 			true, 
								addClassActive : 		true, 
								responsiveBaseWidth : 	'.cmsmasters_single_slider_wrap', 
								pagination : 			false, 
								navigation : 			false, 
								navigationText : [ 
									'<span class=\"cmsmasters_prev_arrow\"><span></span></span>', 
									'<span class=\"cmsmasters_next_arrow\"><span></span></span>' 
								] 
							} );
						} );	
					</script>
					<div class=\"cmsmasters_single_slider_wrap cmsmasters_owl_slider\">";
						while ($r_query->have_posts()) : $r_query->the_post();
							if ($type == 'project') {
								$cmsmasters_option = travel_time_get_global_options();
								
								$cmsmasters_project_icon = get_post_meta(get_the_ID(), 'cmsmasters_project_icon', true);

								$cmsmasters_project_duration = get_post_meta(get_the_ID(), 'cmsmasters_project_duration', true);

								$cmsmasters_project_participants = get_post_meta(get_the_ID(), 'cmsmasters_project_participants', true);

								$cmsmasters_project_price = get_post_meta(get_the_ID(), 'cmsmasters_project_price', true);

								$cmsmasters_project_rating = get_post_meta(get_the_ID(), 'cmsmasters_project_price', true);
							
								echo "<div class=\"cmsmasters_single_slider_item cmsmasters_single_slider_item_tour\">
									<div class=\"cmsmasters_single_slider_item_outer\">";

										if (has_post_thumbnail()) {
											$cmsmasters_with_image = " cmsmasters_with_image"; 
										} else {
											$cmsmasters_with_image = " cmsmasters_with_placeholder";
										}
											
										echo '<div class="cmsmasters_single_slider_item_top_wrap' . $cmsmasters_with_image . '">' . 
											'<div class="cmsmasters_single_slider_item_top_wrap_inner">';
													
												if ( $cmsmasters_option['travel-time' . '_portfolio_project_icon'] && $cmsmasters_project_icon != '' ) {
													echo '<span class="cmsmasters_single_slider_item_tour_icon ' . esc_attr($cmsmasters_project_icon) . '"></span>';
												} 
												
												if ( $cmsmasters_option['travel-time' . '_portfolio_project_price'] && $cmsmasters_project_price != '' ) {
													$portfolio_project_price_currency = $cmsmasters_option['travel-time' . '_portfolio_project_price_currency'];
													
													$portfolio_project_price_currency_pos = (isset($cmsmasters_option['travel-time' . '_portfolio_project_price_currency_pos'])) ? $cmsmasters_option['travel-time' . '_portfolio_project_price_currency_pos'] : 'before';
													
													echo '<span class="cmsmasters_single_slider_item_tour_price">' . ($portfolio_project_price_currency_pos == 'after' ? esc_html($cmsmasters_project_price) . esc_html($portfolio_project_price_currency) : esc_html($portfolio_project_price_currency) . esc_html($cmsmasters_project_price)) . '</span>';
												}
											
												echo '<h3 class="cmsmasters_single_slider_item_title">' . 
													'<a href="' . esc_url(get_permalink()) . '">' . cmsmasters_title(get_the_ID(), false) . '</a>' . 
												'</h3>' . 
											'</div>';
										
											if (!post_password_required() && has_post_thumbnail()) {	
											
												travel_time_thumb(get_the_ID(), 'cmsmasters-tour-thumb', true, 'img_' . get_the_ID(), true, true, true, true, false);
												
											} else {
												
												travel_time_thumb(get_the_ID(), 'cmsmasters-tour-thumb', true, false, true, false, true, true, false, false, true, 'cmsmasters_theme_icon_image');
												
											}

										echo '</div>';
										
										echo "<div class=\"cmsmasters_single_slider_item_inner\">";
												if (CMSMASTERS_RATING) {
													travel_time_custom_rating(get_the_ID(), 'page');
												}
												
												if (
													$cmsmasters_option['travel-time' . '_portfolio_project_participants'] && $cmsmasters_project_participants != '' || 
													$cmsmasters_option['travel-time' . '_portfolio_project_duration'] && $cmsmasters_project_duration != ''
												) {
													echo "<div class=\"cmsmasters_single_slider_item_inner_meta\">";
														if($cmsmasters_option['travel-time' . '_portfolio_project_participants'] && $cmsmasters_project_participants != '') {
															echo '<span class="cmsmasters_single_slider_item_tour_participants">' . esc_html($cmsmasters_project_participants) . '</span>';
														}

														if($cmsmasters_option['travel-time' . '_portfolio_project_duration'] && $cmsmasters_project_duration != '') {
															echo '<span class="cmsmasters_single_slider_item_tour_duration">' . esc_html($cmsmasters_project_duration) . '</span>';
														}
													echo "</div>";
												}

										echo "</div>
									</div>
								</div>";
							} else {						
								echo "<div class=\"cmsmasters_single_slider_item\">
									<div class=\"cmsmasters_single_slider_item_outer\">";
									
										travel_time_thumb(get_the_ID(), 'cmsmasters-tour-thumb', true, false, true, false, true, true, false, false, false, 'cmsmasters_theme_icon_image');
										
										echo "<div class=\"cmsmasters_single_slider_item_inner\">
											<h3 class=\"cmsmasters_single_slider_item_title\">
												<a href=\"" . esc_url(get_permalink()) . "\">" . cmsmasters_title(get_the_ID(), false) . "</a>
											</h3>
										</div>
									</div>
								</div>";
							}
						endwhile;
					echo "</div>";
			} else {
				echo "<h5 class=\"cmsmasters_single_slider_no_items\">";
				
				
				if ($type == 'post') {
					esc_html_e('No posts found', 'travel-time');
				} elseif ($type == 'campaign') {
					esc_html_e('No campaigns found', 'travel-time');
				} else {
					esc_html_e('No tours found', 'travel-time');
				}
				
				
				echo "</h5>";
			}
		
		
		echo "</aside>";
		
		
		wp_reset_postdata();
	}
}


/* Get Posts Author Avatar Function */
function travel_time_author_avatar($template_type = 'page') {
	$user_email = get_the_author_meta('user_email') ? get_the_author_meta('user_email') : false;
	
	
	if ($template_type == 'page') {
		if (get_the_tags()) {
			echo '<figure>' . 
				get_avatar($user_email, 75, get_option('avatar_default')) . 
			'</figure>';
		}
	} else if ($template_type == 'post') {
		if (get_the_tags()) {
			echo '<figure>' . 
				get_avatar($user_email, 75, get_option('avatar_default')) . 
			'</figure>';
		}
	}
}



/* Get Category List */
function travel_time_get_the_category_list($cmsmasters_id, $taxonomy, $sep = '', $before = '', $after = '') {
	$terms = get_the_terms($cmsmasters_id, $taxonomy);
	
	
	if (is_wp_error($terms)) {
		return $terms;
	}
	
	
	if (empty($terms)) {
		return false;
	}
	
	
	$links = array();
	
	
	foreach ($terms as $term) {
		$link = get_term_link($term, $taxonomy);
		
		
		if (is_wp_error($link)) {
			return $link;
		}
		
		
		$links[] = '<a href="' . esc_url($link) . '" class="cmsmasters_cat_color cmsmasters_cat_' . esc_attr($term->term_id) . '" rel="category tag">' . esc_html($term->name) . '</a>';
	}
	
	
    $term_links = apply_filters("term_links-$taxonomy", $links);
	
	
	return $before . implode($sep, $term_links) . $after;
}

