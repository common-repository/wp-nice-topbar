<?php
/**
 * Plugin Name: WP Nice Topbar
 * Description: Create and manage your top bars
 * Version: 1.3.1
 * Author: Duy Nguyen <duyngha@gmail.com>
 * Author URI: https://www.duyngha.com
 * Plugin URI: https://www.duyngha.com
 * License: MIT
 */

require __DIR__ . '/vendor/autoload.php';

use WPNT\Core\Topbar;

/**
 * create main class
 *
 * @package wpnt
 * @since   1.0.2
 */
if (!class_exists('WPNT')) {
	class WPNT
	{
		use WPNT\Core\DefaultSettings;

		/**
		 * initialize
		 *
		 * @since  1.0.2
		 * @return void
		 */
		public function __construct()
		{
			$this->define();

			/* Programming Mode. Remove this line once you done */
			update_option(WPNT_PREFIX . 'default_options', $this->defaultOptions);
			update_option(WPNT_PREFIX . 'default_settings', $this->defaultSettings);

			register_activation_hook(__FILE__, array($this, 'activatePlugin'));
			add_action('init', [$this, 'loadCore']);
			//add_action('wp', array($this, 'run'));
		}

		/**
		 * Define constants
		 *
		 * @since  1.0.2
		 * @return void
		 */
		public function define()
		{
			$constants = array(
				'WPNT_PLUGIN_DIR'   => __DIR__,
				'WPNT_PLUGIN_URL'   => plugin_dir_url(__FILE__),
				'WPNT_PLUGIN_VER'   => '1.3.0',
				'WPNT_REQUIRE_VER'  => '4.0',
				'WPNT_AUTHOR_EMAIL' => 'duyngha@gmail.com',
				'WPNT_PREFIX'       => 'wpnt_',
				'WPNT_TEXTDOMAIN'   => 'wpnt',
			);

			foreach ($constants as $key => $value) {
				define($key, $value);
			}
		}

		/**
		 * plugin activation hook
		 *
		 * @return void
		 */
		public function activatePlugin()
		{
			if (version_compare(get_bloginfo('version'), WPNT_REQUIRE_VER, '<')) {
				deactivate_plugins(basename(__FILE__) );
				wp_die('Current version of wordpress is lower require version (' . WPNT_REQUIRE_VER . ')');
			} else {
				update_option(WPNT_PREFIX . 'default_options', $this->defaultOptions);
				update_option(WPNT_PREFIX . 'default_settings', $this->defaultSettings);
			}
		}

		/**
		 * load core of plugin
		 *
		 * @return void
		 */
		public function loadCore()
		{
			$this->admin   = new WPNT\Core\Admin\AdminPanel($this);
			$this->ajax    = new WPNT\Core\WPNT_Ajax;
			$this->plugin  = new WPNT\Core\PluginSettings;
			$this->tool    = new WPNT\Core\Tools();
			$this->factory = new WPNT\Core\TopbarFactory();
		}
	}
}

// kick it off
new WPNT;
