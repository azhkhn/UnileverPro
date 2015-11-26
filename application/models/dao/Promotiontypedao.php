<?php 
	
	class PromotionTypeDAO extends CI_Model{
		public function PromotionTypeDAO(){
			parent::__construct();
			$this->load->model("dto/DtoPromotionType");
		}

		public function addPromotiontype(DtoPromotionType $dto){
			$data = array(
								'code'				=>	$dto->getCode(),
								'name'				=> 	$dto->getName(),
								'size'				=>	$dto->getSize(),
								'created_by'		=>	$dto->getCreated_by()
							);
			$this->db->set('created_date', 'NOW()', FALSE);
			$this->db->set('status', TRUE);
			return $this->db->insert('promotion_types', $data);
		}
		
		public function updatePromotiontype(DtoPromotionType $dto){
			$data = array(
							'code'				=>	$dto->getCode(),
							'name'				=> 	$dto->getName(),
							'size'				=>	$dto->getSize(),
							"updated_by"		=>	$dto->getUpdated_by()
			);
			$this->db->set('updated_date', 'NOW()', FALSE);
			$this->db->set('status', TRUE);
			$this->db->where('id', $dto->getId());
			return $this->db->update('promotion_types', $data);
		}
		public function deletePromotiontype($id){
			$this->db->set('status', FALSE);
			$this->db->set('deleted_at', 'NOW()', FALSE);
			$this->db->where('id', $id);
			return $this->db->update('promotion_types');
		}
		
		public function getPromotiontype($id){
			$this->db->select('id, code, name ,size , created_date, created_by, updated_date, updated_by, status, deleted_at');
			$this->db->from('promotion_types');
			$this->db->where('id', $id);
			$this->db->limit(1);
			$query = $this->db->get();
			return $query->result();
		}
		
		public function listPromotiontypes(){
			$this->db->select('id, code, name ,size , created_date, created_by, updated_date, updated_by, status, deleted_at');
			$this->db->from('promotion_types');
			$this->db->order_by("id", "desc");
			$query = $this->db->get();
			return $query->result();
		}

	}


?>