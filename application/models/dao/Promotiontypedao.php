<?php 
	
	class Promotiontypedao extends CI_Model{
		public function Promotiontypedao(){
			parent::__construct();
			$this->load->model("dto/Dtopromotiontype");
		}

		public function addPromotiontype(Dtopromotiontype $dto){
			$data = array(
								'code'				=>	$dto->getCode(),
								'name'				=> 	$dto->getName(),
								'size'				=>	$dto->getSize(),
								'sale_promotion_id'=> $dto->getSalePromotion(),
								'created_by'		=>	$dto->getCreated_by()
							);
			$this->db->set('created_date', 'NOW()', FALSE);
			$this->db->set('status', TRUE);
			return $this->db->insert('promotion_types', $data);
		}
		
		public function updatePromotiontype(Dtopromotiontype $dto){
			$data = array(
							'code'				=>	$dto->getCode(),
							'name'				=> 	$dto->getName(),
							'size'				=>	$dto->getSize(),
							'sale_promotion_id'=> $dto->getSalePromotion(),
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
			$this->db->select('id, code, name ,size ,sale_promotion_id, created_date, created_by, updated_date, updated_by, status, deleted_at');
			$this->db->from('promotion_types');
			$this->db->where('id', $id);
			$this->db->limit(1);
			$query = $this->db->get();
			return $query->row();
		}
		
		public function listPromotiontypes(){
			$this->db->select("A.id, A.code, A.name ,A.size , B.name AS sale_promotion, A.created_date, A.sale_promotion_id, CONCAT(C.last_name,' ',C.first_name) AS created_by, A.updated_date, A.updated_by, A.status, A.deleted_at", FALSE);
			$this->db->from('promotion_types A');
			$this->db->join('sale_promotions B', 'A.sale_promotion_id = B.id AND B.status=1','LEFT');
			$this->db->join('users C', 'A.created_by = C.id');
			$this->db->where('A.status', TRUE);
			$this->db->order_by("id", "desc");
			$query = $this->db->get();
			return $query->result();
		}

	}


?>