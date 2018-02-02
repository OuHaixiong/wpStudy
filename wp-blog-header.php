<?php
/**
 * Loads the WordPress environment and template.
 *
 * @package WordPress
 */

if ( !isset($wp_did_header) ) {

	$wp_did_header = true;

	// Load the WordPress library.
	require_once( dirname(__FILE__) . '/wp-load.php' );

	// Set up the WordPress query.
	wp(); // 执行内容处理工作（根据用户的请求调用相关函数获取和处理数据，为前段展示数据做准备）

	// Load the theme template.
	require_once( ABSPATH . WPINC . '/template-loader.php' ); // 加载主题模板

}
