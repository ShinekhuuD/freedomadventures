<?php
/**
 * @package 	WordPress
 * @subpackage 	Travel Time Child
 * @version		1.0.0
 * 
 * Child Theme Functions File
 * Created by CMSMasters
 * 
 */


function travel_time_child_enqueue_styles() {
    wp_enqueue_style('travel-time-child-style', get_stylesheet_uri(), array('theme-style'), '1.0.0', 'screen, print');
}

add_action('wp_enqueue_scripts', 'travel_time_child_enqueue_styles', 9);
?>