<?php
/*
Plugin Name: CAHNRS WSU Analytics
Version: 0.0.1
Description: Custom analytics layer for CAHNRS sites.
Author: washingtonstateuniversity, Danial Bleile
Author URI: https://web.wsu.edu/
Plugin URI: https://github.com/washingtonstateuniversity/CAHNRSWSUWP-Plugin-Analytics
Text Domain: cahnrswsuwp-analytics
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// This plugin uses namespaces and requires PHP 5.3 or greater.
if ( version_compare( PHP_VERSION, '5.3', '<' ) ) {

	add_action( 'admin_notices', create_function( '', // @codingStandardsIgnoreLine
	"echo '<div class=\"error\"><p>" . __( 'CAHNRS Analytics requires PHP 5.3 to function properly. Please upgrade PHP or deactivate the plugin.', 'cahnrswsuwp-analytics' ) . "</p></div>';" ) );
	return;

} else {

	include_once __DIR__ . '/lib/classes/class-cahnrswsuwp-analytics.php';

} // End if
