<?php
/**
 * mailchimp
 * 
 * @since 1.1.0
 */

namespace WPNT\Core;

if (!defined('ABSPATH')) exit;

if (class_exists('Mailchimp')) return;

class Mailchimp
{
	/**
	 * @var string $name
	 */
	protected $name = 'wpntSettings';

	protected $keyName = 'wpnt_mailchimp_api';

	protected $key;

	/**
	 * itilialize
	 */
	public function __construct($key)
	{
		$this->key = $key;
	}

	/**
	 * get settings
	 */
	public function getSettings()
	{
		return get_option($this->name);
	}

	/**
	 * set api key
	 */
	public function setKey($key)
	{
		$this->key = $key;
	}

	/**
	 * get mailchimp api key
	 * 
	 */
	public function getKey()
	{
		return $this->key;
	}

	/**
	 * validate the api key
	 */
	public function validateKey()
	{
		try {
			$this->getMailchimp()->call('helper/ping', []);
			return $this->getMailchimp();
		} catch (\Mailchimp_Invalid_ApiKey $e) {
			return $e->getMessage();
		}
	}

	/**
	 * get mailchimp
	 */
	public function getMailchimp()
	{
		return new \Mailchimp($this->key);
	}

	/**
	 * get list id
	 */
	public function getListId()
	{
		return @$this->getSettings()['wpnt_mailchimp_list'];
	}

	/**
	 * get single list
	 */
	public function getList()
	{
		if (is_object($this->validateKey())) {
			$list = @$this->validateKey()->lists->getList(array('list_id' => $this->getListId()))['data'][0];
			return $list;
		} else {
			return $this->validateKey();
		}
	}

	/**
	 * get lists
	 */
	public function getLists()
	{
		if (is_object($this->validateKey())) {
			$list = $this->validateKey()->lists->getList();
			return $list;
		} else {
			return $this->validateKey();
		}
	}

	/**
	 * get user info
	 */
	public function getUser()
	{
		if (is_object($this->validateKey())) {
			$list = $this->validateKey()->users->profile();
			return $list;
		} else {
			return $this->validateKey();
		}
	}
}