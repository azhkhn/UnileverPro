<?php

	class Outletsdao extends CI_Model{

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
			$this->db->select("A.outlet_type_id, A.id, A.dms_code, A.name AS outlet_name, B.name AS distributor, C.name AS channel, D.name AS customer_type, A.address AS outlet_address, CONCAT(E.last_name, ' ', E.first_name) AS ba_name, A.created_date, A.status", FALSE);
			$this->db->from("outlets A");
			$this->db->join("distributors B", "A.distributor = B.id", "LEFT");
			$this->db->join("channels C", "A.channel_id = C.id", "LEFT");
			$this->db->join("outlet_types D", "A.outlet_type_id = D.id", "LEFT");
			$this->db->join("users E", "A.ba_id = E.id", "LEFT");
			$this->db->order_by("A.id", "desc");
			$query = $this->db->get();
			return $query->result();
		}

		public function listdistributors(){
			$this->db->select('id, name');
			$this->db->from('distributors');
			$this->db->where("status", 1);
			$this->db->order_by("id", "desc");
			$query = $this->db->get();
			return $query->result();
		}

		public function listchannels(){
			$this->db->select('id, name');
			$this->db->from('channels');
			$this->db->where("status", 1);
			$this->db->order_by("id", "desc");
			$query = $this->db->get();
			return $query->result();
		}

		public function listoutlettypes(){
			$this->db->select('id, name');
			$this->db->from('outlet_types');
			$this->db->where("status", 1);
			$this->db->order_by("id", "desc");
			$query = $this->db->get();
			return $query->result();
		}
		
		public function listbas(){
			$this->db->select("g.user_id as ba_id, CONCAT(u.last_name, ' ', u.first_name) AS name", FALSE);
			$this->db->from('users_groups g');
			$this->db->join('users u','g.user_id = u.id', 'LEFT');
			$this->db->where('g.group_id' , 3);
			$this->db->where('u.active' , 1);
			$this->db->order_by("g.user_id", "desc");
			$query = $this->db->get();
			return $query->result();
			
		}

		public function getAllOutletsByBA($id){
			$this->db->select("A.id, A.dms_code, A.name AS outlet_name, B.name AS distributor, C.name AS channel, D.name AS customer_type, A.address AS outlet_address, CONCAT(E.last_name, ' ', E.first_name) AS ba_name, A.created_date, A.status", FALSE);
			$this->db->from("outlets A");
			$this->db->join("distributors B", "A.distributor = B.id", "LEFT");
			$this->db->join("channels C", "A.channel_id = C.id", "LEFT");
			$this->db->join("outlet_types D", "A.outlet_type_id = D.id", "LEFT");
			$this->db->where("A.status", 1);
			$this->db->where("A.ba_id", $id);
			$query = $this->db->get();
			return $query->result();
		}

		public function getOutletById($id){
			$this->db->select("A.id, A.dms_code, A.name AS outlet_name, B.name AS distributor, C.name AS channel, D.name AS customer_type, A.address AS outlet_address, CONCAT(E.last_name, ' ', E.first_name) AS ba_name, A.created_date, A.status", FALSE);
			$this->db->from("outlets A");
			$this->db->join("distributors B", "A.distributor = B.id", "LEFT");
			$this->db->join("channels C", "A.channel_id = C.id", "LEFT");
			$this->db->join("outlet_types D", "A.outlet_type_id = D.id", "LEFT");
			$this->db->join("users E", "A.ba_id = E.id", "LEFT");
			$this->db->where("A.status", 1);
			$this->db->where("A.id", $id);
			$query = $this->db->get();
			return $query->row();	
		}
		
		public function getAllOutlets($status=1){
			$this->db->select("A.id, A.dms_code, A.name AS outlet_name, B.name AS distributor, C.name AS channel, D.name AS customer_type, A.address AS outlet_address, CONCAT(E.last_name, ' ', E.first_name) AS ba_name", FALSE);
			$this->db->from('outlets A');
			$this->db->join("distributors B", "A.distributor = B.id", "LEFT");
			$this->db->join("channels C", "A.channel_id = C.id", "LEFT");
			$this->db->join("outlet_types D", "A.outlet_type_id = D.id", "LEFT");
			$this->db->join("users E", "A.ba_id = E.id", "LEFT");
			$this->db->order_by("A.name");
			$this->db->where('A.status', $status);
			$query = $this->db->get();
			return $query->result();
		}

		public function count(){
			$this->db->from('outlets');
			$this->db->where("status", 1);
			return $this->db->count_all_results();
		}
	}
?>