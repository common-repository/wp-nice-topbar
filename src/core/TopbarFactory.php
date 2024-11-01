<?php
/**
 * run the top bar and display them on front-end
 * 
 * @since   1.3.0
 * @package wpnt
 */

namespace WPNT\Core;

class TopbarFactory
{
	/**
	 * Initialize
	 * 
	 * @since 1.3.0
	 * @return void
	 */
	public function __construct()
	{
		add_action('wp', [$this, 'run']);
	}

	/**
	 * display the top bar on front-end
	 * 
	 * @since 1.3.0
	 * @return void
	 */
	public function run()
	{
		$json = '';

		$pluginSettings = wpntGetPluginSettings();

		// detect mobile
		$detect = new \Mobile_Detect;

		if ($detect->isMobile()) {
			if ($pluginSettings['wpnt_mobile'] != 'on') {
				return;
			}
		}

		if ($detect->isTablet()) {
			if ($pluginSettings['wpnt_tablet'] != 'on') {
				return;
			}
		}

		if (is_admin()) return;

		$type = checkType();

		$lists = getListTopbars();

		if (empty($lists)) return;

		foreach ($lists as $item) {
			$settings = getTopbar($item->option_name);
			$topbar = new Topbar($this, $item->option_name);

			if (@$settings['wpnt_place'][0]['value'] == 'on') continue;

			if (@$settings['wpnt_place'][1]['value'] == 'on') {
				$json .= $topbar->wrapper();
				continue;
			}

			$where = $settings['wpnt_place'];
			
			if (is_array($where)) {
				foreach ($where as $place) {

					if ($place['place'] != $type) continue;

					if (!empty($place['value'])) {

						foreach ($place['value'] as $target) {
							switch ($type) {
								case 'cpt':
									if (is_singular($target)) {
										$json .= $topbar->wrapper();
									}
									break;
								case 'page':
									if (get_the_ID() == $target || in_array('all', $place['value'])) {
										$json .= $topbar->wrapper();
									}
									if ($target == 'front' && is_front_page()) {
										$json .= $topbar->wrapper();
									}
									break;
								case 'cate':
								case 'tax':
									if (get_queried_object()->term_id == $target) {
										$json .= $topbar->wrapper();
									}
									break;
							}
						}

					}
				}
			}
		}
		$this->localize($json);
	}

	/**
	 * localize script for topbar
	 * 
	 * @since  1.3.0
	 * @param  array $topbar
	 * @return void
	 */
	public function localize($topbar)
	{
		wp_enqueue_script(
			'wpnt_push_script', 
			WPNT_PLUGIN_URL . 'assets/js/wpnt-topbar.js', 
			array('jquery'), 
			WPNT_PLUGIN_VER, 
			true
		);

		wp_localize_script('wpnt_push_script', 'topbar', $topbar);
	}

}