<?php
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version		1.0.0
 * 
 * Profiles Page Horizontal Profile Format Template
 * Created by CMSMasters
 * 
 */


$columns_num = '';
	
if ($profile_columns == 1) {
	$columns_num = 'one_first';
} elseif ($profile_columns == 2) {
	$columns_num = 'one_half';
} elseif ($profile_columns == 3) {
	$columns_num = 'one_third';
} elseif ($profile_columns == 4) {
	$columns_num = 'one_fourth';
} 


$cmsmasters_profile_social = get_post_meta(get_the_ID(), 'cmsmasters_profile_social', true);

$cmsmasters_profile_subtitle = get_post_meta(get_the_ID(), 'cmsmasters_profile_subtitle', true);

?>

<!--_________________________ Start Horizontal Profile _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_profile_horizontal ' . $columns_num); ?>>
	<div class="profile_outer">
	<?php 
	if (has_post_thumbnail()) {
		travel_time_thumb_link(get_the_ID(), 'cmsmasters-square-thumb', true, false, false, false, false);
	}
	
	
	echo '<div class="profile_inner">';
		
		travel_time_profile_heading(get_the_ID(), 'h5', $cmsmasters_profile_subtitle, 'h5');
		
		travel_time_profile_exc_cont();
		
		travel_time_profile_social_icons($cmsmasters_profile_social);
		
	echo '</div>';
	?>
	</div>
</article>
<!--_________________________ Finish Horizontal Profile _________________________ -->

