<?php
/**
 * Plugin Name: Houndstooth Extensions
 * Plugin URI: 
 * Description: Extends existing plugins for the Houndstooth site
 * Version: 0.3
 * Author: Daniel Cartwright
 * Author URI: 
 * License: 
 */

/* Profile Builder modifications */
function ht_wppb_signup_user_notification_email_content( ) {
  return "To confirm your Houndstooth user account, please click the following link:\n\n%s%s%s\n\n";
}

function ht_wppb_signup_user_notification_email_subject() {
  return "%2$s, Please confirm your Houndstooth account";
}

// This one not working...?
function ht_wppb_signup_user_notification_email_from_field() {
  return "Houndstooth";
}

function ht_wppb_register_redirect_after_creation($message, $link) {
  return ""; // Actually don't need to say anything else here; just need to stop it redirecting..
}

// This is a custom hook added into the plugin itself! front-end/wppb.login.php:81
function ht_wppb_after_login_redirect($old_link) {
  $link = get_permalink(UPLOAD_PAGE_ID);
  return $link;
}

// Override subheading in registration form
function ht_wppb_register_content_name1($old_name) {
  return "";
}

// Override subheading in registration form
function ht_wppb_register_content_info1($old_name) {
  return "";
}

// Override subheading in registration form
function ht_wppb_register_content_about_yourself1($old_name) {
  return "";
}

function ht_wppb_pre_login_url_filter($old_link) {
  return get_permalink(LOST_PASSWORD_PAGE_ID);
}

add_filter( 'wppb_pre_login_url_filter', 'ht_wppb_pre_login_url_filter', 10, 1);
add_filter( 'wppb_register_content_about_yourself1', 'ht_wppb_register_content_about_yourself1', 10, 1);
add_filter( 'wppb_register_content_info1', 'ht_wppb_register_content_info1', 10, 1);
add_filter( 'wppb_register_content_name1', 'ht_wppb_register_content_name1', 10, 1);
add_filter( 'wppb_after_login_redirect', 'ht_wppb_after_login_redirect', 10, 1);
add_filter( 'wppb_signup_user_notification_email_content', 'ht_wppb_signup_user_notification_email_content' );
add_filter( 'wppb_signup_user_notification_email_subject', 'ht_wppb_signup_user_notification_email_subject' );
add_filter( 'wppb_signup_user_notification_email_from_field', 'ht_wppb_signup_user_notification_email_from_field' );
add_filter( 'wppb_register_redirect_after_creation1', 'ht_wppb_register_redirect_after_creation', 10, 2 );
add_filter( 'wppb_register_redirect_after_creation2', 'ht_wppb_register_redirect_after_creation', 10, 2 );
// To pass parameters in you need to add the number of them as the last argument above. The 3rd param "10" is the default priority..


/* End Profile Builder modifications */


/* User Submitted Posts modifications */
// shortcode to require login
add_shortcode('ht-user-submitted-posts', 'ht_user_submitted_posts');
function ht_user_submitted_posts() {
  if (is_user_logged_in()) {
    echo do_shortcode('[user-submitted-posts]');
  } else {
    // Far from ideal to have to hard-code this URL..
    return "<p>You must be registered with the Houndstooth site and logged in to submit your work.</p>
            <p><a href='/houndstooth/pb-login/'>Click here to login</a></p>
            <p><a href='/houndstooth/register/Or click here to register.</a></p>";
  }
}


/* End User Submitted Posts modifications */


/* WPUF modifications */

