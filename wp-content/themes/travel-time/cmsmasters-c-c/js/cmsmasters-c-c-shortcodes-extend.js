/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version		1.0.0
 * 
 * Visual Content Composer Schortcodes Extend
 * Created by CMSMasters
 * 
 */
 

/* 
// For Change Fields in Shortcodes

var sc_name_new_fields = {};


for (var id in cmsmastersShortcodes.sc_name.fields) {
	if (id === 'field_name') { // Delete Field
		delete cmsmastersShortcodes.sc_name.fields[id];
	} else if (id === 'field_name') { // Delete Field Attribute
		delete cmsmastersShortcodes.sc_name.fields[id]['field_attribute'];  
		
		
		sc_name_new_fields[id] = cmsmastersShortcodes.sc_name.fields[id];
	} else if (id === 'field_name') { // Add/Change Field Attribute
		cmsmastersShortcodes.sc_name.fields[id]['field_attribute'] = 'value';
		
		
		sc_name_new_fields[id] = cmsmastersShortcodes.sc_name.fields[id];
	} else if (id === 'field_name') { // Add Field (before the field as found, add new field)
		sc_name_new_fields['field_name'] = { 
			type : 		'rgba', 
			title : 	composer_shortcodes_extend.sc_name_field_custom_bg_color, 
			descr : 	'', 
			def : 		'', 
			required : 	false, 
			width : 	'half' 
		};
		
		
		sc_name_new_fields[id] = cmsmastersShortcodes.sc_name.fields[id];
	} else { // Allways add this in the bottom
		sc_name_new_fields[id] = cmsmastersShortcodes.sc_name.fields[id];
	}
}


cmsmastersShortcodes.sc_name.fields = sc_name_new_fields; 
*/



/**
 * Heading Extend
 */

