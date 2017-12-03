<?php 
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version		1.0.1
 * 
 * Admin Panel Theme Settings Import/Export
 * Created by CMSMasters
 * 
 */


function travel_time_options_demo_tabs() {
	$tabs = array();
	
	
	$tabs['import'] = esc_attr__('Import', 'travel-time');
	$tabs['export'] = esc_attr__('Export', 'travel-time');
	
	
	return $tabs;
}


function travel_time_options_demo_sections() {
	$tab = travel_time_get_the_tab();
	
	
	switch ($tab) {
	case 'import':
		$sections = array();
		
		$sections['import_section'] = esc_html__('Theme Settings Import', 'travel-time');
		
		
		break;
	case 'export':
		$sections = array();
		
		$sections['export_section'] = esc_html__('Theme Settings Export', 'travel-time');
		
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	
	return $sections;
} 


function travel_time_options_demo_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = travel_time_get_the_tab();
	}
	
	
	$options = array();
	
	
	switch ($tab) {
	case 'import':
		$options[] = array( 
			'section' => 'import_section', 
			'id' => 'travel-time' . '_demo_import', 
			'title' => esc_html__('Theme Settings', 'travel-time'), 
			'desc' => esc_html__("Enter your theme settings data here and click 'Import' button", 'travel-time'), 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
		
		break;
	case 'export':
		$options[] = array( 
			'section' => 'export_section', 
			'id' => 'travel-time' . '_demo_export', 
			'title' => esc_html__('Theme Settings', 'travel-time'), 
			'desc' => esc_html__("Click here to export your theme settings data to the file", 'travel-time'), 
			'type' => 'button', 
			'std' => esc_html__('Export Theme Settings', 'travel-time'), 
			'class' => 'cmsmasters-demo-export' 
		);
		
		
		break;
	}
	
	
	return $options;	
}

