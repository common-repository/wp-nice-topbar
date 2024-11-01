<?php
/**
 * Load template file for listing admin page and single topbar admin page
 *
 * @param string $temp_name The name of template file
 * @param mix $args Contain data is passed to template file
 * @package wpnt
 * @since 1.0.0
 * @author DuyNguyen
 */
function wpnt_load_template($temp_name, $args = '', $args_extends = '')
{
	require_once WPNT_PLUGIN_DIR . '/src/templates/' . $temp_name . '.php';
}

/**
 * Check urt input
 * 
 * @param string $url
 * @uses strpos()
 * @since 1.0.0
 * @return string $full_url
 */
function wpnt_check_url( $url ) {
	$full_url = '';
	if ( $url == '#' || $url == '' ) {
		$full_url = '#';
	} else {
		if ( strpos( $url, 'http' ) == false || strpos( $url, 'https' ) == false ) {
			$full_url .= 'http://' . $url;
		}
	}
	return $full_url; 
}

/**
 * check current type of template
 * 
 * @return string
 */
if (!function_exists('checkType')) {
	function checkType()
	{
		$currentId = get_the_ID();
		if ($currentId == false) {
			$currentId = get_queried_object()->term_id;
		}
		if (is_single()) {
			return 'cpt';
		}
		if (is_page() || is_front_page() || is_home()) {
			return 'page';
		}
		if (is_category()) {
			return 'cate';
		}
		if (term_exists($currentId)) {
			return 'tax';
		}
	}
}

if (!function_exists('getListTopbars')) {
	/**
	 * get list of top bar
	 * 
	 * @since  1.0.0
	 * @param  string $prefix
	 * @return array
	 */
	function getListTopbars($prefix = 'wpnt_elem_')
	{
		global $wpdb;
		$topbars = array();
		$sql = "SELECT * FROM $wpdb->options WHERE option_name LIKE '$prefix%'";
		$topbars = $wpdb->get_results($sql);
		return $topbars;
	}
}

if (!function_exists('getTopbar')) {
	/**
	 * get single detail top bar
	 * 
	 * @since  1.0.0
	 * @param  string $name
	 * @return array
	 */
	function getTopbar($name)
	{
		$topbar = get_option($name);
		return $topbar;
	}
}

/**
 * register script, stylesheet files
 * 
 * @return void
 */
if (!function_exists('wpntRegisterScripts')) {
	/**
	 * register script
	 * 
	 * @since  1.0.0
	 * @param  array $file
	 * @return void
	 */
	function wpntRegisterScripts($files)
	{
		if (!empty($files)) {
			foreach ($files as $file) {
				switch ($file['type']) {
					case 'js':
						wp_enqueue_script(
							$file['handle'],
							$file['path'],
							$file['dep'],
							$file['ver'],
							$file['pos']
						);
						break;
					case 'css':
						wp_enqueue_style($file['handle'], $file['path']);
						break;
				}
			}
		}
	}
}

if (!function_exists('wpntGetPluginSettings')) {
	/**
	 * get plugin global settings
	 * 
	 * @since  1.1.0
	 * @return array
	 */
	function wpntGetPluginSettings()
	{
		return get_option('wpntSettings');
	}
}