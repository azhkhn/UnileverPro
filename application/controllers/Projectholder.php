<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Projectholder extends CI_Controller{

		public function __construct(){
			parent::__construct();
			if(!$this->ion_auth->logged_in())
			{
				redirect('auth/login', 'refresh');
			}
			if(!$this->ion_auth->in_group('PROJECT_HOLDER')){
				return show_error('You must be an project holder to view this page.');
			}
		}
				
		public function index(){
			$this->load->view('project/reports/project_holder_daily_report');
		}

		public function dailyPMReport(){
			$this->load->model('dao/Daosale');
			$this->load->model('dto/Dtosale');
			$this->Dtosale->setStartDate($this->input->post('start_date'));
			$this->Dtosale->setEndDate($this->input->post('end_date'));
			$this->data["user"] = $this->Daosale->getProjectHolderReport($this->Dtosale);
			echo json_encode($this->data);
		}
	}
?>