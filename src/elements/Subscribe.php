<?php
/**
 * create subscribe form
 * 
 * @package wpnt
 * @since   1.0.4 
 */

namespace WPNT\Elements;

use WPNT\Core\Mailchimp;

class Subscribe
{
	/**
	 * @var string $name
	 */
	protected $name = 'mailchimp';

	/**
	 * @var \WPNT\Core\Topbar $topbar
	 */
	protected $topbar;

	/**
	 * @var
	 */
	protected $master;

	/**
	 * Initialize
	 * 
	 * @param  WPNT\Core\Topbar
	 * @return void
	 */
	public function __construct($master, \WPNT\Core\Topbar $topbar)
	{
		$this->master = $master;
		$this->topbar = $topbar;
		add_shortcode($this->name, array($this, 'callback'));
	}

	/**
	 * shortcode callback
	 * 
	 * @param  array $atts
	 * @return void
	 */
	public function callback($atts)
	{
		ob_start();
		$settings = $this->topbar->getSettings();
		$mailchimp = new Mailchimp(wpntGetPluginSettings()['wpnt_mailchimp_api']);
		if (is_object($mailchimp)) {
			$list = $mailchimp->getList();
			$user = $mailchimp->getUser();
			//var_dump($user);
		}
		$listId = @wpntGetPluginSettings()['wpnt_mailchimp_list'];
		?>
			<form class="wpnt-subscribe-form" action="<?php echo @$this->formAction($list['subscribe_url_long']); ?>" method="GET">
				<input type="hidden" name="wpnt-success-message" value="<?php _e($settings['wpnt_mc_success_message'], WPNT_TEXTDOMAIN); ?>">
				<input type="hidden" name="u" value="<?php echo @$user['dc_unique_id']; ?>">
				<input type="hidden" name="id" value="<?php echo @$listId; ?>">
				<input type="email" autocapitalize="off" autocorrect="off" name="MERGE0" id="MERGE0" size="25" value="" placeholder="<?php _e($settings['wpnt_mc_placeholder']); ?>">
				<input type="hidden" name="b_<?php echo @$user['dc_unique_id']; ?>_<?php echo @$listId; ?>" tabindex="-1" value="">
				<button type="submit" class="wpnt-btn btn-subscribe" name="submit">
					<span><?php _e($settings['wpnt_mc_button_text'], WPNT_TEXTDOMAIN); ?></span>
					<img id="processing_img" src="<?php echo WPNT_PLUGIN_URL . 'assets/images/loading.gif'; ?>" alt="" />
				</button>
			</form>
			<span class="wpnt-notification"></span>
		<?php

		return ob_get_clean();
	}

	/**
	 * make ajax url
	 * 
	 * @param  string $url
	 * @return string
	 */
	public function formAction($url)
	{
		$path = explode('?', $url);
		$actionUrl = $path[0] . '/post-json?' . $path[1] . '&c=?';
		return $actionUrl;
	}

}