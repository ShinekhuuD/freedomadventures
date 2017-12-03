<?php
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version		1.0.0
 * 
 * Blog Page Timeline Video Post Format Template
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


$cmsmasters_post_video_type = get_post_meta(get_the_ID(), 'cmsmasters_post_video_type', true);

$cmsmasters_post_video_link = get_post_meta(get_the_ID(), 'cmsmasters_post_video_link', true);

$cmsmasters_post_video_links = get_post_meta(get_the_ID(), 'cmsmasters_post_video_links', true);

?>

<!--_________________________ Start Video Article _________________________ -->

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
			if (!post_password_required()) {
				if ($cmsmasters_post_video_type == 'selfhosted' && !empty($cmsmasters_post_video_links) && sizeof($cmsmasters_post_video_links) > 0) {
					$video_size = cmsmasters_image_thumbnail_list();
					
					
					$attrs = array( 
						'preload'  => 'none', 
						'height'   => $video_size['post-thumbnail']['height'], 
						'width'    => $video_size['post-thumbnail']['width'] 
					);
					
					
					if (has_post_thumbnail()) {
						$video_poster = wp_get_attachment_image_src((int) get_post_thumbnail_id(get_the_ID()), 'post-thumbnail');
						
						
						$attrs['poster'] = $video_poster[0];
					}
					
					
					foreach ($cmsmasters_post_video_links as $cmsmasters_post_video_link_url) {
						$attrs[substr(strrchr($cmsmasters_post_video_link_url, '.'), 1)] = $cmsmasters_post_video_link_url;
					}
					
					
					echo '<div class="cmsmasters_video_wrap">' . 
						wp_video_shortcode($attrs) . 
					'</div>';
				} elseif ($cmsmasters_post_video_type == 'embedded' && $cmsmasters_post_video_link != '') {
					global $wp_embed;
					
					
					$video_size = cmsmasters_image_thumbnail_list();
					
					
					echo '<div class="cmsmasters_video_wrap">' . 
						do_shortcode($wp_embed->run_shortcode('[embed width="' . $video_size['post-thumbnail']['width'] . '" height="' . $video_size['post-thumbnail']['height'] . '"]' . $cmsmasters_post_video_link . '[/embed]')) . 
					'</div>';
				} elseif (has_post_thumbnail()) {
					travel_time_thumb(get_the_ID(), 'post-thumbnail', true, false, true, false, true, true, false);
				}
			}
			
			echo '<div class="cmsmasters_post_top_wrap">' . 
				'<div class="entry-meta">';
				
				if ($likes || $comments) {
				
					$comments ? travel_time_get_post_comments('page') : '';
				
					$likes ? travel_time_get_post_likes('page') : '';
					
				}
				
				echo '</div>';

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
<!--_________________________ Finish Video Article _________________________ -->

