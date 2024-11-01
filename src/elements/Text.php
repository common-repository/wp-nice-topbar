<?php
/**
 * create a text element
 * 
 * @package wpnt
 * @since   1.0.2
 */

namespace WPNT\Elements;

class Text
{
	/**
	 * @var string $name
	 */
	protected $name = 'text';

	/**
	 * @var WPNT\Core\Topbar $topbar $topbar
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
	 * 
	 * @return void
	 */
	public function callback($atts, $content)
	{
		ob_start();

		$settings = $this->topbar->getSettings();

		$text = '';

		$style  = 'style="font-size: ' . $settings['wpnt_text_size'] .'px; color: ' . $settings['wpnt_text_color'] . '; font-weight: ' . $settings['wpnt_text_weight'] . '; font-style: ' . $settings['wpnt_text_style'] . '; text-decoration: ' . $settings['wpnt_text_decoration'] . '; line-height: ' . $settings['wpnt_text_line_height'] . 'px; ';
		$style .= 'padding: ' . $settings['wpnt_text_padding_top'] . 'px ' . $settings['wpnt_text_padding_right'] . 'px ' . $settings['wpnt_text_padding_bottom'] . 'px ' . $settings['wpnt_text_padding_left'] .'px; margin: ' . $settings['wpnt_text_margin_top'] .'px ' . $settings['wpnt_text_margin_right'] . 'px ' . $settings['wpnt_text_margin_bottom'] . 'px ' . $settings['wpnt_text_margin_left'] . 'px; text-align: ' . $settings['wpnt_text_align'] . ';';
		$style .= 'text-transform:' . $settings['wpnt_text_transform'] . ';';
		$style .= 'letter-spacing:' . $settings['wpnt_text_letter_spacing'] . 'px;';
		$style .= 'word-spacing:' . $settings['wpnt_text_word_spacing'] . 'px;';

		$style .= '"';

		$text .= '<span class="wpnt-component wpnt-text" ' . $style . '>' . stripslashes($settings['wpnt_text_cont']) . '</span>';
		
		echo $text;
		return ob_get_clean();
	}
}