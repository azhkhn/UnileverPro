<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends ADMIN_Controller{

		public function __construct(){
			parent::__construct();
		}

		public function index(){
			$this->load->model("dao/Daouser");
			$this->load->model("dao/Daoproduct");
			$this->load->model("dao/Daobrand");
			$this->load->model("dao/Outletsdao");
			$this->data["total_ba"] = $this->Daouser->countUsersByGroupId(3);
			$this->data["total_product"] = $this->Daoproduct->count();
			$this->data["total_brand"] = $this->Daobrand->count();
			$this->data["total_outlet"] = $this->Outletsdao->count();
			$this->load->view('dashboard', $this->data);
		}

	}
?>