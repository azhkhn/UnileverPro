<?php
	class Daouser extends CI_Model{


		public function __construct(){
			parent::__construct();
			$this->load->model("dto/Dtouser");
		}

		public function all($name, $limit  = 10){
			$this->db->select("A.id,
							   B.group_id,
							   C.name AS group_name,
							   A.first_name, 
							   A.last_name, 
							   A.gender, 
							   A.username As email, 
							   A.phone,
							   A.parent_id,
							   CONCAT(D.last_name, ' ', D.first_name) AS supervisor,
							   A.remark,
							   A.starting_date,
							   A.active", FALSE);
			$this->db->from('users A');
			$this->db->join('users_groups B','A.id = B.user_id', 'LEFT');
			$this->db->join('groups C','B.group_id = C.id','LEFT');
			$this->db->join('users D', 'A.parent_id = D.id', 'LEFT');
			$this->db->where('C.name', $name);
			$offset = $this->uri->segment(3);
			return $this->db->limit($limit, $offset)
							->get()
							->result();
		}

		public function count($name){
			$this->db->from('users A');
			$this->db->join('users_groups B','A.id = B.user_id', 'LEFT');
			$this->db->join('groups C','B.group_id = C.id','LEFT');
			$this->db->join('users D', 'A.parent_id = D.id', 'LEFT');
			$this->db->where('C.name', $name);
			return $this->db->count_all_results();
		}



		public function getAllUsersByGroupName($name=''){
			if($this->ion_auth->in_group('SUPERVISOR')){
				$this->db->select("A.id,
								   A.code,
								   DATE_FORMAT(A.starting_date,'%d/%M/%Y'),
								   A.position,
								   B.group_id,
								   C.name AS group_name,
								   A.first_name, 
								   A.last_name, 
								   A.gender, 
								   A.username As email,  
								   A.phone,
								   A.parent_id,
								   A.photo,
								   CONCAT(D.last_name, ' ', D.first_name) AS supervisor,
								   A.remark,
								   A.starting_date,
								   A.active", FALSE);
				$this->db->from('users A');
				$this->db->join('users_groups B','A.id = B.user_id', 'LEFT');
				$this->db->join('groups C','B.group_id = C.id','LEFT');
				$this->db->join('users D', 'A.parent_id = D.id', 'LEFT');
				$this->db->where('C.name', $name);
				$this->db->where('A.parent_id', $this->ion_auth->get_user_id());
				$this->db->order_by('A.parent_id');
				$query = $this->db->get();
				return $query->result();
			}else{
				$this->db->select("A.id,
								   A.code,
								   DATE_FORMAT(A.starting_date,'%d/%M/%Y'),
								   A.position,
								   B.group_id,
								   C.name AS group_name,
								   A.first_name, 
								   A.last_name, 
								   A.gender, 
								   A.username As email,  
								   A.phone,
								   A.parent_id,
								   A.photo,
								   CONCAT(D.last_name, ' ', D.first_name) AS supervisor,
								   A.remark,
								   A.starting_date,
								   A.active", FALSE);
				$this->db->from('users A');
				$this->db->join('users_groups B','A.id = B.user_id', 'LEFT');
				$this->db->join('groups C','B.group_id = C.id','LEFT');
				$this->db->join('users D', 'A.parent_id = D.id', 'LEFT');
				$this->db->where('C.name', $name);
				$this->db->order_by('A.parent_id');
				$query = $this->db->get();
				return $query->result();
			}
		}

		public function getUserById($id){
			$this->db->select("A.id,
							   A.code,
							   B.group_id,
							   A.position,
							   C.name AS group_name,
							   A.first_name, 
							   A.last_name, 
							   A.gender, 
							   A.username As email,  
							   A.phone,
							   A.photo,
							   A.parent_id,
							   CONCAT(D.last_name, ' ', D.first_name) AS supervisor,
							   A.remark,
							   A.starting_date,
							   A.active", FALSE);
			$this->db->from('users A');
			$this->db->join('users_groups B','A.id = B.user_id', 'LEFT');
			$this->db->join('groups C','B.group_id = C.id','LEFT');
			$this->db->join('users D', 'A.parent_id = D.id', 'LEFT');
			$this->db->where('A.id', $id);
			$query = $this->db->get();
			return $query->row();
		}

		public function changeStatus(Dtouser $user){
			$this->db->set('updated_date', date('Y-m-d H:i:s'));
			$this->db->set('updated_by', $this->ion_auth->get_user_id());
			$this->db->set('active', 1 - $user->getActive());
			$this->db->where('id', $user->getId());
			return $this->db->update('users');
		}

		public function updateUser($data){
			return true;
		}

		public function getAllUserBsyGroupId($id=3){
			if($this->ion_auth->in_group('SUPERVISOR')){
				$this->db->select("A.id,
								   A.code,
								   B.group_id,
								   C.name AS group_name,
								   CONCAT(A.last_name, ' ', A.first_name) AS username, 
								   A.parent_id,
								   CONCAT(D.last_name, ' ', D.first_name) AS supervisor,
								   A.active", FALSE);
				$this->db->from('users A');
				$this->db->join('users_groups B','A.id = B.user_id', 'LEFT');
				$this->db->join('groups C','B.group_id = C.id','LEFT');
				$this->db->join('users D', 'A.parent_id = D.id', 'LEFT');
				$this->db->where('C.id', $id);
				$this->db->where('A.active', 1);
				$this->db->where('A.parent_id', $this->ion_auth->get_user_id());
				$this->db->order_by("A.parent_id, A.last_name");
				$query = $this->db->get();
				return $query->result();
			}else{
				$this->db->select("A.id,
								   A.code,
								   B.group_id,
								   C.name AS group_name,
								   CONCAT(A.last_name, ' ', A.first_name) AS username, 
								   A.parent_id,
								   CONCAT(D.last_name, ' ', D.first_name) AS supervisor,
								   A.active", FALSE);
				$this->db->from('users A');
				$this->db->join('users_groups B','A.id = B.user_id', 'LEFT');
				$this->db->join('groups C','B.group_id = C.id','LEFT');
				$this->db->join('users D', 'A.parent_id = D.id', 'LEFT');
				$this->db->where('C.id', $id);
				$this->db->where('A.active', 1);
				$this->db->order_by("A.parent_id, A.last_name");
				$query = $this->db->get();
				return $query->result();
			}
		}

		public function getAllUsersByParent(Dtouser $user){
			$this->db->select("A.id,
							   B.group_id,
							   C.name AS group_name,
							   CONCAT(A.last_name, ' ', A.first_name) AS username, 
							   A.parent_id,
							   CONCAT(D.last_name, ' ', D.first_name) AS supervisor,
							   A.active", FALSE);
			$this->db->from('users A');
			$this->db->join('users_groups B','A.id = B.user_id', 'LEFT');
			$this->db->join('groups C','B.group_id = C.id','LEFT');
			$this->db->join('users D', 'A.parent_id = D.id', 'LEFT');
			$this->db->where('A.parent_id', $user->getId());
			$this->db->where('A.active', 1);
			$this->db->order_by("A.last_name");
			$query = $this->db->get();
			return $query->result();	
		}

		public function getSupervisorInformation(Dtouser $user){
			$this->db->select ("A.id
								, A.first_name
								, A.last_name
								, (SELECT CONCAT(last_name, ' ', first_name) AS supervisor 
								   FROM users where id = A.parent_id) AS executive
								, A.photo" , FALSE);
			$this->db->from('users A');
			$this->db->where ('A.active', 1);
			$this->db->where('A.id', $user->getId());
			$query = $this->db->get ();
			return $query->row();
		}
		
	}
?>
