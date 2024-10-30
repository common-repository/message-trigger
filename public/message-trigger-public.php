<?php
/**
 * The front-end fonctionnality
 * @since      1.1
 * @package    message-trigger
 * @subpackage message-trigger/public
 * @author     bravokeyl, madvic
 */

$mt_options = get_option('mt_plugin_options');

add_filter('the_content','mt_add_message');

function mt_add_message($content){
	$output = $content;
	$mt_post_option_value = get_post_meta(get_the_ID(),'_mt_message_key',true);
	if( !empty( $mt_post_option_value ) ){
		$output .= '<div id="message-trigger-post" class="mt-notification">'
				.do_shortcode( $mt_post_option_value ) 
				.'</div>';
	}
	return $output;
}

add_action('wp_head','mt_header');
add_action('wp_footer','mt_footer');

function mt_header(){
	$mt_options = get_option('mt_plugin_options');
	$mt_option_value = $mt_options['mt_head_message'];
	if( !empty($mt_option_value ) ){
		echo '<div id="mt_header" class="mt_header" >'.$mt_option_value.'</div>';
	}
}

function mt_footer(){
	$mt_options = get_option('mt_plugin_options');
	$mt_option_value = $mt_options['mt_foot_message'];
	if( !empty($mt_option_value ) ){
		echo '<div id="mt_footer" class="mt_footer">'.$mt_option_value.'</div>';
	}
}

?>