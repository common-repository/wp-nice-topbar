<?php
namespace WPNT\Core;

trait DefaultSettings
{
	protected $defaultSettings = [
		'wpnt_mailchimp_status' => '',
		'wpnt_mailchimp_api' => '',
		'wpnt_mailchimp_list' => '',
		'wpnt_css'    => '',
		'wpnt_mobile' => 'on',
		'wpnt_tablet' => 'on',
	];
	
	/**
	 * @var array $default_options
	 */
	protected $defaultOptions = array(
		'wpnt_topbar_label' => '',
		'wpnt_topbar_name'  => '',

		// content option
		'wpnt_text_cont'        => '',
		'wpnt_text_align'       => 'center', 
		'wpnt_text_size'        => '16',
		'wpnt_text_color'       => 'FFFFFF',
		'wpnt_text_weight'      => '',
		'wpnt_text_style'       => '',
		'wpnt_text_decoration'  => '',
		'wpnt_text_line_height' => '50',

		'wpnt_text_padding_top'    => '0',
		'wpnt_text_padding_right'  => '0',
		'wpnt_text_padding_bottom' => '0',
		'wpnt_text_padding_left'   => '0',

		'wpnt_text_margin_top'    => '0',
		'wpnt_text_margin_right'  => '0',
		'wpnt_text_margin_bottom' => '0',
		'wpnt_text_margin_left'   => '0',

		'wpnt_text_transform' => '',
		'wpnt_text_letter_spacing' => '0',
		'wpnt_text_word_spacing' => '0',

		// logo options
		'wpnt_logo_url'        => '',
		'wpnt_logo_link'       => '#',
		'wpnt_logo_width'      => '0',
		'wpnt_logo_height'     => '0',
		// logo padding
		'wpnt_logo_padding_top'    => '0',
		'wpnt_logo_padding_right'  => '0',
		'wpnt_logo_padding_bottom' => '0',
		'wpnt_logo_padding_left'   => '0',
		// logo margin
		'wpnt_logo_margin_top'    => '0',
		'wpnt_logo_margin_right'  => '0',
		'wpnt_logo_margin_bottom' => '0',
		'wpnt_logo_margin_left'   => '0',

		// button options
		'wpnt_button_name'          => '',
		'wpnt_button_link'          => '#',
		'wpnt_button_class'         => '',
		'wpnt_button_id'            => '',
		'wpnt_button_border_radius' => '0',
		'wpnt_button_bg_color'      => 'FFFFFF',
		'wpnt_button_text_size'     => '13',
		'wpnt_button_text_color'    => '333333',
		'wpnt_button_open'          => '',
		'wpnt_button_script'        => '',
		'wpnt_button_code'          => '',
		'wpnt_button_bgcolor_first' => '',
		'wpnt_button_bgcolor_last' => '',
		'wpnt_btn_transform' => '',
		'wpnt_btn_style' => '',
		'wpnt_btn_weight' => '',
		// button padding
		'wpnt_button_padding_top'    => '0',
		'wpnt_button_padding_right'  => '0',
		'wpnt_button_padding_bottom' => '0',
		'wpnt_button_padding_left'   => '0',
		'wpnt_button_margin_top'    => '0',
		'wpnt_button_margin_right'  => '0',
		'wpnt_button_margin_bottom' => '0',
		'wpnt_button_margin_left'   => '0',

		// topbar global options
		'wpnt_place'            => '',
		'wpnt_topbar_content'   => '',
		'wpnt_width'            => '100',
		'wpnt_height'           => '50',
		'wpnt_bg_color'         => 'FFFFFF',
		'wpnt_bg_gradient_first' => '',
		'wpnt_bg_gradient_last' => '',
		'wpnt_bg_img'           => '',
		'wpnt_bg_repeat'        => 'no-repeat',
		'wpnt_position'         => 'fixed',
		'wpnt_locate'           => 'top',

		// animation
		'wpnt_close_check' => 'on',
		'wpnt_smooth'      => 'on',
		'wpnt_reopen'      => 'on',
		'wpnt_time_move'   => '0.5',
		// mailchimp
		'wpnt_mc_placeholder' => 'Enter your email',
		'wpnt_mc_button_text' => 'Subscribe',
		'wpnt_mc_success_message' => 'Thank you for your subscribe'
	);
}