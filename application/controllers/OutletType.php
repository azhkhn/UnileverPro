<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OutletType extends ADMIN_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model("dto/DtoOutletTypes");
			$this->load->model("dao/OutletTypesDAO");
		}
	
		public function index(){
			//$this->load->view('outletType');
			$this->listpro();
		}
	
		public function add(){
			$this->load->view('addoutlettype');
		}
	
		public function addingpro(){
			$this->DtoOutletTypes->setName($this->input->post('name'));
			$this->DtoOutletTypes->setDescription($this->input->post('description'));
			$this->DtoOutletTypes->setCreated_by(1);
			$this->OutletTypesDAO->addOutlettype($this->DtoOutletTypes);
			redirect("outletType");
		}
		
		public function listpro(){
			$data['lists'] = $this->OutletTypesDAO->listOutlettypes();
			$this->load->view('outletType', $data);
		}
		
		public function deletepro($id){
			$this->OutletTypesDAO->deleteOutlettype($id);
			redirect('outletType');
		}

		public function getpro($id){
			$data['getpro'] = $this->OutletTypesDAO->getOutlettype($id);
			$this->load->view('addoutlettype', $data);
		}

		public function updatepro($id){
			$this->DtoOutletTypes->setId($id);
			$this->DtoOutletTypes->setName($this->input->post('name'));
			$this->DtoOutletTypes->setDescription($this->input->post('description'));
			$this->DtoOutletTypes->setUpdated_by(1);
			
			$this->OutletTypesDAO->updateOutlettype($this->DtoOutletTypes);
			redirect('outletType');
			
		}
}
?>