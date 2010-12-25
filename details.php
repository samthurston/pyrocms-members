<?php defined('BASEPATH') or exit('No direct script access allowed');

class Module_Members extends Module {

	public $version = '0.4';

	public function info()
	{
		return array(
			'name' => array(
				'en' => 'Member Directory'
			),
			'description' => array(
				'en' => 'Manage a list of contacts or members',
				),
			'frontend' => TRUE,
			'backend' => TRUE,
			'menu' => "content"
		);
	}

	public function install()
	{
		// Your Install Logic
		$members = "
			CREATE TABLE `members` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `first_name` varchar(64) NOT NULL,
			  `last_name` varchar(64) NOT NULL,
			  `firm` varchar(64) NOT NULL,
			  `city` varchar(64) NOT NULL,
			  `state` varchar(2) NOT NULL,
			  `zip` varchar(10) NOT NULL,
			  `phone` varchar(12) NOT NULL,
			  `email` varchar(256) NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		";
		if($this->db->query($calendar))
			return TRUE;
	}

	public function uninstall()
	{
		$this->dbforge->drop_table('members');
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
