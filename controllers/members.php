<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Atrius - a fork of PyroCMS
 *
 * An open source CMS based on CodeIgniter
 *
 * @package		Atrius
 * @author		Samuel Thurston @ circul8tion
 * @license		Apache License v2.0
 * @link		http://circul8tion.com
 * @since		Version 1.0.1
 * @filesource
 */

class Members extends Public_Controller
{

	function __construct()
	{
		parent::Public_Controller();
		$this->load->model('members_m');
		$this->lang->load('members');
		// set some language strings?
		
	}

	function index()
	{
		$count = $this->members_m->count();
		$this->pagination = create_pagination('members/index',$count,NULL,3);
		$members = array();
		$members = $this->members_m->getMembers(array('limit'=>$this->pagination['limit']));
		
		$this->template
			->set('members', $members)
			->set('pagination',$this->pagination)
			->build('index');
	}


}

/* End of file members.php */
