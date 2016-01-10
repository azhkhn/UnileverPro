<?php
	
class DaoSalePromotion extends CI_Model{
	
	public function DaoSalePromotion(){
		parent::__construct();
		$this->load->model("dto/Dtosalepromotion");
	}
	
	public function addSalePromotion(DtoSalePromotion $v){
		$dto = array(
				"code" 					 => 		$v->getCode(),
				"name" 					 => 		$v->getName(),
				"description"			 => 		$v->getDescription(),
				//"type"   				 =>			$v->getType(),
				"start_date"    		 => 		$v->getStart_date(),
				"end_date"      		 => 		$v->getEnd_date(),
				"created_by"    		 => 		$v->getCreated_by()
		);
		$this->db->set('created_date', 'NOW()', FALSE);
		$this->db->set('status', TRUE);
		$this->db->insert("sale_promotions",$dto);
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
				//"type"   				 =>			$v->getType(),
				"start_date"    		 => 		$v->getStart_date(),
				"end_date"      		 => 		$v->getEnd_date(),
				"updated_by"    		 => 		$v->getUpdated_by()
		);
		$this->db->set('updated_date', 'NOW()', FALSE);
		$this->db->set('status', TRUE);
		$this->db->where('id' , $v->getId());
		$this->db->update('sale_promotions' , $dto);
		if($this->db->affected_rows()==1){
			return true;
		}else{
			return false;
		}
	}
	
	public function listSalePromotion(){
		$this->db->select('s.id,s.code,s.name,s.description,p.name as type,s.start_date,s.end_date,s.created_date,s.created_by,s.updated_date,s.updated_by,s.status,s.deleted_at');
		$this->db->from('sale_promotions s');
		$this->db->join('promotion_types p','p.id = s.type', 'LEFT');
		$this->db->where('s.status' , 1);
		$this->db->order_by("s.id", "desc");
		$query = $this->db->get();
		return $query->result();
	}
	
	public function deleteSalePromotion($id ,$updated_by){
		$this->db->set('updated_by', $updated_by);
		$this->db->set('status', FALSE);
		$this->db->set('deleted_at', 'NOW()', FALSE);
		$this->db->where('id' , $id);
		$this->db->update('sale_promotions');
	}
	
	public function getSalePromotion($id){
		$this->db->select('id,name,code,description,type,start_date,end_date,created_date,created_by,updated_date,updated_by,status,deleted_at');
		$this->db->from('sale_promotions');
		$this->db->where('id',$id);
		$this->db->where('status' , 1);
		$query = $this->db->get();
		return $query->row();
	}
	
	function checkIfNameExist($name){
		$this->db->from('sale_promotions');
		$this->db->where('name', $name);
		return $this->db->count_all_results();
	}
	function checkIfCodeExist($code){
		$this->db->from('sale_promotions');
		$this->db->where('code', $code);
		return $this->db->count_all_results();
	}
	
}