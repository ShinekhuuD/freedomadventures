<?php
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version 	1.0.0
 * 
 * Content Composer Single Progress Bar Shortcode
 * Created by CMSMasters
 * 
 */


extract(shortcode_atts($new_atts, $atts));


$unique_id = uniqid();


if ($this->stats_atts['stats_mode'] == 'bars') {
	$this->stats_atts['style_stats'] .= "\n" . '.cmsmasters_stats.shortcode_animated #cmsmasters_stat_' . $unique_id . '.cmsmasters_stat { ' . 
		"\n\t" . (($this->stats_atts['stats_type'] == 'horizontal') ? 'width' : 'height') . ':' . $progress . '%; ' . 
	"\n" . '} ' . "\n\n" . 
	'#cmsmasters_stat_' . $unique_id . ' .cmsmasters_stat_inner { ' . 
		(($color != '') ? "\n\t" . cmsmasters_color_css('background-color', $color) : '') . 
	"\n" . '} ' . "\n" . 
	'#cmsmasters_stat_' . $unique_id . ' .cmsmasters_stat_inner:before { ' .
		(($color != '') ? "\n\t" . cmsmasters_color_css('color', $color) : '') . 
	"\n" . '} ' . "\n";
}

if ($this->stats_atts['stats_mode'] == 'circles') {
	$this->stats_atts['style_stats'] .= "\n" . '#cmsmasters_stat_' . $unique_id . ' .cmsmasters_stat_inner:before { ' .
		(($color != '') ? "\n\t" . cmsmasters_color_css('color', $color) : '') . 
	"\n" . '} ' . "\n";
}

$out = '<div class="cmsmasters_stat_wrap' . (($this->stats_atts['stats_mode'] == 'circles' || ($this->stats_atts['stats_mode'] == 'bars' && $this->stats_atts['stats_type'] == 'vertical')) ? $this->stats_atts['stats_count'] : '') . '">' . "\n" . 
	(($this->stats_atts['stats_mode'] == 'bars' && $this->stats_atts['stats_type'] == 'horizontal') ? '
		<span class="cmsmasters_stat_counter_wrap">' . "\n" . 
			'<span class="cmsmasters_stat_counter">' . (($this->stats_atts['stats_mode'] == 'bars') ? $progress : '0') . '</span>' . 
			'<span class="cmsmasters_stat_units">%</span>' . "\n" . 
		'</span>	
	' . "\n" : '') . 
	(($this->stats_atts['stats_mode'] == 'bars' && $this->stats_atts['stats_type'] == 'vertical') ? '<div class="cmsmasters_stat_container">' . "\n" : '') . 
		'<div id="cmsmasters_stat_' . $unique_id . '" class="cmsmasters_stat' . 
		(($classes != '') ? ' ' . $classes : '') . 
		(($content == '' && $icon == '') ? ' stat_only_number' : '') . 
		(($content != '' && $icon != '') ? ' stat_has_titleicon' : '') . '"' . 
		' data-percent="' . $progress . '"' . 
		(($this->stats_atts['stats_mode'] == 'circles' && $color != '') ? ' data-bar-color="' . $color . '"' : '') . 
		'>' . "\n" . 
			'<div class="cmsmasters_stat_inner' . 
			(($icon != '') ? ' ' . $icon : '') . 
			'">' . "\n" . 
				(($content != '' && $this->stats_atts['stats_mode'] == 'bars' && $this->stats_atts['stats_type'] == 'horizontal') ? '<span class="cmsmasters_stat_title">' . $content . '</span>' . "\n" : '') . 
				(($this->stats_atts['stats_mode'] == 'bars' && $this->stats_atts['stats_type'] == 'horizontal') ? '' : 
				'<span class="cmsmasters_stat_counter_wrap">' . "\n" . 
					'<span class="cmsmasters_stat_counter">' . (($this->stats_atts['stats_mode'] == 'bars') ? $progress : '0') . '</span>' . 
					'<span class="cmsmasters_stat_units">%</span>' . "\n" . 
				'</span>') . "\n" . 
			'</div>' . "\n" . 
		'</div>' . "\n" . 
	(($this->stats_atts['stats_mode'] == 'bars' && $this->stats_atts['stats_type'] == 'vertical') ? '</div>' . "\n" : '') . 
	(($content != '' && $this->stats_atts['stats_mode'] == 'bars' && $this->stats_atts['stats_type'] == 'vertical') ? '<span class="cmsmasters_stat_title">' . $content . '</span>' . "\n" : '') . 
	(($content != '' && $this->stats_atts['stats_mode'] == 'circles') ? '<span class="cmsmasters_stat_title">' . $content . '</span>' . "\n" : '') . 
	(($subtitle != '') ? '<span class="cmsmasters_stat_subtitle">' . $subtitle . '</span>' . "\n" : '') . 
'</div>';


echo $out;