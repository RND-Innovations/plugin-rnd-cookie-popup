<?php

/**
 * RND Cookie Popup
 *
 * @package           RNDCorePlugins
 * @author            Developer Dilantha
 * @copyright         2021 RND Innovations
 * @license           GPL-2.0-or-later
 *
 * @rnd-plugin
 * Plugin Name:       RND Cookie Popup
 * Plugin URI:        https://rnd.rodee.ca/core-plugins
 * Description:       This plugin will show a popup message about cookie on bottom-right corner.
 * Version:           1.0.1
 * Requires at least: 1.0.0
 * Requires PHP:      5.2
 * Author:            Dilantha
 * Author URI:        https://www.dilantha.org
 * Text Domain:       dilantha
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

if(!isset($_COOKIE['user_cookie_consent'])) {
    
    function rnd_cookie_popup_styles($items) {

        $css_path   = APP_TMPL . '/plugins/' . basename( dirname( __FILE__ ) ) . '/assets/style.css'; 

        $css        = get_file_contents_from_a_file( $css_path );

        return $items.$css;
    }
    add_filter('page_style', 'rnd_cookie_popup_styles');


    function rnd_cookie_popup_box($items) {

        $html_path = APP_TMPL . '/plugins/' . basename( dirname( __FILE__ ) ) . '/assets/box.html';

        $html = get_file_contents_from_a_file( $html_path );

        $html = str_replace("[[LEGAL-URL]]", APP_URL . "/legal/cookies" , $html);

        return $items.$html;
    }
    add_filter('page_footer', 'rnd_cookie_popup_box');


    function rnd_cookie_popup_script($items) {

        $js_path = APP_TMPL . '/plugins/' . basename( dirname( __FILE__ ) ) . '/assets/script.js';

        $scripts = get_file_contents_from_a_file( $js_path );

        return $items.$scripts;
    }
    add_filter('page_script', 'rnd_cookie_popup_script');

}