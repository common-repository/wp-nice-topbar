<?php
/**
 * topbar object
 * 
 * @author  Duy Nguyen <duyngha@gmail.com>
 * @package wpnt
 * @since   1.0.2
 */

namespace WPNT\Core;

use WPNT\Elements\Logo;
use WPNT\Elements\Button;
use WPNT\Elements\Text;
use WPNT\Elements\Subscribe;

class Topbar
{
	/**
	 * @var string $name
	 */
	protected $name;

	/**
	 * @var
	 */
	protected $master;

	/**
	 * Init
	 * 
	 * @param  string $name
	 * @return void
	 */
	public function __construct($master, $name)
	{
		$this->master = $master;
		$this->name = $name;
		$this->createElements();
	}

	/**
	 * Get settings of topbar
	 * 
	 * @return array $topbar
	 */
	public function getSettings()
	{
		$topbar = get_option($this->name);

		return $topbar;
	}

	/**
	 * 
	 * 
	 * @return string $wrapper
	 */
	public function wrapper()
	{
		$settings = $this->getSettings();
		$wrapper = '';

		$style = 'style="background-image:url(' . $settings['wpnt_bg_img'] . ');left: 0; z-index: 100000; width: ';
		$style .= $settings['wpnt_width'] . '%; height: ' . $settings['wpnt_height'] . 'px;';
		$style .= 'background-color: ' . $settings['wpnt_bg_color'] . ';';
		$style .= 'position: ' . $settings['wpnt_position'] . ';';
		$style .= $settings['wpnt_locate'] . ': 0;background-repeat:';
		$style .= $settings['wpnt_bg_repeat'] . ';';
		$style .= 'background:linear-gradient(' . $settings['wpnt_bg_gradient_first'] . ', ' . $settings['wpnt_bg_gradient_last'] . ');';
		$style .= 'background:-moz-linear-gradient(' . $settings['wpnt_bg_gradient_first'] . ', ' . $settings['wpnt_bg_gradient_last'] . ');';
		$style .= 'background:-o-linear-gradient(' . $settings['wpnt_bg_gradient_first'] . ', ' . $settings['wpnt_bg_gradient_last'] . ');';
		$style .= 'background:-webkit-linear-gradient(' . $settings['wpnt_bg_gradient_first'] . ', ' . $settings['wpnt_bg_gradient_last'] . ');';
		$style .= '"';

		$wrapper .= '<div id="' . $settings['wpnt_topbar_name'] . '" ';
		$wrapper .= 'data-height=' . $settings['wpnt_height'] . ' ';
		$wrapper .= 'data-smooth-close=' . $settings['wpnt_smooth'] . ' ';
		$wrapper .= 'data-move-time=' . $settings['wpnt_time_move'] . ' ';
		$wrapper .= 'data-position="' . $settings['wpnt_locate'] . '" ' ;
		$wrapper .= 'class="wpnt-topbar-box" ' . $style . '>';

		if ($settings['wpnt_close_check'] == 'on') {
			$closeBtn = ($settings['wpnt_height'] / 2) - 10;
			$wrapper .= '<i class="fa fa-times close-icon" style="top: ' . $closeBtn . 'px; "></i>';
		}

		if ($settings['wpnt_reopen'] == 'on') {
			if ($settings['wpnt_locate'] == 'top') {
				$openStatus = 'open-btn-top';
			} else {
				$openStatus = 'open-btn-bottom';
			}
			$openbtn = '<span class="open-btn ' . $openStatus . '">';
			$openbtn .= '<i class="fa fa-plus open-icon" aria-hidden="true"></i></span>';
			$wrapper .= $openbtn;
		}

		$wrapper .= '<div class="wpnt-topbar-inner">';
		$wrapper .= do_shortcode($settings['wpnt_topbar_content']);
		$wrapper .= '</div>';
		$wrapper .= '</div>';

		//$this->localize($wrapper);
		
		return $wrapper;
	}

	/**
	 * localize script for topbar
	 * 
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

	/**
	 * create elements of topbar
	 * 
	 * @return void
	 */
	public function createElements()
	{
		new Logo($this);
		new Button($this);
		new Text($this);
		new Subscribe($this->master, $this);
	}

}