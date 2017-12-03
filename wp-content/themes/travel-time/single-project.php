<?php
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version		1.0.8
 * 
 * Single Tour Template
 * Created by CMSMasters
 * 
 */


get_header();


$cmsmasters_option = travel_time_get_global_options();


$project_tags = get_the_terms(get_the_ID(), 'pj-tags');


$cmsmasters_project_sharing_box = get_post_meta(get_the_ID(), 'cmsmasters_project_sharing_box', true);

$cmsmasters_project_author_box = get_post_meta(get_the_ID(), 'cmsmasters_project_author_box', true);

$cmsmasters_project_more_posts = get_post_meta(get_the_ID(), 'cmsmasters_project_more_posts', true);


echo '<!--_________________________ Start Content _________________________ -->' . "\n" . 
'<div class="middle_content entry">';


if (have_posts()) : the_post();
	echo '<div class="portfolio opened-article">' . "\n";
	
	
	if (get_post_format() != '') {
		get_template_part('framework/postType/portfolio/post/' . get_post_format());
	} else {
		get_template_part('framework/postType/portfolio/post/standard');
	}	
	
	if ($cmsmasters_project_sharing_box == 'true') {
		travel_time_sharing_box(esc_html__('Share this tour?', 'travel-time'), 'h4');
	}
	
	
	if ($cmsmasters_project_author_box == 'true') {
		travel_time_author_box(esc_html__('Meet your guide', 'travel-time'), 'h4', 'h4');
	}
	
	
	if ($project_tags) {
		$tgsarray = array();
		
		
		foreach ($project_tags as $tagone) {
			$tgsarray[] = $tagone->term_id;
		}  
	} else {
		$tgsarray = '';
	}
	
	
	if ($cmsmasters_project_more_posts != 'hide') {
		travel_time_related( 
			'h4', 
			$cmsmasters_project_more_posts, 
			$tgsarray, 
			$cmsmasters_option['travel-time' . '_portfolio_more_projects_count'], 
			$cmsmasters_option['travel-time' . '_portfolio_more_projects_pause'], 
			'project', 
			'pj-tags' 
		);
	}
	
	
	comments_template( '/reviews.php' );
	
	echo '</div>';
endif;


echo '</div>' . "\n" . 
'<!-- _________________________ Finish Content _________________________ -->' . "\n\n";


get_footer();

