<?php
/**
 * create admin setting page
 * 
 * @package wpnt
 * @author  Duy Nguyen <duyngha@gmail.com>
 * @since   1.0.0
 */

namespace WPNT\Core\Admin;

if (!defined('ABSPATH')) exit;

class AdminPanel
{
	use AdminServiceProvider;

	/**
	 * Initialize
	 * 
	 * @since  1.0.0
	 * @param  object $master
	 * @return void
	 */
	public function __construct($master)
	{
		$this->master = $master;
		add_action('admin_menu', array($this, 'register_wpnt_menu_page'));

		// Register script and style
		add_action('admin_enqueue_scripts', array($this, 'wpnt_add_static'));
		add_action('wp_enqueue_scripts', array($this, 'front_end_static'));

	}

	/**
	 * register menu page
	 */
	public function register_wpnt_menu_page()
	{
		add_menu_page(
			'wpnt',
			__('WP Nice Topbar', WPNT_TEXTDOMAIN),
			'manage_options',
			'wpnt',
			array($this, 'wpnt_overview_tab'),
			WPNT_PLUGIN_URL . '/assets/images/logo_favicon.png',
			'11.02'
		);
		add_submenu_page(
			'wpnt',
			__('Add Topbar', WPNT_TEXTDOMAIN),
			__('Add Topbar', WPNT_TEXTDOMAIN),
			'manage_options',
			'wpnt-add',
			array($this, 'wpnt_addnew_tab')
		);
		add_submenu_page(
			'',
			__('Options', WPNT_TEXTDOMAIN),
			__('Options', WPNT_TEXTDOMAIN),
			'manage_options',
			'wpnt-options',
			array($this, 'wpnt_options_tab')
		);
		add_submenu_page(
			'wpnt',
			__('Settings', WPNT_TEXTDOMAIN),
			__('Settings', WPNT_TEXTDOMAIN),
			'manage_options',
			'wpnt-settings',
			array($this, 'wpnt_settings_tab')
		);
		add_submenu_page(
			'wpnt',
			__('Tools', WPNT_TEXTDOMAIN),
			__('Tools', WPNT_TEXTDOMAIN),
			'manage_options',
			'wpnt-tools',
			array($this, 'wpnt_tools_tab')
		);
	}

	/**
	 * render listing panel
	 * 
	 * @since  1.0.0
	 * @return void
	 */
	public function wpnt_overview_tab()
	{
		wpnt_load_template('pages/temp-list', $this);
	}

	/**
	 * render detail setting panel
	 * 
	 * @since  1.0.0
	 * @return void
	 */
	public function wpnt_options_tab()
	{
		wpnt_load_template('pages/temp-options', $this);
	}

	/**
	 * wpnt_addnew_tab
	 */
	public function wpnt_addnew_tab()
	{
		wpnt_load_template('pages/temp-add-new', $this);
	}

	/**
	 * render setting panel
	 * 
	 * @since  1.0.0
	 * @return void
	 */
	public function wpnt_settings_tab()
	{
		wpnt_load_template('pages/temp-settings', $this);
	}

	/**
	 * Render tools page
	 * 
	 * @since  1.3.0
	 * @return void
	 */
	public function wpnt_tools_tab()
	{
		wpnt_load_template('pages/temp-tools', $this);
	}

	/**
	 * Register admin js
	 */
	public function wpnt_add_static()
	{
		wp_enqueue_style('wpnt_admin_css', WPNT_PLUGIN_URL . 'assets/css/wpnt-admin.css', array(), WPNT_PLUGIN_VER );
		wp_enqueue_style('wpnt_awesome', WPNT_PLUGIN_URL . 'assets/components/fontawesome/css/font-awesome.min.css', array(), WPNT_PLUGIN_VER );
		wp_enqueue_style('wpnt_minicolors_css', WPNT_PLUGIN_URL . 'assets/components/jquery-minicolors/jquery.minicolors.css', array(), WPNT_PLUGIN_VER );
		wp_enqueue_style('fastselect.min.css', WPNT_PLUGIN_URL . 'assets/css/fastselect.min.css', array(), WPNT_PLUGIN_VER );
		wp_enqueue_style('jquery-ui-css',  WPNT_PLUGIN_URL . 'assets/css/jquery-ui.css');

		/**
		 * add js
		 */
		wp_enqueue_media();
		wp_enqueue_script('wpnt_ajax', WPNT_PLUGIN_URL . 'assets/js/wpnt-ajax.js', array('jquery'), WPNT_PLUGIN_VER, true );
		wp_enqueue_script('wpnt_minicolors', WPNT_PLUGIN_URL . 'assets/components/jquery-minicolors/jquery.minicolors.min.js', array('jquery'), WPNT_PLUGIN_VER, true );
		wp_enqueue_script('fastselect', WPNT_PLUGIN_URL . 'assets/js/fastselect.standalone.min.js', array('jquery'), WPNT_PLUGIN_VER, true );
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script('jquery-ui-droppable');
		wp_enqueue_script('jquery-ui-draggable');
		wp_enqueue_script('jquery-ui-slider');
		wp_enqueue_script('wpnt_admin_js', WPNT_PLUGIN_URL . 'assets/js/wpnt-admin.js', array('jquery'), WPNT_PLUGIN_VER, true );
	}

	/**
	 * Front-end register static
	 */
	public function front_end_static()
	{
		wp_enqueue_style('wpnt_frontend_fontawesome', WPNT_PLUGIN_URL . 'assets/components/fontawesome/css/font-awesome.min.css', array(), WPNT_PLUGIN_VER );
		wp_enqueue_style('wpnt_screen_css', WPNT_PLUGIN_URL . 'assets/css/wpnt-screen.css', array(), WPNT_PLUGIN_VER );
		wp_enqueue_style('wpnt_frontend_responsive', WPNT_PLUGIN_URL . 'assets/css/wpnt-responsive.css', array(), WPNT_PLUGIN_VER );
		// script
	}

} // end class WPNT_Admin
