<?php defined('BASEPATH') or exit('No direct script access allowed');

class Module_Eventcal extends Module {

	public $version = '0.1';

	public function info()
	{
		return array(
			'name' => array(
				'en' => 'Event Calendar'
			
			),
			'description' => array(
				'en' => 'Post and organize events',
				),
			'frontend' => TRUE,
			'backend' => TRUE,
			'menu' => "content"
		);
	}

	public function install()
	{
		// Your Install Logic
		$calendar = "
			CREATE TABLE `calendar` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `slug` varchar(64) NOT NULL,
			  `start` datetime NOT NULL,
			  `end` datetime NOT NULL,
			  `location` varchar(255) NOT NULL,
			  `details` text NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		";
		if($this->db->query($calendar))
			return TRUE;
	}

	public function uninstall()
	{
		$this->dbforge->drop_table('calendar');
		return TRUE;
	}

	public function upgrade($old_version)
	{
		// Your Upgrade Logic
		return TRUE;
	}

	public function help()
	{
		// Return a string containing help info
		// You could include a file and return it here.
		return "No documentation has been added for this module.<br/>Contact the module developer for assistance.";
	}
}
/* End of file details.php */
