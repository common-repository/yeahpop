<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://andrevitorio.com
 * @since      0.1
 *
 * @package    Yeahpop
 * @subpackage Yeahpop/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      0.1
 * @package    Yeahpop
 * @subpackage Yeahpop/includes
 * @author     Andre Vitorio <andre@vitorio.net>
 */
class Yeahpop_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    0.1
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'yeahpop',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
