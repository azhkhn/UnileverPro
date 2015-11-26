<?php

class DaoBrand extends CI_Model{
	
	
	public function DaoBrand(){
		parent::__construct();
		$this->load->model("dto/Dtobrand");
	}
	
	public function addBrand(DtoBrand $b){
		$brand = array(
				"name" 			 => 		$b->getName(),
				"description"	 => 		$b->getDescription(),
				"parent_brand"   =>			$b->getParent_brand(),
				"created_by"     => 		$b->getCreated_by()
		);
		$this->db->set('created_date', 'NOW()', FALSE);
		$this->db->set('status', TRUE);
		$this->db->insert("brands",$brand);
		if($this->db->affected_rows()==1){
			return true;
		}else{
			return false;
		}
	}
	
	public function updateBrand(DtoBrand $b){
		$data = array(
				"name" 			 => 		$b->getName(),
				"description"	 => 		$b->getDescription(),
				"parent_brand"   =>			$b->getParent_brand(),
				"updated_by"     => 		$b->getUpdated_by()
		);
		$this->db->set('updated_date', 'NOW()', FALSE);
		$this->db->set('status', TRUE);
		$this->db->where('id' , $b->getId());
		$this->db->update('brands' , $data);
	}
	
	public function listBrand(){
		$this->db->select('b.id ,b.name,b.description,bb.name as parent_brand,b.created_date,b.created_by,b.updated_date,b.updated_by,b.status,b.deleted_at');
		$this->db->from('brands b');
		$this->db->join('brands bb','b.parent_brand = bb.id', 'LEFT');
		$this->db->where('b.status' , 1);
		$this->db->order_by("b.id", "desc");
		$query = $this->db->get();
		return $query->result();
	}
	
	public function deleteBrand($id , $updated_by){
		$this->db->set('updated_by', $updated_by);
		$this->db->set('status', FALSE);
		$this->db->set('deleted_at', 'NOW()', FALSE);
		$this->db->where('id' , $id);
		$this->db->update('brands');
	}
	
	public function getBrand($id){
		$this->db->select('id ,name,description,parent_brand,created_date,created_by,updated_date,updated_by,status,deleted_at');
		$this->db->from('brands');
		$this->db->where('id',$id);
		$this->db->where('status' , 1);
		$query = $this->db->get();
		return $query->row();
		
	}
	
	function checkIfBrandExist($brand){
		$this->db->from('brands');
		$this->db->where('name', $brand);
		return $this->db->count_all_results();
	}
	
}
	