<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Report extends ADMIN_CONTROLLER{

		public function __construct(){
			parent::__construct();
		}
		
		public function dailyBAReport($id){
			$this->load->view('reports/beauty_agent_daily_report');
		}
		
		public function dailySupervisorReport($id){
			$this->load->view('reports/supervisor_daily_report');
		}
		
		public function dailyGMReport($id){
			$this->load->view('reports/beauty_executive_daily_report');
		}
		
		public function dailyPMReport($id){
			$this->load->view('reports/project_holder_daily_report');
		}
	}
?>