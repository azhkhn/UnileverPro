<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distributor extends ADMIN_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model("dto/DtoDistributors");
			$this->load->model("dao/DistributorsDAO");
		}
	
		public function index(){
			//$this->load->view('distributor');
			$this->listpro();
		}
	
		public function add(){
			$this->load->view('adddistributor');
		}
	
		public function addingpro(){
			$this->DtoDistributors->setName($this->input->post('name'));
			$this->DtoDistributors->setDescription($this->input->post('description'));
			$this->DtoDistributors->setCreated_by($this->ion_auth->get_user_id());
			$this->DistributorsDAO->addDistributor($this->DtoDistributors);
			redirect("distributor");
		}
		
		public function listpro(){
			$data['lists'] = $this->DistributorsDAO->listDistributors();
			$this->load->view('distributor', $data);
		}
		
		public function deletepro($id){
			$this->DistributorsDAO->deleteDistributor($id);
			redirect('distributor');
		}

		public function getpro($id){
			$data['getpro'] = $this->DistributorsDAO->getDistributor($id);
			$this->load->view('adddistributor', $data);
		}

		public function updatepro($id){
			$this->DtoDistributors->setId($id);
			$this->DtoDistributors->setName($this->input->post('name'));
			$this->DtoDistributors->setDescription($this->input->post('description'));
			$this->DtoDistributors->setUpdated_by($this->ion_auth->get_user_id());
			
			$this->DistributorsDAO->updateDistributor($this->DtoDistributors);
			redirect('distributor');
			
		}
}
?>