<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Supervisor extends CI_Controller{

		public function __construct(){
			parent::__construct();
			if(!$this->ion_auth->logged_in())
			{
				// redirect them to the login page
				redirect('auth/login', 'refresh');
			}
			if(!$this->ion_auth->in_group('SUPERVISOR')){
				return show_error('You must be an supervisor to view this page.');
			}
		}
				
		public function index(){
			$this->load->view('supervisor/supervisor_daily_report');
		}

		public function info(){
			$this->load->model('dao/Daouser');
			$this->load->model('dao/Daosale');
			$this->load->model('dto/Dtouser');
			$this->load->model('dto/Dtosale');
			$this->Dtouser->setId($this->ion_auth->get_user_id());
			$this->data["ba_users"] = $this->Daouser->getAllUsersByParent($this->Dtouser);
			$this->Dtosale->setBaId($this->ion_auth->get_user_id());
			$this->Dtosale->setStartDate($this->input->post('start_date'));
			$this->Dtosale->setEndDate($this->input->post('end_date'));
			$this->data["user"] = $this->Daosale->getSupervisorReport($this->Dtosale);
			echo json_encode($this->data);
		}

		public function BAInformation(){
			$this->load->model('dao/Daouser');
            $total_rows = $this->Daouser->count('BEAUTY_AGENT');
			$this->data["users"] = $this->Daouser->getAllUsersByGroupName('BEAUTY_AGENT');
			$this->data["supervisors"] = $this->Daouser->getAllUsersByGroupName('SUPERVISOR');
			$this->load->view('supervisor/beauty_agent_list', $this->data);
		}

		public function getUser($id){
			$this->load->model('dao/Daouser');
			echo json_encode($this->Daouser->getUserById($id));
		}

		public function changeStatus($id){
			$this->load->model('dao/Daouser');
			$this->load->model('dto/Dtouser');
			$this->Dtouser->setId($id);
			$this->Dtouser->setActive($this->input->post('active'));
			echo json_encode($this->Daouser->changeStatus($this->Dtouser));
		}

		public function dailyBAReport(){
			$this->load->model('dao/Daouser');
			$this->load->model('dto/Dtouser');
			$this->data["ba_users"] = $this->Daouser->getAllUsersByGroupId(3);
			$this->load->view('supervisor/beauty_agent_daily_report', $this->data);
		}

		public function changeBA(){
			$this->load->model('dao/Daosale');
			$this->load->model('dto/Dtosale');
			$this->Dtosale->setBaId($this->input->post("ba_id"));
			$this->Dtosale->setStartDate($this->input->post('start_date'));
			$this->Dtosale->setEndDate($this->input->post('end_date'));
			$this->data["user"] = $this->Daosale->getBAReport($this->Dtosale);
			echo json_encode($this->data);
		}

		public function changeDMSCode(){
			$this->load->model('dao/Daosale');
			$this->load->model('dto/Dtosale');
			$this->Dtosale->setDMSCode($this->input->post("dms_code"));
			$this->Dtosale->setStartDate($this->input->post('start_date'));
			$this->Dtosale->setEndDate($this->input->post('end_date'));
			$this->data["user"] = $this->Daosale->getBAReport($this->Dtosale);
			echo json_encode($this->data);	
		}
	}
?>