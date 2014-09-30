<?php

/**
* Creates shortcode fep_submission_form
*
* @return string: HTML content for the shortcode
*
*/

function fep_add_new_post(){
	if ( !is_user_logged_in() )
		auth_redirect();

	ob_start();
	include(dirname(dirname(__FILE__)).'/views/submission-form.php');
	return ob_get_clean();
}
add_shortcode( 'fep_submission_form', 'fep_add_new_post' );

/**
* Creates shortcode fep_article_list
*
* @return string: HTML content for the shortcode
*
*/

function fep_manage_posts(){
	if ( !is_user_logged_in() )
		auth_redirect();

	global $current_user;
    get_currentuserinfo();

	ob_start();
	if( isset($_GET['fep_id']) && isset($_GET['fep_action']) && $_GET['fep_action'] == 'edit' ){
		include(dirname(dirname(__FILE__)).'/views/submission-form.php');
	}
	else{
		include(dirname(dirname(__FILE__)).'/views/post-tabs.php');
	}
	return ob_get_clean();
}
add_shortcode( 'fep_article_list', 'fep_manage_posts' );

?>