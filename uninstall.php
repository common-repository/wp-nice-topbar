<?php
/**
 * This file performs uninstalling the plugin and remove data from database when user deletes it
 *
 * @package wpnt
 * @since   1.0.3
 */

// if uninstall not called from Wordpress exit
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) exit();

// Delete whole the topbars, individual setting and config
global $wpdb;
$sql = "SELECT * FROM $wpdb->options WHERE option_name LIKE 'wpnt_%'";

$wpnt_delete_options = $wpdb->get_results($sql);

foreach ($wpnt_delete_options as $name) {
	delete_option($name->option_name);
}

delete_option('wpnt_default_settings');

delete_option('wpnt_default_options');
