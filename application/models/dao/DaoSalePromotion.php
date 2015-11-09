<?php
	
class DaoSalePromotion extends CI_Model{
	
	public function DaoSalePromotion(){
		parent::__construct();
		$this->load->model("dto/DtoSalePromotion");
	}
	
	public function addSalePromotion(DtoSalePromotion $v){
		$dto = array(
				"code" 					 => 		$v->getCode(),
				"name" 					 => 		$v->getName(),
				"description"			 => 		$v->getDescription(),
				"type"   				 =>			$v->getType(),
				"start_date"    		 => 		$v->getStart_date(),
				"end_date"      		 => 		$v->getEnd_date(),
				"created_by"    		 => 		$v->getCreated_by()
		);
		$this->db->set('created_date', 'NOW()', FALSE);
		$this->db->set('status', TRUE);
		$this->db->insert("SALE_PROMOTIONS",$dto);
		if($this->db->affected_rows()==1){
			return true;
		}else{
			return false;
		}
	}
	
	public function updateSalePromotion(DtoSalePromotion $v){
		$dto = array(
				"code" 					 => 		$v->getCode(),
				"name" 					 => 		$v->getName(),
				"description"			 => 		$v->getDescription(),
				"type"   				 =>			$v->getType(),
				"start_date"    		 => 		$v->getStart_date(),
				"end_date"      		 => 		$v->getEnd_date(),
				"updated_by"    		 => 		$v->getUpdated_by()
		);
		$this->db->set('updated_date', 'NOW()', FALSE);
		$this->db->set('status', TRUE);
		$this->db->where('id' , $v->getId());
		$this->db->update('SALE_PROMOTIONS' , $dto);
		if($this->db->affected_rows()==1){
			return true;
		}else{
			return false;
		}
	}
	
	public function listSalePromotion(){
		$this->db->select('id,code,name,description,type,start_date,end_date,created_date,created_by,updated_date,updated_by,status,deleted_at');
		$this->db->from('SALE_PROMOTIONS');
		$this->db->where('status' , 1);
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		return $query->result();
	}
	
	public function deleteSalePromotion($id){
		$this->db->set('status', FALSE);
		$this->db->set('deleted_at', 'NOW()', FALSE);
		$this->db->where('id' , $id);
		$this->db->update('SALE_PROMOTIONS');
	}
	
	public function getSalePromotion(){
		$this->db->select('id,name,code,description,type,start_date,end_date,created_date,created_by,updated_date,updated_by,status,deleted_at');
		$this->db->from('SALE_PROMOTIONS');
		$this->db->where('id',$id);
		$this->db->where('status' , 1);
		$query = $this->db->get();
		return $query->result();
	}
	
	function checkIfNameExist($name){
		$this->db->from('SALE_PROMOTIONS');
		$this->db->where('name', $name);
		return $this->db->count_all_results();
	}
	function checkIfCodeExist($code){
		$this->db->from('SALE_PROMOTIONS');
		$this->db->where('code', $code);
		return $this->db->count_all_results();
	}
	
}