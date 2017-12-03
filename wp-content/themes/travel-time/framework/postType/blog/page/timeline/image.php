<?php
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version		1.0.0
 * 
 * Blog Page Timeline Image Post Format Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_post_metadata = explode(',', $cmsmasters_metadata);


$date = (in_array('date', $cmsmasters_post_metadata) || is_home()) ? true : false;
$categories = (get_the_category() && (in_array('categories', $cmsmasters_post_metadata) || is_home())) ? true : false;
$author = (in_array('author', $cmsmasters_post_metadata) || is_home()) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsmasters_post_metadata) || is_home())) ? true : false;
$likes = (in_array('likes', $cmsmasters_post_metadata) || is_home()) ? true : false;
$more = (in_array('more', $cmsmasters_post_metadata) || is_home()) ? true : false;


$cmsmasters_post_image_link = get_post_meta(get_the_ID(), 'cmsmasters_post_image_link', true);

?>

<!--_________________________ Start Image Article _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_post_timeline'); ?>>
	<?php 
	if ($date) {
		echo '<div class="cmsmasters_post_info entry-meta">';
		
			travel_time_get_post_date('page', 'timeline');
			
		echo '</div>';
	}
	?>
	<div class="cmsmasters_timeline_margin">
		<div class="cmsmasters_post_cont">
		<?php
			if ($cmsmasters_post_image_link != '' || has_post_thumbnail()) {
				$cmsmasters_with_image = " cmsmasters_with_image"; 
			} else {
				$cmsmasters_with_image = "";
			}
		
			echo '<div class="cmsmasters_post_top_wrap">' . 
				'<div class="entry-meta' . $cmsmasters_with_image . '">';
				
				if ($likes || $comments) {
				
					$comments ? travel_time_get_post_comments('page') : '';
				
					$likes ? travel_time_get_post_likes('page') : '';
					
				}
				
				echo '</div>';
			
				if (!post_password_required()) {
					if ($cmsmasters_post_image_link != '') {
						travel_time_thumb(get_the_ID(), 'cmsmasters-masonry-thumb', false, 'img_' . get_the_ID(), true, true, true, true, $cmsmasters_post_image_link);
					} elseif (has_post_thumbnail()) {
						travel_time_thumb(get_the_ID(), 'cmsmasters-masonry-thumb', false, 'img_' . get_the_ID(), true, true, true, true, false);
					}
				}

			echo '</div>';
			
			echo '<div class="cmsmasters_post_cont_wrap">';
			
				travel_time_post_heading(get_the_ID(), 'h2');
				
				
				if ($author || $categories) {
					echo '<div class="cmsmasters_post_cont_info entry-meta">';
						
						$author ? travel_time_get_post_author('page') : '';
						
						$categories ? travel_time_get_post_category(get_the_ID(), 'category', 'page') : '';
						
					echo '</div>';
				}
				
				
				travel_time_post_exc_cont();
				
				
				if ($more) {
					echo '<footer class="cmsmasters_post_footer entry-meta">';
						
						travel_time_post_more(get_the_ID());
						
					echo '</footer>';
				}
		
			echo '</div>';
		?>
		</div>
	</div>
</article>
<!--_________________________ Finish Image Article _________________________ -->

