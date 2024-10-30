<?php
/**
 * Plugin Name
 *
 * @package           PluginPackage
 * @author            Michael Gangolf
 * @copyright         2022 Michael Gangolf
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Click to map for Elementor
 * Description:       Elementor control that opens Google Map iframe after clicking accept.
 * Version:           1.2.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Michael Gangolf
 * Author URI:        https://www.migaweb.de/
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

add_action('wp_enqueue_scripts', 'ctmfe_scripts');

function ctmfe_scripts()
{
    wp_register_style('ctmfe_styles', plugins_url('styles/main.css', __FILE__));
    wp_enqueue_style('ctmfe_styles');
}

use Elementor\Plugin;

add_action('init', static function () {
    if (! did_action('elementor/loaded')) {
        return false;
    }
    require_once(__DIR__ . '/widget/click_to_map.php');
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CTMFE_Widget());
});
