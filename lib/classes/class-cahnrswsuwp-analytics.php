<?php namespace WSUWP\CAHNRSWSUWP_Plugin_Analytics;

if ( ! defined( 'ABSPATH' ) ) {

	exit; // Exit if accessed directly

} // End if

/*
* @desc Start the plugin stuff, yeah
* @since 0.0.1
*/
class CAHNRSWSUWP_Analytics {


	// @var string $version Verion to use when needed in plugin
	protected $version = '0.0.1';

	public function __construct() {

		// Adds tracker to to head of document
		add_action( 'wp_head', array( $this, 'add_tracker' ), 99 );

		// Enqueues additional tracking utility scripts
		add_action( 'wp_enqueue_scripts', array( $this, 'add_tracker_script' ), 99 );

		// Yes, I know I miss spelled tracker
		add_action( 'cahnrs_analytics_trakcer', array( $this, 'add_tracker' ), 99 );

	} // End __construct


	/*
	* @desc Adds tracker to page
	* @since 0.0.1
	*/
	public function add_tracker() {

		$trackers = array();

		$tracker['cahnrsGlobal'] = 'UA-47963191-1';

		echo '<script>';

		echo 'var ca_trackers = ' . wp_json_encode( $tracker ) . ';';

		require dirname( __FILE__ ) . 'js/cahnrs-tracker-analytics.min.js';

		echo '</script>';

	} // End add_tracker


	/*
	* @desc Adds tracker sript to footer
	* @since 0.0.1
	*/
	public function add_tracker_script() {

		wp_enqueue_script( 'cahnrs-analytics.js', plugin_dir_url( dirname( __FILE__ ) ) . 'js/cahnrs-analytics.min.js', array( 'jquery' ), $this->version, true );

	} // end method add_tracker_script

} // End CAHNRSWSUWP_Analytics

$cahnrswsuwp_analytics = new CAHNRSWSUWP_Analytics();
