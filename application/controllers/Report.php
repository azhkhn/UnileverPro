<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Report extends ADMIN_CONTROLLER{

		public function __construct(){
			parent::__construct();
		}
		
		public function dailyBAReport($id){
			$this->load->model('dao/Daouser');
			$this->load->model('dto/Dtouser');
			$this->data["ba_users"] = $this->Daouser->getAllUsersByGroupId(3);
			$this->data["supervisor_users"] = $this->Daouser->getAllUsersByGroupId(2);
			$this->data["ba_executive_users"] = $this->Daouser->getAllUsersByGroupId(1);
			$this->load->view('reports/beauty_agent_daily_report', $this->data);
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
		
		public function dailySupervisorReport($id){
			$this->load->model('dao/Daouser');
			$this->load->model('dto/Dtouser');
			$this->data["supervisor_users"] = $this->Daouser->getAllUsersByGroupId(2);
			$this->load->view('reports/supervisor_daily_report', $this->data);
		}

		public function changeSupervisor(){
			$this->load->model('dao/Daouser');
			$this->load->model('dao/Daosale');
			$this->load->model('dto/Dtouser');
			$this->load->model('dto/Dtosale');
			$this->Dtouser->setId(($this->input->post('supervisor_id')=="") ? $this->ion_auth->get_user_id() : $this->input->post('supervisor_id'));
			$this->data["ba_users"] = $this->Daouser->getAllUsersByParent($this->Dtouser);
			$this->Dtosale->setBaId($this->input->post('supervisor_id'));
			$this->Dtosale->setStartDate($this->input->post('start_date'));
			$this->Dtosale->setEndDate($this->input->post('end_date'));
			$this->data["user"] = $this->Daosale->getSupervisorReport($this->Dtosale);
			echo json_encode($this->data);
		}
		
		public function dailyGMReport($id){
			$this->load->model('dao/Daouser');
			$this->load->model('dto/Dtouser');
			$this->data["executive_users"] = $this->Daouser->getAllUsersByGroupId(1);
			$this->load->view('reports/beauty_executive_daily_report',$this->data);
		}

		public function changeBAExecutive(){
			$this->load->model('dao/Daouser');
			$this->load->model('dao/Daosale');
			$this->load->model('dto/Dtouser');
			$this->load->model('dto/Dtosale');

			$this->Dtouser->setId($this->input->post('executive_id'));
			$this->data["supervisor_users"] = $this->Daouser->getAllUsersByParent($this->Dtouser);
			$this->Dtosale->setBaId($this->input->post('executive_id'));
			$this->Dtosale->setStartDate($this->input->post('start_date'));
			$this->Dtosale->setEndDate($this->input->post('end_date'));
			$this->data["user"] = $this->Daosale->getBAExecutiveReport($this->Dtosale);
			echo json_encode($this->data);
		}
		
		public function dailyPMReport($id){
			$this->load->model('dao/Daouser');
			$this->load->model('dao/Daosale');
			$this->load->model('dto/Dtouser');

			$today_amount = $this->Daosale->getSaleOfProjectHolderArchievement();
			$monthToDate = $this->Daosale->getSaleOfProjectHolderArchievement(1);
			$yearToDate = $this->Daosale->getSaleOfProjectHolderArchievement(2);
			$this->data["sale_target"] = $this->Daosale->getProjectHolderSaleTarget($this->Dtouser);
			$this->data["today_achievement_percent"] = (double)($this->data["sale_target"]->monthly_target==0) ? 0 : ((double)$today_amount->amount / (double)($this->data["sale_target"]->monthly_target / 26)) * 100;
			$this->data["month_achievement_percent"] = (double)($this->data["sale_target"]->monthly_target==0) ? 0 : ((double)$monthToDate->amount / (double)$this->data["sale_target"]->monthly_target) * 100;
			$this->data["year_achievement_percent"] = (double)($this->data["sale_target"]->monthly_target==0) ? 0 : ((double)$yearToDate->amount / (double)$this->data["sale_target"]->target_achievement) * 100;
			$this->data["today_achievement"] = $today_amount->amount;
			$this->data["month_achievement"] = $monthToDate->amount;
			$this->data["year_achievement"] = $yearToDate->amount;
			//echo json_encode($this->data);
			$this->load->view('reports/project_holder_daily_report', $this->data);
		}

		/*public function bareport(){
			$this->load->model('dao/Daosale');
			$data["result"] = $this->Daosale->getBAReport('2015-11-01','2015-12-01');
			echo json_encode($data);
		}*/
	}
?>