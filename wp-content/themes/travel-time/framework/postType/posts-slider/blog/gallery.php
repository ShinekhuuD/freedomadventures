<?php
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version		1.0.0
 * 
 * Posts Slider Gallery Post Format Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_metadata = explode(',', $cmsmasters_post_metadata);

$title = in_array('title', $cmsmasters_metadata) ? true : false;
$excerpt = (in_array('excerpt', $cmsmasters_metadata) && travel_time_slider_post_check_exc_cont('post')) ? true : false;
$date = in_array('date', $cmsmasters_metadata) ? true : false;
$categories = (get_the_category() && (in_array('categories', $cmsmasters_metadata))) ? true : false;
$author = in_array('author', $cmsmasters_metadata) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsmasters_metadata))) ? true : false;
$likes = in_array('likes', $cmsmasters_metadata) ? true : false;
$more = in_array('more', $cmsmasters_metadata) ? true : false;


?>

<!--_________________________ Start Gallery Article _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_slider_post'); ?>>
	<div class="cmsmasters_slider_post_outer">
	<?php		
		if (has_post_thumbnail()) {
			$cmsmasters_with_image = " cmsmasters_with_image"; 
		} else {
			$cmsmasters_with_image = "";
		}
		
		echo '<div class="cmsmasters_post_top_wrap">' . 
			'<div class="entry-meta' . $cmsmasters_with_image . '">';
			
			if ($likes || $comments || $date) {
			
				$date ? travel_time_get_slider_post_date() : '';
			
				$comments ? travel_time_get_slider_post_comments('post') : '';
			
				$likes ? travel_time_slider_post_like('post') : '';
				
			}
			
			echo '</div>';
		
			if (!post_password_required() && has_post_thumbnail()) {
				echo '<div class="cmsmasters_date_img_wrap">';
					
					travel_time_thumb_rollover(get_the_ID(), 'cmsmasters-tour-thumb', false, false, false, false, false, false, false, false, true, false, false);
					
				echo '</div>';
			}

		echo '</div>';
		
		
		echo '<div class="cmsmasters_post_cont_wrap">';
		
			$title ? travel_time_slider_post_heading(get_the_ID(), 'post', 'h2') : '';
			
			
			if ($author || $categories) {
				echo '<div class="cmsmasters_post_cont_info entry-meta">';
					
					$author ? travel_time_get_slider_post_author('post') : '';
					
					$categories ? travel_time_get_slider_post_category(get_the_ID(), 'category', 'post') : '';
					
				echo '</div>';
			}
			
			
			$excerpt ? travel_time_slider_post_exc_cont('post') : '';
			
			
			if ($more) {
				echo '<footer class="cmsmasters_post_footer entry-meta">';
					
					$more ? travel_time_slider_post_more(get_the_ID()) : '';
					
				echo '</footer>';
			}
	
		echo '</div>';
	?>
	</div>
</article>
<!--_________________________ Finish Gallery Article _________________________ -->

