<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://https://github.com/Alucard17th
 * @since      1.0.0
 *
 * @package    Inter_Depannage_Sync
 * @subpackage Inter_Depannage_Sync/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Inter_Depannage_Sync
 * @subpackage Inter_Depannage_Sync/includes
 * @author     Noureddine Eddallal <eddallal.noureddine@gmail.com>
 */
class Inter_Depannage_Sync_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'inter-depannage-sync',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