add_shortcode('ht-wpuf-addpost', 'ht_wpuf_addpost');
function ht_wpuf_addpost() {
  error_log("Domain n: " . $_SERVER['HTTP_HOST']);
  if (is_user_logged_in()) {
    echo do_shortcode('[wpuf_addpost]');
  } else {
    // Far from ideal to have to hard-code this URL..
    if ($_SERVER['HTTP_HOST'] == 'localhost') {
      return "<p>You must be registered with the Houndstooth site and logged in to submit your work.</p>
              <p><a href='/wordpress/?page_id=154'>Click here to login</a></p>
              <p><a href='/wordpress/?page_id=36'>Or click here to register.</a></p>";
    } else {
      return "<p>You must be registered with the Houndstooth site and logged in to submit your work.</p>
              <p><a href='/houndstooth/pb-login/'>Click here to login</a></p>
              <p><a href='/houndstooth/register/'>Or click here to register.</a></p>";
    }


  }
} 

/* Need to do the redirect here rather than just passing it back, which doesn't sem to work - not sure how this works, but may be something to do with headers already being sent?
*/
function ht_wpuf_after_post_redirect($permaluke, $post_id) {
  $link = get_permalink(SUBMISSION_COMPLETE_PAGE_ID);
  error_log( $link );
  wp_redirect( $link );
  exit;
}
add_filter( 'wpuf_after_post_redirect', 'ht_wpuf_after_post_redirect', 10, 2);

/* End WPUF modifications */


/* General */

// Use custom language file to change labels for User Submitted Forms & WPUF
add_filter('load_textdomain_mofile', 'custom_load_textdomain_mofile', 10, 2);
function custom_load_textdomain_mofile( $mofile, $domain){
  // error_log("Language Domain: " . $domain);
//  if ($domain == 'usp' || $domain == 'wpuf') { // Not working for wpuf ..?  - See lib/attachment.php : attach_html
    $mofile = 'wp-content/plugins/houndstooth-extensions/languages/houndstooth_en_GB.mo';
//  }
  return $mofile;
}

/* End General */

/* Resize Image After Upload modifications */
// So, this copies the file in the filesystem, but not in the db.. and do we really want *all* fileuploads processing in this way? This would mean any admin-uploaded images in news posts, etc. would also get duplicated with 'originals'....

// Try global $pagenow at start of function..

// Images are stored as posts, with the path given in the GUID field and post_type 'attachment'.. oh god...
// So, would need to get post_id, and duplicate that record, replacing the 'post_title' and 'guid' fields as appropriate.
// Might need to duplicate wp_postmeta entries for that post_id too.
// Probably best to resize the duplicate rather than the original, if there is photo-based metadata attached to it?

// Can get the file by guid presumably? This would be unique..? Or ought to be..

// $array has keys, 'file', 'url', 'type'


// Now this is not being called for USP uploads! Ach!

// 2014-07-22 - with a bit of luck we won't actually need this at all - depends on how much manual work can be done by the client rather than automatically (obviously the latter is preferable, but carries its own risks in terms of bugs, maintenance, upgrades, etc.)
// 2014-10-01 - This doesn't duplicate db record though..
$well = remove_action('wp_handle_upload', 'jr_uploadresize_resize');
//error_log("Removed action ok? " . $well);
add_action('wp_handle_upload', 'ht_uploadresize_resize');
function ht_uploadresize_resize($array) {
  global $pagenow;
  error_log("Pagenow: " . $pagenow);

  $new_path = create_duplicate_file_path($array['file']);

  copy($array['file'], $new_path);

  error_log("Done custom stuff, now...");
  return jr_uploadresize_resize($array); // Finally call the plugin's custom action
}

function create_duplicate_file_path($original_path) {
  $path_elements = pathinfo($original_path);
  $new_path = $path_elements['dirname'] . "/" . $path_elements['filename'] . "_ORIGINAL." . $path_elements['extension'];
  return $new_path;
}


/* End Resize Image After Upload modifications */



/* Custom gallery .. override WP's own gallery shortcode function; copied from wp-includes/media.php */
remove_shortcode('gallery');
add_shortcode('gallery', 'ht_gallery_shortcode');

