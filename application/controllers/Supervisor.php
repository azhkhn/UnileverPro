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
			$this->load->model('dao/Daouser');
			$this->load->model('dao/Daosale');
			$this->load->model('dto/Dtouser');
			$this->Dtouser->setId($this->ion_auth->get_user_id());
			$this->data["ba_users"] = $this->Daouser->getAllUsersByParent($this->Dtouser);
			$today_amount = $this->Daosale->getSaleOfSupervisorArchievement($this->Dtouser);
			$monthToDate = $this->Daosale->getSaleOfSupervisorArchievement($this->Dtouser,1);
			$yearToDate = $this->Daosale->getSaleOfSupervisorArchievement($this->Dtouser,2);
			$this->data["user"] = $this->Daouser->getSupervisorInformation($this->Dtouser);
			$this->data["sale_target"] = $this->Daosale->getSupervisorSaleTarget($this->Dtouser);
			$this->data["today_achievement_percent"] = (double)($this->data["sale_target"]->monthly_target==0) ? 0 : ((double)$today_amount->amount / (double)($this->data["sale_target"]->monthly_target / 26)) * 100;
			$this->data["month_achievement_percent"] = (double)($this->data["sale_target"]->monthly_target==0) ? 0 : ((double)$monthToDate->amount / (double)$this->data["sale_target"]->monthly_target) * 100;
			$this->data["year_achievement_percent"] = (double)($this->data["sale_target"]->monthly_target==0) ? 0 : ((double)$yearToDate->amount / (double)$this->data["sale_target"]->target_achievement) * 100;
			$this->data["today_achievement"] = $today_amount->amount;
			$this->data["month_achievement"] = $monthToDate->amount;
			$this->data["year_achievement"] = $yearToDate->amount;
			$this->load->view('supervisor/supervisor_daily_report', $this->data);
		}

		public function BAInformation(){
			$this->load->model('dao/Daouser');
            $total_rows = $this->Daouser->count('BEAUTY_AGENT');
			$this->data["users"] = $this->Daouser->getAllUsersByGroupName('BEAUTY_AGENT');//$this->Daouser->getAllUsersByGroupName('BEAUTY_AGENT');
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
			//$this->data["supervisor_users"] = $this->Daouser->getAllUsersByGroupId(2);
			//$this->data["ba_executive_users"] = $this->Daouser->getAllUsersByGroupId(1);
			$this->load->view('supervisor/beauty_agent_daily_report', $this->data);
		}

		public function changeBA(){
			$this->load->model('dao/Daosale');
			$this->load->model('dto/Dtosale');
			$this->Dtosale->setBaId($this->input->post("ba_id"));
			$this->data["user"] = $this->Daosale->getSellerInformation($this->Dtosale);
			if($this->data["user"]){
				$this->Dtosale->setOutletId($this->data["user"]->outlet_id);
				$today_amount = $this->Daosale->getSaleArchievement($this->Dtosale);
				$this->data["today_achievement_percent"] = (double)($this->data["user"]->monthly_target==0) ? 0 : ((double)$today_amount->amount / (double)($this->data["user"]->monthly_target / 26)) * 100;
				$monthToDate = $this->Daosale->getSaleArchievement($this->Dtosale,1);
				$this->data["month_achievement_percent"] = (double)($this->data["user"]->monthly_target==0) ? 0 : ((double)$monthToDate->amount / (double)$this->data["user"]->monthly_target) * 100;
				$yearToDate = $this->Daosale->getSaleArchievement($this->Dtosale,2);
				$this->data["year_achievement_percent"] = (double)($this->data["user"]->monthly_target==0) ? 0 : ((double)$yearToDate->amount / (double)$this->data["user"]->target_achievement) * 100;
				$this->data["today_achievement"] = $today_amount->amount;
				$this->data["month_achievement"] = $monthToDate->amount;
				$this->data["year_achievement"] = $yearToDate->amount;
			}
			echo json_encode($this->data);

		}

		public function changeDMSCode(){
			$this->load->model('dao/Daosale');
			$this->load->model('dto/Dtosale');
			$this->Dtosale->setDMSCode($this->input->post("dms_code"));
			$this->data["user"] = $this->Daosale->getSellerInformation($this->Dtosale,1);
			if($this->data["user"]){
				$this->Dtosale->setBaId($this->data["user"]->id);
				$this->Dtosale->setOutletId($this->data["user"]->outlet_id);
				$today_amount = $this->Daosale->getSaleArchievement($this->Dtosale);
				$this->data["today_achievement_percent"] = (double)($this->data["user"]->monthly_target==0) ? 0 : ((double)$today_amount->amount / (double)($this->data["user"]->monthly_target / 26)) * 100;
				$monthToDate = $this->Daosale->getSaleArchievement($this->Dtosale,1);
				$this->data["month_achievement_percent"] = (double)($this->data["user"]->monthly_target==0) ? 0 : ((double)$monthToDate->amount / (double)$this->data["user"]->monthly_target) * 100;
				$yearToDate = $this->Daosale->getSaleArchievement($this->Dtosale,2);
				$this->data["year_achievement_percent"] = (double)($this->data["user"]->monthly_target==0) ? 0 : ((double)$yearToDate->amount / (double)$this->data["user"]->target_achievement) * 100;
				$this->data["today_achievement"] = $today_amount->amount;
				$this->data["month_achievement"] = $monthToDate->amount;
				$this->data["year_achievement"] = $yearToDate->amount;
			}
			echo json_encode($this->data);
		}
	}
?>