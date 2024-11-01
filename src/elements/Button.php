<?php
/**
 * create a button element
 * 
 * @package wpnt
 * @since   1.0.2
 */

namespace WPNT\Elements;

class Button
{
	/**
	 * @var string $name
	 */
	protected $name = 'button';

	/**
	 * @var WPNT\Core\Topbar $topbar
	 */
	protected $topbar;

	/**
	 * Initialize
	 * 
	 * @param  WPNT\Core\Topbar $topbar
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

		$button = '';
		
		$btn_id = ($settings['wpnt_button_id'] != '') ? $settings['wpnt_button_id'] : '';

		$btn_style = 'style="text-decoration: none;border-radius: ' . $settings['wpnt_button_border_radius'] . 'px; background-color: ' . $settings['wpnt_button_bg_color'] . '; font-size: ' . $settings['wpnt_button_text_size'] . 'px; color: ' . $settings['wpnt_button_text_color'] . '; padding: ' . $settings['wpnt_button_padding_top'] . 'px ' . $settings['wpnt_button_padding_right'] . 'px ' . $settings['wpnt_button_padding_bottom'] . 'px ' . $settings['wpnt_button_padding_left'] .'px;';
		$btn_style .= 'background:linear-gradient(' . $settings['wpnt_button_bgcolor_first'] . ', ' . $settings['wpnt_button_bgcolor_last'] . ');';
		$btn_style .= 'background:-moz-linear-gradient(' . $settings['wpnt_button_bgcolor_first'] . ', ' . $settings['wpnt_button_bgcolor_last'] . ');';
		$btn_style .= 'background:-o-linear-gradient(' . $settings['wpnt_button_bgcolor_first'] . ', ' . $settings['wpnt_button_bgcolor_last'] . ');';
		$btn_style .= 'background:-webkit-linear-gradient(' . $settings['wpnt_button_bgcolor_first'] . ', ' . $settings['wpnt_button_bgcolor_last'] . ');';
		$btn_style .= 'text-transform:' . $settings['wpnt_btn_transform'] . ';';
		$btn_style .= 'font-weight:' . $settings['wpnt_btn_weight'] . ';';
		$btn_style .= 'font-style:' . $settings['wpnt_btn_style'] . ';';

		$btn_style .= '"';

		$btn_p_style = 'style="margin: ' . $settings['wpnt_button_margin_top'] . 'px ' . $settings['wpnt_button_margin_right'] . 'px ' . $settings['wpnt_button_margin_bottom'] . 'px ' . $settings['wpnt_button_margin_left'] . 'px; "';

		$button_link = wpnt_check_url($settings['wpnt_button_link']);

		// button actions
		$actions = ($settings['wpnt_button_open'] == 'on') ? 'target="_blank"' : '';

		// button script
		if ($settings['wpnt_button_script'] == 'on') {
			$onclick = 'onClick="wpntOnclick();"';
			$script = '<script>';
			$script .= 'function wpntOnclick()';
			$script .= '{';
			$script .= stripslashes($settings['wpnt_button_code']);
			$script .= '}';
			$script .= '</script>';
		} else {
			$onclick = '';
			$script = '';
		}

		$button = '<span class="wpnt-component wpnt-button" ' . $btn_p_style . '>';
		$button .= '<a id="' . $btn_id . '" class="wpnt-btn ' . $settings['wpnt_button_class'] . '" ' . $btn_style . ' href="' . $button_link .'" ';
		$button .= $actions . ' ';
		$button .= $onclick;
		$button .= '>';

		$button .= stripslashes($settings['wpnt_button_name']) ;
		$button .= '</a>';

		$button .= $script;

		$button .= '</span>';

		echo $button;
		return ob_get_clean();
	}
}