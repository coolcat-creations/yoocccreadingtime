<?php
/**
 * Plugin Name: YOO CCC Reading Time
 * Plugin URI: {{AUTHORURL}}
 * Description: {{DESCRIPTION}}
 * Author: {{AUTHOR}}
 * Version: {{VERSION}}
 * Author URI: {{AUTHORURL}}
 * License: {{LICENSE}}
 * Text Domain: yoocccreadingtime
 * Update URI: {{UPDATEURI}}/update.json
 * Requires at least: {{WORDPRESSMINIMUM}}
 * Requires PHP: {{PHPMINIMUM}}
 */

defined('ABSPATH') || exit();

use YOOtheme\Application;

add_action('after_setup_theme', function () {
    // Check if the YOOtheme app class exists
    if (!class_exists(Application::class, false)) {
        return;
    }

    // Load module from the same directory
    $app = Application::getInstance();
    $app->load(__DIR__ . '/modules/*/bootstrap.php');
});

add_filter('update_plugins_coolcat-campus.com', function($update, $plugin_data, $plugin_file, $locales) {
    if ($plugin_file == plugin_basename(__FILE__)) {
		$request = wp_remote_get($plugin_data['UpdateURI']);
		$request_body = wp_remote_retrieve_body( $request );
		$update = json_decode( $request_body, true );
	}

	return $update;
},10, 4);
