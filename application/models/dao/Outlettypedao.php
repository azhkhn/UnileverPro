<?php
	class OutletTypesDAO extends CI_Model{
		public function OutletTypesDAO(){
			parent::__construct();
			$this->load->model("dto/DtoOutletTypes");
		}

		public function addOutlettype(DtoOutletTypes $dto){
			$data = array(
								'name'				=> 	$dto->getName(),
								'description'		=>	$dto->getDescription(),
								'created_by'		=>	$dto->getCreated_by()
							);
			$this->db->set('created_date', 'NOW()', FALSE);
			$this->db->set('status', TRUE);
			return $this->db->insert('outlet_types', $data);
		}
		
		public function updateOutlettype(DtoOutletTypes $dto){
			$data = array(
							'name'				=> 	$dto->getName(),
							'description'		=>	$dto->getDescription(),
							"updated_by"		=>	$dto->getUpdated_by()
			);
			$this->db->set('updated_date', 'NOW()', FALSE);
			$this->db->set('status', TRUE);
			$this->db->where('id', $dto->getId());
			return $this->db->update('outlet_types', $data);
		}
		public function deleteOutlettype($id){
			$this->db->set('status', FALSE);
			$this->db->set('deleted_at', 'NOW()', FALSE);
			$this->db->where('id', $id);
			return $this->db->update('outlet_types');
		}
		
		public function getOutlettype($id){
			$this->db->select('id,name,description, created_date, created_by, updated_date, updated_by, status, deleted_at');
			$this->db->from('outlet_types');
			$this->db->where('id', $id);
			$this->db->limit(1);
			$query = $this->db->get();
			return $query->result();
		}
		
		public function listOutlettypes(){
			$this->db->select('id,name,description, created_date, created_by, updated_date, updated_by, status, deleted_at');
			$this->db->from('outlet_types');
			$this->db->order_by("id", "desc");
			$query = $this->db->get();
			return $query->result();
		}
	
	}

?>