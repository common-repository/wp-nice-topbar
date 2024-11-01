<?php
/**
 * create a logo element
 * 
 * @package wpnt
 * @since   1.0.2
 */

namespace WPNT\Elements;

class Logo
{
	/**
	 * @var string $name
	 */
	protected $name = 'logo';

	/**
	 * @var \WPNT\Core\Topbar $topbar
	 */
	protected $topbar;

	/**
	 * Initialize
	 * 
	 * @param  WPNT\Core\Topbar
	 * @return void
	 */
	public function __construct(\WPNT\Core\Topbar $topbar)
	{
		$this->topbar = $topbar;
		add_shortcode($this->name, array($this, 'callback'));
	}

	/**
	 * 
	 * @param  array $atts
	 * @return void
	 */
	public function callback($atts)
	{
		ob_start();
		$settings = $this->topbar->getSettings();
		$logo = '';

		$style = 'style="padding: ' . $settings['wpnt_logo_padding_top'] . 'px ';
		$style .= $settings['wpnt_logo_padding_right'] . 'px ';
		$style .= $settings['wpnt_logo_padding_bottom'] . 'px ';
		$style .= $settings['wpnt_logo_padding_left'] . 'px; margin: ';
		$style .= $settings['wpnt_logo_margin_top'] . 'px ';
		$style .= $settings['wpnt_logo_margin_right'] .'px ';
		$style .= $settings['wpnt_logo_margin_bottom'] . 'px ';
		$style .= $settings['wpnt_logo_margin_left'] . 'px; "';

		$logo .= '<span class="wpnt-component wpnt-topbar" ' . $style . '>';
		$logo_img_width = ($settings['wpnt_logo_width'] == '0') ? 'auto' : $settings['wpnt_logo_width'] . 'px';
		$logo_img_height = ($settings['wpnt_logo_height'] == '0') ? '100%' : $settings['wpnt_logo_height'] . 'px';
		$logo_link = wpnt_check_url( $settings['wpnt_logo_link'] );
		$logo .= '<a href="' . $logo_link . '"><img style="width: ' . $logo_img_width . '; height: ' . $logo_img_height . '" src="' . $settings['wpnt_logo_url'] . '" alt="logo" /></a>';
		$logo .= '</span></span>';

		echo $logo;

		return ob_get_clean();
	}
}