function ht_gallery_shortcode( $attr ) {
	$post = get_post();

	static $instance = 0;
	$instance++;

	if ( ! empty( $attr['ids'] ) ) {
		// 'ids' is explicitly ordered, unless you specify otherwise.
		if ( empty( $attr['orderby'] ) ) {
			$attr['orderby'] = 'post__in';
		}
		$attr['include'] = $attr['ids'];
	}

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( ! $attr['orderby'] ) {
			unset( $attr['orderby'] );
		}
	}

	$html5 = current_theme_supports( 'html5', 'gallery' );
	$atts = shortcode_atts( array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post ? $post->ID : 0,
		'itemtag'    => $html5 ? 'figure'     : 'dl',
		'icontag'    => $html5 ? 'div'        : 'dt',
		'captiontag' => $html5 ? 'figcaption' : 'dd',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => '',
		'link'       => ''
	), $attr, 'gallery' );

	$id = intval( $atts['id'] );
	if ( 'RAND' == $atts['order'] ) {
		$atts['orderby'] = 'none';
	}

	if ( ! empty( $atts['include'] ) ) {
		$_attachments = get_posts( array( 'include' => $atts['include'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( ! empty( $atts['exclude'] ) ) {
		$attachments = get_children( array( 'post_parent' => $id, 'exclude' => $atts['exclude'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
	} else {
		$attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
	}

	if ( empty( $attachments ) ) {
		return '';
	}


  $output = "";

  // close the col & row for the main content to get full width
  $output .= "    </div> <!-- col -->\n"; 
  $output .= "  </div> <!-- row -->\n";

  $output .= "<div class='row'>\n";

	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
/*		if ( ! empty( $atts['link'] ) && 'file' === $atts['link'] ) {
			$image_output = wp_get_attachment_link( $id, $atts['size'], false, false );
		} elseif ( ! empty( $atts['link'] ) && 'none' === $atts['link'] ) {
			$image_output = wp_get_attachment_image( $id, $atts['size'], false );
		} else {
			$image_output = wp_get_attachment_link( $id, $atts['size'], true, false );
		}
		$image_meta  = wp_get_attachment_metadata( $id );
  */  
    $image_src = get_image_src( $id );
    $image_link = wp_get_attachment_url( $id );
    $parent_id = $attachment->post_parent;
    $author = $parent_id ? get_the_title( $parent_id ) : "" ;
    $link = get_the_permalink( $parent_id );
    $credit = "Image: <a href='" . $link . "'>" . $author . "</a>";

    $output .= "  <div class='col-md-4'>\n";
    $output .= "    <div class='htcell'>\n";
    $output .= "      <div class='htimgcell'>\n";
    $output .= "        <a style='display:none' id='" . $id . "_link' href='" . $link . ".'>" . $author . "</a>";
    $output .= "        <a class='htgallery' id='" . $id . "' href='" . $image_link . "' rel='lightbox[bisc]' >\n";
    $output .= "<!-- parent_post: : " . $parent_id . "-->";
    $output .= "          <img src='" . $image_src . "' />";
    $output .= "        </a>\n";
    $output .= "      </div>\n";
    $output .= "    </div> <!-- htcell -->\n";
    $output .= "  </div> <!-- col-md-4 -->\n";
    
    if (++$i % 3 == 0) {
      $output .= "</div> <!-- row -->\n";
      $output .= "<div class='row'>\n";
    }
	}
  $output .= "</div> <!-- row -->\n";
  $output .= "<div class='clearfix'></div>\n";
  $output .= "<script> 
                var \$j = jQuery.noConflict();
                \$j('a.htgallery').colorbox({ title: function() {
                var id = \$j(this).attr('id');
                var title = \$j(this).siblings('#'+id+'_link').html();
                var url = \$j(this).siblings('#'+id+'_link').attr('href');
                return '<a href=\"' + url + '\">' + title + '</a>';
              }}); </script>\n";

  // Open the row and cell again for the main content 
  $output .= "<div class='row'>\n";
  $output .= "  <div class='col-md-8'>\n";

	return $output;
}


/* End custom gallery */
?>
