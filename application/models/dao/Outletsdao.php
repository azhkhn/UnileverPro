<?php

	class OutletsDAO extends CI_Model{

		public function OutletsDAO(){
			parent::__construct();
			$this->load->model("dto/DtoOutlets");
		}

		public function addOutlet(DtoOutlets $dto){
			$outlet = array(
								'dms_code' 			=>  $dto->getDms_code(),
								'distributor'		=>	$dto->getDistributor(),
								'channel_id'		=>	$dto->getChannel_id(),
								'outlet_type_id'	=>	$dto->getOutlet_type_id(),
								'name'				=> 	$dto->getName(),
								'address'			=>	$dto->getAddress(),
								'ba_id'				=> 	$dto->getBa_id(),
								'created_by'		=>	$dto->getCreated_by()
							);
			$this->db->set('created_date', 'NOW()', FALSE);
			$this->db->set('status', TRUE);
			return $this->db->insert('outlets', $outlet);
		}
		
		public function updateOutlet(DtoOutlets $dto){
			$outlet = array(
							"dms_code"		=>	$dto->getDms_code(),
							"distributor"	=>	$dto->getDistributor(),
							"channel_id"	=>	$dto->getChannel_id(),
							"outlet_type_id" =>	$dto->getOutlet_type_id(),
							"name"			=>	$dto->getName(),
							"address"		=> 	$dto->getAddress(),
							"ba_id"			=>	$dto->getBa_id(),
							"updated_by"	=>	$dto->getUpdated_by()
			);
			$this->db->set('updated_date', 'NOW()', FALSE);
			$this->db->set('status', TRUE);
			$this->db->where('id', $dto->getId());
			return $this->db->update('outlets', $outlet);
		}
		public function deleteOutlet($id){
			$this->db->set('status', FALSE);
			$this->db->set('deleted_at', 'NOW()', FALSE);
			$this->db->where('id', $id);
			return $this->db->update('outlets');
		}
		
		public function getOutlets($id){
			$this->db->select('id, dms_code, distributor, channel_id, outlet_type_id, name, address, ba_id, created_date, created_by, updated_date, updated_by, status, deleted_at');
			$this->db->from('outlets');
			$this->db->where('id', $id);
			$this->db->limit(1);
			$query = $this->db->get();
			return $query->result();
		}
		
		public function listOutlets(){
			$this->db->select('id, dms_code, distributor, channel_id, outlet_type_id, name, address, ba_id, created_date, created_by, updated_date, updated_by, status, deleted_at');
			$this->db->from('outlets');
			$this->db->order_by("id", "desc");
			$query = $this->db->get();
			return $query->result();
		}

		public function listdistributors(){
			$this->db->select('id, name');
			$this->db->from('distributors');
			$this->db->order_by("id", "desc");
			$query = $this->db->get();
			return $query->result();
		}

		public function listchannels(){
			$this->db->select('id, name');
			$this->db->from('channels');
			$this->db->order_by("id", "desc");
			$query = $this->db->get();
			return $query->result();
		}

		public function listoutlettypes(){
			$this->db->select('id, name');
			$this->db->from('outlet_types');
			$this->db->order_by("id", "desc");
			$query = $this->db->get();
			return $query->result();
		}
		
		public function listbas(){
			$this->db->select('g.user_id as ba_id, u.first_name');
			$this->db->from('users_groups g');
			$this->db->join('users u','g.user_id = u.id', 'LEFT');
			$this->db->where('g.group_id' , 3);
			$this->db->order_by("g.user_id", "desc");
			$query = $this->db->get();
			return $query->result();
			
		}
		
		
	}
?>