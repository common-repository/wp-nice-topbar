<?php
/**
 * handle global settings and third parties source
 * 
 * @package wpnt
 * @since   1.0.4
 */

namespace WPNT\Core;

if (!defined('ABSPATH')) exit;
if (class_exists('PluginSettings')) return;

class PluginSettings
{
	/**
	 * @var string $name
	 */
	protected $name = 'wpntSettings';

	/**
	 * 
	 */
	public function __construct()
	{
		add_action('wp_head', array($this, 'addInlineStyle'));
	}

	/**
	 * get global settings
	 */
	public function getSettings()
	{
		return get_option($this->name);
	}

	/**
	 * 
	 */
	public function addInlineStyle()
	{
		?>
		<style><?php echo $this->getSettings()['wpnt_css']; ?></style>
		<?php
	}
}