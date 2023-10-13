<?php

/**
 * Mybizna Core
 *
 * @package           Mybizna
 * @author            Dedan Irungu
 * @copyright         2022 Mybizna.com
 * @license           GPL-3.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Mybizna
 * Plugin URI:        https://wordpress.org/plugins/mybizna-core/
 * Description:       This is the base plugin for implementing a erp level intragration into wordpress and allow any post to be sellable.
 * Version:           1.0.0
 * Requires at least: 5.4
 * Requires PHP:      7.2
 * Author:            Dedan Irungu
 * Author URI:        https://mybizna.com
 * Text Domain:       mybizna-core
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

 define( 'DIR_PATH', plugin_dir_path( __FILE__ ) );

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('MybiznaPlugin')) {
    class MybiznaPlugin
    {

        /**
         * Constructor
         */
        public function __construct()
        {
            $this->setup_actions();
        }

        /**
         * Setting up Hooks
         */
        public function setup_actions()
        {
            //Main plugin hooks
            register_activation_hook(DIR_PATH, array('MybiznaPlugin', 'activate'));
            register_deactivation_hook(DIR_PATH, array('MybiznaPlugin', 'deactivate'));
        }

        /**
         * Activate callback
         */
        public static function activate()
        {
            //Activation code in here
        }

        /**
         * Deactivate callback
         */
        public static function deactivate()
        {
            //Deactivation code in here
        }

    }

    // instantiate the plugin class
    $wp_plugin_template = new MybiznaPlugin();
}
