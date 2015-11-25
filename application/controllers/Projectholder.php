<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Projectholder extends CI_Controller{

		public function __construct(){
			parent::__construct();
			if(!$this->ion_auth->logged_in())
			{
				// redirect them to the login page
				redirect('auth/login', 'refresh');
			}
			if(!$this->ion_auth->in_group('PROJECT_HOLDER')){
				return show_error('You must be an project holder to view this page.');
			}
		}
				
		public function index(){
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
			$this->load->view('reports/project_holder_daily_report', $this->data);
		}
	}
?>