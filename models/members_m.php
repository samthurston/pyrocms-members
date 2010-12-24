<?php defined('BASEPATH') or exit('No direct script access allowed');

class Members_m extends MY_Model {

	function count()
	{
		return $this->db->count_all('members');
	}
	
	function getMembers($params = array())
	{
		if(isset($params['limit'])){
			$lim = $params['limit'][0];
			$off = $params['limit'][1];
		
		}
		unset($params['limit']);
		$this->db->order_by('last_name ASC');
		$this->db->limit($lim,$off);
		$rs = $this->db->get('members');
		
		return $rs->result();
		
	}
	
	function addMember($params)
	{
		if ($this->db->insert('members',$params)){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}
	
	function updateMember($id,$params)
	{
		$this->db->where('id',$id);
		if ($this->db->update('members',$params)){
			return true;
		}else{
			return false;
		}
	}
	
	function getMember($id){
		$this->db->where('id',$id);
		if($result = $this->db->get('members')){
			return $result->row();
		}else{
			return false;
		}
	
	
	}
	
	function deleteMember($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('members');
	}
}

