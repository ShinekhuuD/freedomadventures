<?php
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version 	1.0.6
 * 
 * Content Composer Gallery Shortcode
 * Created by CMSMasters
 * 
 */


extract(shortcode_atts($new_atts, $atts));


$unique_id = uniqid();


$images = explode(',', do_shortcode($content));


$out = '';


if ($layout == 'slider') {
	if ($image_size_slider == 'thumbnail' || $image_size_slider == 'medium' || $image_size_slider == 'large' || $image_size_slider == 'full') {
		$slider_size = get_option($image_size_slider . '_size_w');
	} else {
		$slider_size_array = cmsmasters_image_thumbnail_list();
		
		$slider_size = $slider_size_array[$image_size_slider]['width'];
	}
} elseif ($layout == 'gallery') {
	if ($image_size_gallery == 'thumbnail' || $image_size_gallery == 'medium' || $image_size_gallery == 'large' || $image_size_gallery == 'full') {
		$slider_size = get_option($image_size_gallery . '_size_w');
	} else {
		$slider_size_array = cmsmasters_image_thumbnail_list();
		
		$slider_size = $slider_size_array[$image_size_gallery]['width'];
	}
}

if ($content != null) {
	if ($layout == 'hover') {
		$out .= '<script type="text/javascript">' . 
				'jQuery(document).ready(function () { ' . 
					'jQuery("#cmsmasters_hover_slider_' . $unique_id . '").cmsmastersHoverSlider( { ' . 
						'sliderBlock : "#cmsmasters_hover_slider_' . $unique_id . '", ' . 
						'sliderItems : ".cmsmasters_hover_slider_items", ' . 
						'thumbWidth : "100", ' . 
						'thumbHeight : "60", ' . 
						'activeSlide : ' . $hover_active . ', ' . 
						'pauseTime : ' . ($hover_pause * 1000) . ', ' . 
						'pauseOnHover : ' . $hover_pause_on_hover . ' ' . 
					'} );' . 
				'} );' . 
			'</script>' . 
		'<div id="cmsmasters_hover_slider_' . $unique_id . '" class="cmsmasters_hover_slider' . 
		(($classes != '') ? ' ' . $classes : '') . 
		'"' . 
		(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
		(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
		'>' . "\n" . 
		'<ul class="cmsmasters_hover_slider_items">' . "\n";
		
		
		foreach ($images as $image) { 
			$out .= '<li>' . 
				'<figure class="cmsmasters_hover_slider_full_img">' . 
					wp_get_attachment_image(strstr($image, '|', true), 'post-thumbnail') . 
				'</figure>' . 
			'</li>';
		}
		
		$out .= '</ul>' . "\n" . 
		'</div>' . "\n";
	} elseif ($layout == 'slider') {
		$out .= '<div class="cmsmasters_content_slider_wrap" style="max-width:' . $slider_size . 'px;"' . 
		(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
		(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
		'>' . "\n" . 
			'<script type="text/javascript">' . 
				'jQuery(document).ready(function () { ' . 
					'jQuery("#cmsmasters_slider_' . $unique_id . '.cmsmasters_content_slider").owlCarousel( { ' . 
						'singleItem : true, ' . 
						(($slider_effect == 'slide') ? 'transitionStyle: false, ' : 'transitionStyle: "fade", ') . 
						(($slider_rewind != 'true') ? 'rewindNav: false, ' : '') . 
						'rewindSpeed : ' . $slider_rewind_speed . ', ' . 
						'slideSpeed : ' . $slider_animation_speed . ', ' . 
						'autoHeight : true, ' . 
						'paginationSpeed : 	' . $slider_animation_speed . ', ' . 
						(($slider_autoplay != 'true') ? 'autoPlay : false, ' : 'autoPlay : ' . ($slider_slideshow_speed * 1000) . ',') . 
						(($slider_pause_on_hover == 'true') ? 'stopOnHover: true, ' : '') . 
						(($slider_nav_control != 'true') ? 'pagination: false, ' : '') . 
						(($slider_nav_arrow == 'true') ? 'navigation : true, ' : '') . 
						'navigationText : 	[ ' . 
							'"<span class=\"cmsmasters_prev_arrow cmsmasters_left_gradient\"><span></span></span>", ' . 
							'"<span class=\"cmsmasters_next_arrow cmsmasters_right_gradient\"><span></span></span>" ' . 
						'] ' . 
					'} );' . 
				'} );' . 
			'</script>' . "\n" . 
			'<div id="cmsmasters_slider_' . $unique_id . '" class="cmsmasters_content_slider cmsmasters_owl_slider owl-carousel' . 
			(($classes != '') ? ' ' . $classes : '') . 
			'">' . "\n";
		
		
		foreach ($images as $image) { 
			$out .= '<div class="cmsmasters_content_slider_item">' . 
				wp_get_attachment_image(strstr($image, '|', true), $image_size_slider) . 
			'</div>';
		}
		
		$out .= '</div>' . "\n" . 
		'</div>' . "\n";
	} else {
		$gallery_more_text = ($gallery_more_text != '') ? $gallery_more_text : esc_html__('Load More', 'travel-time');
		
		$out_gallery_items = '';
		
		$gallery_arr = array();
		
		
		$i = 0;
		
		foreach ($images as $image) {
			$i += 1;
			
			$image_src = wp_get_attachment_image_src(strstr($image, '|', true), 'full');
			
			
			$gallery_item = '<li class="cmsmasters_gallery_item' . ((get_post_field('post_excerpt', $image) != '') ? ' cmsmasters_caption' : '') . '">' . 
				'<figure>';
					
					if ($gallery_links != 'none') {
						$gallery_item .= '<a'. (($gallery_links == 'blank') ? ' target="_blank"' : '') . ' href="' . $image_src[0] . '"' . (($gallery_links == 'lightbox') ? ' rel="ilightbox[' . $unique_id . ']"' : '') . '>';
					}
					
					$gallery_item .= wp_get_attachment_image(strstr($image, '|', true), $image_size_gallery);
					
					if ($gallery_links != 'none') {
						$gallery_item .= '</a>';
					}
					
					$gallery_item .= ((get_post_field('post_excerpt', $image) != '') ? '<figcaption>' . get_post_field('post_excerpt', $image) . '</figcaption>' : '') . 
				'</figure>' . 
			'</li>';
			
			
			if ($gallery_count == '' || $i <= $gallery_count) {
				$out_gallery_items .= $gallery_item;
			} else {
				$out_js = $gallery_item;
				
				$gallery_arr[] = "'{$out_js}'";
			}
		}
		
		
		if (!empty($gallery_arr)) {
			$gallery_arr = implode(',', $gallery_arr);
		} else {
			$gallery_arr = '';
		}
		
		
		$out .= '<div id="cmsmasters_gallery_' . $unique_id . '" class="cmsmasters_gallery_wrap' . 
		(($classes != '') ? ' ' . $classes : '') . 
		'"' . 
		(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
		(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
		'>';
		
		
		wp_enqueue_style('isotope');
		
		
		wp_enqueue_script('isotope');
		
		wp_enqueue_script('isotopeMode');
		
		
		$out .= "<style type=\"text/css\">
			#cmsmasters_gallery_{$unique_id} .cmsmasters_gallery {
				margin:0 0 0 -{$gallery_padding}px;
			}
			
			#cmsmasters_gallery_{$unique_id} .cmsmasters_gallery .cmsmasters_gallery_item {
				padding:0 0 {$gallery_padding}px {$gallery_padding}px;
			}
		</style>";
		
		
		$out .= '<ul class="cmsmasters_gallery' . 
			(($gallery_columns != '') ? ' cmsmasters_' . $gallery_columns : '') . 
			' cmsmasters_more_items_loader' . 
		'">' . 
			$out_gallery_items . 
		'</ul>';
		
		
		if ($gallery_arr != '') {
			$out .= '<div class="cmsmasters_wrap_more_items">' . 
				'<div class="cmsmasters_more_gallery_items cmsmasters_wrap_items_loader">' . 
					'<a href="javascript:void(0);" class="cmsmasters_button cmsmasters_gallery_items_loader cmsmasters_items_loader">' . 
						'<span>' . $gallery_more_text . '</span>' . 
					'</a>' . 
				'</div>' . 
			'</div>';
		}
		
		
		$out .= "<script type=\"text/javascript\">
			jQuery(document).ready(function () {
				(function ($) {
					if ($('#cmsmasters_gallery_{$unique_id}').find('.cmsmasters_gallery_item').length == '0') {
						return false;
					}
					
					
					startGallery( 
						'" . $unique_id . "', 
						'" . $gallery_type . "', 
						'" . ($gallery_count != '' ? $gallery_count : 'false') . "', 
						" . ($gallery_arr != '' ? "[{$gallery_arr}]" : "'false'") . " 
					);
				} )(jQuery);
			} );
		</script>
		</div>";
	}
	
	echo $out;
}
