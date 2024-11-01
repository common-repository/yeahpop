<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://andrevitorio.com
 * @since             0.1
 * @package           Yeahpop
 *
 * @wordpress-plugin
 * Plugin Name:       YeahPop
 * Plugin URI:        https://yeahpress.com
 * Description:       Display Your Recent WooCommerce Sales To Increase Your Conversion Rate.
 * Version:           0.1
 * Author:            Andre Vitorio
 * Author URI:        https://andrevitorio.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       yeahpop
 * Domain Path:       /languages
 * WC tested up to: 3.6
 * WC requires at least: 2.6
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 0.1 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'YEAHPOP_VERSION', '0.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-yeahpop-activator.php
 */
function activate_yeahpop() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-yeahpop-activator.php';
	Yeahpop_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-yeahpop-deactivator.php
 */
function deactivate_yeahpop() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-yeahpop-deactivator.php';
	Yeahpop_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_yeahpop' );
register_deactivation_hook( __FILE__, 'deactivate_yeahpop' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-yeahpop.php';

// Check if WooCommerce is installed
if( ! function_exists( 'yeahpop_install' ) ) {
    function yeahpop_install() {
        if ( ! function_exists( 'WC' ) ) {
            add_action( 'admin_notices', 'yeahpop_install_woocommerce_admin_notice' );
        }
        else {   
			run_yeahpop();
        }
    }
}
add_action( 'plugins_loaded', 'yeahpop_install', 11 );

if( ! function_exists( 'yeahpop_install_woocommerce_admin_notice' ) ) {
    function yeahpop_install_woocommerce_admin_notice() {
        ?>
        <div class="error">
            <p><?php echo 'YeahPop ' . __( 'is enabled but not effective. It requires WooCommerce in order to work.', 'yeahpop' ); ?></p>
        </div>
    <?php
    }
}

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.1
 */
function run_yeahpop() {

	$plugin = new Yeahpop();
	$plugin->run();

}
