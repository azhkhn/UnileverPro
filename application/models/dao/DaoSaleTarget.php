<?php

class DaoSaleTarget  extends CI_Model{
	
	public function DaoSaleTarget(){
		parent::__construct();
		$this->load->model("dto/DtoSaleTarget");
	}
	
	public function addSaleTarget(DtoSaleTarget $v){
		$dto = array(
				"name" 					 => 		$v->getName(),
				"description"			 => 		$v->getDescription(),
				"ba_id"   				 =>			$v->getBa_id(),
				"start_date"    		 => 		$v->getStart_date(),
				"end_date"      		 => 		$v->getEnd_date(),
				"target_achievement"     => 		$v->getTarget_achievement(),
				"created_by"    		 => 		$v->getCreated_by()
		);
		$this->db->set('created_date', 'NOW()', FALSE);
		$this->db->set('status', TRUE);
		$this->db->insert("sale_targets",$dto);
		if($this->db->affected_rows()==1){
			return true;
		}else{
			return false;
		}
	}
	
	public function updateSaleTarget(DtoSaleTarget $v){
		$dto = array(
				"name" 					 => 		$v->getName(),
				"description"			 => 		$v->getDescription(),
				"ba_id"   				 =>			$v->getBa_id(),
				"start_date"    		 => 		$v->getStart_date(),
				"end_date"      		 => 		$v->getEnd_date(),
				"target_achievement"     => 		$v->getTarget_achievement(),
				"updated_by"    		 => 		$v->getUpdated_by()
		);
		$this->db->set('updated_date', 'NOW()', FALSE);
		$this->db->set('status', TRUE);
		$this->db->where('id' , $v->getId());
		$this->db->update('sale_targets' , $dto);
		if($this->db->affected_rows()==1){
			return true;
		}else{
			return false;
		}
	}
	
	public function listSaleTarget(){
		$this->db->select('s.id,s.name,s.description,b.first_name as ba_id,s.start_date,s.end_date,s.target_achievement,s.created_date,s.created_by,s.updated_date,s.updated_by,s.status,s.deleted_at');
		$this->db->from('sale_targets s');
		$this->db->join('users b','s.ba_id = b.id', 'LEFT');
		$this->db->where('s.status' , 1);
		$this->db->order_by("s.id", "desc");
		$query = $this->db->get();
		return $query->result();
	}
	
	public function deleteSaleTarget($id,$updated_by){
		$this->db->set('updated_by', $updated_by);
		$this->db->set('status', FALSE);
		$this->db->set('deleted_at', 'NOW()', FALSE);
		$this->db->where('id' , $id);
		$this->db->update('sale_targets');
	}
	
	public function getSaleTarget($id){
		$this->db->select('id,name,description,ba_id,start_date,end_date,target_achievement,created_date,created_by,updated_date,updated_by,status,deleted_at');
		$this->db->from('sale_targets');
		$this->db->where('id',$id);
		$this->db->where('status' , 1);
		$query = $this->db->get();
		return $query->row();
	}
	
	function checkIfNameExist($name){
		$this->db->from('sale_targets');
		$this->db->where('name', $name);
		return $this->db->count_all_results();
	}
	
	
}