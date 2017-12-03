<?php
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version 	1.0.0
 * 
 * Content Composer Single Toggle Shortcode
 * Created by CMSMasters
 * 
 */


extract(shortcode_atts($new_atts, $atts));


$this->toggles_atts['toggle_counter']++;


$toggle_tags = explode(',', $tags);


foreach ($toggle_tags as $toggle_tag) {
	if ($toggle_tag != '') {
		$this->toggles_atts['sort_toggles'][generateSlug(trim($toggle_tag), 30)] = trim($toggle_tag);
	}
}


$out = '<div class="cmsmasters_toggle_wrap' . 
(($this->toggles_atts['toggle_active'] == $this->toggles_atts['toggle_counter']) ? ' current_toggle' : '') . 
(($classes != '') ? ' ' . $classes : '') . 
'" data-tags="all ';


$tgl_tag_str = '';


foreach ($toggle_tags as $tgl_tag) {
	$tgl_tag_str .= generateSlug(trim($tgl_tag), 30) . ' ';
}


$out .= substr($tgl_tag_str, 0, strlen($tgl_tag_str) - 1);


$out .= '">' . "\n" . 
	'<div class="cmsmasters_toggle_title">' . "\n" . 
		'<span class="cmsmasters_toggle_arrow">' . "\n" . 
		'</span>' . "\n" . 
		'<a href="#">' . $title . '</a>' . "\n" . 
	'</div>' . "\n" . 
	'<div class="cmsmasters_toggle">' . "\n" . 
		cmsmasters_divpdel('<div class="cmsmasters_toggle_inner">' . "\n" . 
			do_shortcode(wpautop($content)) . 
		'</div>' . "\n") . 
	'</div>' . "\n" . 
'</div>';


echo $out;
