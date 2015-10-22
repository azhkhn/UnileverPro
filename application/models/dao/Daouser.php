<?php

class DaoUser extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("dto/DtoUser");
		$this->load->library('encryption');
	}

	function get_all_users(){
		$this->db->select('u.userid, u.username, r.name AS usertype, u.active');
		$this->db->from('USERS u');
		$this->db->join('ROLES r', 'r.roleid = u.usertype');
		$query = $this->db->get();
		return $query->result();
	}

	function get_user_by_id($user_id){
		$this->db->select('u.userid, u.username,u.password, r.name AS usertype, u.active');
		$this->db->from('USERS u');
		$this->db->join('ROLES r', 'r.roleid = u.usertype');
		$this->db->where('userid', $user_id);
		$query = $this->db->get();
		return $query->row();
	}

	function get_user_by_username($username){
		$this->db->select('u.userid, u.username, r.name AS usertype, u.active');
		$this->db->from('USERS u');
		$this->db->join('ROLES r', 'r.roleid = u.usertype');
		$this->db->where('username', $username);
		return $this->db->get();
	}

	function check_duplicate_user_by_username($username){
		$this->db->from('USERS');
		$this->db->where('username', $username);
		return $this->db->count_all_results();
	}

	function get_user_by_email($email){
		$this->db->select('u.userid, u.username, r.name AS usertype, u.active');
		$this->db->from('USERS u');
		$this->db->join('ROLES r', 'r.roleid = u.usertype');
		$this->db->where('email', $email);
		return $this->db->get();
	}

	function create_new_user(DtoUser $user){
		$data = array(
			"username" => $user->getUsername(),
			"password" => md5($user->getPassword()),
			"usertype" => $user->getUsertype(),
			"active"   => $user->getActive()
		);
		return $this->db->insert('USERS', $data);
	}

	function update_user(DtoUser $user){
		$data = array(
			"username" => $user->getUsername(),
			"password" => md5($user->getPassword()),
			"usertype" => $user->getUsertype(),
			"active"   => $user->getActive()
		);
		$this->db->where('userid', $user->getUserid());
		$this->db->update('USERS', $data);
		if($this->db->affected_rows()==1){
			return true;
		}else{
			return false;
		}
	}

	function update_status(DtoUser $user){
		$this->db->set("active", 1 - $user->getActive());
		$this->db->where("userid", $user->getUserid());
		$this->db->update("USERS");
		if($this->db->affected_rows()==1){
			return true;
		}else{
			return false;
		}	
	}

	function change_password($user_id, $new_pssword){
		$this->db->set("password", $new_pssword);
		$this->db->where('id', $user_id);
		return $this->db->update('USERS');
	}

	function login(DtoUser $user){
		$this->db->select('userid, username, usertype');
		$this->db->from('USERS');
		$this->db->where('username', $user->getUsername());
		$this->db->where('password',$user->getPassword());
		$this->db->where('active', 1);
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows()==1){
		    return $query->result();
		}else{
			return false;
		}
	}

	public function countUsers(){
		return $this->db->count_all('USERS');
	}

}