<?php

class BrandDao extends CI_Model{
	
	
	public function BrandDao(){
		parent::__construct();
		$this->load->model("BrandDto");
	}
	
	public function addBrand(BrandDto $b){
		$brand = array(
				"name" 			 => 		$b->getName(),
				"description"	 => 		$b->getDescription(),
				"parent_brand"   =>			$b->getParent_brand(),
				"created_by"     => 		$b->getCreated_by()
		);
		$this->db->set('created_date', 'NOW()', FALSE);
		$this->db->set('status', TRUE);
		$this->db->insert("BRANDS",$brand);
		if($this->db->affected_rows()==1){
			return true;
		}else{
			return false;
		}
	}
	
	public function updateBrand(BrandDto $b){
		$data = array(
				"name" 			 => 		$b->getName(),
				"description"	 => 		$b->getDescription(),
				"parent_brand"   =>			$b->getParent_brand(),
				"updated_by"     => 		$b->getUpdated_by()
		);
		$this->db->set('updated_date', 'NOW()', FALSE);
		$this->db->set('status', TRUE);
		$this->db->where('id' , $p->getId());
		$this->db->update('BRANDS' , $data);
	}
	
	public function listBrand(){
		$this->db->select('id ,name,description,parent_brand,created_date,created_by,updated_date,updated_by,status,deleted_at');
		$this->db->from('BRANDS');
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		return $query->result();
	}
	
	public function deleteBrand($id){
		$this->db->set('status', FALSE);
		$this->db->set('deleted_at', 'NOW()', FALSE);
		$this->db->where('id' , $id);
		$this->db->update('BRANDS');
	}
	
	public function getBrand($id){
		$this->db->select('id ,name,description,parent_brand,created_date,created_by,updated_date,updated_by,status,deleted_at');
		$this->db->from('BRANDS');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->result();
	}
	
}
	