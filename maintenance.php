<?php
/*
Plugin Name: Maintenance Mode
Plugin URI: http://example.com/maintenance-mode
Description: A simple plugin to put the site into maintenance mode.
Version: 1.0
Author: Jyotsna Bhatia
Author URI: http://example.com
License: GPL2
*/

// Hook into WordPress 'init' action to check if the user is logged in
function mm_activate_maintenance_mode() {
    if (!current_user_can('edit_themes') || !is_user_logged_in()) {
        wp_die(
            '<h1>Website Under Maintenance</h1>
            <p>Our website is currently undergoing scheduled maintenance. Please check back later.</p>',
            'Maintenance Mode',
            array('response' => '503')
        );
    }
}

// Register the function to run when the plugin is active
add_action('get_header', 'mm_activate_maintenance_mode');
