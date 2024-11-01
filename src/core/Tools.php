<?php
/**
 * Tool for exporting, importing
 * 
 * @since   1.3.0
 * @package wpnt
 * @author  Duy Nguyen <duyngha@gmail.com>
 */

namespace WPNT\Core;

class Tools
{
	/**
	 * initialize
	 * 
	 * @since  1.3.0
	 * @return void
	 */
	public function __construct()
	{
		$this->generate();
	}

	/**
	 * generate export/import progess
	 * 
	 * @since  1.3.0
	 * @return void
	 */
	private function generate()
	{
		if (
			isset($_POST['_wpntnonce']) 
			&& wp_verify_nonce($_POST['_wpntnonce'], 'wpnt_tools') 
			&& check_admin_referer('wpnt_tools', '_wpntnonce')
		) {
			if (isset($_POST['wpnt-export'])) {
				$this->export();
			}

			if (isset($_POST['wpnt-import'])) {
				$this->import();
			}
		}
	}

	/**
	 * export the top bar
	 * 
	 * @since  1.3.0
	 * @return void
	 */
	private function export()
	{
		ob_start();

		$fileName = 'wpnt-export-' . date('Y-m-d:H-s') . '.json';

		header( "Content-Description: File Transfer" );
		header( "Content-Disposition: attachment; filename={$fileName}" );
		header( "Content-Type: application/json; charset=utf-8" );
		
		echo json_encode($this->getTopbar(), JSON_PRETTY_PRINT);

		die;
	}

	/**
	 * import the top bar
	 * 
	 * @since  1.3.0
	 * @return 
	 */
	private function import()
	{
		if ($_FILES['wpnt-import-file']['tmp_name'] == '') {
			wp_die(__('Error uploading file. Please try again.', WPNT_TEXTDOMAIN));
		}

		$file = $_FILES['wpnt-import-file'];

		if (pathinfo($file['name'], PATHINFO_EXTENSION) !== 'json') {
			wp_die(__('Incorrect file type', WPNT_TEXTDOMAIN));
		}

		$json = file_get_contents($file['tmp_name']);

		if ($json == '') {
			wp_die(__('Import file empty', WPNT_TEXTDOMAIN));
		}

		$data = json_decode($json, true);

		update_option($data['wpnt_topbar_name'], $data);
	}

	/**
	 * get top bar
	 * 
	 * @since  1.3.0
	 * @return array $topbar
	 */
	private function getTopbar()
	{
		return get_option($_POST['list-topbar']);
	}
}