var heading_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_heading.fields) {
	if (id === 'font_weight') {
		heading_new_fields['tablet_check'] = { 
			type : 		'checkbox', 
			title : 	composer_shortcodes_extend.heading_tablet_check, 
			descr : 	'', 
			def : 		'false', 
			required : 	false, 
			width : 	'half',  
			choises : { 
				'true' : cmsmasters_shortcodes.choice_enable 
			} 
		};
		heading_new_fields['tablet_font_size'] = { 
			type : 		'input', 
			title : 	composer_shortcodes_extend.heading_tablet_font_size, 
			descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_zero_note + "</span>", 
			def : 		'', 
			required : 	false, 
			width : 	'number', 
			min : 		'0', 
			depend : 	'tablet_check:true' 
		};
		heading_new_fields['tablet_line_height'] = { 
			type : 		'input', 
			title : 	composer_shortcodes_extend.heading_tablet_line_height, 
			descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_zero_note + "</span>", 
			def : 		'', 
			required : 	false, 
			width : 	'number', 
			min : 		'0', 
			depend : 	'tablet_check:true' 
		};
		
		heading_new_fields[id] = cmsmastersShortcodes.cmsmasters_heading.fields[id];
	} else {
		heading_new_fields[id] = cmsmastersShortcodes.cmsmasters_heading.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_heading.fields = heading_new_fields;



/**
 * Blog Extend
 */

var blog_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_blog.fields) {
	if (id === 'layout_mode') {
		cmsmastersShortcodes.cmsmasters_blog.fields[id]['choises']['puzzle'] = composer_shortcodes_extend.blog_field_layout_mode_puzzle;
		
		
		blog_new_fields[id] = cmsmastersShortcodes.cmsmasters_blog.fields[id];
	} else {
		blog_new_fields[id] = cmsmastersShortcodes.cmsmasters_blog.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_blog.fields = blog_new_fields;


/**
 * Portfolio Extend
 */

var portfolio_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_portfolio.fields) {

	if (id === 'metadata_grid') {
		cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['choises'] = {
			'title' : 			cmsmasters_shortcodes.choice_title, 
			'excerpt' : 		cmsmasters_shortcodes.choice_excerpt, 
			'categories' : 		cmsmasters_shortcodes.choice_categories, 
			'comments' : 		cmsmasters_shortcodes.choice_comments, 
			'likes' : 			cmsmasters_shortcodes.choice_likes, 
			'rollover' : 		cmsmasters_shortcodes.choice_rollover, 
			'icon' : 			composer_shortcodes_extend.portfolio_field_metadata_choises_icon, 
			'duration' : 		composer_shortcodes_extend.portfolio_field_metadata_choises_duration, 
			'participants' : 	composer_shortcodes_extend.portfolio_field_metadata_choises_participants, 
			'price' : 			composer_shortcodes_extend.portfolio_field_metadata_choises_price, 
			'rating' : 			composer_shortcodes_extend.portfolio_field_metadata_choises_rating
		};
		
		
		portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	} else if (id === 'metadata_puzzle') {
		cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['choises'] = {
			'title' : 		cmsmasters_shortcodes.choice_title, 
			'categories' : 	cmsmasters_shortcodes.choice_categories, 
			'comments' : 	cmsmasters_shortcodes.choice_comments, 
			'likes' : 		cmsmasters_shortcodes.choice_likes, 
			'rollover' : 	cmsmasters_shortcodes.choice_rollover, 
			'icon' : 		composer_shortcodes_extend.portfolio_field_metadata_choises_icon
		};
		
		portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	} else {
		portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_portfolio.fields = portfolio_new_fields;


/**
 * Portfolio Extend
 */

cmsmastersShortcodes.cmsmasters_portfolio.title = composer_shortcodes_extend.portfolio_title;
cmsmastersShortcodes.cmsmasters_portfolio.fields.orderby.descr = composer_shortcodes_extend.portfolio_field_orderby_descr;
cmsmastersShortcodes.cmsmasters_portfolio.fields.count.title = composer_shortcodes_extend.portfolio_field_pj_number_title;
cmsmastersShortcodes.cmsmasters_portfolio.fields.count.descr = composer_shortcodes_extend.portfolio_field_pj_number_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + composer_shortcodes_extend.portfolio_field_pj_number_descr_note + "</span>";
cmsmastersShortcodes.cmsmasters_portfolio.fields.categories.descr = composer_shortcodes_extend.portfolio_field_categories_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + composer_shortcodes_extend.portfolio_field_categories_descr_note + "</span>";
cmsmastersShortcodes.cmsmasters_portfolio.fields.layout.descr = composer_shortcodes_extend.portfolio_field_layout_descr;
cmsmastersShortcodes.cmsmasters_portfolio.fields.layout['choises']['grid'] = composer_shortcodes_extend.portfolio_field_layout_choice_grid;
cmsmastersShortcodes.cmsmasters_portfolio.fields.layout_mode.descr = composer_shortcodes_extend.portfolio_field_layout_mode_descr;
cmsmastersShortcodes.cmsmasters_portfolio.fields.columns.descr = composer_shortcodes_extend.portfolio_field_col_count_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + composer_shortcodes_extend.portfolio_field_col_count_descr_note + "<br />" + composer_shortcodes_extend.portfolio_field_col_count_descr_note_custom + "</span>"; 
cmsmastersShortcodes.cmsmasters_portfolio.fields.metadata_grid.descr = composer_shortcodes_extend.portfolio_field_metadata_descr;
cmsmastersShortcodes.cmsmasters_portfolio.fields.gap.descr = composer_shortcodes_extend.portfolio_field_gap_descr;
cmsmastersShortcodes.cmsmasters_portfolio.fields.filter.descr = composer_shortcodes_extend.portfolio_field_filter_descr;
cmsmastersShortcodes.cmsmasters_portfolio.fields.sorting.descr = composer_shortcodes_extend.portfolio_field_sorting_descr;



/**
 * Posts Slider Extend
 */

cmsmastersShortcodes.cmsmasters_posts_slider.fields.post_type['choises']['project'] = composer_shortcodes_extend.posts_slider_field_poststype_choice_project;
cmsmastersShortcodes.cmsmasters_posts_slider.fields.portfolio_categories.title = composer_shortcodes_extend.posts_slider_field_poststype_choice_project;
cmsmastersShortcodes.cmsmasters_posts_slider.fields.portfolio_categories.descr = composer_shortcodes_extend.posts_slider_field_pjcateg_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + composer_shortcodes_extend.posts_slider_field_pjcateg_descr_note + "</span>", 
cmsmastersShortcodes.cmsmasters_posts_slider.fields.columns.descr = composer_shortcodes_extend.posts_slider_field_col_count_descr;
cmsmastersShortcodes.cmsmasters_posts_slider.fields.portfolio_metadata.title = composer_shortcodes_extend.posts_slider_field_pjmeta_title;
cmsmastersShortcodes.cmsmasters_posts_slider.fields.portfolio_metadata.descr = composer_shortcodes_extend.posts_slider_field_pjmeta_descr;


var posts_slider_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_posts_slider.fields) {

	if (id === 'portfolio_metadata') {
		cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['choises'] = {
			'title' : 			cmsmasters_shortcodes.choice_title, 
			'excerpt' : 		cmsmasters_shortcodes.choice_excerpt, 
			'categories' : 		cmsmasters_shortcodes.choice_categories, 
			'comments' : 		cmsmasters_shortcodes.choice_comments, 
			'likes' : 			cmsmasters_shortcodes.choice_likes, 
			'icon' : 			composer_shortcodes_extend.portfolio_field_metadata_choises_icon, 
			'duration' : 		composer_shortcodes_extend.portfolio_field_metadata_choises_duration, 
			'participants' : 	composer_shortcodes_extend.portfolio_field_metadata_choises_participants, 
			'price' : 			composer_shortcodes_extend.portfolio_field_metadata_choises_price, 
			'rating' : 			composer_shortcodes_extend.portfolio_field_metadata_choises_rating
		};
		
		posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
		
	} else if (id === 'post_type') {		
		
		posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
		
		posts_slider_new_fields['slider_nav_arrow'] = { 
				type : 		'checkbox', 
				title : 	composer_shortcodes_extend.posts_slider_field_slider_nav_arrow, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				}
		};
		
		posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else {
		posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_posts_slider.fields = posts_slider_new_fields;


/**
 * Theme Shortcodes
 */

var cmsmastersShortcodes_new_shortcode = {};


for (var id in cmsmastersShortcodes) {
	if (id === 'cmsmasters_sidebar') {
		
		/* Tour Search */
		cmsmastersShortcodes_new_shortcode['cmsmasters_tour_search'] = { 
			title : 	composer_shortcodes_extend.tour_search_title, 
			icon : 		'admin-icon-tour-search', 
			pair : 		false, 
			content : 	false, 
			visual : 	false, 
			multiple : 	false, 
			def : 		'', 
			fields : { 
				// Keywords Text
				keywords_text : { 
					type : 		'input', 
					title : 	composer_shortcodes_extend.tour_search_keywords_title, 
					descr : 	composer_shortcodes_extend.tour_search_keywords_descr, 
					def : 		composer_shortcodes_extend.tour_search_keywords, 
					required : 	false, 
					width : 	'half' 
				}, 
				// Category Text
				category_text : { 
					type : 		'input', 
					title : 	composer_shortcodes_extend.tour_search_category_title, 
					descr : 	composer_shortcodes_extend.tour_search_category_descr, 
					def : 		composer_shortcodes_extend.tour_search_category, 
					required : 	false, 
					width : 	'half' 
				}, 
				// Min Text
				min_text : { 
					type : 		'input', 
					title : 	composer_shortcodes_extend.tour_search_min_title, 
					descr : 	composer_shortcodes_extend.tour_search_min_descr, 
					def : 		composer_shortcodes_extend.tour_search_min, 
					required : 	false, 
					width : 	'half' 
				}, 
				// Max Text
				max_text : { 
					type : 		'input', 
					title : 	composer_shortcodes_extend.tour_search_max_title, 
					descr : 	composer_shortcodes_extend.tour_search_max_descr, 
					def : 		composer_shortcodes_extend.tour_search_max, 
					required : 	false, 
					width : 	'half' 
				}, 
				// Button Text
				button_text : { 
					type : 		'input', 
					title : 	composer_shortcodes_extend.tour_search_button_title, 
					descr : 	composer_shortcodes_extend.tour_search_button_descr, 
					def : 		composer_shortcodes_extend.tour_search_button, 
					required : 	false, 
					width : 	'half' 
				}, 
				// CSS3 Animation
				animation : { 
					type : 		'select', 
					title : 	cmsmasters_shortcodes.animation_title, 
					descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
					def : 		'', 
					required : 	false, 
					width : 	'half', 
					choises : 	get_animations() 
				}, 
				// Animation Delay
				animation_delay : { 
					type : 		'input', 
					title : 	cmsmasters_shortcodes.animation_delay_title, 
					descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
					def : 		'0', 
					required : 	false, 
					width : 	'number', 
					min : 		'0', 
					step : 		'50' 
				}, 
				// Additional Classes
				classes : { 
					type : 		'input', 
					title : 	cmsmasters_shortcodes.classes_title, 
					descr : 	cmsmasters_shortcodes.classes_descr, 
					def : 		'', 
					required : 	false, 
					width : 	'half' 
				} 
			} 
		};
		
		
		cmsmastersShortcodes_new_shortcode[id] = cmsmastersShortcodes[id];
	} else {
		cmsmastersShortcodes_new_shortcode[id] = cmsmastersShortcodes[id];
	}
}


cmsmastersShortcodes = cmsmastersShortcodes_new_shortcode;

