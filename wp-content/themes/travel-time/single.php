<?php
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version		1.0.6
 * 
 * Single Post Template
 * Created by CMSMasters
 * 
 */


get_header();


$cmsmasters_option = travel_time_get_global_options();


list($cmsmasters_layout) = travel_time_theme_page_layout_scheme();


$cmsmasters_post_sharing_box = get_post_meta(get_the_ID(), 'cmsmasters_post_sharing_box', true);

$cmsmasters_post_author_box = get_post_meta(get_the_ID(), 'cmsmasters_post_author_box', true);

$cmsmasters_post_more_posts = get_post_meta(get_the_ID(), 'cmsmasters_post_more_posts', true);


echo '<!--_________________________ Start Content _________________________ -->' . "\n";


if ($cmsmasters_layout == 'r_sidebar') {
	echo '<div class="content entry">' . "\n\t";
} elseif ($cmsmasters_layout == 'l_sidebar') {
	echo '<div class="content entry fr">' . "\n\t";
} else {
	echo '<div class="middle_content entry">';
}


if (have_posts()) : the_post();
	echo '<div class="blog opened-article">' . "\n";
	
	
	if (get_post_format() != '') {
		get_template_part('framework/postType/blog/post/' . get_post_format());
	} else {
		get_template_part('framework/postType/blog/post/standard');
	}	
	
	if ($cmsmasters_post_sharing_box == 'true') {
		travel_time_sharing_box(esc_html__('Like this post?', 'travel-time'), 'h4');
	}
	
	
	if ($cmsmasters_post_author_box == 'true') {
		travel_time_author_box(esc_html__('About author', 'travel-time'), 'h4', 'h4');
	}
	
	
	if (get_the_tags()) {
		$tgsarray = array();
		
		foreach (get_the_tags() as $tagone) {
			$tgsarray[] = $tagone->term_id;
		}
	} else {
		$tgsarray = '';
	}
	
	
	if ($cmsmasters_post_more_posts != 'hide') {
		travel_time_related( 
			'h4', 
			$cmsmasters_post_more_posts, 
			$tgsarray, 
			$cmsmasters_option['travel-time' . '_blog_more_posts_count'], 
			$cmsmasters_option['travel-time' . '_blog_more_posts_pause'], 
			'post' 
		);
	}
	
	
	comments_template(); 
	
	
	echo '</div>';
endif;


echo '</div>' . "\n" . 
'<!-- _________________________ Finish Content _________________________ -->' . "\n\n";


if ($cmsmasters_layout == 'r_sidebar') {
	echo "\n" . '<!-- _________________________ Start Sidebar _________________________ -->' . "\n" . 
	'<div class="sidebar">' . "\n";
	
	
	get_sidebar();
	
	
	echo "\n" . '</div>' . "\n" . 
	'<!-- _________________________ Finish Sidebar _________________________ -->' . "\n";
} elseif ($cmsmasters_layout == 'l_sidebar') {
	echo "\n" . '<!-- _________________________ Start Sidebar _________________________ -->' . "\n" . 
	'<div class="sidebar fl">' . "\n";
	
	
	get_sidebar();
	
	
	echo "\n" . '</div>' . "\n" . 
	'<!-- _________________________ Finish Sidebar _________________________ -->' . "\n";
}


get_footer();

