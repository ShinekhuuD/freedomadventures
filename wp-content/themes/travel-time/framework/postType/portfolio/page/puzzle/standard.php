<?php
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version		1.0.0
 * 
 * Tours Puzzle Standard Tour Format Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_project_metadata = explode(',', $cmsmasters_pj_metadata);

$title = (in_array('title', $cmsmasters_project_metadata)) ? true : false;
$categories = (get_the_terms(get_the_ID(), 'pj-categs') && (in_array('categories', $cmsmasters_project_metadata))) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsmasters_project_metadata))) ? true : false;
$likes = (in_array('likes', $cmsmasters_project_metadata)) ? true : false;
$rollover = in_array('rollover', $cmsmasters_project_metadata) ? true : false;
$icon = in_array('icon', $cmsmasters_project_metadata) ? true : false;


$cmsmasters_project_icon = get_post_meta(get_the_ID(), 'cmsmasters_project_icon', true);
$cmsmasters_project_link_url = get_post_meta(get_the_ID(), 'cmsmasters_project_link_url', true);
$cmsmasters_project_link_redirect = get_post_meta(get_the_ID(), 'cmsmasters_project_link_redirect', true);
$cmsmasters_project_link_target = get_post_meta(get_the_ID(), 'cmsmasters_project_link_target', true);


$cmsmasters_project_size = get_post_meta(get_the_ID(), 'cmsmasters_project_size', true);

if (!$cmsmasters_project_size) {
    $cmsmasters_project_size = 'one_x_one';
}


$project_sort_categs = get_the_terms(0, 'pj-categs');

$project_categs = '';

if ($project_sort_categs != '') {
	foreach ($project_sort_categs as $project_sort_categ) {
		$project_categs .= ' ' . $project_sort_categ->slug;
	}
	
	
	$project_categs = ltrim($project_categs, ' ');
}

?>

<!--_________________________ Start Standard Tour _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_project_puzzle ' . $cmsmasters_project_size); echo (($project_categs != '') ? ' data-category="' . esc_attr($project_categs) . '"' : '') ?>>
	<div class="project_outer">
	<?php 
		travel_time_thumb_rollover(get_the_ID(), 'full', false, $rollover, false, false, false, false, false, false, true, $cmsmasters_project_link_redirect, $cmsmasters_project_link_url, $cmsmasters_project_link_target);
		
		
		if ($icon || $title || $categories || $likes || $comments) {
			echo '<div class="project_inner">';
				
				$icon ? travel_time_project_icon($cmsmasters_project_icon) : '';
				
				if ($categories) {
					echo '<div class="cmsmasters_project_cont_info entry-meta">';
						
						travel_time_get_project_category(get_the_ID(), 'pj-categs', 'page');
						
					echo '</div>';
				}
				
				$title ? travel_time_project_heading(get_the_ID(), 'h2', $cmsmasters_project_link_redirect, $cmsmasters_project_link_url, $cmsmasters_project_link_target) : '';
				
				
				if ($likes || $comments) {
					echo '<footer class="cmsmasters_project_footer entry-meta">';
						
						$comments ? travel_time_get_project_comments('page') : '';
						
						$likes ? travel_time_get_project_likes('page') : '';
						
					echo '</footer>';
				}
				
			echo '</div>';
		}
		
		
		if (!$title) {
			echo '<div class="dn">';
				travel_time_project_heading(get_the_ID(), 'h6');
			echo '</div>';
		}
		
		echo '<span class="dn meta-date">' . get_the_time('YmdHis') . '</span>';
	?>
	</div>
</article>
<!--_________________________ Finish Standard Tour _________________________ -->

