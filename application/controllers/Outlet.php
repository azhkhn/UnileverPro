<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outlet extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model("dto/DtoOutlets");
			$this->load->model("dao/OutletsDAO");
		}
	
		public function index(){
			//$this->load->view('outlet');
			$this->listpro();
		}
	
		public function add(){
			$this->load->view('addoutlet');
		}
	
		public function addingpro(){
			$this->DtoOutlets->setDms_code($this->input->post('dms_code'));
			$this->DtoOutlets->setDistributor($this->input->post('distributor'));
			$this->DtoOutlets->setChannel_id($this->input->post('channel_id'));
			$this->DtoOutlets->setOutlet_type_id($this->input->post('outlet_type_id'));
			$this->DtoOutlets->setName($this->input->post('name'));
			$this->DtoOutlets->setAddress($this->input->post('address'));
			$this->DtoOutlets->setBa_id($this->input->post('ba_id'));
			$this->DtoOutlets->setCreated_by(1);
			
			$this->OutletsDAO->addOutlet($this->DtoOutlets);
			redirect("outlet");
		}
		
		public function listpro(){
			$data['lists'] = $this->OutletsDAO->listOutlets();
			$this->load->view('outlet', $data);
		}
		
		public function deletepro($id){
			$this->OutletsDAO->deleteOutlet($id);
			redirect('outlet');
		}

		public function getpro($id){
			$data['getpro'] = $this->OutletsDAO->getOutlet($id);
			$this->load->view('addoutlet', $data);
		}

		public function updatepro($id){
			$this->DtoOutletTypes->setId($id);
			$this->DtoOutlets->setDms_code($this->input->post('dms_code'));
			$this->DtoOutlets->setDistributor($this->input->post('distributor'));
			$this->DtoOutlets->setChannel_id($this->input->post('channel_id'));
			$this->DtoOutlets->setOutlet_type_id($this->input->post('outlet_type_id'));
			$this->DtoOutlets->setName($this->input->post('name'));
			$this->DtoOutlets->setAddress($this->input->post('address'));
			$this->DtoOutlets->setBa_id($this->input->post('ba_id'));
			$this->DtoOutlets->setUpdated_by(1);
			
			$this->OutletsDAO->updateOutlet($this->DtoOutlets);
			redirect('outlet');
			
		}
}
?>