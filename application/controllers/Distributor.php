<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distributor extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model("dto/DtoDistributor");
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
			$this->DtoDistributor->setName($this->input->post('name'));
			$this->DtoDistributor->setDescription($this->input->post('description'));
			$this->DtoDistributor->setCreated_by(1);
			$this->DistributorsDAO->addDistributor($this->DtoDistributor);
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
			$this->DtoDistributor->setId($id);
			$this->DtoDistributor->setName($this->input->post('name'));
			$this->DtoDistributor->setDescription($this->input->post('description'));
			$this->DtoDistributor->setUpdated_by(1);
			
			$this->DistributorsDAO->updateDistributor($this->DtoDistributor);
			redirect('distributor');
			
		}
}
?>