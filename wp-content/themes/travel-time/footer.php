<?php
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version		1.0.8
 * 
 * Website Footer Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = travel_time_get_global_options();
?>


		</div>
	</div>
</div>
<!-- _________________________ Finish Middle _________________________ -->
<?php 

get_sidebar('bottom');

?>
<a href="javascript:void(0);" id="slide_top" class="cmsmasters_theme_icon_slide_top"></a>
</div>
<!-- _________________________ Finish Main _________________________ -->

<!-- _________________________ Start Footer _________________________ -->
<footer id="footer" class="<?php echo 'cmsmasters_color_scheme_' . $cmsmasters_option['travel-time' . '_footer_scheme'] . ($cmsmasters_option['travel-time' . '_footer_type'] == 'default' ? ' cmsmasters_footer_default' : ' cmsmasters_footer_small'); ?>">
	<div class="footer_inner">
	<?php 	
		travel_time_footer_logo($cmsmasters_option);
		

		travel_time_get_footer_custom_html($cmsmasters_option);
	

		travel_time_get_footer_social_icons($cmsmasters_option);
	
		
		travel_time_get_footer_nav($cmsmasters_option);
	?>
		<span class="footer_copyright copyright"><?php echo esc_html(stripslashes($cmsmasters_option['travel-time' . '_footer_copyright'])); ?></span>
	</div>
</footer>
<!-- _________________________ Finish Footer _________________________ -->

</div>
<span class="cmsmasters_responsive_width"></span>
<!-- ________________________ Finish Page _________________________ -->

<?php wp_footer(); ?>
</body>
</html>
