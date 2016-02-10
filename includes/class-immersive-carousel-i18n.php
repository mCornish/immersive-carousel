<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://mikecornish.net
 * @since      1.0.0
 *
 * @package    Immersive_Carousel
 * @subpackage Immersive_Carousel/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Immersive_Carousel
 * @subpackage Immersive_Carousel/includes
 * @author     Mike Cornish <cornishmw@gmail.com>
 */
class Immersive_Carousel_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'immersive-carousel',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
