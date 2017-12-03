<?php
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version 	1.0.6
 * 
 * 404 Error Page Template
 * Created by CMSMasters
 * 
 */


get_header();


$cmsmasters_option = travel_time_get_global_options();

?>

</div>

<!-- _________________________ Start Content _________________________ -->
<div class="entry">
	<div class="error">
		<div class="error_bg">
			<div class="error_wrap">
				<div class="error_inner">
					<h1 class="error_title"><?php echo esc_html__("404", 'travel-time'); ?></h1>
					<h2 class="error_subtitle"><?php echo esc_html__("We're sorry, but the page you were looking for doesn't exist.", 'travel-time'); ?></h2>
				</div>
			</div>		
		</div>
	</div>
</div>
<div class="content_wrap fullwidth">
	<div class="error_cont">
		<?php 
		if ($cmsmasters_option['travel-time' . '_error_search']) { 
			get_search_form(); 
		}
		
		
		if ($cmsmasters_option['travel-time' . '_error_sitemap_button'] && $cmsmasters_option['travel-time' . '_error_sitemap_link'] != '') {
			echo '<div class="error_button_wrap"><a href="' . esc_url($cmsmasters_option['travel-time' . '_error_sitemap_link']) . '" class="cmsmasters_button_inverse button">' . esc_html__('Sitemap', 'travel-time') . '</a></div>';
		}
		?>
	</div>
<!-- _________________________ Finish Content _________________________ -->

<?php 
get_footer();

