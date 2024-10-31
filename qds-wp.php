<?php
/**
 * Plugin Name: Quality Driven
 * Plugin URI: http://qualitydrivensoftware.com/qds-wordpress-plugin
 * Description: This plugin adds QDS Reviews to your site.
 * Version: 1.2.3
 * Author: Vlad Stanca
 * License: GPL2
 */


// CSS
// --------------------------------------------------------------------------
wp_enqueue_style('style.css', plugin_dir_url(__FILE__) . 'style.css');


// QDS Reviews shortcode
// --------------------------------------------------------------------------
function qds_reviews($params)
{
    $url = ! empty($params['url']) ? $params['url'] : 'https://qdsapp.com/reviews/view/';

    $api_key = get_option('qds-api-key');

    if (empty($api_key)) {
        return '<p style="color: red;">- Error: Missing  <strong>QDS API Key</strong>. See Quality Driven plugin settings. -</p>';
    }

    $url .= $api_key . '?';

    // remove url from array so it doesn't get set in the query string
    if ( ! empty($params['url'])) {
        unset($params['url']);
    }

    // build query string from array
    if ($params) {
        $query = http_build_query($params);
        $url   .= $query;
    }

    // $response = wp_remote_get($url);
    $response = wp_remote_get($url);
    $http_code = wp_remote_retrieve_response_code($response);
    $body = wp_remote_retrieve_body($response);

    if ($http_code != 200)
        return '';

    ob_start();
    echo $body;
    return ob_get_clean();
}

function register_qds_shortcodes()
{
    add_shortcode('qds-reviews', 'qds_reviews');
}

add_action('init', 'register_qds_shortcodes');


// QDS Settings
// --------------------------------------------------------------------------
add_action('admin_menu', 'qds_wp_menu');

function qds_wp_menu()
{
    add_menu_page('Quality Driven Settings', 'Quality Driven', 'administrator', 'qds-wp-settings', 'qds_wp_settings_page', 'dashicons-star-half');
}

add_action('admin_init', 'qds_wp_settings');

function qds_wp_settings()
{
    register_setting('qds-wp', 'qds-api-key');
}

function qds_wp_settings_page()
{
    include plugin_dir_path(__FILE__) . 'qds-wp-settings-page.php';
}

// Resolve issues with origins and iframes
add_action( 'send_headers', 'send_frame_options_header', 10, 0 );