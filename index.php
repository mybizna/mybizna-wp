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
 * Description:       Mybizna: This is the base plugin for implementing a erp level intragration into wordpress and allow any post to be sellable.
 * Version:           1.0.0
 * Requires at least: 5.4
 * Requires PHP:      7.2
 * Author:            Dedan Irungu
 * Author URI:        https://mybizna.com
 * Text Domain:       mybizna-core
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

require_once 'vendor/autoload.php'; // Include Composer's autoloader

define('DIR_PATH', plugin_dir_path(__FILE__));

if (!defined('ABSPATH')) {
    exit;
}

// Initialize Twig with a single loader
$loader = new \Twig\Loader\FilesystemLoader();

// Define multiple template paths
$loader->addPath(DIR_PATH . '/views', 'generic');
//$loader->addPath('/path/to/second/templates', 'namespace2');

$twig = new \Twig\Environment($loader);

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

            add_action('admin_menu', array('MybiznaPlugin', 'mybizna_menu'));

            //add_submenu_page('mybizna', 'Dashboard', 'Dashboard', 'manage_options', 'mybizna-dashboard', 'mybizna_contents');
            //add_submenu_page('mybizna', 'Settings', 'Settings', 'manage_options', 'mybizna-settings', 'mybizna_setting_render_plugin_settings_page');
            //remove_submenu_page('mybizna', 'mybizna');
        }

        public static function mybizna_menu()
        {
            add_menu_page(
                __('Mybizna', 'mybizna'), __('mybizna', 'mybizna'), 'manage_options', 'mybizna',
                array('MybiznaPlugin', 'mybizna_contents'), 'dashicons-schedule', 3
            );
        }

        public static function mybizna_contents()
        {
            echo '<div class="wrap">';
            echo '<h2>Hello, World!</h2>';
            echo '<p>Welcome to the Mybizna Plugin. This is your admin menu page.</p>';
            echo '</div>';

            global $twig;

            $data = [
                'title' => 'Twig Example',
                'name' => 'John',
            ];

            // Render a template from the first path
            $template1 = $twig->load('@generic/starter.twig');
            echo $template1->render($data);

            /***************************************** */

            $kernel = app('Illuminate\Contracts\Http\Kernel');
            $request = Illuminate\Http\Request::capture();

            $controller = new App\Http\Controllers\MyController();
            $response = $controller->index();

            echo $response;

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
