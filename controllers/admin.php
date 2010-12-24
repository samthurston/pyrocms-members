<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Members module
 *
 * @author Samuel Thurston - circul8tion
 * @package Atrius
 * @subpackage Members Module
 * @category Modules
 */
class Admin extends Admin_Controller
{
	/**
	 * Validation rules
	 *
	 * @var array
	 */
	private $validation_rules = array();
	
	/**
	 * Constructor method
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		parent::Admin_Controller();        
		$this->load->model('members_m');
		$this->lang->load('members');        
	
		// Load and set the validation rules
		$this->load->library('form_validation');
		
		$this->validation_rules = array(
			array(
				'field' => 'first_name',
				'label' => lang('members_first_name'),
				'rules'	=> 'trim|required'
			),
			array(
				'field' => 'last_name',
				'label' => lang('members_last_name'),
				'rules'	=> 'trim|required'
			),
			array(
				'field' => 'firm',
				'label' => lang('members_firm'),
				'rules'	=> 'trim'
			),
			array(
				'field' => 'address',
				'label' => lang('members_address'),
				'rules'	=> 'trim'
			),
			array(
				'field' => 'city',
				'label' => lang('members_city'),
				'rules'	=> 'trim'
			),
			array(
				'field' => 'state',
				'label' => lang('members_state'),
				'rules'	=> 'trim'
			),
			array(
				'field' => 'zip',
				'label' => lang('members_postal'),
				'rules'	=> 'trim'
			),
			array(
				'field' => 'phone',
				'label' => lang('members_phone'),
				'rules'	=> 'trim'
			),
			array(
				'field' => 'email',
				'label' => lang('members_email'),
				'rules'	=> 'trim|valid_email'
			),
		);
		$this->form_validation->set_rules($this->validation_rules);
		
		$this->template->set_partial('shortcuts', 'admin/partials/shortcuts');
	}
	
	// Admin: Show Members
	function index()
	{	
		// Create pagination links
		$total_rows = $this->members_m->count();
		$this->data->pagination = create_pagination('admin/members/index', $total_rows);
		
		// Using this data, get the relevant results
		$this->data->members = $this->members_m->getMembers(array(
			'order'=>'first_name ASC',
			'limit' => $this->data->pagination['limit']
		));		
		
		// Render the view
		$this->template
			->title($this->module_details['name'])
			->build('admin/index', $this->data);
	}
	
	//Admin: edit a member	
	
	function edit($id = 0)
	{
		// if the id is not set in the url try the hidden field
		if (!$id){
			$id = $this->input->post('id');
		}
		// if it's still not set we have a problem
		if(!$id){
			$this->session->set_flashdata('error',"Members ID ERROR");
			redirect('admin/members');
		}
	
		$this->data->method = 'edit/'.$id;
		
		// load the member data 
		$member = $this->members_m->getMember($id);	
		
		// run the validation
		if($this->form_validation->run()){
			// pull the field values through input filter
			foreach($this->validation_rules as $rule)
			{
				$member->{$rule['field']} = $this->input->post($rule['field']);
			}
			$this->data->member = $member;
			// update the record
			if ($this->members_m->update($id,$member)){
				$this->session->set_flashdata('success',"Successfully updated member ".$id);
			}else{
				$this->session->set_flashdata('error',"There was a problem updating ".$id);
			}
			
		}else{
			$this->data->member = $this->members_m->getMember($id);	
		}
		
		$this->template->build('admin/form', $this->data);
	}
	
	// Admin: Create a new member
	function add()
	{
		$this->data->method = 'add';
		// Loop through each rule
		foreach($this->validation_rules as $rule)
		{
			$member->{$rule['field']} = $this->input->post($rule['field']);
		}
		
	
		if ($this->form_validation->run())
		{
		
			if ($this->members_m->addMember($member))
			{
				$this->session->set_flashdata('success', sprintf(lang('member_add_success'), $this->input->post('title'))); 
				redirect('admin/members/index');
			}            
			else
			{
				$this->session->set_flashdata(array('error'=> lang('member_add_error')));
			}
			
		}
		
		$member->id = '';
		
		$this->data->member =& $member;
		

		$this->template->build('admin/form', $this->data);
	}
	
	function action()
	{
		$ids = $this->input->post('action_to');
		$total = count($ids);
		$success_count = 0;
		
		foreach ($ids as $id){
			if($this->members_m->delete($id)){
				$success_count += 1;
			}
		}
		
		if ($success_count == $total){
			$this->session->set_flashdata(array('success'=> $success_count.' '.lang('members_delete_mult_success')));
		}else{
			$this->session->set_flashdata(array('error'=> $succes_count.' '.lang('members_delete_mult_error')));
		}
		
		redirect('admin/members');
		
	}
	
	function delete($id = 0)
	{
		if($this->members_m->delete($id)){
			$this->session->set_flashdata(array('success'=>$id.' '.lang('members_delete_success')));
		}else{
			$this->session->set_flashdata(array('error'=>$id.' '.lang('members_delete_error')));
		}
		
		redirect('admin/members');
	}
	

	
}
?>
