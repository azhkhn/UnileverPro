<?php

class DaoGroup  extends CI_Model{
	
	public function DaoGroup(){
		parent::__construct();
		$this->load->model("dto/DtoGroup");
	}
	
	public function addGroup(DtoGroup $v){
		$dto = array(
				"name" 			         => 		$v->getName(),
				"description"	 	     => 		$v->getDescription()
		);
		$this->db->insert("groups",$dto);
		if($this->db->affected_rows()==1){
			return true;
		}else{
			return false;
		}
	}
	
	public function updateGroup(DtoGroup $v){
		$dto = array(
				"name" 			 		 => 		$v->getName(),
				"description"	 	     => 		$v->getDescription()
		);
		$this->db->where('id' , $v->getId());
		$this->db->update('groups' , $dto);
		if($this->db->affected_rows()==1){
			return true;
		}else{
			return false;
		}
	}
	
	public function listGroup(){
		$this->db->select('id ,name,description');
		$this->db->from('groups');
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		return $query->result();
	}
	
	
	public function getGroup($id){
		$this->db->select('id ,name,description');
		$this->db->from('groups');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row();
	}
	
	
}