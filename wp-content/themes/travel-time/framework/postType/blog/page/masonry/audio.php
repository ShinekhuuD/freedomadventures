<?php
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version		1.0.0
 * 
 * Blog Page Masonry Audio Post Format Template
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


$cmsmasters_post_audio_links = get_post_meta(get_the_ID(), 'cmsmasters_post_audio_links', true);


$post_sort_categs = get_the_terms(0, 'category');

if ($post_sort_categs != '') {
	$post_categs = '';
	
	foreach ($post_sort_categs as $post_sort_categ) {
		$post_categs .= ' ' . $post_sort_categ->slug;
	}
	
	$post_categs = ltrim($post_categs, ' ');
}

?>

<!--_________________________ Start Audio Article _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_post_masonry'); ?> data-category="<?php echo esc_attr($post_categs); ?>">
	<div class="cmsmasters_post_cont">
	<?php				
		echo '<div class="cmsmasters_post_top_wrap">' . 
			'<div class="entry-meta">';
			
			if ($likes || $comments || $date) {
			
				$date ? travel_time_get_post_date('page', 'masonry') : '';
			
				$comments ? travel_time_get_post_comments('page') : '';
			
				$likes ? travel_time_get_post_likes('page') : '';
				
			}
			
			echo '</div>';

		echo '</div>';
		
		
		echo '<div class="cmsmasters_post_cont_wrap">';
		
			travel_time_post_heading(get_the_ID(), 'h2');
			
			if (!post_password_required() && !empty($cmsmasters_post_audio_links) && sizeof($cmsmasters_post_audio_links) > 0) {
				$attrs = array(
					'preload' => 'none'
				);
				
				
				foreach ($cmsmasters_post_audio_links as $cmsmasters_post_audio_link_url) {
					$attrs[substr(strrchr($cmsmasters_post_audio_link_url, '.'), 1)] = $cmsmasters_post_audio_link_url;
				}
				
				
				echo '<div class="cmsmasters_audio">' . 
					wp_audio_shortcode($attrs) . 
				'</div>';
			}
			
			
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
</article>
<!--_________________________ Finish Audio Article _________________________ -->

