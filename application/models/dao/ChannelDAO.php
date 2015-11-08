<?php
	class ChannelDAO extends CI_Model{
		public function ChannelDAO(){
			parent::__construct();
			$this->load->model("dto/DtoChannels");
		}

		public function addChannel(DtoChannels $dto){
			$data = array(
								'name'				=> 	$dto->getName(),
								'description'		=>	$dto->getDescription(),
								'created_by'		=>	$dto->getCreated_by()
							);
			$this->db->set('created_date', 'NOW()', FALSE);
			$this->db->set('status', TRUE);
			return $this->db->insert('channels', $data);
		}
		
		public function updateChannel(DtoChannels $dto){
			$data = array(
							'name'				=> 	$dto->getName(),
							'description'		=>	$dto->getDescription(),
							"updated_by"		=>	$dto->getUpdated_by()
			);
			$this->db->set('updated_date', 'NOW()', FALSE);
			$this->db->set('status', TRUE);
			$this->db->where('id', $dto->getId());
			return $this->db->update('channels', $data);
		}
		public function deleteChannel($id){
			$this->db->set('status', FALSE);
			$this->db->set('deleted_at', 'NOW()', FALSE);
			$this->db->where('id', $id);
			return $this->db->update('channels');
		}
		
		public function getChannel($id){
			$this->db->select('id,name,description, created_date, created_by, updated_date, updated_by, status, deleted_at');
			$this->db->from('channels');
			$this->db->where('id', $id);
			$this->db->limit(1);
			$query = $this->db->get();
			return $query->result();
		}
		
		public function listChannels(){
			$this->db->select('id,name,description, created_date, created_by, updated_date, updated_by, status, deleted_at');
			$this->db->from('channels');
			$this->db->order_by("id", "desc");
			$query = $this->db->get();
			return $query->result();
		}

	}
?>
