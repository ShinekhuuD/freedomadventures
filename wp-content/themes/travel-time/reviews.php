<?php
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version		1.0.6
 * 
 * Reviews Template
 * Created by CMSMasters
 * 
 */


if (!empty($_SERVER['SCRIPT_FILENAME']) && 'reviews.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
    die(esc_html__('Please do not load this page directly. Thanks!', 'travel-time'));
}


if (post_password_required()) { 
	echo '<p class="nocomments">' . esc_html__('This post is password protected. Enter the password to view reviews.', 'travel-time') . '</p>';
	
	
    return;
}

if (comments_open()) {
	if (have_comments()) {
		echo '<aside id="comments" class="post_comments">' . "\n" . 
			'<h4 class="post_comments_title">';
		
			comments_number(esc_attr__('No Reviews', 'travel-time'), esc_attr__('Review', 'travel-time'), esc_attr__('Reviews', 'travel-time'));		
		
		echo '</h4>' . "\n";
		
		
		if (get_previous_comments_link() || get_next_comments_link()) {
			echo '<aside class="project_navi">' . "\n\t" . 
				'<span class="fl">' . "\n\t\t";
			
			
			previous_comments_link('&larr; ' . esc_attr__('Older Reviews', 'travel-time'));
			
			
			echo "\n\t" . '</span>' . "\n\t" . 
			'<span class="fr">' . "\n\t\t";
			
			
			next_comments_link(esc_attr__('Newer Reviews', 'travel-time') . ' &rarr;');
			
			
			echo "\n\t" . '</span>' . "\r" . 
			'</aside>' . "\n";
		}
		
		
		echo '<ol class="commentlist">' . "\n";
		
		
		wp_list_comments(array( 
			'type' => 'comment', 
			'callback' => 'mytheme_comment' 
		));
		
		
		echo '</ol>' . "\n";
		
		
		if (get_previous_comments_link() || get_next_comments_link()) {
			echo '<aside class="project_navi">' . "\n\t" . 
				'<span class="fl">' . "\n\t\t";
			
			
			previous_comments_link('&larr; ' . esc_attr__('Older Reviews', 'travel-time'));
			
			
			echo "\n\t" . '</span>' . "\n\t" . 
			'<span class="fr">' . "\n\t\t";
			
			
			next_comments_link(esc_attr__('Newer Reviews', 'travel-time') . ' &rarr;');
			
			
			echo "\n\t" . '</span>' . "\r" . 
			'</aside>' . "\n";
		}
		
		
		echo '</aside>';
	}
	
	
	$form_fields =  array( 
		'author' => '<p class="comment-form-author">' . "\n" . 
			'<label for="author">' . esc_html__('Name:', 'travel-time') . '</label>' . 
			'<input type="text" id="author" name="author" value="' . esc_attr($commenter['comment_author']) . '" size="35"' . ((isset($aria_req)) ? $aria_req : '') . ' placeholder="' . esc_html__('Your name', 'travel-time') . (($req) ? ' *' : '') . '" />' . "\n" . 
		'</p>' . "\n", 
		'email' => '<p class="comment-form-email">' . "\n" . 
			'<label for="author">' . esc_html__('Email:', 'travel-time') . '</label>' . 
			'<input type="text" id="email" name="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="35"' . ((isset($aria_req)) ? $aria_req : '') . ' placeholder="' . esc_html__('Your email', 'travel-time') . (($req) ? ' *' : '') . '" />' . "\n" . 
		'</p>' . "\n" 
	);

	echo "\n\n";
	
	add_filter('comment_form_fields', 'travel_time_order_comment_fields' );
	
	function travel_time_order_comment_fields( $fields ){
		$new_fields = array();

		$neworder = array('author','email','comment');

		foreach( $neworder as $key ){
			$new_fields[ $key ] = $fields[ $key ];
			unset( $fields[ $key ] );
		}

		if( $fields )
			foreach( $fields as $key => $val )
				$new_fields[ $key ] = $val;

		return $new_fields;
	}
	
	comment_form(array( 
		'fields' => 			apply_filters('comment_form_default_fields', $form_fields), 
		'comment_field' => 		'<p class="comment-form-comment">' . 
									'<label for="comment">' . esc_html__('Your review:', 'travel-time') . '</label>' . 
									'<textarea name="comment" id="comment" cols="67" rows="2" placeholder="' . esc_html__('Message', 'travel-time') . '"></textarea>' . 
								'</p>', 
		'must_log_in' => 		'<p class="must-log-in">' . 
									esc_html__('You must be', 'travel-time') . 
									' <a href="' . esc_url(wp_login_url(apply_filters('the_permalink', get_permalink()))) . '">' 
										. esc_html__('logged in', 'travel-time') . 
									'</a> ' 
									. esc_html__('to post a review', 'travel-time') . 
								'.</p>' . "\n", 
		'logged_in_as' => 		'<p class="logged-in-as">' . 
									esc_html__('Logged in as', 'travel-time') . 
									' <a href="' . esc_url(admin_url('profile.php')) . '">' . 
										$user_identity . 
									'</a>. ' . 
									'<a class="all" href="' . esc_url(wp_logout_url(apply_filters('the_permalink', get_permalink()))) . '" title="' . esc_attr__('Log out of this account', 'travel-time') . '">' . 
										esc_html__('Log out?', 'travel-time') . 
									'</a>' . 
								'</p>' . "\n", 
		'comment_notes_before' => 	'<p class="comment-notes">' . 
										esc_html__('Your email address will not be published.', 'travel-time') . 
									'</p>' . "\n", 
		'comment_notes_after' => 	'', 
		'id_form' => 				'commentform', 
		'id_submit' => 				'submit', 
		'title_reply' => 			esc_attr__('Leave a Review', 'travel-time'), 
		'title_reply_to' => 		esc_attr__('Leave your review to', 'travel-time'), 
		'cancel_reply_link' => 		esc_attr__('Cancel Review', 'travel-time'), 
		'label_submit' => 			esc_attr__('Add Review', 'travel-time') 
	));
}

