<?php
/**
 * Hook functions for Ajax
 * 
 * @package wpnt
 * @since   1.0.0
 */

namespace WPNT\Core;

use WPNT\Core\Mailchimp;

class WPNT_Ajax
{
	/**
	 * @var array $actions
	 */
	protected $actions = array(
		'save_topbar'          => 'wpnt_save_topbar_callback',
		'add_new'              => 'wpnt_add_new_callback',
		'delete_topbar'        => 'wpnt_delete_callback',
		'edit_topbar'          => 'wpnt_edit_callback',
		'reset_topbar'         => 'wpnt_reset_option_callback',
		'single_delete_topbar' => 'wpnt_single_delete_topbar_callback',
		'save_settings'        => 'saveSettings',
		'sync_mailchimp'       => 'syncMailchimp',
	);

	/**
	 * Initialize
	 * 
	 * @return void
	 */
	public function __construct() {
		$this->wpntLoadAjax();
	}

	/**
	 * load ajax
	 * 
	 * @return void
	 */
	private function wpntLoadAjax()
	{
		if (empty($this->actions)) wp_die('No Actions are invoked');
		foreach ($this->actions as $action => $callback) {
			$actionName = 'wp_ajax_' . $action;
			add_action($actionName, array( &$this, $callback));
		}
	}

	/**
	 * Get default setting array
	 * 
	 * @return array $default_settings
	 */
	public function wpnt_get_default_settings() {
		$default_settings = get_option(WPNT_PREFIX . 'default_options');
		return $default_settings;
	}

	/**
	 * Save single setting for a topbar
	 * 
	 * @return void
	 */
	public function wpnt_save_topbar_callback()
	{
		$settings = $_POST['settings'];
		//var_dump($settings);
		$topbar_name = $settings['wpnt_topbar_name'];
		// $settings['wpnt_btn_link'] = esc_url_raw($settings['wpnt_btn_link']);
		update_option($topbar_name, $settings);
		//var_dump(get_option($topbar_name));
		wp_die();
	}

	/**
	 * Add new a topbar
	 * 
	 * @return void
	 */
	public function wpnt_add_new_callback() {

		$name = $_POST['name'];

		if (ctype_alnum(str_replace(' ', '', $_POST['name'])) == false) {
			echo __('The topbar name should be alphanumeric string.', WPNT_TEXTDOMAIN);
		} else {
			$clear_name = WPNT_PREFIX . 'elem_' . str_replace(' ', '_', strtolower(trim($name)));
			$default = 'No values';
			$check_option = get_option( $clear_name, $default );

			$settings_default = $this->wpnt_get_default_settings();
			$settings_default['wpnt_topbar_label'] = $name;
			$settings_default['wpnt_topbar_name'] = $clear_name;
			//var_dump($settings_default);
			if ($check_option == $default) {
				add_option( $clear_name,  $settings_default);
				$redirect = get_site_url() . '/wp-admin/admin.php?page=wpnt-options&tname=' . $clear_name;
				echo $redirect;
			} else {
				echo __('This name has existed. Please try other.', WPNT_TEXTDOMAIN);
			}			
		}

		wp_die();
	}

	/**
	 * Delete a topbar
	 * 
	 * @return void
	 */
	public function wpnt_delete_callback() {

		$nameTopbar = $_POST['name_topbar'];
		delete_option($nameTopbar);
		wp_die();
	}	


	/**
	 * Edit a topbar
	 * 
	 * @return void
	 */
	public function wpnt_edit_callback() {

		$nameTopbar = $_POST['name_topbar'];
		$redirect = get_site_url() . '/wp-admin/admin.php?page=wpnt-options&tname=' . $nameTopbar;
		echo $redirect;
		wp_die();
	}

	/**
	 * Reset option of topbar
	 * 
	 * @since 1.0.0
	 * @return void
	 */
	public function wpnt_reset_option_callback() {
		$topbar_label = $_POST['topbar_label'];
		$topbar_name = $_POST['topbar_name'];
		$default_options = $this->wpnt_get_default_settings();
		$default_options['wpnt_topbar_label'] = $topbar_label;
		$default_options['wpnt_topbar_name'] = $topbar_name;
		update_option( $topbar_name, $default_options );
		$redirect = get_site_url() . '/wp-admin/admin.php?page=wpnt-options&tname=' . $topbar_name;
		echo $redirect;
		wp_die();
	}

	/**
	 * Single topbar delete button action
	 * 
	 * @since 1.0.0
	 * @return void
	 */
	public function wpnt_single_delete_topbar_callback() {
		$topbar_name = $_POST['topbar_name'];
		delete_option( $topbar_name );
		$redirect = get_site_url() . '/wp-admin/admin.php?page=wpnt';
		echo $redirect;
		wp_die();
	}

	/**
	 * save setting data
	 * 
	 * @since  1.1.0
	 * @return void
	 */
	public function saveSettings()
	{
		$settings = $_POST['pluginSettings'];
		update_option('wpntSettings', $settings);
		wp_die();
	}

	/**
	 * connect to Mailchimp API
	 * 
	 * @since  1.1.0
	 * @return void
	 */
	public function syncMailchimp()
	{
		$key = $_POST['key'];
		$mailchimp = new Mailchimp($key);
		if (is_object($mailchimp->validateKey())) {
			echo 'success';
		} else {
			echo 'fail';
		}
		wp_die();
	}

}