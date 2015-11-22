<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Sale extends CI_Controller{

		public function __construct(){
			parent::__construct();
			if(!$this->ion_auth->logged_in())
			{
				// redirect them to the login page
				redirect('auth/login', 'refresh');
			}
			if(!$this->ion_auth->in_group('BEAUTY_AGENT')){
				return show_error('You must be an beauty agent to view this page.');
			}
		}

		public function index(){
			$user = $this->ion_auth->user()->row();
			$this->load->model('dao/Daosale');
			$this->load->model('dto/Dtosale');
			$this->Dtosale->setBaId($user->id);
			$this->Dtosale->setOutletid(3);
			$this->Dtosale->setSaleDate(date('Y-m-d'));
			$this->data["user"] = $this->Daosale->getSellerInformation($this->Dtosale);
			$this->data["sale_archievement"] = $this->Daosale->getSaleArchievement($this->Dtosale);
			$this->data["sale_archievement_month_to_date"] = $this->Daosale->getSaleArchievement($this->Dtosale,1);
			$this->data["sale_archievement_year_to_date"] = $this->Daosale->getSaleArchievement($this->Dtosale,2);
			$this->data["products"] = $this->Daosale->getAllProducts();
			$total_rows = $this->Daosale->count($this->Dtosale); 
			$this->load->helper('app');
			$this->data["page_links"] = pagination($total_rows, 15,'sale/ajax', 3);
			$this->data["sales"] = $this->Daosale->getAllSales($this->Dtosale);
			$this->load->view('sale', $this->data);
		}

		public function ajax(){
			$user = $this->ion_auth->user()->row();
			$this->load->model('dao/Daosale');
			$this->load->model('dto/Dtosale');
			$this->Dtosale->setBaId($user->id);
			$this->Dtosale->setOutletid(3);
			$this->Dtosale->setSaleDate($this->input->post('sale_date'));
			$total_rows = $this->Daosale->count($this->Dtosale); 
			$this->load->helper('app');
			$this->data["page_links"] = pagination($total_rows, 15);
			$this->data["sales"] = $this->Daosale->getAllSales($this->Dtosale, 15,'sale/ajax', 3);
			echo json_encode($this->data);
		}

	}
?>