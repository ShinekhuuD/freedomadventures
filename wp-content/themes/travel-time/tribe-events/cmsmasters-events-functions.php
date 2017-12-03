<?php
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version 	1.0.7
 * 
 * Website Events Functions
 * Created by CMSMasters
 * 
 */


/* Replace Styles */
function replace_tribe_events_calendar_stylesheet() {
	$styleUrl = '';
	
	
	return $styleUrl;
}

add_filter('tribe_events_stylesheet_url', 'replace_tribe_events_calendar_stylesheet');


/* Replace Pro Styles */
function replace_tribe_events_calendar_pro_stylesheet() {
	$styleUrl = '';
	
	
	return $styleUrl;
}

add_filter('tribe_events_pro_stylesheet_url', 'replace_tribe_events_calendar_pro_stylesheet');


/* Replace Widget Styles */
function replace_tribe_events_calendar_widget_stylesheet() {
	$styleUrl = '';
	
	
	return $styleUrl;
}

add_filter('tribe_events_pro_widget_calendar_stylesheet_url', 'replace_tribe_events_calendar_widget_stylesheet');


/* Replace Responsive Styles */
function customize_tribe_events_breakpoint() {
    return 749;
}

add_filter('tribe_events_mobile_breakpoint', 'customize_tribe_events_breakpoint');



function cmsmasters_customized_tribe_single_event_links() {
    if (is_single() && post_password_required()) {
        return;
    }
 
    echo '<div class="tribe-events-cal-links">';
		echo '<a class="tribe-events-gcal tribe-events-button" href="' . tribe_get_gcal_link() . '" title="' . esc_html__( '+ Google Calendar', 'travel-time' ) . '">' . esc_html__( '+ Google Calendar', 'travel-time' ) . '</a>';
		echo '<a class="tribe-events-ical tribe-events-button" href="' . tribe_get_single_ical_link() . '" title="' . esc_html__( '+ Export to Calendar', 'travel-time' ) . '">' . esc_html__( '+ Export to Calendar', 'travel-time' ) . '</a>';
    echo '</div><!-- .tribe-events-cal-links -->';
}