<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class User extends ADMIN_CONTROLLER{

		public function __construct(){
			parent::__construct();
			$this->load->library(array('ion_auth','form_validation'));
		}

		public function index(){
			//list the users
			$this->data['users'] = $this->ion_auth->users()->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
			$this->load->view('users/beauty_agent_list', $this->data);
		}
		
		public function information($id){
			$this->load->view('users/beauty_agent_details');
		}
		
		public function dailyBAReport($id){
			$this->load->view('users/beauty_agent_daily_report');
		}
		
		public function dailySupervisorReport($id){
			$this->load->view('users/supervisor_daily_report');
		}
		
		public function dailyGMReport($id){
			$this->load->view('users/beauty_executive_daily_report');
		}
		
		public function dailyPMReport($id){
			$this->load->view('users/project_holder_daily_report');
		}
	}
?>