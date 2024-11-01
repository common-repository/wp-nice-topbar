<?php

namespace WPNT\Core\Admin;

trait AdminServiceProvider
{
	/**
	 * get all top bar
	 * 
	 * @since  1.3.0
	 * @return array $list
	 */
	public function getTopbars()
	{
		global $wpdb;
		$list = [];
		$sql = "SELECT * FROM $wpdb->options WHERE option_name LIKE 'wpnt_elem_%'";
		$list = $wpdb->get_results($sql);
		return $list;
	}

	/**
	 * get sidebar subscribe form
	 * 
	 * @since  1.3.0
	 * @return array
	 */
	public function subscribe()
	{
		return [
			'u'   => '8dba6bbf4e3631d54a0df7aed',
			'id'  => '0c31a4586f',
			'url' => 'https://vietfreshair.us14.list-manage.com/'
		];
	}

	/**
	 * get detail top bar settings
	 * 
	 * @since  1.3.0
	 * @return array $settings
	 */
	public function getTopbar()
	{
		$settings = [];

		if (isset($_GET['tname'])) {
			$settings = get_option($_GET['tname']);
		}

		return $settings;
	}

	/**
	 * get plugin settings
	 * 
	 * @since  1.3.0
	 * @return array $settings
	 */
	public function getSettings()
	{
		$settings = get_option('wpntSettings');

		if ($settings == null || empty($settings)) {
			$settings = get_option(WPNT_PREFIX . 'default_settings');
		}

		return $settings;
	}
}